<?php
$goto_uri = $_GET['uri'];
$tag_id = $_GET['id_value'];
$file_name = $_GET['file_name'];

$content_output = file_get_contents("extract.iim");
header('Content-disposition: attachment; filename=' . $file_name);
header('Content-type: text/plain');
echo sprintf($content_output, $goto_uri, $tag_id, $file_name);
