<?php
require_once("default_configs.php");
require_once("functions/recursivecopy.php");
require_once("functions/zip_folder.php");
recurse_copy('datatoclone', $tmp_path . "/" . $title);
zip_folder($tmp_path . "/" . $title, $tmp_path . "/" . $title);
header("Content-Description: File Transfer");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"" . $title . ".epub\"");
header("Content-Transfer-Encoding: binary");
ob_end_flush();
rename($tmp_path . '/' . $title . '.zip', $tmp_path . '/' . $title . '.epub');
@readfile($tmp_path . '/' . $title . '.epub');