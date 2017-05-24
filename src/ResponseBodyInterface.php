<?php namespace CoreProc\Paynamics\Paygate;

interface ResponseBodyInterface
{

    /**
     * Get response body attribute by key
     *
     * @param string $key
     * @return mixed|null
     */
    public function getAttribute($key);

    /**
     * Get all response body attributes
     *
     * @return array
     */
    public function getAttributes();

    /**
     * Generate Paynamics response signature
     *
     * @param ResponseInterface $response
     * @return self
     */
    public function generateResponseSignature(ResponseInterface $response);

    /**
     * Override default getter
     *
     * @param $key
     * @return mixed
     */
    public function __get($key);

    /**
     * Return response body to XML String
     *
     * @return string
     */
    public function __toXmlString();
}