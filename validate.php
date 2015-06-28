<?php
ini_set('register_globals', 'Off');

include_once("configs.php");

if ($debug) {
	ini_set('display_errors', 1);
} else {
	ini_set('display_errors', 0);
}

// Title validating
if ($_POST['book_title'] == null || $_POST['book_title'] == "") {
  print("The book's title field is mandatory.");
  return;
}

$book_title = $_POST['book_title'];

include_once("epub_generator.php");