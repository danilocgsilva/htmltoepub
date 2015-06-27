<?php
$chapter_folders = scandir("chapter_tests");

$chapter = "";
$content_string = "";
$chapter_title = "";

function remove_unecessary_dir_el($var) {
  if (!($var == "." || $var == "..")) {
    return $var;
  }
}

$chapter_folders = array_filter($chapter_folders, "remove_unecessary_dir_el");

foreach ($chapter_folders AS $folder) {

  $chapter_title = file_get_contents("chapter_tests" . "/" . $folder . "/" . "title.txt");
  $content_string = file_get_contents("chapter_tests" . "/" . $folder . "/" . "content.html");
  $chapter =
    $content_start .
    "<h1>" . $chapter_title . "</h1>" .
    $content_string .
    $bookEnd;
	
    $book->addChapter($chapter_title, "Chapter.html", $chapter, true, EPub::EXTERNAL_REF_ADD);	
}