<?php namespace Coreproc\Paynamics\Requests;

use SimpleXMLElement;

class PaynamicsRequestBody implements PaynamicsRequestBodyInterface
{
    use PaynamicsRequestBodyToXml;

    protected $fillable = [
        'orders',
        'mid',
        'request_id',
        'ip_address',
        'notification_url',
        'response_url',
        'cancel_url',
        'mtac_url',
        'descriptor_note',
        'fname',
        'lname',
        'mname',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'zip',
        'secure3d',
        'trxtype',
        'email',
        'phone',
        'mobile',
        'client_ip',
        'amount',
        'currency',
        'mlogo_url',
        'pmethod',
        'signature',
    ];

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * PaynamicsRequestBody constructor.
     */
    public function __construct(array $attributes = [])
    {
        $this->setAttributes($attributes);
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
     * @param array $attributes
     * @return self
     */
    public function setAttributes($attributes)
    {
        foreach($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     * @return self
     */
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->fillable)) {
            $this->attributes[$key] = $value;
        }

        return $this;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getAttribute($key);
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        $this->setAttribute($key, $value);
    }
}