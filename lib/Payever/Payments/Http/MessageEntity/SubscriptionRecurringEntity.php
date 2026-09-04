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
 * This class represents Subscription Recurring entity
 *
 * @method string getIntervalUnit()
 * @method string getIntervalCount()
 * @method string getStartDate()
 * @method self setIntervalUnit(string $intervalUnit)
 * @method self setIntervalCount(int $intervalCount)
 * @method self setStartDate(string $startDate)
 */
class SubscriptionRecurringEntity extends MessageEntity
{
    /**
     * @var string
     */
    protected $intervalUnit;

    /**
     * @var int
     */
    protected $intervalCount;

    /**
     * @var string
     */
    protected $startDate;
}
