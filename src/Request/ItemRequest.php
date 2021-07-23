<?php

namespace Coreproc\PaynamicsSdk\Request;

/**
 * Class Item
 * @package Coreproc\PaynamicsSdk\Models
 * @property string $item_name
 * @property int quantity
 * @property float amount
 */
class ItemRequest
{
    /**
     * Set attributes that are mass assignable
     *
     * @var array
     */
    public array $fillable = [
        'item_name',
        'quantity',
        'amount',
    ];

    /**
     * Create new instance of item
     *
     * @return ItemRequest
     */
    public static function make(): ItemRequest
    {
        return new self();
    }
}