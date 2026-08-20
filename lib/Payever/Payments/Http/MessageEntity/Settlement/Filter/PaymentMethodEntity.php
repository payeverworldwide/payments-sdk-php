<?php

namespace Payever\Sdk\Payments\Http\MessageEntity\Settlement\Filter;

use Payever\Sdk\Core\Base\MessageEntity;

/**
 * @method string getName()
 * @method self   setName(string $name)
 */
class PaymentMethodEntity extends MessageEntity
{
    /**
     * @var string
     */
    protected $name;

    public function toArray($object = null)
    {
        return $object ? get_object_vars($object) : get_object_vars($this);
    }
}
