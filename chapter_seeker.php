<?php
$chapter_folders = scandir("chapter_tests");

$chapter = "";
$content_string = "";
$chapter_title = "";
$chapter_counter = 0;

function remove_unecessary_dir_el($var) {
	if (!($var == "." || $var == "..")) {
		return $var;
	}
}

$chapter_folders = array_filter($chapter_folders, "remove_unecessary_dir_el");


/*
foreach ($chapter_folders AS $folder) {

	$chapter_title_content = "chapter_tests" . "/" . $folder . "/" . "title.txt";
	$chapter_title = file_get_contents($chapter_title_content);
	$chapter_string_content = "chapter_tests" . "/" . $folder . "/" . "content.html";
	$content_string = file_get_contents($chapter_string_content);
	
	echo $chapter_title_content . "<br />" . $chapter_string_content . "<br /><br />";
	
	//$chapter = $content_start . $content_string . $bookEnd;
	
	//$book->addChapter($chapter_title, "Chapter.html", $chapter, true, EPub::EXTERNAL_REF_ADD);	
}
*/


foreach ($chapter_folders AS $folder) {
	$chapter_title = file_get_contents("chapter_tests" . "/" . $folder . "/" . "title.txt");
	$content_string = file_get_contents("chapter_tests" . "/" . $folder . "/" . "content.html");
	$chapter =
	  $content_start .
	  "<h1>" . $chapter_title . "</h1>" .
	  $content_string .
	  $bookEnd;
	
	$book->addChapter($chapter_title, "Chapter" . $chapter_counter++ . ".html", $chapter);	
}


