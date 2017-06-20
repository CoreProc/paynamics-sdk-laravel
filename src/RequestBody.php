<?php namespace CoreProc\Paynamics\Paygate;

use CoreProc\Paynamics\Paygate\Mixins\AttributesToXml;
use CoreProc\Paynamics\Paygate\Mixins\SignatureGenerator;

class RequestBody implements RequestBodyInterface
{
    use AttributesToXml, SignatureGenerator;

    protected $fillable = [
        '_method',
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
        'expiry_limit',
        'mlogo_url',
        'pmethod',
        'org_trxid',
        'org_trxid2',
        'dispute_start_date',
        'dispute_end_date',
        'signature',
    ];

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * RequestBody constructor.
     */
    public function __construct(array $attributes = [])
    {
        foreach($this->fillable as $key) {
            $this->setAttribute($key, null);
        }

        $this->setAttributes($attributes);
    }

    /**
     * Sets the default request body content
     *
     * @param ClientInterface $client
     * @return self
     */
    public function setDefaults(ClientInterface $client)
    {
        $defaults = [
            'mid' => $client->getMerchantId(),
            'ip_address' => $_SERVER['SERVER_ADDR'],
        ];

        $this->setAttributes(array_replace($this->getAttributes(), $defaults));

        if ($this->_method == 'responsivePayment') {
            unset($this->attributes['org_trxid']);
            unset($this->attributes['org_trxid2']);
            unset($this->attributes['dispute_start_date']);
            unset($this->attributes['dispute_end_date']);
        }

        $this->generateRequestSignature($client);


        return $this;
    }

    public function setItemGroup(ItemGroupInterface $itemGroup)
    {
        $this->setAttribute('orders', $itemGroup->toArray());
        $this->setAttribute('amount', $itemGroup->getTotal());

        return $this;
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