<?php

/**
 * PHP version 5.4 and 8
 *
 * @category  ResponseEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2023 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/shopsystems/api/getting-started
 */

namespace Payever\Sdk\Payments\Http\ResponseEntity;

use Payever\Sdk\Core\Http\ResponseEntity;

/**
 * @method string getId()
 * @method self   setId(string $id)
 * @method string getStatus()
 * @method self   setStatus(string $status)
 */
class CreateSettlementReportResponse extends ResponseEntity
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $status;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'id',
            'status',
        ];
    }
}
