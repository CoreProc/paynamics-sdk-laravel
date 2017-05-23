<?php namespace CoreProc\Paynamics\PayGate;

use CoreProc\Paynamics\PayGate\Contracts\ResponseBodyInterface;
use CoreProc\Paynamics\PayGate\Mixins\AttributesToXml;
use CoreProc\Paynamics\PayGate\Mixins\SignatureGenerator;

class ResponseBody implements ResponseBodyInterface
{
    use AttributesToXml, SignatureGenerator;

    protected $fillable = [
        'signature',
    ];

    /**
     * @var array
     */
    protected $attributes = [];

    public function __construct(array $responseBody = [])
    {
        foreach($responseBody as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->attributes[$key] = $value;
            }
        }
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function getAttribute($key)
    {
        if (!!$key && in_array($key, $this->fillable)) {
            return $this->attributes[$key];
        }

        return null;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getAttribute($key);
    }
}