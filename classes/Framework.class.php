<?php

/*
 * This is the Framework Class
 * This class will be the core functionality of the entire website
 * To include loading the site layout.
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 2nd, 2013 
 */

class Framework {

  // __construct
  // Loads the Core Framework
  public function __construct() {
  }
  
  public function loadHeader(){
    include_once('../globals/layout/header.php');
  }
  
  public function loadFooter(){
    include_once('../globals/layout/footer.php');
  }

  public function rootURL() {
    if (SSL == true) {
      $URL = "https://";
    } else {
      $URL = "http://";
    }
    $URL .= $_SERVER['HTTP_HOST'] . $DIRECTORY . "/";
    return $URL;
  }

}

?>
