<?php

// Title validating
if ($_POST['book_title'] == null || $_POST['book_title'] == "") {
  print("The book's title field is mandatory.");
  return;
}

include_once("epub_generator.php");