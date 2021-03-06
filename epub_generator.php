<?php
error_reporting(E_ALL | E_STRICT);
ini_set('error_reporting', E_ALL | E_STRICT);
ini_set('display_errors', 1);

$content_start =
"<?xml version=\"1.0\" encoding=\"utf-8\"?>\n"
. "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\"\n"
. "    \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n"
. "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n"
. "<head>"
. "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n"
. "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\" />\n"
. "<title>Test Book</title>\n"
. "</head>\n"
. "<body>\n";
 
$bookEnd = "</body>\n</html>\n";

$fileDir = './PHPePub';

include_once("lib/EPub.php");

$book = new EPub(); // Default is EPub::BOOK_VERSION_EPUB2

// Title and Identifier are mandatory!
$book->setTitle($_POST['book_title']);
$book->setIdentifier("http://JohnJaneDoePublications.com/books/TestBook.html", EPub::IDENTIFIER_URI); // Could also be the ISBN number, prefered for published books, or a UUID.
$book->setLanguage("en"); // Not needed, but included for the example, Language is mandatory, but EPub defaults to "en". Use RFC3066 Language codes, such as "en", "da", "fr" etc.
$book->setDescription("This is a brief description\nA test ePub book as an example of building a book in PHP");
$book->setAuthor("John Doe Johnson", "Johnson, John Doe");
$book->setPublisher("John and Jane Doe Publications", "http://JohnJaneDoePublications.com/"); // I hope this is a non existant address :)
$book->setDate(time()); // Strictly not needed as the book date defaults to time().
$book->setRights("Copyright and licence information specific for the book."); // As this is generated, this _could_ contain the name or licence information of the user who purchased the book, if needed. If this is used that way, the identifier must also be made unique for the book.
$book->setSourceURL("http://JohnJaneDoePublications.com/books/TestBook.html");

$book->addDublinCoreMetadata(DublinCore::CONTRIBUTOR, "PHP");

$book->setSubject("Test book");
$book->setSubject("keywords");
$book->setSubject("Chapter levels");

// Insert custom meta data to the book, in this cvase, Calibre series index information.
$book->addCustomMetadata("calibre:series", "PHPePub Test books");
$book->addCustomMetadata("calibre:series_index", "1");

$cssData = "body {\n  margin-left: .5em;\n  margin-right: .5em;\n  text-align: justify;\n}\n\np {\n  font-family: serif;\n  font-size: 10pt;\n  text-align: justify;\n  text-indent: 1em;\n  margin-top: 0px;\n  margin-bottom: 1ex;\n}\n\nh1, h2 {\n  font-family: sans-serif;\n  font-style: italic;\n  text-align: center;\n  background-color: #6b879c;\n  color: white;\n  width: 100%;\n}\n\nh1 {\n    margin-bottom: 2px;\n}\n\nh2 {\n    margin-top: -2px;\n    margin-bottom: 2px;\n}\n";

$book->addCSSFile("styles.css", "css1", $cssData);


include_once('chapter_seeker.php');


$book->finalize(); // Finalize the book, and build the archive.

$zipData = $book->sendBook($book_title);

?>