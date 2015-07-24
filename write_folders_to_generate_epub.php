<?php

include_once("validate_function.php");

$body_filtered = validate($_POST["toReceive"], "input receiver in imacro_content_receiver.php");

if ($body_filtered == '') {
	print("Error: something is illegal in the value received... Aborting for security issues.");
}

// The timestamp will be the id of the folder
$id_folder = time();