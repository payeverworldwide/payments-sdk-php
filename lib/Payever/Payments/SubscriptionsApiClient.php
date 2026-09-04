<?php

/**
 * PHP version 5.4 and 8
 *
 * @category  Payments
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2023 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/shopsystems/api/getting-started
 */

namespace Payever\Sdk\Payments;

use Payever\Sdk\Core\Authorization\OauthToken;
use Payever\Sdk\Core\CommonApiClient;
use Payever\Sdk\Core\Http\RequestBuilder;
use Payever\Sdk\Payments\Http\ResponseEntity\SubscriptionResponse;

/**
 * Class represents payever Subscriptions API Connector
 */
class SubscriptionsApiClient extends CommonApiClient
{
    const SUB_URL_LIST_PAYMENT_SUBSCRIPTION = 'api/v3/payment-subscription/list';
    const SUB_URL_RETRIEVE_PAYMENT_SUBSCRIPTION = 'api/v3/payment-subscription/%s';
    const SUB_URL_UPDATE_PAYMENT_SUBSCRIPTION = 'api/v3/payment-subscription/%s';
    const SUB_URL_CANCEL_PAYMENT_SUBSCRIPTION = 'api/v3/payment-subscription/%s/cancel';
    const SUB_URL_REACTIVATE_PAYMENT_SUBSCRIPTION = 'api/v3/payment-subscription/%s/reactivate';
    const SUB_URL_HISTORY_PAYMENT_SUBSCRIPTION = 'api/v3/payment-subscription/%s/history';

    /**
     * Sends a request to retrieve subscriptions list
     *
     * @throws \Exception
     */
    public function listSubscriptionsRequest()
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::get($this->getListSubscriptionsURL())
            ->addRawHeader(
                $this->getToken(OauthToken::SCOPE_CREATE_PAYMENT)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setResponseEntity(new SubscriptionResponse())
            ->build();

        return $this->executeRequest($request, OauthToken::SCOPE_CREATE_PAYMENT);
    }

    /**
     * Sends a request to retrieve subscription
     *
     * @param string $subscriptionId
     *
     * @throws \Exception
     */
    public function retrieveSubscriptionRequest($subscriptionId)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::get($this->getRetrieveSubscriptionURL($subscriptionId))
            ->addRawHeader(
                $this->getToken(OauthToken::SCOPE_CREATE_PAYMENT)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setResponseEntity(new SubscriptionResponse())
            ->build();

        return $this->executeRequest($request, OauthToken::SCOPE_CREATE_PAYMENT);
    }

    /**
     * Sends a request to update subscription
     *
     * @param string $subscriptionId
     *
     * @throws \Exception
     */
    public function updateSubscriptionRequest($subscriptionId)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getUpdateSubscriptionURL($subscriptionId))
            ->addRawHeader(
                $this->getToken(OauthToken::SCOPE_CREATE_PAYMENT)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setResponseEntity(new SubscriptionResponse())
            ->build();

        return $this->executeRequest($request, OauthToken::SCOPE_CREATE_PAYMENT);
    }

    /**
     * Sends a request to cancel subscription
     *
     * @param string $subscriptionId
     *
     * @throws \Exception
     */
    public function cancelSubscriptionRequest($subscriptionId)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getCancelSubscriptionURL($subscriptionId))
            ->addRawHeader(
                $this->getToken(OauthToken::SCOPE_CREATE_PAYMENT)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setResponseEntity(new SubscriptionResponse())
            ->build();

        return $this->executeRequest($request, OauthToken::SCOPE_CREATE_PAYMENT);
    }

    /**
     * Sends a request to reactivate subscription
     *
     * @param string $subscriptionId
     *
     * @throws \Exception
     */
    public function reactivateSubscriptionRequest($subscriptionId)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getReactivateSubscriptionURL($subscriptionId))
            ->addRawHeader(
                $this->getToken(OauthToken::SCOPE_CREATE_PAYMENT)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setResponseEntity(new SubscriptionResponse())
            ->build();

        return $this->executeRequest($request, OauthToken::SCOPE_CREATE_PAYMENT);
    }

    /**
     * Sends a request to retrieve subscription history
     *
     * @param string $subscriptionId
     *
     * @throws \Exception
     */
    public function historySubscriptionRequest($subscriptionId)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::get($this->getHistorySubscriptionURL($subscriptionId))
            ->addRawHeader(
                $this->getToken(OauthToken::SCOPE_CREATE_PAYMENT)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setResponseEntity(new SubscriptionResponse())
            ->build();

        return $this->executeRequest($request, OauthToken::SCOPE_CREATE_PAYMENT);
    }

    /**
     * Returns list subscriptions payment path
     *
     * @return string
     */
    protected function getListSubscriptionsURL()
    {
        return $this->getBaseUrl() . self::SUB_URL_LIST_PAYMENT_SUBSCRIPTION;
    }

    /**
     * Returns retrieve subscription payment path
     *
     * @param string $subscriptionId
     *
     * @return string
     */
    protected function getRetrieveSubscriptionURL($subscriptionId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_RETRIEVE_PAYMENT_SUBSCRIPTION, $subscriptionId);
    }

    /**
     * Returns update subscription payment path
     *
     * @param string $subscriptionId
     *
     * @return string
     */
    protected function getUpdateSubscriptionURL($subscriptionId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_UPDATE_PAYMENT_SUBSCRIPTION, $subscriptionId);
    }

    /**
     * Returns cancel subscription payment path
     *
     * @param string $subscriptionId
     *
     * @return string
     */
    protected function getCancelSubscriptionURL($subscriptionId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_CANCEL_PAYMENT_SUBSCRIPTION, $subscriptionId);
    }

    /**
     * Returns reactivate subscription payment path
     *
     * @param string $subscriptionId
     *
     * @return string
     */
    protected function getReactivateSubscriptionURL($subscriptionId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_REACTIVATE_PAYMENT_SUBSCRIPTION, $subscriptionId);
    }

    /**
     * Returns history subscription payment path
     *
     * @param string $subscriptionId
     *
     * @return string
     */
    protected function getHistorySubscriptionURL($subscriptionId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_HISTORY_PAYMENT_SUBSCRIPTION, $subscriptionId);
    }

    /**
     * Returns Base URL to payever Payments API
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->getBaseEntrypoint();
    }
}
