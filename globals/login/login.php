<?php
/*
 * login.php file
 * This file will show a page to login or log the user in if this was submitted.
 * 
 * @author Cody B. Daig
 * 
 * Last Modified: October 14th, 2013 
 */

if($this->isUserLoggedIn())
{
  ?> <script>location.assign("<?php echo $this->rootURL(); ?>");</script> <?php
  die();
}

if($_POST["email"] != "" && $_POST["password"] != "")
{
  $this->logIn($_POST["email"], $_POST["password"]);
}



?>

<form id="login" class="form-signin" method="post" action="/login/">
  <h2 class="form-signin-heading">Please sign in</h2>
  <input name="email" type="email" id="in-page-login" class="form-control" placeholder="Email address" autofocus required>
  <input name="password" type="password" class="form-control" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>

<script>
$("#login").validate({
  submitHandler: function(form) {
    // do other things for a valid form
    form.submit();
  }
});
</script>

