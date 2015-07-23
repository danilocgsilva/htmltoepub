<?php

/*
include_once("validate_function.php");

$body_filtered = validate($_POST["toReceive"], "input receiver in imacro_content_receiver.php");

if ($body_filtered == '') {
	print("Error: something is illegal in the value received... Aborting for security issues.");
}
*/

// The timestamp will be the id of the folder
$id_folder = time();
include_once("mkdir2.php");
$sys_get_temp_dir = sys_get_temp_dir();
mkdir2($sys_get_temp_dir . "/pastseeker");
mkdir2($sys_get_temp_dir . "/pastseeker/" . $id_folder);
mkdir2($sys_get_temp_dir . "/pastseeker/" . $id_folder . "/content");
$content_path = sys_get_temp_dir() . "/pastseeker/" . $id_folder . "/content";
$fs = fopen($content_path . "/content.html", 'w');
fwrite($fs, $_POST["toReceive"]);
fclose($fs);