<?php

namespace Coreproc\PaynamicsSdk\Requests;

class QueryRequest
{
    /**
     * @var string
     */
    protected string $orgTrxId;

    /**
     * @var string
     */
    protected string $orgTrxId2;

    /**
     * @return string
     */
    public function getOrgTrxId(): string
    {
        return $this->orgTrxId ?? '';
    }

    /**
     * @param string $orgTrxId
     * @return QueryRequest
     */
    public function setOrgTrxId(string $orgTrxId): QueryRequest
    {
        $this->orgTrxId = $orgTrxId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrgTrxId2(): string
    {
        return $this->orgTrxId2 ?? '';
    }

    /**
     * @param string $orgTrxId2
     * @return QueryRequest
     */
    public function setOrgTrxId2(string $orgTrxId2): QueryRequest
    {
        $this->orgTrxId2 = $orgTrxId2;
        return $this;
    }

    /**
     * Create new instance of query request
     *
     * @return QueryRequest
     */
    public static function make(): QueryRequest
    {
        return new self();
    }
}
