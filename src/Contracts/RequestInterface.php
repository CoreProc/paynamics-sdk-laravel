<?php namespace CoreProc\Paynamics\Paygate\Contracts;

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
     * Executes the request and returns corresponding response
     *      or throws an error
     *
     * @param array $options
     * @return ResponseInterface|bool
     * @throws Exception
     */
    public function execute(array $options = []);
}