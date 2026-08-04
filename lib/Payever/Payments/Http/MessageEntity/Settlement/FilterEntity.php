<?php

namespace Payever\Sdk\Payments\Http\MessageEntity\Settlement;

use Payever\Sdk\Core\Base\MessageEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Settlement\Filter\PaymentMethod;

/**
 * @method string                 getStartDate()
 * @method string                 getEndDate()
 * @method string                 getCurrency()
 * @method string                 getOperationType()
 * @method PaymentMethod[]        getPaymentMethods()
 * @method self                   setStartDate(string $startDate)
 * @method self                   setEndDate(string $endDate)
 * @method self                   setCurrency(string $currency)
 * @method self                   setOperationType(string $operationType)
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
     * @param PaymentMethod[]|string $paymentMethods
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
        foreach ($paymentMethods as $paymentMethod) {
            $this->paymentMethods[] = new PaymentMethod($paymentMethod);
        }

        return $this;
    }
}
