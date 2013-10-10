<?php

/*
 * Backend Class
 * This file will ... 
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 9th, 2013 
 */

// Include the Parent Framework Class
require_once("Framework.class.php");

class Backend extends Framework{
  public function __construct(){
    // Load the Website's Header
    parent::loadHeader();
    
    // Determine what is being requested
    if(URL == "/" . BACKEND . "/")
    {
      // Load the Default Blog Page
      $this->displayBackend();
    }
  }
  
  public function displayBackend(){
    // Displays the List Events View
    echo "This is where backend will be displayed.";
  }
}

?>
