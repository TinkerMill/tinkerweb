<?php

require_once("Framework.class.php");

class Gallery extends Framework{
  public function __construct(){
    $this->yayme();
  }
  public function yayme(){
    echo "Yay Me!!!<br />";
    echo $this->rootURL();
  }
}

?>