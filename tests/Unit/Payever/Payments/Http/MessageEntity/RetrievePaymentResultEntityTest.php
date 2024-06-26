<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity;

use Payever\Sdk\Payments\Http\MessageEntity\RetrievePaymentResultEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTest;

/**
 * Class RetrievePaymentResultEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\RetrievePaymentResultEntity
 *
 * @package Payever\Tests\Unit\Payever\Payments\Http\MessageEntity
 */
class RetrievePaymentResultEntityTest extends AbstractMessageEntityTest
{
    protected static $scheme = array(
        'id' => 'stub',
        'status' => 'active',
        'color_state' => 'yellow',
        'merchant_name' => 'stub_merchant',
        'customer_name' => 'stub_customer',
        'payment_type' => 'sofort',
        'last_action' => 'create',
        'created_at' => self::DEFAULT_STUB_DATE,
        'updated_at' => self::DEFAULT_STUB_DATE,
        'channel' => 'jtl',
        'reference' => 'stub_reference',
        'amount' => 200,
        'fee' => 20.5,
        'total' =>  220.5,
        'delivery_fee' => 0,
        'address' => array(),
        'payment_details' => array(),
        'payment_details_array' => array('pan_id' => 'stub'),
    );

    public static function getScheme()
    {
        $scheme = static::$scheme;

        $scheme['payment_details'] = PaymentDetailsEntityTest::getScheme();

        return $scheme;
    }

    public function getEntity()
    {
        return new RetrievePaymentResultEntity();
    }
}
