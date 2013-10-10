<?php

/*
 * The purpose of this file is to define all secure passwords, api keys, etc...
 * 
 * This is an example config file. For this file to work, please rename it to config.php!!
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 2nd, 2013
 */


// ---------- MYSQL CONNECTION INFORMATION  ----------
$SQLHOST = "localhost";     // mySQL Host (usually localhost)
$SQLUSER = "username";      // mySQL Username
$SQLPASS = "password";      // mySQL Password
$SQLDB = "dbname";          // mySQL Database Name

// ---------- SSL (HTTPS) Information ----------
define(SSL, false);     // true = https  ;  false = http

// ---------- Features and URL Exceptions ----------
/*
 * exceptions is an associative array
 * The key should be the url slug you want it to catch
 *    ie. www.example.com/gallery/   => the key would be "gallery"
 * The value should be the class name stored in the classesFile
 *    ie. the Gallery class value would be Gallery
 *        the class would be in the Gallery.class.php file in the classes folder
 */
$ClassExceptions = array("gallery" => "Gallery", "blog" => "Blog", "forum" => "Forum", "wiki" => "Wiki", "calendar" => "Calendar", "equipment" => "Equipment");

// --------- BACKEND (Administration Panel) ----------
/*
 * Give your backend a url-slug that is unique to your website
 *    ie. admin-man, admin, backend, yo-bro-admin-man-sir
 * DO NOT USE CAPITALS, MUST BE LOWERCASE!!
 * 
 * Each class is assumed to have a backend panel. 
 * So, all classes defined above, are assumed to have at least one backend page.
 * Accessed as such:  www.example.com/backend-slug/gallery/
 *    The above example will call the Backend Page for the Gallery Class
 */
define(BACKEND, "backend");

?>
