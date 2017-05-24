<?php namespace CoreProc\Paynamics\Paygate;

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
     * @param ItemInterface|array $item
     * @return self
     */
    public function addItem($item)
    {
        if (is_array($item)) {
            $item = new Item($item);
        }

        $this->attributes['items']['Items'][] = $item->getDetails();

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