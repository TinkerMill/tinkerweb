<?php

/*
 * Blog Class
 * This file will ... 
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 9th, 2013 
 */

// Include the Parent Framework Class
require_once("Backend.class.php");

class BackendBlog extends Backend{
  public function __construct(){
    
      // Load the Default Blog Page
      $this->listPosts();

  }
  
  public function listPosts(){
    // Displays the List Events View
    echo "This is where blog posts will be listed from the Backend.";
  }
}

?>
