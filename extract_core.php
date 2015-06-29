<?php
$content_output = file_get_contents('extract.iim');
header('Content-disposition: attachment; filename=extract_script.txt');
header('Content-type: text/plain');