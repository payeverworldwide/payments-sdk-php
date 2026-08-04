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
use Payever\Sdk\Payments\Http\MessageEntity\GetReportResultEntity;

/**
 * @method string getLimit()
 * @method self   setLimit(string $limit)
 * @method string getPage()
 * @method self   setPage(string $page)
 * @method string getTotal()
 * @method self   setTotal(string $total)
 * @method string getTotalPages()
 * @method self   setTotalPages(string $totalPages)
 * @method GetReportResultEntity getResult()
 */
class GetReportResponse extends ResponseEntity
{
    /**
     * @var int
     */
    protected $limit;

    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $total;

    /**
     * @var int
     */
    protected $totalPages;

    /**
     * @var array
     */
    protected $result;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'result',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function setResult($result)
    {
        $this->result = new GetReportResultEntity($result);
    }
}
