<?php

namespace Coreproc\PaynamicsSdk\Services\Clients;

use Coreproc\PaynamicsSdk\PaynamicsClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PostClient
{
    /**
     * PostClient constructor.
     * @throws GuzzleException
     */
    public function __construct(array $request)
    {
        $paynamicsClient = app(PaynamicsClient::class);
        $client = new Client();

        $client->request('POST', $paynamicsClient->getEndpoint(), ['form_params' => $request]);
    }

    /**
     * Create new instance of post client
     *
     * @param array $request
     * @return PostClient
     * @throws GuzzleException
     */
    public static function make(array $request): PostClient
    {
        return new self($request);
    }
}
