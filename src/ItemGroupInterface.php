<?php namespace CoreProc\Paynamics\Paygate;

interface ItemGroupInterface {


    /**
     * Adds an Item to the ItemGroup
     *
     * @param ItemInterface|array $item
     * @return self
     */
    public function addItem($item);

    /**
     * Get total amount of items in ItemGroup
     *
     * @return string
     */
    public function getTotal();

    /**
     * Returns ItemGroup to array
     *
     * @return array
     */
    public function toArray();

}