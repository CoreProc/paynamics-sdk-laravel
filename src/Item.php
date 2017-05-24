<?php namespace CoreProc\Paynamics\Paygate;

class Item implements ItemInterface
{
    protected $details = [];

    public function __construct($details)
    {
        $this->setName($details['name']);
        $this->setQuantity($details['quantity']);
        $this->setAmount($details['amount']);
    }

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