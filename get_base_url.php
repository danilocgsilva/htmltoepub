<?php

/**
 * Function to return the base url
 * 
 * @return string
 *   The base url, regardless of the host
 */

function get_base_url() {
  return $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . ":" . $_SERVER['SERVER_PORT'];
}