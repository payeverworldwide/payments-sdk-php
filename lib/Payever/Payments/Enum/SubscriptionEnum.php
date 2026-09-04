<?php

/**
 * PHP version 5.4 and 8
 *
 * @category  Enum
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2023 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/shopsystems/api/getting-started
 */

namespace Payever\Sdk\Payments\Enum;

use Payever\Sdk\Core\Base\EnumerableConstants;

/**
 * This class represents Subscription Enum
 */
class SubscriptionEnum extends EnumerableConstants
{
    const INTERVAL_UNIT_DAY = 'day';
    const INTERVAL_UNIT_WEEK = 'week';
    const INTERVAL_UNIT_MONTH = 'month';
    const INTERVAL_UNIT_YEAR = 'year';

    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELED = 'canceled';

    const MODE_RECURRING = 'recurring';

    CONST COLLECTION_MANUAL = 'manual';
    CONST COLLECTION_AUTOMATIC = 'automatic';
}
