<?php
  if($_SESSION['login_user']!="admin"){
    header("Location: home.php"); 
    exit(); // Stop further execution of the script
  }
?>