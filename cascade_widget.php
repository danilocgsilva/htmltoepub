<?php
/**
 * The Cascade Widget is a UX that allows user to plan where the system will find by
 *   the elements texts, as titles, main content, tags, and so on
 */
 
/*
 * Also need a function to create a machine friend name from the title, to be used as an id
 */
require_once("machine_friendly.php");
 
 /*
 * @param $element - a title that points to then element to be fetched
 */

function cascade_widget($element) {
    $machine_name_element = machine_friendly($element);
    print(
        "<div class=\"cascade_widget_container\">" .
            $element . "<br />" .
            "<input type=\"button\" name=\"New ID\" value=\"New ID\" onclick=\"createElementView(0)\" />" .
            "<input type=\"button\" name=\"New Class\" value=\"New Class\" onclick=\"createElementView(1)\" />" .
            "<div id=\"$machine_name_element\">" .
            "</div>" .
        "</div>"
    );
}