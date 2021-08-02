<?php

namespace Coreproc\PaynamicsSdk\Responses\Traits;

use SimpleXMLElement;
use Exception;

trait Interpreter
{
    /**
     * Convert xml to string
     *
     * @param string $response
     * @return string
     * @throws Exception
     */
    private function toXml(string $response): string
    {
        return (new SimpleXMLElement(base64_decode($response)))->asXML();
    }

    /**
     * Convert XML string data to array
     *
     * @return array
     */
    private function toArray(): array
    {
        return json_decode($this->toObject(),TRUE);
    }

    /**
     * Parse XML and convert into object
     */
    public function toObject()
    {
        return json_encode(simplexml_load_string($this->toXml($this->response)));
    }
}
