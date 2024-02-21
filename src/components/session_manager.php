<?php
  session_start();
  
  // Check if the user is not logged in
  if (!isset($_SESSION['login_user'])) {
      // Redirect them back to the login page
      header("Location: index.php"); 
      exit(); // Stop further execution of the script
  }
?>