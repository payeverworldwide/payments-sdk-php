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
 * This class represents Attributes Entity of Cart Item
 *
 * @method float                  getWeight()
 * @method DimensionsEntity|array getDimensions()
 * @method string                 getGtin()
 * @method self                   setWeight(float $value)
 * @method self                   setGtin(string $gtin)
 */
class AttributesEntity extends MessageEntity
{
    /**
     * @var string
     */
    protected $weight;

    /**
     * @var DimensionsEntity
     */
    protected $dimensions;

    /**
     * @var string
     */
    protected $gtin;

    /**
     * Sets Dimensions.
     *
     * @param DimensionsEntity|array $dimensions
     * @return self
     */
    public function setDimensions($dimensions)
    {
        if (!$dimensions) {
            return $this;
        }

        if (is_string($dimensions)) {
            $dimensions = json_decode($dimensions);
        }

        if (!is_array($dimensions) && !is_object($dimensions)) {
            return $this;
        }

        $this->dimensions = new DimensionsEntity($dimensions);

        return $this;
    }
}
