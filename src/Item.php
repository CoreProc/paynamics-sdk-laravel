<?php namespace CoreProc\Paynamics\Paygate;

use CoreProc\Paynamics\Paygate\Contracts\ItemInterface;

class Item implements ItemInterface
{
    protected $details = [];

    /**
     * Sets Item Name
     *
     * @param $name
     * @return self
     */
    public function setName($name)
    {
        $this->details['name'] = $name;

        return $this;
    }

    /**
     * Sets Item Quantity
     *
     * @param $quantity
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->details['quantity'] = $quantity;

        return $this;
    }

    /**
     * Sets Item Amount
     *
     * @param $amount
     * @return self
     */
    public function setAmount($amount)
    {
        $this->details['amount'] = $amount;

        return $this;
    }

    /**
     * Get Item Details
     *
     * @return array
     */
    public function getDetails()
    {
        return $this->details;
    }
}