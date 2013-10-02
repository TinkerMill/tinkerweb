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

include('../classes/Framework.class.php');

new Framework();

?>