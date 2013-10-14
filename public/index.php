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
 * Last Modified: October 9th, 2013 
 */

// Require the Config and Vars files
require_once("../globals/config/config.php");
require_once("../globals/config/vars.php");

// Load the Database
mysql_connect($SQLHOST, $SQLUSER, $SQLPASS);
mysql_select_db($SQLDB);

// Get the Requested URL
$url = "/";
if ($_SERVER["REDIRECT_URL"] != "") {
  $url = $_SERVER["REDIRECT_URL"];
}
define(URL, $url);

// Start the SQL statement
$sql = "SELECT * FROM `features` WHERE `slug`='";

// Determine if the backend is being requested
$urlExploded = explode("/", $url);
if ($urlExploded[1] == BACKEND) {
  // Set Backend to True
  define(BACKEND_ENABLED, true);
  $sql .= $urlExploded[2];
  // Determine if a specific backend class is being requested
  // If not, load the generic Backend Page
  /*if (!array_key_exists($urlExploded[2], $ClassExceptions)) {
    require("../classes/Framework.class.php");
    new Framework();
  }*/
}
else
{
  define(BACKEND_ENABLED, false);
  $sql .= $urlExploded[1];
}

$sql .= "'";
$result = mysql_query($sql);
echo $sql;
$page = mysql_fetch_array($result);

if (mysql_num_rows($result) > 0) {
  require("../" . $page["ClassFile"]);
  new $page["ClassName"]();
} else {
  // No Exceptions Exist, Check if page exists in the database 
  $sql = "SELECT `pages`.*, `page_templates`.`ClassName` FROM `pages` LEFT JOIN `page_templates` ON `pages`.`template`=`page_templates`.`ID` WHERE `path`='" . $url . "'";
  $page = mysql_query($sql);
  echo mysql_error();
  if (mysql_num_rows($page) > 0) {
    // The Page Exists in the Database - Load the Page Accordingly
    require_once '../classes/Framework.class.php';
    new Framework($page);
  } else {
    // Page Not Found
    // Display 404
    echo "<p>Whoa...... This page, like, doesn't exist anymore.</p>";
  }
}
?>