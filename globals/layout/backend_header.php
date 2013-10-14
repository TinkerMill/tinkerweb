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

$user = $this->getUser();
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo SITETITLE . " Backend"; ?></title>

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
      <div class="navbar navbar navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/tinker-man/"><?php echo SITETITLE . " Backend"; ?></a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">

              <?php
              // Retrieve all NavBar Items from the Database ORDER BY `Order`
              $sql = "SELECT * FROM `navbar` WHERE `Location`='backend' ORDER BY `Parent`,`Order`";
              $query = mysql_query($sql);

              for ($i = 0; $i < mysql_num_rows($query); $i++) {
              
                echo "<li class='dropdown'>";
                echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . '</a>';
                echo "</li>";
              }
              ?>
            </ul>
              <ul class="nav navbar-nav navbar-right">
                <?php if ($this->isUserLoggedIn()) { ?>
                  <li><a href="#">Cody B. Daig</a></li>
                <?php } else {
                  ?>
                  <li><a href="/login/">Please Login!</a></li>
                </ul>
              <?php } ?>
          </div>
        </div>
      </div>


      <!--Begin page content-->
      <div class = "container">

