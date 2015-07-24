<?php

// In this array, it will carry all values returned by validate function
// If not validated, the function return the empty string '', what means
//   that it's have some wrong format entered in the fields. Maybe a mistake
//   or a malicious user. In any case, the presence of '' in the string force
//   php to end, that will happen in the following in_array function
$validatet_values = array();

include_once("validate_function.php");

$book_title = validate($_POST['book_title'], "book title");

$validatet_values[] = $book_title;

if (in_array('', $validatet_values)) {
  return;
}

include_once("epub_generator.php");
//include_once("chapter_seeker.php");