<?php

/*
 * This is the index.php file
 * This file will be the first file served,
 *      the .htaccess file will also force all incoming requests through this file
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: September 28th, 2013
 */

// Initialize the Session
session_start();

// Connect to the MySql Database
mysql_connect($SQLHOST, $SQLUSER, $SQLPASS);
mysql_select_db($SQLDB);

?>
