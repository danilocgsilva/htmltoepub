<?php

/**
 * Function to validate. If the value is legal, return itself.
 * Otherwise, return ''.
 * @param $value_to_validate
 * @param $field_name - It's just for error message. It's not necessary for
 *   the main porpouse, just to inform where the error is, if any
 * @return string - The value itself, or a empty string ('') if is not validated.
 */
function validate($value_to_validate, $field_name) {

  if ($value_to_validate == null || $value_to_validate == "") {
    print("The " . $field_name . " field is mandatory.");
    return '';
  }

  $field_acceptance = filter_var($value_to_validate, FILTER_SANITIZE_SPECIAL_CHARS);

  if ($value_to_validate != $field_acceptance) {
    print("Not allowed value entered in " . $field_name . ".");
    return '';
  }
  
  return $value_to_validate;
}