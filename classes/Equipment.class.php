<?php

/*
 * Equipment Class
 * This file will ... 
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 9th, 2013 
 */

// Include the Parent Framework Class
require_once("Framework.class.php");

class Equipment extends Framework{
  public function __construct(){
    // Load the Website's Header
    parent::loadHeader();
    
    // Determine what is being requested
    if(URL == "/equipment/")
    {
      // Load the Default Blog Page
      $this->showEquipment();
    }
    
    // Load the Footer
    parent::loadFooter();
  }
  
  public function showEquipment(){
    // Displays the List Events View
    echo "This is where the Equipment will be displayed.";
  }
}

?>
