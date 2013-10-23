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
$sql = "SELECT `pages`.*, `template`.* FROM `pages` INNER JOIN `template` ON `pages`.`Template`=`template`.`ID` WHERE `URL`='" . $url . "'";
$result = mysqli_query($con, $sql);
if ($mysqli->connect_errno) {
    // Something Happened and we could not query the database properly
    echo "Failed to Query the Database. Please try again later, or contact webmaster@tinkermill.org";
    die();
} else if (mysqli_num_rows($result) > 0) {
    $page = mysqli_fetch_array($result);

    $pID = $page["pID"];
    $hash = "hash1234";
    if ($pID != 0) {
        $sql = "SELECT * FROM users";
        if ($pID > 0) {
            $sql .= " INNER JOIN permissions_access ON users.ID=permissions_access.uID";
        }
        $sql .= " WHERE users.Hash='" . $hash . "'";
        if ($pID > 0) {
            $sql .= " AND permissions_access.pID=$pID";
        }
        $permission = mysqli_query($con, $sql);
        if (mysqli_num_rows($permission) <= 0) {
            // Permission Denied
            die("Permission Denied");
        }
    }

    // Include the Header
    $headerFile = "../" . $page["headerFile"];
    include($headerFile);

        // Require the Class File
        $classFile = "../" . $page["ClassFile"];
        require_once($classFile);
        // Initiate the Class
        $class = new $page["ClassName"]();
        // Call the Page Function
        $class->$page["Function"]();

    // Include the Footer
    $footerFile = "../" . $page["footerFile"];
    include($footerFile);
} else {
    // No Page Was Found, Load the 404 page
}

// Close the Database Connection
mysqli_close($con);
?>