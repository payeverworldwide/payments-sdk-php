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
 * This class represents Subscription entity
 *
 * @method string getMode()
 * @method string getCollection()
 * @method string getMandateId()
 * @method string getStatus()
 * @method SubscriptionRecurringEntity getRecurring()
 * @method self setMode(string $value)
 * @method self setCollection(string $value)
 * @method self setMandateId(string $value)
 * @method self setStatus(string $value)
 */
class SubscriptionEntity extends MessageEntity
{
    /**
     * @var string
     */
    protected $mode;

    /**
     * @var string
     */
    protected $collection;

    /**
     * @var string
     */
    protected $mandateId;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var SubscriptionRecurringEntity
     */
    protected $recurring;

    /**
     * Sets Recurring
     *
     * @param SubscriptionRecurringEntity|array $recurring
     *
     * @return self
     */
    public function setRecurring($recurring)
    {
        if (!$recurring) {
            return $this;
        }

        if (is_string($recurring)) {
            $recurring = json_decode($recurring);
        }

        if (!is_array($recurring) && !is_object($recurring)) {
            return $this;
        }

        $this->recurring = new SubscriptionRecurringEntity($recurring);

        return $this;
    }
}
