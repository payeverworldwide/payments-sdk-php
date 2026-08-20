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
use Payever\Sdk\Payments\Http\MessageEntity\Settlement\FieldEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Settlement\FilterEntity;

/**
 * @method FieldEntity[]          getFields()
 * @method FilterEntity           getFilter()
 * @method string                 getFormat()
 * @method self                   setFormat(string $format)
 */
class CreateSettlementReportRequest extends RequestEntity
{
    /**
     * @var array
     */
    protected $filter;

    /**
     * @var array
     */
    protected $fields;

    /**
     * @var string
     */
    protected $format;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'filter',
            'format'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        if (is_array($this->fields)) {
            foreach ($this->fields as $field) {
                if (!$field instanceof FieldEntity || !$field->isValid()) {
                    return false;
                }
            }
        }

        return parent::isValid();
    }

    /**
     * Sets Fields
     *
     * @param array|string $fields
     *
     * @return $this
     */
    public function setFields($fields)
    {
        if (!$fields) {
            return $this;
        }

        if (is_string($fields)) {
            $fields = json_decode($fields);
        }

        if (!is_array($fields)) {
            return $this;
        }

        $this->fields = [];

        foreach ($fields as $field) {
            $this->fields[] = new FieldEntity($field);
        }

        return $this;
    }

    /**
     * Sets Filter
     *
     * @param FilterEntity|string $filter
     *
     * @return $this
     */
    public function setFilter($filter)
    {
        if (!$filter) {
            return $this;
        }

        if (is_string($filter)) {
            $filter = json_decode($filter);
        }

        if (!is_array($filter) && !is_object($filter)) {
            return $this;
        }

        $this->filter = new FilterEntity($filter);

        return $this;
    }
}
