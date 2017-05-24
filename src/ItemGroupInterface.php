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
     * Returns ItemGroup to array
     *
     * @return array
     */
    public function toArray();

}