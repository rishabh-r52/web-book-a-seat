<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['login_user'])) {
    // Redirect them back to the login page
    header("Location: index.php");
    exit(); // Stop further execution of the script
}

// Include database connection
include_once "db_connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $username = $_SESSION['login_user'];
    $movie = mysqli_real_escape_string($conn, $_POST['movie']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $language = mysqli_real_escape_string($conn, $_POST['language']);
    $quality = mysqli_real_escape_string($conn, $_POST['quality']);
    $booking_date = date("Y-m-d");
    $movie_date = mysqli_real_escape_string($conn, $_POST['movie_date']);

    // Insert data into the bookings table
    $query = "INSERT INTO bookings (user_name, movie_name, city_name, language, quality_type, date_of_booking, date_of_show) 
              VALUES ('$username', '$movie', '$city', '$language', '$quality', '$booking_date', '$movie_date')";
    
    if (mysqli_query($conn, $query)) {
        // Booking successful

        // Alert message to be displayed
        $message = "Booking Successful!";
        // Generate JavaScript code to display the alert and reload the page
        echo "<script type='text/javascript'>alert('$message'); window.location.href = '../../movies.php';</script>";

    } else {
        // Error in booking
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    // Close database connection
    mysqli_close($conn);
}
?>