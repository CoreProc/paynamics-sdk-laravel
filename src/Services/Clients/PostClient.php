<?php

namespace Coreproc\PaynamicsSdk\Services\Clients;

use Coreproc\PaynamicsSdk\Services\PaymentService;
use GuzzleHttp\Client;

class PostClient
{
    /**
     * PostClient constructor.
     */
    public function __construct()
    {

    }

    /**
     * Create new instance of post client
     *
     * @return PostClient
     */
    public static function make(): PostClient
    {
        return new self();
    }
}