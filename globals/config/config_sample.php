<?php

/*
 * The purpose of this file is to define all secure passwords, api keys, etc...
 * 
 * This is an example config file. For this file to work, please rename it to config.php!!
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: Sept. 28, 2013
 */


// ---------- MYSQL CONNECTION INFORMATION  ----------
$SQLHOST = "localhost";     // mySQL Host (usually localhost)
$SQLUSER = "username";      // mySQL Username
$SQLPASS = "password";      // mySQL Password
$SQLDB = "dbname";          // mySQL Database Name

// ---------- SSL (HTTPS) Information ----------
$SSL = false;     // true = https  ;  false = http

// ---------- Features and URL Exceptions ----------
/*
 * exceptions is an associative array
 * The key should be the url slug you want it to catch
 *    ie. www.example.com/gallery/   => the key would be "gallery"
 * The value should be the class name stored in the classesFile
 *    ie. the Gallery class value would be Gallery
 *        the class would be in the Gallery.class.php file in the classes folder
 */
$ClassExceptions = array("gallery" => "Gallery", "blog" => "Blog", "forum" => "Forum");

?>
