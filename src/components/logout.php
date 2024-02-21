<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Alert message to be displayed
$message = "Logged Out!";
// Generate JavaScript code to display the alert and reload the page
echo "<script type='text/javascript'>alert('$message'); window.location.href = '../../index.php';</script>";

exit();
?>
