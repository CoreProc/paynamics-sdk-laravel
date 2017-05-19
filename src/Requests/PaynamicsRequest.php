<?php namespace Coreproc\Paynamics\Requests;

use Coreproc\Paynamics\Client\PaynamicsClientInterface;
use Coreproc\Paynamics\Exceptions\PaynamicsException;
use Coreproc\Paynamics\Responses\PaynamicsResponse;
use Coreproc\Paynamics\Responses\PaynamicsResponseInterface;

class PaynamicsRequest implements PaynamicsRequestInterface
{

    /**
     * @var PaynamicsClientInterface
     */
    private $client;

    /**
     * @var PaynamicsRequestBodyInterface
     */
    private $requestBody;

    public function __construct(PaynamicsClientInterface $client, PaynamicsRequestBodyInterface $requestBody, $options = [])
    {
        $this->setClient($client);
        $this->setRequestBody($requestBody);
    }

    /**
     * Returns the assigned Paynamics client
     *
     * @return PaynamicsClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Sets the Paynamics client
     *
     * @param PaynamicsClientInterface $client
     * @return self
     */
    public function setClient(PaynamicsClientInterface $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Returns the assigned request body
     *
     * @return PaynamicsRequestBodyInterface
     */
    public function getRequestBody()
    {
        return $this->requestBody;
    }

    /**
     * Sets the request body
     *
     * @param PaynamicsRequestBodyInterface $requestBody
     * @return self
     */
    public function setRequestBody(PaynamicsRequestBodyInterface $requestBody)
    {
        $this->requestBody = $requestBody;

        return $this;
    }

    /**
     * Executes the request and returns corresponding response
     *      or throws an error
     *
     * @param array $options
     * @return PaynamicsResponseInterface|bool
     * @throws PaynamicsException
     */
    public function execute(array $options = [])
    {
        $httpClient = $this->client->getHttpClient();
        $url = $this->client->getRequestUrl();

        try {
            $response = $httpClient->post($url, [
                'form_params' => [
                    'paymentrequest' => base64_encode($this->requestBody->__toXmlString())
                ]
            ]);

            return new PaynamicsResponse($response, $this);
        } catch (PaynamicsException $e) {

        }

        return false;
    }
}