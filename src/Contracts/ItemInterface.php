<?php namespace CoreProc\Paynamics\Paygate\Contracts;

interface ItemInterface
{
    /**
     * Sets Item Name
     *
     * @param $name
     * @return self
     */
    public function setName($name);

    /**
     * Sets Item Quantity
     *
     * @param $quantity
     * @return self
     */
    public function setQuantity($quantity);

    /**
     * Sets Item Amount
     *
     * @param $amount
     * @return self
     */
    public function setAmount($amount);

    /**
     * Get Item Details
     *
     * @return array
     */
    public function getDetails();
}