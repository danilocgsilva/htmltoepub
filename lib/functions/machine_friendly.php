<?php
/**
 * Function to return a machine-friendly name
 *
 * Takes any string and turn it to a machine friendly
 * @param string $origin
 *   The original string
 * @param string $codification
 *   The lower case cofificarion
 * @return string
 *   The machine friendly string
 */
function machine_friendly($origin, $codification = 'utf8') {

  // Pass all characters to lower case
  $machine_friendly = mb_strtolower($origin, $codification);

  // Add a dash in some occurrences
  $machine_friendly = preg_replace('#( - |-| )#', '_', $machine_friendly);

  // Remove some occurrences
  $machine_friendly = preg_replace("#({|}|[|]|\(|\)|'|,)#", "", $machine_friendly);

  // Remoces the accentuation by character substituition, once that
  // doesn't exists a function to do that automatically
  $accents       = array("à", "ã", "â", "á", "ê", "é", "__", "í", "õ", "ú", "ç");
  $substituitions = array("a", "a", "a", "a", "e", "e",  "_", "i", "o", "u", "c");
  $machine_friendly = str_replace($accents, $substituitions, $machine_friendly);


  return $machine_friendly;
}
