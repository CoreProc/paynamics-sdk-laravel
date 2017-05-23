<?php namespace CoreProc\Paynamics\PayGate;

use CoreProc\Paynamics\PayGate\Contracts\ItemGroupInterface;
use CoreProc\Paynamics\PayGate\Contracts\ItemInterface;

class ItemGroup implements ItemGroupInterface
{
    protected $attributes = [];

    public function __construct()
    {
        $this->attributes['items'] = [];
    }

    /**
     * Adds an Item to the ItemGroup
     *
     * @param ItemInterface $item
     * @return self
     */
    public function addItem(ItemInterface $item)
    {
        $this->attributes['items'][] = $item->getDetails();

        return $this;
    }

    public function getAttribute($key)
    {
        if (!!$key && array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        }

        return null;
    }

    public function __get($key)
    {
        return $this->getAttribute($key);
    }

    public function toArray()
    {
        return $this->attributes;
    }
}