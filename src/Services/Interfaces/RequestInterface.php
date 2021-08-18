<?php

namespace Coreproc\PaynamicsSdk\Services\Interfaces;

Interface RequestInterface
{
    /**
     * Generate XML data for request
     *
     * @return string
     */
    public  function toXml(): string;

    /**
     * Generate signature base on request
     *
     * @return string
     */
    public function signature(): string;
}
