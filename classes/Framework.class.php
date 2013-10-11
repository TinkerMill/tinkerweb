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
    if (mysql_result($page, 0, "type") == "page") {
      include(mysql_result($page, 0, "page"));
    } else if (mysql_result($page, 0, "type") == "content") {
      $template = mysql_result($page, 0, "ClassName");
      $this->$template($page);
    } else {
      print "An error has occured";
    }

    // Load the Footer
    $this->loadFooter();
  }

  // Loads the Header
  public function loadHeader() {
    include_once('../globals/layout/header.php');
  }

  // Loads the Footer
  public function loadFooter() {
    include_once('../globals/layout/footer.php');
  }

  // Display the Jumbotron Template Page with Content
  public function template_jumbotron($page) {
    echo '<div class="jumbotron">';
    echo '<div class="container">';
    echo '<h1>' . mysql_result($page, 0, "h1_title") . '</h1>';
    echo '<p>' . mysql_result($page, 0, "h1_content") . '</p>';
    echo '<p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>';
    echo '</div>';
    echo '</div>';

    echo '<div class="row">';
    echo '<div class="col-lg-4">';
    echo '<h2>' . mysql_result($page, 0, "h2_title1") . '</h2>';
    echo '<p>' . mysql_result($page, 0, "h2_content1") . '</p>';
    echo '<p><a class="btn btn-default" href="#">View details &raquo;</a></p>';
    echo '</div>';
    echo '<div class="col-lg-4">';
    echo '<h2>' . mysql_result($page, 0, "h2_title2") . '</h2>';
    echo '<p>' . mysql_result($page, 0, "h2_content2") . '</p>';
    echo '<p><a class="btn btn-default" href="#">View details &raquo;</a></p>';
    echo '</div>';
    echo '<div class="col-lg-4">';
    echo '<h2>' . mysql_result($page, 0, "h2_title3") . '</h2>';
    echo '<p>' . mysql_result($page, 0, "h2_content3") . '</p>';
    echo '<p><a class="btn btn-default" href="#">View details &raquo;</a></p>';
    echo '</div>';
    echo '</div>';
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

  public function constructBackend() {
    // Determine what is being requested
    // Load the Default Blog Page
    $this->displayBackend();
  }

  public function displayBackend() {
    // Displays the List Events View
    echo "This is where backend will be displayed.";
  }

}

?>
