<?php

/*
 * header.php file
 * This file will load the page until page specific content starts
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 10th, 2013 
 */

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
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form id="topbarLogin" class="navbar-form navbar-right" method="get" action="/login/">
            <div class="form-group">
              <input type="email" placeholder="Email" class="form-control" required />
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" required />
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
      
      <script>
$("#topbarLogin").validatee({
  submitHandler: function(form) {
    // do other things for a valid form
    form.submit();
  }
});
</script>

      <!-- Begin page content -->
      <div class="container">