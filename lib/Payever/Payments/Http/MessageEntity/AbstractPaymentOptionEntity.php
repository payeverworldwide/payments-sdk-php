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

namespace Payever\Sdk\Payments\Http\MessageEntity;

use Payever\Sdk\Core\Http\MessageEntity\ResultEntity;
use Payever\Sdk\Payments\Enum\BusinessType;

/**
 * This class represents List Payment Options Result Entity
 *
 * @method string                           getId()
 * @method string                           getName()
 * @method bool                             getStatus()
 * @method float                            getVariableFee()
 * @method float                            getFixedFee()
 * @method string                           getDescriptionOffer()
 * @method string                           getDescriptionFee()
 * @method float                            getMin()
 * @method float                            getMax()
 * @method string                           getPaymentMethod()
 * @method string                           getPaymentIssuer()
 * @method string                           getType()
 * @method string                           getSlug()
 * @method string                           getThumbnail1()
 * @method string                           getThumbnail2()
 * @method string                           getThumbnail3()
 * @method PaymentOptionOptionsEntity       getOptions()
 * @method PaymentOptionTranslationEntity[] getTranslations()
 * @method bool                             getIsSubmitMethod()
 * @method string                           getBusinessType()
 * @method self                             setId(string $id)
 * @method self                             setName(string $name)
 * @method self                             setVariableFee(float $variableFee)
 * @method self                             setIsRedirectMethod(bool $isRedirectMethod)
 * @method self                             setFixedFee(float $fixedFee)
 * @method self                             setDescriptionOffer(string $descriptionOffer)
 * @method self                             setDescriptionFee(string $descriptionFee)
 * @method self                             setMin(float $min)
 * @method self                             setMax(float $max)
 * @method self                             setPaymentMethod(string $paymentMethod)
 * @method self                             setPaymentIssuer(string $paymentIssuer)
 * @method self                             setType(string $type)
 * @method self                             setSlug(string $slug)
 * @method self                             setThumbnail1(string $thumbnail1)
 * @method self                             setThumbnail2(string $thumbnail2)
 * @method self                             setThumbnail3(string $thumbnail3)
 * @method self                             setIsSubmitMethod(bool $value)
 * @method self                             setIsB2bMethod(bool $value)
 * @method self                             setBusinessType(string $businessType)
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
abstract class AbstractPaymentOptionEntity extends ResultEntity
{
    /** @var string $id */
    protected $id;

    /** @var string $name */
    protected $name;

    /** @var bool $status */
    protected $status;

    /** @var bool $isRedirectMethod */
    protected $isRedirectMethod;

    /** @var float $variableFee */
    protected $variableFee;

    /** @var float $fixedFee */
    protected $fixedFee;

    /** @var string $descriptionOffer */
    protected $descriptionOffer;

    /** @var string $descriptionFee */
    protected $descriptionFee;

    /** @var float $min */
    protected $min;

    /** @var float $max */
    protected $max;

    /** @var string $paymentMethod */
    protected $paymentMethod;

    /** @var string $paymentIssuer */
    protected $paymentIssuer;

    /** @var string $type */
    protected $type;

    /** @var string $slug */
    protected $slug;

    /** @var string $thumbnail1 */
    protected $thumbnail1;

    /** @var string $thumbnail2 */
    protected $thumbnail2;

    /** @var string $thumbnail3 */
    protected $thumbnail3;

    /** @var PaymentOptionOptionsEntity $options */
    protected $options;

    /** @var PaymentOptionTranslationEntity[] $translations */
    protected $translations;

    /** @var bool $isSubmitMethod */
    protected $isSubmitMethod;

    /** @var bool $isB2bMethod */
    protected $isB2bMethod;

    /** @var string $businessType */
    protected $businessType;

    /** @var array $variants */
    protected $variants;

    /**
     * Is redirect method
     *
     * @return bool
     */
    public function isRedirectMethod()
    {
        return (bool) $this->isRedirectMethod;
    }

    /**
     * Sets Status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status == 'active';

        return $this;
    }

    /**
     * Sets Options
     *
     * @param array $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = new PaymentOptionOptionsEntity($options);

        return $this;
    }

    /**
     * Sets Translations
     *
     * @param array $translations
     * @return $this
     */
    public function setTranslations($translations)
    {
        $this->translations = [];

        foreach ($translations as $item) {
            $this->translations[] = new PaymentOptionTranslationEntity($item);
        }

        return $this;
    }

    /**
     * Is submit method
     *
     * @return bool
     */
    public function isSubmitMethod()
    {
        return (bool) $this->isSubmitMethod;
    }

    /**
     * Is B2B method
     *
     * @return bool
     */
    public function isB2BMethod()
    {
        return (bool) $this->isB2bMethod;
    }

    /**
     * Is mixed business type
     *
     * @return bool
     */
    public function isMixedBusinessType()
    {
        return (bool) ($this->getBusinessType() === BusinessType::MIXED);
    }

    /**
     * Is B2B business type
     *
     * @return bool
     */
    public function isB2BBusinessType()
    {
        return (bool) ($this->getBusinessType() === BusinessType::B2B);
    }

    /**
     * Is B2C business type
     *
     * @return bool
     */
    public function isB2CBusinessType()
    {
        return (bool) ($this->getBusinessType() === BusinessType::B2C);
    }
}
