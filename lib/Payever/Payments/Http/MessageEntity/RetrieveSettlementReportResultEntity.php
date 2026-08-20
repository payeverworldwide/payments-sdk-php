<?php

namespace Payever\Sdk\Payments\Http\MessageEntity;

use Payever\Sdk\Core\Http\MessageEntity\ResultEntity;

/**
 * @method string getTransactionId()
 * @method string getOrderId()
 * @method string getInitiationDate()
 * @method string getBusinessName()
 * @method string getBusinessId()
 * @method string getCustomerEmail()
 * @method string getCustomerName()
 * @method string getExecutionDate()
 * @method float  getNetAmount()
 * @method float  getPaymentFee()
 * @method float  getTransactionFee()
 * @method string getCurrency()
 * @method string getBillingCountry()
 * @method string getBillingCity()
 * @method string getBillingStreet()
 * @method string getShippingCountry()
 * @method string getShippingCity()
 * @method string getShippingStreet()
 * @method string getPaymentMethod()
 * @method string getPaymentIssuer()
 * @method string getOperationType()
 * @method string getSettlementStatus()
 * @method mixed  getOrderCustomer()
 * @method mixed  getOrderExtra()
 * @method self   setTransactionId(string $transactionId)
 * @method self   setOrderId(string $orderId)
 * @method self   setInitiationDate(string $initiationDate)
 * @method self   setBusinessName(string $businessName)
 * @method self   setBusinessId(string $businessId)
 * @method self   setCustomerEmail(string $customerEmail)
 * @method self   setCustomerName(string $customerName)
 * @method self   setExecutionDate(string $executionDate)
 * @method self   setNetAmount(float|int $netAmount)
 * @method self   setPaymentFee(float|int $paymentFee)
 * @method self   setTransactionFee(float|int $transactionFee)
 * @method self   setCurrency(string $currency)
 * @method self   setBillingCountry(string $billingCountry)
 * @method self   setBillingCity(string $billingCity)
 * @method self   setBillingStreet(string $billingStreet)
 * @method self   setShippingCountry(string $shippingCountry)
 * @method self   setShippingCity(string $shippingCity)
 * @method self   setShippingStreet(string $shippingStreet)
 * @method self   setPaymentMethod(string $paymentMethod)
 * @method self   setPaymentIssuer(string $paymentIssuer)
 * @method self   setOperationType(string $operationType)
 * @method self   setSettlementStatus(string $settlementStatus)
 * @method self   setOrderCustomer(mixed $orderCustomer)
 * @method self   setOrderExtra(mixed $orderExtra)
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
class RetrieveSettlementReportResultEntity extends ResultEntity
{
    /**
     * @var string|null
     */
    protected $transactionId;

    /**
     * @var string|null
     */
    protected $orderId;

    /**
     * @var mixed|null
     */
    protected $orderCustomer;

    /**
     * @var mixed|null
     */
    protected $orderExtra;

    /**
     * @var string|null
     */
    protected $initiationDate;

    /**
     * @var string|null
     */
    protected $businessName;

    /**
     * @var string|null
     */
    protected $businessId;

    /**
     * @var string|null
     */
    protected $customerEmail;

    /**
     * @var string|null
     */
    protected $customerName;

    /**
     * @var string|null
     */
    protected $executionDate;

    /**
     * @var float|null
     */
    protected $netAmount;

    /**
     * @var float|int|null
     */
    protected $paymentFee;

    /**
     * @var float|int|null
     */
    protected $transactionFee;

    /**
     * @var string|null
     */
    protected $currency;

    /**
     * @var string|null
     */
    protected $billingCountry;

    /**
     * @var string|null
     */
    protected $billingCity;

    /**
     * @var string|null
     */
    protected $billingStreet;

    /**
     * @var string|null
     */
    protected $shippingCountry;

    /**
     * @var string|null
     */
    protected $shippingCity;

    /**
     * @var string|null
     */
    protected $shippingStreet;

    /**
     * @var string|null
     */
    protected $paymentMethod;

    /**
     * @var string|null
     */
    protected $paymentIssuer;

    /**
     * @var string|null
     */
    protected $operationType;

    /**
     * @var string|null
     */
    protected $settlementStatus;
}
