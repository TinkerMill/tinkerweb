<?php

/*
 * logout.php
 * This file will log the user out.
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 14th, 2013 
 */

if($this->isUserLoggedIn())
{
  GLOBAL $user;
  $sql = "UPDATE `users` SET `Hash`='Logged Out' WHERE `ID`='" . $user["ID"] . "'";
  mysql_query($sql);
}

$this->forceHome();

?>
