<?php

namespace Coreproc\PaynamicsSdk\Responses;

use Coreproc\PaynamicsSdk\Responses\Traits\GatewayResponse;
use Coreproc\PaynamicsSdk\Responses\Traits\Interpreter;

class QueryResponse
{
    use Interpreter, GatewayResponse;

    /**
     * @var string
     */
    public string $response;

    /**
     * Create new instance of query response
     *
     * @return QueryResponse
     */
    public static function make(): QueryResponse
    {
        return new self();
    }
}
