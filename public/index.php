<?php

/*
 * This is the index.php file
 * This file will be the first file served,
 *      the .htaccess file will also force all incoming requests through this file
 * 
 * This file will:
 * 1.) Determine the Requested URL
 * 2.) Get the Requested URL from the database &
 * 3.) Determine What needs to get loaded
 * 4.) Load the Page
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 2nd, 2013 
 */

// Require the Config and Vars files
require_once("../globals/config/config.php");
require_once("../globals/config/vars.php");

// Load the Database
mysql_connect($SQLHOST, $SQLUSER, $SQLPASS);
mysql_select_db($SQLDB);

$url = "/";
if ($_SERVER["REDIRECT_URL"] != "") {
  $url = $_SERVER["REDIRECT_URL"];
}
define(URL, $url);

$urlExploded = explode("/", $url);
if (array_key_exists($urlExploded[1], $ClassExceptions)) {
  // An Exception Exists, load the Class for that Page
  require("../classes/Gallery.class.php");
  new Gallery();
} else {
  // No Exceptions Exist, Check if page exists in the database
}

?>