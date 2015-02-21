<?php
require("default_configs.php");

$xml_obj = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"" . $encoding . "\"?><package />");

$xml_obj->addAttribute(
  "xmlns",
  "http://www.idpf.org/2007/opf"
);
$xml_obj->addAttribute(
  "unique-identifier",
  "BookId"
);
$xml_obj->addAttribute(
  "version",
  "2.0"
);

$metadata = $xml_obj->addChild("metadata");
$metadata->addAttribute(
  'xmlns',
  "http://purl.org/dc/elements/1.1/"
);


$dom_doc = new DOMDocument();
$dom_doc->loadXML($xml_obj->asXML());
$dom_doc->formatOutput = true;
$dom_output = $dom_doc->saveXML();
 

//print($xml_obj->asXML());
print($dom_output);
