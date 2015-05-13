<?php
require_once("default_configs.php");
require_once("functions/recursivecopy.php");
require_once("functions/zip_folder.php");
recurse_copy("datatoclone", $tmp_path . "/" . $title);
zip_folder($tmp_path . "/" . $title, $title);/*
header("Content-Description: File Transfer");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"" . $title . "\"");
header("Content-Transfer-Encoding: binary");
ob_end_flush();
@readfile("/tmp/tmp2/dataclone.zip");*/
