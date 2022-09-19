<?php
if (isset($_SESSION['user_data'])) {
  if (isset($_POST['submit-logout'])) {

    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    //redirect to login
    // http://inventory.campusweekly.info/pages/login/login.php
    // header("Location:https://inventorygroup3.herokuapp.com/pages/login/login.php");
    // /pages/users/users.php
    header("Location:http://localhost/totco_web/pages/login/login.php");
    die;
  }
} else {
  //already logged in

}
