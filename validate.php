<?php
if ($_POST['book_title'] == null || $_POST['book_title'] == "") {
	print("The book's title field is mandatory.");
	return;
}

//echo $_POST['book_title'];
//echo $_POST['book_title_in_chapter'];

include_once("epub_generator.php");