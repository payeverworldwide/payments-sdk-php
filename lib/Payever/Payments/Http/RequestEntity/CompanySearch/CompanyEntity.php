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
 * This class represents Company Entity
 *
 * @method string getName()
 * @method self   setName(string $name)
 */
class CompanyEntity extends RequestEntity
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var CompanyCustomEntity
     */
    protected $custom;

    /**
     * Set Custom.
     *
     * @param CompanyCustomEntity|array|string $custom
     *
     * @return $this
     */
    public function setCustom($custom)
    {
        if (!$custom) {
            return $this;
        }

        if (is_string($custom)) {
            $custom = json_decode($custom);
        }

        if (!is_array($custom) && !is_object($custom)) {
            return $this;
        }

        $this->custom = new CompanyCustomEntity($custom);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'name'
        ];
    }
}
