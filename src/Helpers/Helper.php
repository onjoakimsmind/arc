<?php

namespace Onjoakimsmind\Arc\Helpers;

use DOMDocument;
use DOMElement;

class Helper
{
    public function htmlToObj(string $html): string
    {
        $dom = new \OMDocument();
        $dom->loadHTML($html);
        return $this->elementToObj($dom->documentElement);
    }

    public function elementToObj(DOMElement $element): array
    {
        $obj = array( "tag" => $element->tagName );
        foreach ($element->attributes as $attribute) {
            $obj[$attribute->name] = $attribute->value;
        }
        foreach ($element->childNodes as $subElement) {
            if ($subElement->nodeType == XML_TEXT_NODE) {
                $obj["html"] = $subElement->wholeText;
            } else {
                $obj["children"][] = $this->elementToObj($subElement);
            }
        }
        return $obj;
    }

    public function objToHTML(string $obj): string
    {
        $dom = new DOMDocument();
        $dom->appendChild($this->objToElement($dom, json_decode($obj, true)));
        return $dom->saveHTML();
    }

    public function objToElement(DOMDocument $dom, array $obj): DOMElement | false
    {
        $element = $dom->createElement($obj["tag"]);
        foreach ($obj as $key => $value) {
            if ($key == "tag" || $key == "html" || $key == "children") {
                continue;
            }
            $element->setAttribute($key, $value);
        }
        if (isset($obj["html"])) {
            $element->appendChild($dom->createTextNode($obj["html"]));
        }
        if (isset($obj["children"])) {
            foreach ($obj["children"] as $child) {
                $element->appendChild($this->objToElement($dom, $child));
            }
        }
        return $element;
    }
}
