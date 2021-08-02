<?php

namespace Coreproc\PaynamicsSdk\Responses\Traits;

use Exception;
use SimpleXMLElement;

trait Interpreter
{
    /**
     * @param $response
     * @return string
     * @throws Exception
     */
    public function interpret($response): string
    {
//        return base64_decode($response);
        return $this->toXml($response);
//        return $this->toArray($response);
//        return $this->toArray($this->toXml($response));
    }

    /**
     * @param string $response
     * @return string
     * @throws Exception
     */
    private function toXml(string $response): string
    {
        return (new SimpleXMLElement(base64_decode($response)));
    }

    /**
     * @param $xml
     * @return array
     */
    private function toArray($xml): array
    {
        $json = json_encode(simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA));
        return json_decode($json,TRUE);
    }
}
