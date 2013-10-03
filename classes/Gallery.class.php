<?php

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