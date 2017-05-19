<?php
/**
 * Created by PhpStorm.
 * User: ivanb
 * Date: 5/17/2017
 * Time: 2:25 PM
 */

namespace Coreproc\Paynamics\Requests;


interface PaynamicsRequestBodyInterface
{

    /**
     * @param $key
     * @return mixed|null
     */
    public function getAttribute($key);

    /**
     * @return array
     */
    public function getAttributes();

    /**
     * @param string $key
     * @param string $value
     * @return self
     */
    public function setAttribute($key, $value);

    /**
     * @param array $attributes
     * @return self
     */
    public function setAttributes($attributes);

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key);

    /**
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value);

    /**
     * @return string
     */
    public function __toXmlString();
}