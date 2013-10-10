<?php

/*
 * Forum Class
 * This file will ... 
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 9th, 2013 
 */

// Include the Parent Framework Class
require_once("Framework.class.php");

class Forum extends Framework{
  public function __construct(){
    // Load the Website's Header
    parent::loadHeader();
    
    // Determine what is being requested
    if(URL == "/forum/")
    {
      // Load the Default Blog Page
      $this->showForum();
    }
    
    // Load the Footer
    parent::loadFooter();
  }
  
  public function showForum(){
    // Displays the List Events View
    echo "This is where the Forum will be displayed.";
  }
}

?>
