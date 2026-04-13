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
 * @method string getMin()
 * @method string getMax()
 */
class PaymentOptionAmountLimitsEntity extends MessageEntity
{
    const UNDERSCORE_ON_SERIALIZATION = false;

    /** @var array $min */
    protected $min;

    /** @var array $max */
    protected $max;

    /**
     * Sets Min
     *
     * @param array $min
     *
     * @return $this
     */
    public function setMin($min)
    {
        $this->min = (array)$min;

        return $this;
    }

    /**
     * Sets Min
     *
     * @param array $max
     *
     * @return $this
     */
    public function setMax($max)
    {
        $this->max = (array)$max;

        return $this;
    }
}
