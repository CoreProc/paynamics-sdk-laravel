<?php

namespace Coreproc\PaynamicsSdk\Request;

/**
 * Class Payment
 * @package Coreproc\PaynamicsSdk\Models
 * @property string $ip_address
 * @property string $notification_url
 * @property string $response_url
 * @property string $cancel_url
 * @property string $mtac_url
 * @property string $descriptor_note
 * @property string $fname
 * @property string $lname
 * @property string $mname
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zip
 * @property string $email
 * @property string $phone
 * @property string $mobile
 * @property string $client_ip
 * @property string $amount
 * @property string $currency
 * @property string $pmethod
 * @property string $expiry_limit
 * @property string $trxtype
 * @property string $secure3d
 * @property string $metadata2
 */
class PaymentRequest
{
    /**
     * Set attributes that are mass assignable
     *
     * @var array
     */
    public array $fillable = [
        'ip_address',
        'notification_url',
        'response_url ',
        'cancel_url ',
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
        'email',
        'phone',
        'mobile',
        'client_ip',
        'amount',
        'currency',
        'pmethod',
        'expiry_limit',
        'trxtype',
        'mlogo_url',
        'orders',
        'secure3d',
        'metadata2',
    ];

    /**
     * @var array
     */
    public array $orders = [];

    /**
     * Create new instance of customer
     *
     * @return PaymentRequest
     */
    public static function make(): PaymentRequest
    {
        return new self();
    }

    /**
     * Add item to array of items
     *
     * @param ItemRequest $item
     */
    public function addItem(ItemRequest $item)
    {
        array_push($this->orders, $item);
    }
}
