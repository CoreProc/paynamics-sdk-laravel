<?php

namespace Coreproc\PaynamicsSdk\Services\Clients;

use Coreproc\PaynamicsSdk\PaynamicsClient;
use Coreproc\PaynamicsSdk\Responses\PaymentResponse;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PostClient
{
    /**
     * Create new instance of post client
     *
     * @param array $request
     * @return PaymentResponse
     * @throws GuzzleException
     */
    public static function payment(array $request)
    {
        $paynamicsClient = app(PaynamicsClient::class);
        $client = new Client();

        $response = $client->request('POST', $paynamicsClient->getEndpoint(), [
            'allow_redirects' => [
                'track_redirects' => true
            ],
            'form_params' => $request,
        ]);

        return PaymentResponse::make($response);
    }
}
