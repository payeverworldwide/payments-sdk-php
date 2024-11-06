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

namespace Payever\Sdk\Payments\Http\RequestEntity\CompanySearch;

use Payever\Sdk\Core\Http\RequestEntity;

/**
 * This class represents Company Custom Entity
 *
 * @method string getType()
 * @method self   setType(string $type)
 * @method string getValue()
 * @method self   setValue(string $value)
 */
class CompanyCustomEntity extends RequestEntity
{
    /**
     * @var string
     */
    protected $type = 'CREF';

    /**
     * @var string
     */
    protected $value;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'type',
            'value'
        ];
    }
}
