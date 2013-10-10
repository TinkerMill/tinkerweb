<?php

/*
 * Wiki Class
 * This file will ... 
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 2nd, 2013 
 */

// Include the Parent Framework Class
require_once("Framework.class.php");

class Wiki extends Framework{
  public function __construct(){
    // Load the Website's Header
    parent::loadHeader();
    
    // Determine what is being requested
    if(URL == "/wiki/")
    {
      // Load the Default Blog Page
      $this->showWiki();
    }
    
    // Load the Footer
    parent::loadFooter();
  }
  
  public function showWiki(){
    // Displays the List Events View
    echo "This is where the Wiki will be displayed.";
  }
}

?>