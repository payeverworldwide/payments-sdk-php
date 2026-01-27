<?php

/**
 * PHP version 5.4 and 8
 *
 * @category  RequestEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2023 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/shopsystems/api/getting-started
 */

namespace Payever\Sdk\Payments\Http\RequestEntity;

use Payever\Sdk\Core\Http\RequestEntity;

/**
 * This class represents Edit Payment RequestInterface Entity
 *
 * @method string getReferenceExtra()
 * @method string getReferenceCustomer()
 * @method self   setReferenceExtra(string $referenceExtra)
 * @method self   setReferenceCustomer(string $referenceCustomer)
 */
class EditPaymentRequest extends RequestEntity
{
    /** @var string $referenceExtra */
    protected $referenceExtra;

    /** @var string $referenceCustomer */
    protected $referenceCustomer;
}
