<?php namespace CoreProc\Paynamics\Paygate\Mixins;

use SimpleXMLElement;

trait AttributesToXml
{
    public function arrayToXml(array $array, SimpleXMLElement $xml, $parentKey = null) {
        foreach($array as $key => $value) {
            if( is_array($value) ) {
                if (isset($value[0])) {
                    $this->arrayToXml($value, $xml, $key);
                } elseif( is_numeric($key) ){
                    $childNode = $xml->addChild($parentKey);
                    $this->arrayToXml($value, $childNode, $key);
                } else {
                    $childNode = $xml->addChild($key);
                    $this->arrayToXml($value, $childNode, $key);
                }

            } else {
                $xml->addChild($key, htmlspecialchars($value));
            }
        }

        return $xml;
    }

    public function __toXmlString()
    {
        return $this->arrayToXml($this->getAttributes(), new SimpleXMLElement('<Request/>'))->asXML();
    }
}

