<?php
require("default_configs.php");
require("xml_element.php");


$xmlel = new xml_element();

$xmlel->set_name(array("package"));

print $xmlel->name[0];
