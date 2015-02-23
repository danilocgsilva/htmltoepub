<?php

class xml_element {
  public $name = array();
  public $attributes = array();
  public $child = array();

  function set_name($name, $namespace = null) {
    $this->name[] = $name;
    if ($namespace) {
      $this->name[] = $namespace;
    }
  }

  function set_attributes($attributes) {
    $this->attributes[] = $attributes;
  }

  function set_child($child) {
  }
}
