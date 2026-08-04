<?php

namespace Payever\Sdk\Payments\Http\MessageEntity\Settlement\Filter;

use Payever\Sdk\Core\Base\MessageEntity;

/**
 * @method string getName()
 * @method self   setName(string $name)
 */
class PaymentMethod extends MessageEntity
{
    /**
     * @var string
     */
    protected $name;
}
