<?php

/*
 * index.php
 * 
 * This is the heart of the website. Every page request (that is not an actual file on the server) 
 * starts here. This page is responsible for determing what is being requested, permissions, and how to load it.
 * 
 * Author: @codydaig 
 * 
 * Last Modified: October 22, 2013
 */



// Determine the page being requested
$url = "/";
if ($_SERVER["REDIRECT_URL"] != "") {
$url = $_SERVER["REDIRECT_URL"];
}

print $url;
?>