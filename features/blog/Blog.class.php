<?php
/*
 * Blog Class
 * This file will ... 
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 14th, 2013 
 */

// Include the Parent Framework Class
require_once("../classes/Framework.class.php");

class Blog extends Framework {

  public $name = "Blog";

  public function __construct() {
    if (BACKEND_ENABLED == true && parent::isUserLoggedIn()) {
      $this->constructBackend();
    } else {
      // Load the Website's Header
      parent::loadHeader();

      // Determine what is being requested
      if (URL == "/blog/") {
        // Load the Default Blog Page
        $this->listPosts();
      } else {
        // Whoa... Something hapened
        echo "Ths page you requested is not a valid page.";
      }

      // Load the Footer
      parent::loadFooter();
    }
  }

  public function listPosts() {
    $post_query = $this->getPosts();

    echo "<h1>Blog</h1>";

    for ($b = 0; $b < mysql_num_rows($post_query); $b++) {
      ?>

      <div class="blog_post">
        <div class="blog_title"><h2><a href="post/?id=<?php echo mysql_result($post_query, $b, "ID") ?>"><?php echo mysql_result($post_query, $b, "Title") ?></a>
            <br /><small><?php echo "by: " . mysql_result($post_query, $b, "Firstname") . " on: " . date("l, F d, Y", strtotime(mysql_result($post_query, $b, "DateTime"))) . " ~ filed under: " . mysql_result($post_query, $b, "Name") ?></small></h2></div>
        <p><?php echo mysql_result($post_query, $b, "Content") ?></p>
        <div class="blog_info">-- <a href="post/?id=<?php echo mysql_result($post_query, $b, "ID") ?>">Comments</a> --</div>
      </div>
      <?php
    }
  }

  public function getPosts() {
    $sql = "SELECT blog_posts.*, users.Firstname, users.Lastname, blog_categories.Name  FROM blog_posts INNER JOIN users ON blog_posts.Author=users.ID INNER JOIN blog_categories ON blog_posts.Category=blog_categories.ID WHERE Status='Published' ORDER BY DateTime DESC LIMIT 0 , 30";
    $post_query = mysql_query($sql);
    return $post_query;
  }

  public function constructBackend() {
    GLOBAL $user;
    // GLOBAL $name;
    $id = $user["ID"];
    $url = str_replace("/" . BACKEND, "", URL);

    // Load the Backend Header
    include_once("../globals/layout/backend_header.php");

    print parent::featureHasPermission($id, $name, "Admin");

    // Determine Requested Page
    if ($url == "/blog/") {
      if (parent::featureHasPermission($id, $this->name, "Admin")) {
        // Load the Default Page
        echo "<h1>Congrats! Your a Blog Admin.</h1>";
      }
    } else if ($url == "/blog/new/") {
      if (parent::featureHasPermission($id, $this->name, "NewPost")) {
      echo "<h1>Create a New Blog Post</h1>";
      $this->postForm(0);
      
    }}
    else if (parent::featureHasPermission($id, $name, "%")) {
      echo "Whoa.... Page Not Found.....";
    }
    else
    {
      parent::forceHome();
    }
  }
  
  public function postForm($id){
    if($id > 0)
    {
      $sql = "SELECT * FROM `blog_posts` WHERE `ID`='" . $id . "'";
      $post = mysql_query($post);
    }
    echo '<form action="" method="post" class="class="form-horizontal" role="form">';
    echo '<div class="form-group">';
      echo '<label class="col-lg-2 control-label" for="exampleInputEmail2">Post Title</label>';
      echo '<input type="text" class="form-control" id="exampleInputEmail2" placeholder="Post Title">';
    echo '</div>';
    echo '<div class="form-group">';
      echo '<label class="col-lg-2 control-label" for="exampleInputEmail2">Slug</label>';
      echo '<input type="text" class="form-control" id="exampleInputEmail2" value="sluggoeshere" placeholder="slug">';
    echo '</div>';
    echo '<div class="form-group">';
      echo '<label class="col-lg-2 control-label" for="exampleInputEmail2">Author</label>';
      echo '<input type="text" class="form-control" id="exampleInputEmail2" value="sluggoeshere" placeholder="slug">';
    echo '</div>';
    echo '<div class="form-group">';
      echo '<label class="col-lg-2 control-label" for="exampleInputEmail2">Category</label>';
      echo '<input type="text" class="form-control" id="exampleInputEmail2" value="sluggoeshere" placeholder="slug">';
    echo '</div>';
    echo '<div class="form-group">';
      echo '<label class="col-lg-2 control-label" for="exampleInputEmail2">DateTime</label>';
      echo '<input type="text" class="form-control" id="exampleInputEmail2" value="sluggoeshere" placeholder="slug">';
    echo '</div>';
    echo '<div class="form-group">';
      echo '<label class="col-lg-2 control-label" for="exampleInputEmail2">Status</label>';
      echo '<input type="text" class="form-control" id="exampleInputEmail2" value="sluggoeshere" placeholder="slug">';
    echo '</div>';
    echo '<div class="form-group">';
      echo '<label class="col-lg-2 control-label" for="exampleInputEmail2">Content</label>';
      echo '<input type="text" class="form-control" id="exampleInputEmail2" value="sluggoeshere" placeholder="slug">';
    echo '</div>';
    echo '</form>';
  }

  public function backendDefaultPage() {
    parent::loadBackendHeader();
  }

}
?>
