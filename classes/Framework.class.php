<?php
/*
 * This is the Framework Class
 * This class will be the core functionality of the entire website
 * To include loading the site layout.
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 14th, 2013 
 */

class Framework {

  public $user = array();

  // __construct
  // Loads the Core Framework
  public function __construct($page) {
    // This __construct() class loads a standard page.
    // Load the Header
    $this->loadHeader();

    // Load the Content
    if (mysql_result($page, 0, "type") == "page") {
      include(mysql_result($page, 0, "page"));
    } else if (mysql_result($page, 0, "type") == "content") {
      $template = mysql_result($page, 0, "ClassName");
      $this->$template($page);
    } else {
      print "An error has occured";
    }

    // Load the Footer
    $this->loadFooter();
  }

  // Loads the Header
  public function loadHeader() {
    include_once('../globals/layout/header.php');
  }

  // Loads the Backend Header
  public function loadBackendHeader() {
    include_once("../globals/layout/backend_header.php");
  }

  // Loads the Footer
  public function loadFooter() {
    include_once('../globals/layout/footer.php');
  }

  public function getUser() {
    GLOBAL $user;
    return $user;
  }
  public function getUserID(){
    GLOBAL $user;
    return $user["ID"];
  }

  // Check's to see if a User Has Permission
  // Variables:
  //  $user = user ID
  //  $level = permission Name
  public function hasPermission($user, $level) {
    $sql = "SELECT * FROM `permission_access` INNER JOIN `permissions` ON `permissions_access`.`pID`=`permissions`.`Name` WHERE `permissions_access`.`uID`='" . $user . "' AND `permissions`.`Name`='" . $level . "'";
  }

  // Display the Jumbotron Template Page with Content
  public function template_jumbotron($page) {
    echo '<div class="jumbotron">';
    echo '<div class="container">';
    echo '<h1>' . mysql_result($page, 0, "h1_title") . '</h1>';
    echo '<p>' . mysql_result($page, 0, "h1_content") . '</p>';
    echo '<p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>';
    echo '</div>';
    echo '</div>';

    echo '<div class="row">';
    echo '<div class="col-lg-4">';
    echo '<h2>' . mysql_result($page, 0, "h2_title1") . '</h2>';
    echo '<p>' . mysql_result($page, 0, "h2_content1") . '</p>';
    echo '<p><a class="btn btn-default" href="#">View details &raquo;</a></p>';
    echo '</div>';
    echo '<div class="col-lg-4">';
    echo '<h2>' . mysql_result($page, 0, "h2_title2") . '</h2>';
    echo '<p>' . mysql_result($page, 0, "h2_content2") . '</p>';
    echo '<p><a class="btn btn-default" href="#">View details &raquo;</a></p>';
    echo '</div>';
    echo '<div class="col-lg-4">';
    echo '<h2>' . mysql_result($page, 0, "h2_title3") . '</h2>';
    echo '<p>' . mysql_result($page, 0, "h2_content3") . '</p>';
    echo '<p><a class="btn btn-default" href="#">View details &raquo;</a></p>';
    echo '</div>';
    echo '</div>';
  }

  // Returns the Home URL (ie. https://www.tinkermill.org)

  public function rootURL() {
    if (SSL == true) {
      $URL = "https://";
    } else {
      $URL = "http://";
    }
    $URL .= $_SERVER['HTTP_HOST'];
    return $URL;
  }

  // Returns the rootURL (the url the user is sitting at)
  public function currentURL() {
    if (SSL == true) {
      $URL = "https://";
    } else {
      $URL = "http://";
    }
    $URL .= $_SERVER['HTTP_HOST'] . $DIRECTORY . "/";
    return $URL;
  }

  public function constructBackend() {
    // Determine what is being requested
    // Load the Default Blog Page
    $this->displayBackend();
  }

  public function displayBackend() {
    // Displays the List Events View
    echo "This is where backend will be displayed.";
  }

  public function encryptpassword($str) {
    $salt_one = "0123456789abcdefghijklmnopqrstuvwxyz!^#@*&(%)$";
    $salt_two = "@#$@$%&#$@#$%@SDFGW#KGSDOEKSDFGAWO#@)^wergsd";
    $pwd = md5($salt_one);
    $pwd .= md5($str);
    $pwd .= md5($salt_two);
    $pwd = sha1($pwd);
    return $pwd;
  }

  public function makeHash() {
    $ua = str_replace(' ', '', strtolower($_SERVER['HTTP_USER_AGENT']));
    $ri = $_SERVER['REMOTE_ADDR'];
    $rand = bin2hex(openssl_random_pseudo_bytes(rand(5, 20)));
    $hash = $ua . $rand . $ri;
    return substr($hash, 0, 255);
  }

  public function setLoginCookie($user) {
    $hash = $this->makeHash();
    setcookie(SITETITLE . "_login", $hash, time() + 86400, "/");

    $sql = "UPDATE `users` SET `Hash` = '" . $hash . "' WHERE `Email` = '" . $user . "'";
    mysql_query($sql);
  }

  public function isUserLoggedIn() {
    $cookieName = SITETITLE . "_login";
    if (isset($_COOKIE[$cookieName])) {
      $hash = $_COOKIE[$cookieName];
      $sql = "SELECT * FROM `users` WHERE `hash`='" . $hash . "'";
      $result = mysql_query($sql);

      if (mysql_num_rows($result) > 0) {
        $user_temp = mysql_fetch_array($result);
        GLOBAL $user;
        $user = $user_temp;
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function LogIn($user, $pass) {
    $password = $this->encryptpassword($pass);

    $Spass = "SELECT `Password`,`Username`, `Position` FROM `users` WHERE `Email`='" . $user . "'";
    $Opass = mysql_query($Spass);

    if ($password == mysql_result($Opass, 0, "Password") && mysql_result($Opass, 0, "Position") != "DISABLED") {
      // Set the Login Cookie
      $this->setLoginCookie($user);
      echo "<div class='alert alert-success'>Logged In Successfully!</div>";
      ?> <script>location.assign("<?php echo $this->rootURL(); ?>");</script> <?php
    } else if (mysql_result($Opass, 0, "Position") == "DISABLED") {
      echo "<div class='alert alert-danger'>Account Disabled. Contact the Webmaster @ info@tinkermill.org</div>";
    } else {
      echo "<div class='alert alert-danger'>Login Failed. Incorrect Username/Password</div>";
    }

    echo "<br /><br />";
  }
  
  // Seeing If User Had Permission
  // Variables : 
  //    $userID = The User's ID
  //    $featureID = the feature Name
  //    $permission = the feature permission name
  public function featureHasPermission($userID, $feature, $permission) {
    $sql = "SELECT * FROM `permissions_access` INNER JOIN `permissions` ON `permissions_access`.`pID`=`permissions`.`ID` INNER JOIN `features` ON `permissions`.`featureID`=`features`.`ID` WHERE `features`.`Name`='" . $feature . "' AND `permissions_access`.`uID`='" . $userID . "'";
    if($permission != "%"){
      $sql .= "AND `permissions`.`featurePname`='" . $permission . "'";
    }
    $result = mysql_query($sql);

    if (mysql_num_rows($result) > 0) {
      return true;
    } else {
      return false;
    }
  }
  
  public function forceHome(){
    $location = $this->rootURL();
    header("Location: $location");
    die();
  }

}
?>
