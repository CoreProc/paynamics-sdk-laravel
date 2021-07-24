<?php

namespace Coreproc\PaynamicsSdk\Services\Clients;

use Coreproc\PaynamicsSdk\PaynamicsClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PostClient
{
    /**
     * Create new instance of post client
     *
     * @param array $request
     * @return object
     * @throws GuzzleException
     */
    public static function payment(array $request): object
    {
        $paynamicsClient = app(PaynamicsClient::class);
        $client = new Client();

        $response = $client->request('POST', $paynamicsClient->getEndpoint(), [
            'allow_redirects' => [
                'track_redirects' => true
            ],
            'form_params' => $request,
        ]);

        return (object) [
            'data' => $response,
            'redirect' => $response->getHeaderLine('X-Guzzle-Redirect-History')
        ];
    }
}
