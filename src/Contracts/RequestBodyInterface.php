<?php namespace CoreProc\Paynamics\PayGate\Contracts;

interface RequestBodyInterface
{

    /**
     * Get request body attribute by key
     *
     * @param string $key
     * @return mixed|null
     */
    public function getAttribute($key);

    /**
     * Get all request body attributes
     *
     * @return array
     */
    public function getAttributes();

    /**
     * Set request body attribute by key and value
     *
     * @param string $key
     * @param string $value
     * @return self
     */
    public function setAttribute($key, $value);

    /**
     * Sets all request body attributes
     *
     * @param array $attributes
     * @return self
     */
    public function setAttributes($attributes);

    /**
     * Sets the default request body content
     *
     * @param ClientInterface $client
     * @return self
     */
    public function setDefaults(ClientInterface $client);

    /**
     * Generate Paynamics request signature
     *
     * @param ClientInterface $client
     * @return self
     */
    public function generateRequestSignature(ClientInterface $client);

    /**
     * Override default getter
     *
     * @param $key
     * @return mixed
     */
    public function __get($key);

    /**
     * Override default setter
     *
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value);

    /**
     * Return request body to XML String
     *
     * @return string
     */
    public function __toXmlString();
}