<?php
require_once("default_configs.php");

header("Content-Description: File Transfer");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=meuarq.zip");
header("Content-Transfer-Encoding: binary");
ob_end_flush();
@readfile("/tmp/dataclone.zip");
