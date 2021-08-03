<?php

namespace Coreproc\PaynamicsSdk\Responses;

use Coreproc\PaynamicsSdk\Responses\Traits\GatewayResponse;
use Coreproc\PaynamicsSdk\Responses\Traits\Interpreter;

class RefundResponse
{
    use Interpreter, GatewayResponse;

    /**
     * Create new instance of refund response
     *
     * @return RefundResponse
     */
    public static function make(): RefundResponse
    {
        return new self();
    }
}
