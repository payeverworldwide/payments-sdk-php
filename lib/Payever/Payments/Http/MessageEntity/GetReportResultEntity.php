<?php

namespace Payever\Sdk\Payments\Http\MessageEntity;

use Payever\Sdk\Core\Http\MessageEntity\ResultEntity;

/**
 * @method string getTransactionId()
 * @method string getOrderId()
 * @method string getPspReferenceId()
 * @method string getBankReferenceId()
 * @method string getInitiationDate()
 * @method string getBusinessName()
 * @method string getBusinessId()
 * @method string getCustomerEmail()
 * @method string getCustomerName()
 * @method string getTransactionCreditDebit()
 * @method string getOperationType()
 * @method string getExecutionDate()
 * @method float  getGrossAmount()
 * @method float  getNetAmount()
 * @method string getPaymentFeeCreditDebit()
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
 * @method string getSettlementStatus()
 * @method self setTransactionId(string $transactionId)
 * @method self setOrderId(string $orderId)
 * @method self setPspReferenceId(string $pspReferenceId)
 * @method self setBankReferenceId(string $bankReferenceId)
 * @method self setInitiationDate(string $initiationDate)
 * @method self setBusinessName(string $businessName)
 * @method self setBusinessId(string $businessId)
 * @method self setCustomerEmail(string $customerEmail)
 * @method self setCustomerName(string $customerName)
 * @method self setTransactionCreditDebit(string $transactionCreditDebit)
 * @method self setOperationType(string $operationType)
 * @method self setExecutionDate(string $executionDate)
 * @method self setGrossAmount(float|int $grossAmount)
 * @method self setNetAmount(float|int $netAmount)
 * @method self setPaymentFeeCreditDebit(string $paymentFeeCreditDebit)
 * @method self setPaymentFee(float|int $paymentFee)
 * @method self setTransactionFee(float|int $transactionFee)
 * @method self setCurrency(string $currency)
 * @method self setBillingCountry(string $billingCountry)
 * @method self setBillingCity(string $billingCity)
 * @method self setBillingStreet(string $billingStreet)
 * @method self setShippingCountry(string $shippingCountry)
 * @method self setShippingCity(string $shippingCity)
 * @method self setShippingStreet(string $shippingStreet)
 * @method self setPaymentMethod(string $paymentMethod)
 * @method self setPaymentIssuer(string $paymentIssuer)
 * @method self setSettlementStatus(string $settlementStatus)
 */
class GetReportResultEntity extends ResultEntity
{
    /**
     * @var string
     */
    protected $transactionId;

    /**
     * @var string
     */
    protected $orderId;

    /**
     * @var string
     */
    protected $pspReferenceId;

    /**
     * @var string
     */
    protected $bankReferenceId;

    /**
     * @var string
     */
    protected $initiationDate;

    /**
     * @var string
     */
    protected $businessName;

    /**
     * @var string
     */
    protected $businessId;

    /**
     * @var string
     */
    protected $customerEmail;

    /**
     * @var string
     */
    protected $customerName;

    /**
     * @var string
     */
    protected $transactionCreditDebit;

    /**
     * @var string
     */
    protected $operationType;

    /**
     * @var string
     */
    protected $executionDate;

    /**
     * @var float|int
     */
    protected $grossAmount;

    /**
     * @var float|int
     */
    protected $netAmount;

    /**
     * @var string
     */
    protected $paymentFeeCreditDebit;

    /**
     * @var float|int
     */
    protected $paymentFee;

    /**
     * @var float|int
     */
    protected $transactionFee;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $billingCountry;

    /**
     * @var string
     */
    protected $billingCity;

    /**
     * @var string
     */
    protected $billingStreet;

    /**
     * @var string
     */
    protected $shippingCountry;

    /**
     * @var string
     */
    protected $shippingCity;

    /**
     * @var string
     */
    protected $shippingStreet;

    /**
     * @var string
     */
    protected $paymentMethod;

    /**
     * @var string
     */
    protected $paymentIssuer;

    /**
     * @var string
     */
    protected $settlementStatus;
}
