<?php

/**
 * PHP version 5.4 and 8
 *
 * @category  MessageEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2023 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/shopsystems/api/getting-started
 */

namespace Payever\Sdk\Payments\Http\MessageEntity;

use Payever\Sdk\Core\Base\MessageEntity;

/**
 * This class represents Cart Item Entity
 *
 * @method string getName()
 * @method float  getPrice()
 * @method float  getPriceNetto()
 * @method float  getPriceNet()
 * @method float  getVatRate()
 * @method float  getQuantity()
 * @method string getDescription()
 * @method string getThumbnail()
 * @method string getSku()
 * @method string getIdentifier()
 * @method CartItemExtraDataEntity getExtraData()
 * @method self   setName(string $name)
 * @method self   setPrice(float $price)
 * @method self   setPriceNetto(float $priceNetto)
 * @method self   setPriceNet(float $priceNet)
 * @method self   setVatRate(float $vatRate)
 * @method self   setQuantity(float $quantity)
 * @method self   setDescription(string $description)
 * @method self   setThumbnail(string $thumbnail)
 * @method self   setSku(string $sku)
 * @method self   setIdentifier(string $identifier)
 */
class CartItemEntity extends MessageEntity
{
    /** @var string $name */
    protected $name;

    /** @var float $name */
    protected $price;

    /** @var float $priceNetto */
    protected $priceNetto;

    /** @var float $priceNet */
    protected $priceNet;

    /** @var float $vatRate */
    protected $vatRate;

    /** @var float $quantity */
    protected $quantity;

    /** @var string $description */
    protected $description;

    /** @var string $thumbnail */
    protected $thumbnail;

    /** @var string $sku */
    protected $sku;

    /** @var string $identifier */
    protected $identifier;

    /** @var CartItemExtraDataEntity $extraData */
    protected $extraData;

    /**
     * @param CartItemExtraDataEntity|string $extraData
     *
     * @return $this
     */
    public function setExtraData($extraData)
    {
        if (!$extraData) {
            return $this;
        }

        if (is_string($extraData)) {
            $extraData = json_decode($extraData);
        }

        if (!is_array($extraData) && !is_object($extraData)) {
            return $this;
        }

        $this->extraData = new CartItemExtraDataEntity($extraData);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray($object = null)
    {
        return $object ? get_object_vars($object) : get_object_vars($this);
    }
}
