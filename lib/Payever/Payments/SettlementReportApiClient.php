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
use Payever\Sdk\Payments\Http\RequestEntity\CreateSettlementReportRequest;
use Payever\Sdk\Payments\Http\RequestEntity\RetrieveSettlementReportRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\RetrieveSettlementReportResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\CreateSettlementReportResponse;
use Payever\Sdk\Payments\Enum\Settlement\Format;
use Payever\Sdk\Core\Authorization\OauthToken;
use Payever\Sdk\Core\Http\RequestBuilder;

class SettlementReportApiClient extends PaymentsApiClient
{
    const SUB_URL_CREATE_SETTLEMENT_REPORT = 'api/v2/settlement/report';
    const SUB_URL_CREATE_SETTLEMENT_REPORT_BY_REFERENCE = 'api/v2/settlement/report/%s';
    const SUB_URL_RETRIEVE_SETTLEMENT_REPORT = 'api/settlement/report/%s';

    /**
     * Generate a settlement report for all payments.
     * @see https://docs.payever.org/api/payments/v3/settlement-files/create-settlement-report
     *
     * @param FilterEntity $filter
     * @param FieldEntity[] $fields
     * @param string $format
     * @param int $page Pagination. For JSON format only
     * @param int $limit Pagination. For JSON format only
     * @return \Payever\Sdk\Core\Http\Response
     * @throws \Exception
     */
    public function createSettlementReport(
        $filter,
        $fields,
        $format = Format::JSON,
        $page = 0,
        $limit = 20
    ) {
        if ($format !== Format::JSON && $page) {
            throw new \InvalidArgumentException('Query Parameters are applicable for JSON format only');
        }

        $this->configuration->assertLoaded();

        $requestEntity = new CreateSettlementReportRequest();
        $requestEntity
            ->setFilter($filter)
            ->setFields($fields)
            ->setFormat($format);

        $url = $this->getCreateSettlementReportUrl();
        if ($page) {
            $url .= sprintf('?page=%d&limit=%d', $page, $limit);
        }

        $request = RequestBuilder::post($url)
            ->addRawHeader(
                $this->getToken(OauthToken::SCOPE_PAYMENT_INFO)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($requestEntity)
            ->setResponseEntity(new CreateSettlementReportResponse())
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
     * @param int $page Pagination. For JSON format only
     * @param int $limit Pagination. For JSON format only
     * @return \Payever\Sdk\Core\Http\Response
     * @throws \Exception
     */
    public function retrieveSettlementReportByReference(
        $reference,
        $filter,
        $fields,
        $format = Format::JSON,
        $page = 0,
        $limit = 20
    ) {
        if ($format !== Format::JSON && $page) {
            throw new \InvalidArgumentException('Query Parameters are applicable for JSON format only');
        }

        $this->configuration->assertLoaded();

        $requestEntity = new CreateSettlementReportRequest();
        $requestEntity
            ->setReference($reference)
            ->setFilter($filter)
            ->setFields($fields)
            ->setFormat($format);

        $url = $this->getCreateSettlementReportByReferenceUrl($reference);
        if ($page) {
            $url .= sprintf('?page=%d&limit=%d', $page, $limit);
        }

        $request = RequestBuilder::post($url)
            ->addRawHeader(
                $this->getToken(OauthToken::SCOPE_PAYMENT_INFO)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($requestEntity)
            ->setResponseEntity(new CreateSettlementReportResponse())
            ->build();

        return $this->executeRequest($request, OauthToken::SCOPE_PAYMENT_INFO);
    }

    /**
     * Retrieve a settlement report for a specific report ID.
     * @see https://docs.payever.org/api/payments/v3/settlement-files/retrieve-settlement-report
     *
     * @param string $reportId The unique identifier for the settlement report.
     *
     * @return \Payever\Sdk\Core\Http\Response
     * @throws \Exception
     */
    public function retrieveSettlementReport($reportId)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::get($this->getRetrieveSettlementReportUrl($reportId))
            ->addRawHeader(
                $this->getToken(OauthToken::SCOPE_PAYMENT_INFO)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity(new RetrieveSettlementReportRequest())
            ->setResponseEntity(new RetrieveSettlementReportResponse())
            ->build();

        return $this->executeRequest($request, OauthToken::SCOPE_PAYMENT_INFO);
    }

    /**
     * Retrieve the contents of a settlement report based on the given report ID.
     * @see https://docs.payever.org/api/payments/v3/settlement-files/retrieve-settlement-report
     *
     * @param string $reportId Identifier of the settlement report to retrieve.
     *
     * @return \Payever\Sdk\Core\Http\Response
     * @throws \Exception
     */
    public function retrieveSettlementReportContents($reportId)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::get($this->getRetrieveSettlementReportUrl($reportId))
            ->addRawHeader(
                $this->getToken(OauthToken::SCOPE_PAYMENT_INFO)->getAuthorizationString()
            );

        return $this->fetchRequest(
            $request->build(),
            OauthToken::SCOPE_PAYMENT_INFO
        );
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
     *
     * @return string
     */
    protected function getCreateSettlementReportByReferenceUrl($reference)
    {
        return $this->getBaseUrl() .
               sprintf(self::SUB_URL_CREATE_SETTLEMENT_REPORT_BY_REFERENCE, $reference);
    }

    /**
     * @param string $reportId
     *
     * @return string
     */
    protected function getRetrieveSettlementReportUrl($reportId)
    {
        return sprintf(
            $this->getBaseUrl() . self::SUB_URL_RETRIEVE_SETTLEMENT_REPORT,
            $reportId
        );
    }
}
