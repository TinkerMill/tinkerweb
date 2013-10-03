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

// Include the Parent Framework Class
require_once("Framework.class.php");

class Gallery extends Framework{
  public function __construct(){
    // Load the Website's Header
    parent::loadHeader();
    
    // Determine what is being requested
    
    // Load the Footer
    parent::loadFooter();
  }
}

?>