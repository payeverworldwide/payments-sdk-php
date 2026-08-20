<?php

namespace Payever\Sdk\Payments\Http\MessageEntity\Settlement;

use Payever\Sdk\Core\Base\MessageEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Settlement\Filter\PaymentMethodEntity;

/**
 * @method string                 getStartDate()
 * @method string                 getEndDate()
 * @method string                 getCurrency()
 * @method string                 getOperationType()
 * @method PaymentMethod[]        getPaymentMethods()
 * @method string                 getSettlementStatus()
 * @method self                   setStartDate(string $startDate)
 * @method self                   setEndDate(string $endDate)
 * @method self                   setCurrency(string $currency)
 * @method self                   setOperationType(string $operationType)
 * @method self                   setSettlementStatus(string $settlementStatus)
 */
class FilterEntity extends MessageEntity
{
    /**
     * @var string
     */
    protected $startDate;

    /**
     * @var string
     */
    protected $endDate;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $operationType;

    /**
     * @var array
     */
    protected $paymentMethods;

    /**
     * @var string
     */
    protected $settlementStatus;

    /**
     * @param PaymentMethodEntity[]|string $paymentMethods
     * @return self
     */
    public function setPaymentMethods($paymentMethods)
    {
        if (!$paymentMethods) {
            return $this;
        }

        if (is_string($paymentMethods)) {
            $paymentMethods = json_decode($paymentMethods);
        }

        if (!is_array($paymentMethods)) {
            return $this;
        }

        $this->paymentMethods = [];
        foreach ($paymentMethods as $name) {
            if (!$name) {
                continue;
            }

            if ($name instanceof PaymentMethodEntity) {
                $this->paymentMethods[] = $name;
                continue;
            }

            $paymentMethod = new PaymentMethodEntity();
            $paymentMethod->setName($name);
            $this->paymentMethods[] = $paymentMethod;
        }

        return $this;
    }

}
