<?php
require_once("default_configs.php");
require_once("functions/recursivecopy.php");
require_once("functions/zip_folder.php");
recurse_copy($title, $tmp_path . "/" . $title);

zip_folder($tmp_path, $title);
header("Content-Description: File Transfer");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"" . $title . ".\"");
header("Content-Transfer-Encoding: binary");
ob_end_flush();
@readfile($tmp_path . '/' . $title . '.zip');
