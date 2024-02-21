<?php include 'session_manager.php' ?>

<?php

// Get the current username from the session
$current_username = $_SESSION["login_user"];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "movie_ticket_booking";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch user's current password from the database based on the logged-in user
    $current_password_query = "SELECT password FROM users WHERE username = '$current_username'";
    $result = $conn->query($current_password_query);

    if ($result->num_rows > 0) {
        // Fetching password from the database
        $row = $result->fetch_assoc();
        $stored_password = $row["password"];
        
        // Fetching form data
        $current_password = $_POST["current_password"];
        $new_password = $_POST["new_password"];
        $confirm_password = $_POST["confirm_password"];
        
        // Validating passwords
        if ($current_password == $stored_password && $new_password == $confirm_password) {
            // Update password in the database
            $update_password_query = "UPDATE users SET password = '$new_password' WHERE username = '$current_username'";
            if ($conn->query($update_password_query) === TRUE) {
                echo "Password updated successfully";
                header("Location: ../../settings.php");
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            echo "Current password or new passwords do not match.";
        }
    } else {
        echo "No user found with the provided username.";
    }

    $conn->close();
}

?>
