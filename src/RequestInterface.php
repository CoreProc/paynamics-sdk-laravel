<?php namespace CoreProc\Paynamics\Paygate;

use Exception;

interface RequestInterface
{

    /**
     * Returns the assigned Paynamics client
     *
     * @return ClientInterface
     */
    public function getClient();

    /**
     * Sets the Paynamics client
     *
     * @param ClientInterface $client
     * @return self
     */
    public function setClient(ClientInterface $client);

    /**
     * Returns the assigned request body
     *
     * @return RequestBodyInterface
     */
    public function getRequestBody();

    /**
     * Sets the request body
     *
     * @param RequestBodyInterface $requestBody
     * @return self
     */
    public function setRequestBody(RequestBodyInterface $requestBody);

    /**
     * Creates an auto-submit form that will redirect to the payment gateway
     *
     * @return string
     */
    public function generateForm();
}