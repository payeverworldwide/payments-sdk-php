<?php

/**
 * PHP version 5.4 and 8
 *
 * @category  MessageEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @author    Hennadii.Shymanskyi <gendosua@gmail.com>
 * @copyright 2017-2023 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/shopsystems/api/getting-started
 */

namespace Payever\Sdk\Payments\Http\MessageEntity;

use Payever\Sdk\Core\Base\MessageEntity;

/**
 * @method string getVariantId()
 * @method null|string getName()
 * @method bool getAcceptFee()
 * @method bool getShippingAddressAllowed()
 * @method bool getShippingAddressEquality()
 * @method PaymentOptionOptionsEntity getOptions()
 *
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class PaymentOptionVariantEntity extends MessageEntity
{
    /** @var string - Variant UUID */
    protected $variantId;

    /** @var null|string - Variant name */
    protected $name;

    /** @var bool $acceptFee */
    protected $acceptFee;

    /** @var bool $shippingAddressAllowed */
    protected $shippingAddressAllowed;

    /** @var bool $shippingAddressEquality */
    protected $shippingAddressEquality;

    /** @var PaymentOptionOptionsEntity[] */
    protected $options;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->variantId;
    }

    /**
     * Sets Options
     *
     * @param array $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = new PaymentOptionOptionsEntity($options);

        return $this;
    }
}
