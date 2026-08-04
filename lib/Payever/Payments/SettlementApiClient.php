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

use Payever\Sdk\Payments\Http\MessageEntity\Settlement\FieldEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Settlement\FilterEntity;
use Payever\Sdk\Payments\Http\RequestEntity\CreateReportRequest;
use Payever\Sdk\Payments\Http\RequestEntity\GetReportRequest;
use Payever\Sdk\Payments\Http\RequestEntity\RetrieveSettlementReportRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\CreateReportResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\GetReportResponse;
use Payever\Sdk\Core\Authorization\OauthToken;
use Payever\Sdk\Core\Http\RequestBuilder;

class SettlementApiClient extends PaymentsApiClient
{
    const URL_SANDBOX = 'https://web-widgets-backend.staging.devpayever.com/';
    const URL_LIVE    = 'https://web-widgets-backend.payever.org/';

    const SUB_URL_CREATE_SETTLEMENT_REPORT = 'api/v2/settlement/report';
    const SUB_URL_GET_SETTLEMENT_REPORT = 'api/v2/settlement/report/%s';
    const SUB_URL_RETRIEVE_SETTLEMENT_REPORT = 'api/settlement/report/%s';

    /**
     * Create Settlement Report
     * @see https://docs.payever.org/api/payments/v3/settlement-files/create-settlement-report
     *
     * @param FilterEntity $filter
     * @param FieldEntity[] $fields
     * @param string $format
     * @param string|null $uniqueIdentifier
     *
     * @return \Payever\Sdk\Core\Http\Response
     * @throws \Exception
     */
    public function createReport($filter, $fields, $format = 'json', $uniqueIdentifier = null)
    {
        $this->configuration->assertLoaded();

        $requestEntity = new CreateReportRequest();
        $requestEntity
            ->setFilter($filter)
            ->setFields($fields)
            ->setFormat($format);

        $request = RequestBuilder::post($this->getCreateSettlementReportUrl())
            ->addRawHeader(
                $this->getToken(OauthToken::SCOPE_PAYMENT_INFO)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($requestEntity)
            ->setResponseEntity(new CreateReportResponse())
            ->addIdempotencyHeader($uniqueIdentifier)
            ->build();

        return $this->executeRequest($request, OauthToken::SCOPE_PAYMENT_INFO);
    }

    /**
     * Generate a settlement report for a specific payment reference.
     * @see https://docs.payever.org/api/payments/v3/settlement-files/payment-reference-settlement
     *
     * @param string $reference
     * @param FilterEntity $filter
     * @param FieldEntity[] $fields
     * @param string $format
     * @param string|null $uniqueIdentifier
     *
     * @return \Payever\Sdk\Core\Http\Response
     * @throws \Exception
     */
    public function createSettlementReport($reference, $filter, $fields, $format = 'json', $uniqueIdentifier = null)
    {
        $this->configuration->assertLoaded();

        $requestEntity = new GetReportRequest();
        $requestEntity
            ->setReference($reference)
            ->setFilter($filter)
            ->setFields($fields)
            ->setFormat($format);

        $request = RequestBuilder::post($this->getGetSettlementReportUrl($reference))
            ->addRawHeader(
                $this->getToken(OauthToken::SCOPE_PAYMENT_INFO)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($requestEntity)
            ->setResponseEntity(new GetReportResponse())
            ->addIdempotencyHeader($uniqueIdentifier)
            ->build();

        return $this->executeRequest($request, OauthToken::SCOPE_PAYMENT_INFO);
    }

    /**
     * @see https://docs.payever.org/api/payments/v3/settlement-files/retrieve-settlement-report
     * @param $reportId
     * @param $uniqueIdentifier
     *
     * @return \Payever\Sdk\Core\Http\Response
     * @throws \Exception
     */
    public function retrieveSettlementReport($reportId, $uniqueIdentifier = null)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::get($this->getRetrieveSettlementReportUrl($reportId))
            ->addRawHeader(
                $this->getToken(OauthToken::SCOPE_PAYMENT_INFO)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity(new RetrieveSettlementReportRequest())
            ->setResponseEntity(new RetrieveSettlementReportResponse())
            ->addIdempotencyHeader($uniqueIdentifier)
            ->build();

        return $this->executeRequest($request, OauthToken::SCOPE_PAYMENT_INFO);

    }

    /**
     * @return string
     */
    protected function getCreateSettlementReportUrl()
    {
        return $this->getBaseUrl() . self::SUB_URL_CREATE_SETTLEMENT_REPORT;
    }

    /**
     * @param string $reference
     * @return string
     */
    protected function getGetSettlementReportUrl($reference)
    {
        return $this->getBaseUrl() .
               sprintf(self::SUB_URL_GET_SETTLEMENT_REPORT, $reference);
    }

    /**
     * @param string $reportId
     * @return string
     */
    protected function getRetrieveSettlementReportUrl($reportId)
    {
        return $this->getBaseUrl() .
               sprintf(self::SUB_URL_RETRIEVE_SETTLEMENT_REPORT, $reportId);
    }
}
