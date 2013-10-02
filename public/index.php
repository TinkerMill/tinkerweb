<?php

/*
 * This is the index.php file
 * This file will be the first file served,
 *      the .htaccess file will also force all incoming requests through this file
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 2nd, 2013 
 */

// Initialize the Session
session_start();

// Require config.php (Secure website config info)
require_once '../globals/config/config.php';

// Require vars.php (Nonsecure Website Variables)
require_once '../globals/config/vars.php';

// Connect to the MySql Database
mysql_connect($SQLHOST, $SQLUSER, $SQLPASS);
mysql_select_db($SQLDB);



?>