<?php

namespace Coreproc\PaynamicsSdk\Services;

use Coreproc\PaynamicsSdk\PaynamicsClient;
use Coreproc\PaynamicsSdk\Requests\QueryRequest;
use Coreproc\PaynamicsSdk\Services\Interfaces\RequestInterface;
use Coreproc\PaynamicsSdk\Services\Traits\GenerateForm;
use SimpleXMLElement;
use Exception;

class QueryService implements RequestInterface
{
    use GenerateForm;

    /**
     * @var SimpleXMLElement
     */
    public SimpleXMLElement $xml;

    /**
     * @var QueryRequest
     */
    public QueryRequest $query;

    /**
     * @var PaynamicsClient
     */
    public PaynamicsClient $paynamicsClient;

    /**
     * @var string
     */
    public string $requestId;

    /**
     * PaymentRequest constructor.
     */
    public function __construct()
    {
        $this->paynamicsClient = app(PaynamicsClient::class);
        $this->requestId = substr(uniqid(), 0, 13);
        $this->xml = (new SimpleXMLElement('<Request/>'));
    }

    /**
     * Create new instance of query service
     *
     * @return QueryService
     */
    public static function make(): QueryService
    {
        return new self();
    }

    /**
     * Set request data for query service
     *
     * @param QueryRequest $query
     * @return QueryService
     */
    public function setRequest(QueryRequest $query): QueryService
    {
        $this->query = $query;
        return $this;
    }

    /**
     * Generate XML data for query request
     *
     * @return string
     * @throws Exception
     */
    public function toXml(): string
    {
        if (empty($this->query)) {
            throw new Exception('No request found. Please set the request body.');
        }

        $this->xml->addChild('merchantid', $this->paynamicsClient->getMerchantId());
        $this->xml->addChild('request_id', $this->requestId);
        $this->xml->addChild('org_trxid', $this->query->getOrgTrxId());
        $this->xml->addChild('org_trxid2', $this->query->getOrgTrxId2());
        $this->xml->addChild('signature', $this->signature());
        return $this->xml->asXML();
    }

    /**
     * Generate signature for query request
     *
     * @return string
     * @throws Exception
     */
    public function signature(): string
    {
        if (empty($this->query)) {
            throw new Exception('No request found. Please set the request body.');
        }

        $toSign = $this->paynamicsClient->getMerchantId()
            . $this->requestId
            . $this->query->getOrgTrxId()
            . $this->query->getOrgTrxId2()
            . $this->paynamicsClient->getMerchantKey();

        return hash('sha512', $toSign);
    }
}
