<?php

namespace Payever\Tests\Unit\Payever\Payments\Action;

use Payever\Sdk\Core\Base\ResponseInterface;
use Payever\Sdk\Payments\Action\ActionDecider;
use Payever\Sdk\Payments\Action\ActionDeciderInterface;
use Payever\Sdk\Payments\Base\PaymentsApiClientInterface;
use Payever\Sdk\Payments\Http\MessageEntity\GetTransactionResultEntity;
use Payever\Sdk\Payments\Http\ResponseEntity\GetTransactionResponse;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class ActionDeciderTest extends TestCase
{
    /** @var PaymentsApiClientInterface|MockObject */
    private $api;

    /** @var ActionDecider */
    private $actionDecider;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        $this->api = $this->getMockForAbstractClass(PaymentsApiClientInterface::class);
        $this->actionDecider = new ActionDecider($this->api);
    }

    public function testIsActionAllowed()
    {
        $this->api->expects($this->once())
            ->method('getTransactionRequest')
            ->willReturn($response = $this->getMockForAbstractClass(ResponseInterface::class));
        $response->expects($this->once())
            ->method('getResponseEntity')
            ->willReturn(
                $getTransactionEntity = $this->getMockBuilder(GetTransactionResponse::class)
                    ->disableOriginalConstructor()
                    ->getMock()
            );
        $getTransactionEntity->expects($this->once())
            ->method('__call')
            ->willReturn(
                $getTransactionResult = $this->getMockBuilder(GetTransactionResultEntity::class)
                    ->disableOriginalConstructor()
                    ->getMock()
            );
        $getTransactionResult->expects($this->once())
            ->method('__call')
            ->willReturn([
                $invalidAction = new \stdClass(),
                $allowedAction = new \stdClass(),
            ]);
        $allowedAction->action = ActionDeciderInterface::ACTION_REFUND;
        $allowedAction->enabled = true;
        $this->assertTrue(
            $this->actionDecider->isActionAllowed(
                'some-payment-uuid',
                ActionDeciderInterface::ACTION_REFUND
            )
        );
    }
}
