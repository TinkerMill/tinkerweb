<?php

class Framework {

  // __construct
  // Loads the Core Framework
  public function __construct() {
  }

  public function rootURL() {
    if ($SSL == true) {
      $URL = "https://";
    } else {
      $URL = "http://";
    }
    $URL .= $_SERVER['HTTP_HOST'] . $DIRECTORY . "/";
    return $URL;
  }

}

?>
