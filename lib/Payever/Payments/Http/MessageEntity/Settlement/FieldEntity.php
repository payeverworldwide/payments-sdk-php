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

namespace Payever\Sdk\Payments\Http\MessageEntity\Settlement;

use Payever\Sdk\Core\Base\MessageEntity;

/**
 * @method string getField()
 * @method string getAlias()
 * @method self   setField(string $field)
 * @method self   setAlias(string $alias)
 */
class FieldEntity extends MessageEntity
{
    /**
     * @var string
     */
    protected $field;

    /**
     * @var string
     */
    protected $alias;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'field',
        ];
    }
}
