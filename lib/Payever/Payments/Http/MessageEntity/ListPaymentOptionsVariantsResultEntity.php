<?php

/**
 * PHP version 5.4 and 8
 *
 * @category  MessageEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @author    Hennadii.Shymanskyi <gendosua@gmail.com>
 * @copyright 2017-2023 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/shopsystems/api/getting-started
 */

namespace Payever\Sdk\Payments\Http\MessageEntity;

/**
 * @method PaymentOptionVariantEntity[] getVariants()
 */
class ListPaymentOptionsVariantsResultEntity extends AbstractPaymentOptionEntity
{
    /** @var array|PaymentOptionVariantEntity[] */
    protected $variants = [];

    /**
     * @param array $rawVariants
     *
     * @return $this
     */
    public function setVariants(array $rawVariants)
    {
        foreach ($rawVariants as $rawVariant) {
            $this->variants[] = new PaymentOptionVariantEntity($rawVariant);
        }

        return $this;
    }

    /**
     * @return array|ConvertedPaymentOptionEntity[]
     */
    public function toConvertedPaymentOptions()
    {
        $result = [];
        $baseData = $this->toArray();

        foreach ($this->getVariants() as $variant) {
            $convertedOption = new ConvertedPaymentOptionEntity($baseData);
            $convertedOption->setVariantId($variant->getId());
            $convertedOption->setAcceptFee($variant->getAcceptFee());
            $convertedOption->setShippingAddressAllowed($variant->getShippingAddressAllowed());
            $convertedOption->setShippingAddressEquality($variant->getShippingAddressEquality());
            $convertedOption->setVariantName($variant->getName());
            $convertedOption->setVariantOptions($variant->getOptions());

            $result[$variant->getId()] = $convertedOption;
        }

        return $result;
    }
}
