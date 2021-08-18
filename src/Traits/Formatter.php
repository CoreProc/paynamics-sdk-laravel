<?php

namespace Coreproc\PaynamicsSdk\Traits;

trait Formatter
{
    /**
     * @param float $value
     * @return string
     */
    public function toPaynamicsAmountFormat(float $value): string
    {
        return number_format(round($value, 2), 2, '.', '');
    }
}
