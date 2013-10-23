<?php

/*
 * index.php
 * 
 * This is the heart of the website. Every page request (that is not an actual file on the server) 
 * starts here. This page is responsible for determing what is being requested, permissions, and how to load it.
 * 
 * @author: Cody B. Daig - cody@daig.me 
 * 
 * Last Modified: October 22, 2013
 */

// Require the Config and Vars files
require_once("../globals/config/config.php");
// require_once("../globals/config/vars.php");
// Create MySql Connection
$con = mysqli_connect($SQLHOST, $SQLUSER, $SQLPASS, $SQLDB);

// Check connection
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL! Fatal Error. Please try again later, or contact webmaster@tinkermill.org";
    die();
}

// Determine the page being requested
$url = "/";
if ($_SERVER["REDIRECT_URL"] != "") {
    $url = $_SERVER["REDIRECT_URL"];
}

// See if the Page exists in the Database
$sql = "SELECT * FROM `pages` WHERE `URL`='" . $url . "'";
$result = mysqli_query($con, $sql);
if ($mysqli->connect_errno) {
    // Something Happened
    echo "Failed to Query the Database. Please try again later, or contact webmaster@tinkermill.org";
    die();
} else if (mysqli_num_rows($result) > 0) {
    $page = mysqli_fetch_array($result);
} else {
    // No Page Was Found, Load the 404 page
}

// Close the Database Connection
mysqli_close($con);
?>