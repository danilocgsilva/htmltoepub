<?php

class xml_element {
  public $name = "";
  public $attributes = array();
  public $xmlstring = "";
  public $child = array();

  public function print_xml() {
    print("<" . $name);
    if (count($this->$attributes) != 0) {
      print " ";
      foreach($this->$attributes as key => $attribute) {
        print $key;
      }
      print " ";
    }
  }
}
