<?php

namespace Payever\Sdk\Payments\Http\ResponseEntity;

use Payever\Sdk\Core\Http\ResponseEntity;
use Payever\Sdk\Payments\Http\MessageEntity\RetrieveSettlementReportResultEntity;

/**
 * @method string getLimit()
 * @method self   setLimit(string $limit)
 * @method string getPage()
 * @method self   setPage(string $page)
 * @method string getTotal()
 * @method self   setTotal(string $total)
 * @method string getTotalPages()
 * @method self   setTotalPages(string $totalPages)
 * @method array  getResult()
 */
class RetrieveSettlementReportResponse extends ResponseEntity
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
    public function setResult($result)
    {
        $this->result = [];
        foreach ($result as $item) {
            $this->result[] = new RetrieveSettlementReportResultEntity($item);
        }
    }
}
