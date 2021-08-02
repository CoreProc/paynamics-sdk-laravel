<?php

namespace Coreproc\PaynamicsSdk\Responses;

use Coreproc\PaynamicsSdk\Responses\Traits\GatewayResponse;
use Coreproc\PaynamicsSdk\Responses\Traits\Interpreter;

class NotificationResponse
{
    use Interpreter, GatewayResponse;

    public string $response;

    /**
     * Create new instance of notification response
     *
     * @return NotificationResponse
     */
    public static function make(): NotificationResponse
    {
        return new self();
    }

    /**
     * Get payment channel
     *
     * @return mixed
     */
    public function pType()
    {
        return $this->toArray()['ptype'];
    }

    /**
     * Get rebill id
     *
     * @return mixed
     */
    public function rebillId()
    {
        return $this->toArray()['rebill_id'];
    }

    /**
     * Get token id
     *
     * @return mixed
     */
    public function tokenId()
    {
        return $this->toArray()['token_id'];
    }

    /**
     * Get Token information
     *
     * @return mixed
     */
    public function tokenInfo()
    {
        return $this->toArray()['token_info'];
    }

    /**
     * Get settlement info details
     *
     * @return mixed
     */
    public function settlementInfoDetails()
    {
        return $this->toArray()['settlement_info_details'];
    }
}
