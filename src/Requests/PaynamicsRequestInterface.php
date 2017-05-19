<?php namespace Coreproc\Paynamics\Requests;

use Coreproc\Paynamics\Client\PaynamicsClientInterface;
use Coreproc\Paynamics\Exceptions\PaynamicsException;
use Coreproc\Paynamics\Responses\PaynamicsResponseInterface;

interface PaynamicsRequestInterface
{

    /**
     * Returns the assigned Paynamics client
     *
     * @return PaynamicsClientInterface
     */
    public function getClient();

    /**
     * Sets the Paynamics client
     *
     * @param PaynamicsClientInterface $client
     * @return self
     */
    public function setClient(PaynamicsClientInterface $client);

    /**
     * Returns the assigned request body
     *
     * @return PaynamicsRequestBodyInterface
     */
    public function getRequestBody();

    /**
     * Sets the request body
     *
     * @param PaynamicsRequestBodyInterface $requestBody
     * @return self
     */
    public function setRequestBody(PaynamicsRequestBodyInterface $requestBody);

    /**
     * Executes the request and returns corresponding response
     *      or throws an error
     *
     * @param array $options
     * @return PaynamicsResponseInterface|bool
     * @throws PaynamicsException
     */
    public function execute(array $options = []);
}