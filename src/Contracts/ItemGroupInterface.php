<?php namespace CoreProc\Paynamics\Paygate\Contracts;

interface ItemGroupInterface {


    /**
     * Adds an Item to the ItemGroup
     *
     * @param ItemInterface $item
     * @return self
     */
    public function addItem(ItemInterface $item);

    /**
     * Returns ItemGroup to array
     *
     * @return array
     */
    public function toArray();

}