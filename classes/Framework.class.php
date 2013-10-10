<?php

/*
 * This is the Framework Class
 * This class will be the core functionality of the entire website
 * To include loading the site layout.
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 9th, 2013 
 */

class Framework {

  // __construct
  // Loads the Core Framework
  public function __construct($page) {
    // This __construct() class loads a standard page.
    // Load the Header
    $this->loadHeader();
    
    // Load the Content
    if(mysql_result($page, 0, "type") == "page")
    {
      include(mysql_result($page, 0, "page"));
    }
    else if(mysql_result($page, 0, "type") == "content")
    {
      print mysql_result($page, 0, "content");
    }
    else
    {
      print "An error has occured";
    }
    
    // Load the Footer
    $this->loadFooter();
  }
  
  // Loads the Header
  public function loadHeader(){
    include_once('../globals/layout/header.php');
  }
  
  // Loads the Footer
  public function loadFooter(){
    include_once('../globals/layout/footer.php');
  }
  
  // Returns the URL
  public function rootURL() {
    if (SSL == true) {
      $URL = "https://";
    } else {
      $URL = "http://";
    }
    $URL .= $_SERVER['HTTP_HOST'] . $DIRECTORY . "/";
    return $URL;
  }
  
  
  
  
  
  public function constructBackend(){
    // Determine what is being requested
      // Load the Default Blog Page
      $this->displayBackend();
  }
  
  public function displayBackend(){
    // Displays the List Events View
    echo "This is where backend will be displayed.";
  }

}

?>
