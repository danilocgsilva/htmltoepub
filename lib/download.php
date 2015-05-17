<?php
require_once("default_configs.php");
require_once("functions/recursivecopy.php");
require_once("functions/zip_folder.php");
require_once("functions/remove_recursively.php");

// Test if the temporary folder is writable
if (!is_writable($tmp_path)) {
    $error_message = 'The temporary folder - ' . $tmp_path . ' - does not exists or it\'s not granted write permission';
    error_log($error_message);
    echo $error_message;
    return;
}

recurse_copy('datatoclone', $tmp_path . "/" . $title);

$book_id_file = $tmp_path . "/" . $title . "/OEBPS/book.opf";
$book_opf_folder = $tmp_path . "/" . $title . "/OEBPS/book_opf/";

$book_opf_contents = "";
$book_opf_contents .= file_get_contents($book_opf_folder . "header.txt");
$book_opf_contents .= file_get_contents($book_opf_folder . "body.txt");

file_put_contents($book_id_file, $book_opf_contents);

zip_folder($tmp_path . "/" . $title, $tmp_path . "/" . $title);

remove_recursively($tmp_path . "/" . $title);

/*
header("Content-Description: File Transfer");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"" . $title . ".epub\"");
header("Content-Transfer-Encoding: binary");
ob_end_flush();
rename($tmp_path . '/' . $title . '.zip', $tmp_path . '/' . $title . '.epub');
@readfile($tmp_path . '/' . $title . '.epub');
ignore_user_abort(true);
unlink($tmp_path . '/' . $title . '.epub');*/
