<?php

namespace Coreproc\PaynamicsSdk\Requests;

use Coreproc\PaynamicsSdk\Traits\Formatter;

class ItemRequest
{
    use Formatter;

    /**
     * @var string
     */
    protected string $itemName;

    /**
     * @var float
     */
    protected float $amount;

    /**
     * @var int
     */
    protected int $quantity;

    /**
     * @return string
     */
    public function getItemName(): string
    {
        return $this->itemName;
    }

    /**
     * @param string $itemName
     * @return ItemRequest
     */
    public function setItemName(string $itemName): ItemRequest
    {
        $this->itemName = $itemName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->toPaynamicsAmountFormat($this->amount);
    }

    /**
     * @param float $amount
     * @return ItemRequest
     */
    public function setAmount(float $amount): ItemRequest
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return ItemRequest
     */
    public function setQuantity(int $quantity): ItemRequest
    {
        $this->quantity = $quantity;
        return $this;
    }

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
