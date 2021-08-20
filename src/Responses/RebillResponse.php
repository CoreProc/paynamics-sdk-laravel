<?php

namespace Coreproc\PaynamicsSdk\Responses;

use Coreproc\PaynamicsSdk\Responses\Traits\GatewayResponse;
use Coreproc\PaynamicsSdk\Responses\Traits\Interpreter;

class RebillResponse
{
    use Interpreter, GatewayResponse;

    /**
     * @var string
     */
    public string $response;

    /**
     * Create new instance of rebill response
     *
     * @return RebillResponse
     */
    public static function make(): RebillResponse
    {
        return new self();
    }
}
