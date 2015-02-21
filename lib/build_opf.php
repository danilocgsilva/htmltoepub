<?php
require("default_configs.php");

$xml_obj = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"" . $encoding . "\"?><package />");

$xml_obj->addAttribute(
  "xmlns",
  "http://www.idpf.org/2007/opf");
$xml_obj->addAttribute(
  "unique-identifier",
  "BookId");
$xml_obj->addAttribute(
  "version",
  "2.0");

$metadata = $xml_obj->addChild("metadata");
$metadata->addAttribute(
  "xmlns:dc",
  "http://purl.org/dc/elements/1.1/",
  "xmlns"
);
$metadata->addAttribute(
  "xmlns:opf",
  "http://www.idpf.org/2007/opf",
  "xmlns"
);
$metadata->addAttribute(
  "xmlns:xsi",
  "http://www.w3.org/2001/XMLSchema-instance",
  "xmlns"
);

$metadata->addChild("dc:title", $title, "title");
$metadata->addChild("dc:language", $language, "language");

$dom_doc = new DOMDocument();
$dom_doc->loadXML($xml_obj->asXML());
$dom_doc->formatOutput = true;
$dom_output = $dom_doc->saveXML();
 

//print($xml_obj->asXML());
print($dom_output);