/*
$chapter1 = $content_start . "<h1>Chapter 1</h1>\n"
    . "<h2>Lorem ipsum</h2>\n"
    . "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec magna lorem, mattis sit amet porta vitae, consectetur ut eros. Nullam id mattis lacus. In eget neque magna, congue imperdiet nulla. Aenean erat lacus, imperdiet a adipiscing non, dignissim eget felis. Nulla facilisi. Vivamus sit amet lorem eget mauris dictum pharetra. In mauris nulla, placerat a accumsan ac, mollis sit amet ligula. Donec eget facilisis dui. Cras elit quam, imperdiet at malesuada vitae, luctus id orci. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque eu libero in leo ultrices tristique. Etiam quis ornare massa. Donec in velit leo. Sed eu ante tortor.</p>\n"
    . "<p><img src=\"http://www.grandt.com/ePub/AnotherHappilyMarriedCouple.jpg\" alt=\"Test Image retrieved off the internet: Another happily married couple\" />Nullam at tempus enim. Nunc et augue non lectus consequat rhoncus ac a odio. Morbi et tellus eget nisi volutpat tincidunt. Curabitur tristique neque tincidunt purus blandit bibendum. Maecenas eleifend sem quis magna semper id pulvinar nisi porttitor. In in lectus accumsan eros tristique pharetra sit amet ac nulla. Nam vitae felis et orci congue porta nec non ipsum. Donec pretium blandit accumsan. In aliquam lacinia nisi, ut venenatis mauris condimentum ut. Morbi rutrum orci et nisl accumsan euismod. Etiam viverra luctus sem pellentesque suscipit. Aliquam ultricies egestas risus at eleifend. Ut lacinia, tortor non varius malesuada, massa diam aliquet augue, vitae tempor metus tellus eget diam. Nulla vel augue eu elit adipiscing egestas. Duis et nulla est, ac congue arcu. Phasellus semper, ipsum et blandit rutrum, erat ante semper quam, at iaculis 
quam tellus sed neque.</p>\n"
    . "<p>Pellentesque vulputate sollicitudin justo, at faucibus nisl convallis in. Nulla facilisi. Curabitur nec mauris eu justo ultricies ultricies gravida eu ipsum. Pellentesque at nunc velit, vitae congue nisl. Nam varius imperdiet leo eu accumsan. Nullam elementum fermentum diam euismod porttitor. Etiam sed pellentesque ante. Donec in est elementum mi tempor consectetur. Fusce orci lorem, mollis at tincidunt eget, fringilla sed nunc. Ut consectetur condimentum condimentum. Phasellus sed felis non massa gravida euismod ut in tellus. Curabitur suscipit pharetra sapien vitae dignissim. Morbi id arcu nec ante viverra lobortis vitae nec quam. Mauris id gravida odio. Nunc non sem nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque hendrerit volutpat nisl id elementum. Vivamus lobortis iaculis nisi, sit amet tristique risus porttitor vel. Suspendisse potenti.</p>\n"
    . "<p>Quisque aliquet sapien leo, vitae eleifend dolor. Fusce quis tincidunt nunc. Nam nec purus nulla, ac eleifend lorem. Curabitur eu quam et nibh egestas mattis. Maecenas eget felis augue. Integer scelerisque commodo urna, a pulvinar tortor euismod et. Praesent in nunc sapien. Ut iaculis auctor neque, sit amet rutrum est faucibus vitae. Sed a sagittis quam. Quisque interdum luctus fringilla. Vestibulum vitae nunc in felis luctus ultricies at id magna. Nam volutpat sapien ac lorem interdum pellentesque. Suspendisse faucibus, leo vitae laoreet interdum, mi mi pulvinar neque, sit amet tristique sapien nulla nec dolor. Etiam non ligula augue.</p>\n"
    . "<p>Vivamus purus elit, ornare eget accumsan ut, luctus et orci. Sed vestibulum turpis ut quam vehicula id hendrerit velit suscipit. Pellentesque pulvinar, libero vitae sagittis scelerisque, felis ante faucibus risus, ut viverra velit mi at tortor. Aliquam lacinia condimentum felis, eu elementum ligula laoreet vitae. Sed placerat tempus turpis a fringilla. Etiam porta accumsan feugiat. Phasellus et cursus magna. Suspendisse vitae odio sit amet urna vulputate consectetur. Vestibulum massa magna, sagittis at dictum vitae, sagittis scelerisque erat. Donec viverra tincidunt lacus. Maecenas fermentum erat et mauris tincidunt sed eleifend quam tempus. In at augue mi, in tincidunt arcu. Duis dapibus aliquet mi, ac ullamcorper est semper quis. Sed nec nulla nec odio malesuada viverra id sed nulla. Donec lobortis euismod aliquam. Praesent sit amet dolor quis lacus auctor lobortis. In hac habitasse platea dictumst. Sed at nisi sed nisi ullamcorper pellentesque. Vivamus eget enim sem, non laoreet leo. Sed vel 
odio lacus.</p>\n"
    . $bookEnd;

    
$book->addChapter("Chapter 1: Lorem ipsum", "Chapter001.html", $chapter1);
    
$chapter2 = $content_start .
      "<h2>Vivamus bibendum massa</h2>\n"
    . "<p><img src=\"demo/DemoInlineImage.jpg\" alt=\"Demo Inline Image!\" /></p>\n"
    . "<p>Vivamus bibendum massa ac magna congue gravida. Curabitur nulla ante, accumsan sit amet luctus a, fermentum ut diam. Maecenas porttitor faucibus mattis. Ut auctor aliquet ligula nec posuere. Nullam arcu turpis, dapibus sit amet tempor nec, cursus at augue. Aliquam sed sem velit, id sagittis mauris. Donec sed ipsum nisi, id scelerisque felis. Cras lacus est, fermentum in ultricies eu, congue in elit. Nulla tincidunt posuere eros, eget suscipit tellus porta vel. Aliquam ut sollicitudin libero. Suspendisse potenti. Sed cursus dignissim nulla in elementum. Aliquam id quam justo, sit amet laoreet ligula. Etiam pellentesque tellus a nisi commodo eu sodales ante commodo. Vestibulum ultricies sapien arcu. Proin nunc mauris, ultrices id imperdiet ac, malesuada ac nunc. Nunc a mi quis nunc ultricies rhoncus. Mauris pellentesque eros eu augue congue ac tincidunt est gravida.</p>\n"
    . "<p>Integer lobortis facilisis magna, non tristique sem facilisis ut. Sed id nisi diam. Nulla viverra lectus ut purus tempus sagittis. Quisque dictum enim tempus ipsum mollis blandit. Cras in mi non nulla imperdiet fringilla at blandit urna. Donec vel dui quis sem congue ullamcorper nec a massa. Vivamus in dui nunc. Donec sit amet augue odio, at imperdiet lacus. Mauris sit amet magna justo. Maecenas ultrices orci ultrices sapien ornare eget consequat nisl tristique. Integer non mi ac eros vehicula pharetra. Curabitur risus augue, sollicitudin vitae pharetra interdum, sollicitudin sit amet magna. Nunc sit amet est lacus, vel sodales elit. Duis dolor lorem, convallis eu dignissim quis, vulputate at nibh.</p>\n"
    . "<p>Praesent gravida, sapien aliquet interdum elementum, magna mauris hendrerit eros, blandit posuere lectus neque sed massa. Cras ultricies rhoncus mi, vitae posuere ligula scelerisque sit amet. Cras porttitor congue odio, sit amet tristique magna euismod id. Cras enim dolor, scelerisque eget egestas vel, consectetur vel purus. Aenean et convallis felis. Mauris in arcu sollicitudin ipsum lobortis fringilla. Suspendisse felis mauris, convallis ac blandit interdum, imperdiet eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris scelerisque velit quis augue commodo tristique. Maecenas dictum dui congue enim tristique vel mattis neque luctus. Fusce neque dui, laoreet suscipit varius sed, mattis sit amet diam. Nullam elementum, ante non cursus imperdiet, eros dui placerat elit, sit amet elementum erat risus eget nunc.</p>\n"
    . "<p>Nam tellus nibh, vehicula a laoreet non, fermentum vel leo. Proin id augue tellus. Donec placerat pharetra interdum. Aliquam vestibulum viverra bibendum. Nullam auctor congue tortor. Sed sagittis, massa ac cursus malesuada, ipsum velit aliquam lectus, quis tincidunt tellus risus id justo. Suspendisse sodales adipiscing eros, ut pulvinar eros suscipit in. Fusce vel libero id urna blandit pharetra. Cras aliquam suscipit ultrices. Vivamus luctus tristique vestibulum. Nam placerat dolor ipsum. Nulla vitae tristique sapien. Nulla laoreet ante ut elit dictum ultricies. Fusce mi tortor, commodo sit amet tincidunt semper, pellentesque nec ante. Vestibulum nec dui at massa adipiscing pulvinar. Integer ultrices tristique odio, iaculis bibendum metus fringilla id. Ut ac elit ac enim convallis dignissim pharetra id purus. Nunc pulvinar blandit nulla, in ornare erat condimentum id. Sed sit amet placerat est. Curabitur pretium tellus in velit aliquet eu dictum arcu consectetur.</p>\n"
    . "<p>In hac habitasse platea dictumst. Integer lectus augue, varius nec rutrum non, fringilla eu neque. Curabitur a gravida velit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque vestibulum orci ac ligula interdum dapibus. Maecenas sollicitudin aliquet libero in sodales. In tempor orci vitae nisi imperdiet at varius sem dignissim. Aenean tortor libero, pellentesque eget hendrerit id, ullamcorper in justo. Sed euismod egestas est vitae convallis. Nunc tempus lacinia purus condimentum mattis. Sed id elementum est. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In nec tempus eros. </p>\n"
    . $bookEnd;
    

$book->addChapter("Chapter 2: Vivamus bibendum massa", "Chapter002.html", $chapter2);
*/