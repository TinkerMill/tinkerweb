<?php
/*
 * header.php file
 * This file will load the page until page specific content starts
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 10th, 2013 
 */

ob_start();



?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo SITETITLE; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="http://dev.tinkermill.org/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://dev.tinkermill.org/css/site.css" rel="stylesheet">

    <script src="http://dev.tinkermill.org/bootstrap/assets/js/jquery.js"></script>

    <!-- jQuery Validate 1.11.1 -->
    <script src="http://dev.tinkermill.org/jqueryvalidation/dist/jquery.validate.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><?php echo SITETITLE; ?></a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">

              <?php
              // Retrieve all NavBar Items from the Database ORDER BY `Order`
              $sql = "SELECT * FROM `navbar` WHERE `Location`='frontend' ORDER BY `Parent`,`Order`";
              $query = mysql_query($sql);
              
              $userPermissions = $this->getUserPermissions();

              for ($i = 0; $i < mysql_num_rows($query); $i++) {
                if (mysql_result($query, $i, "Parent") == 0) {
                  if (mysql_result($query, $i, "Dropdown") == 1) {
                    echo "<li class='dropdown'>";
                    echo '<a href="' . mysql_result($query, $i, "Link") . '" class="dropdown-toggle" data-toggle="dropdown">' . mysql_result($query, $i, "Name") . '</a>';
                    echo '<ul class="dropdown-menu">';
                      for($x=0; $x<mysql_num_rows($query); $x++){
                        if(mysql_result($query, $x, "Parent") == mysql_result($query, $i, "ID")){
                          
                          for($y=0; $y<mysql_num_rows($userPermissions); $y++){
                            if(mysql_result($query, $x, "Permissions") == 0 || mysql_result($query, $x, "Permissions") == mysql_result($userPermissions, $y, "pID"))
                            {
                              echo '<l1><a href="' . mysql_result($query, $x, "Link") . '">' . mysql_result($query, $x, "Name") . '</a></li>';
                              break;
                            }
                          }
                        }
                      }
                    echo '</ul>';
                    echo "</li>";
                  } else {
                    echo '<li><a href="' . mysql_result($query, $i, "Link") . '">' . mysql_result($query, $i, "Name") . '</a></li>';
                  }
                } else {
                  break;
                }
              }
              ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <?php if ($this->isUserLoggedIn()) { 
                $user = $this->getUser();
                ?>
                <li class='dropdown'>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user["Firstname"] . " " . $user["Lastname"]; ?></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Account Settings</a></li>
                    <li><a href="/logout/">Logout</a></li>
                  </ul>
                </li>
              <?php } else {
                ?>
                <li><a href="/login/">Login / Register</a></li>
              </ul>
              <?php } ?>
          </div><!--/.navbar-collapse -->
        </div>
      </div>


      <!-- Begin page content -->
      <div class="container">