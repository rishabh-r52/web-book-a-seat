<?php
    include_once 'db_connection.php';

    // Assuming you have received the username value from a POST request
    if(isset($_POST['username'])) {
        $username_input = $_POST['username'];
        
        if($username_input == "admin"){
            // Alert message to be displayed
            $message = "You can't delete the administrator!";
            // Generate JavaScript code to display the alert and reload the page
            echo "<script type='text/javascript'>alert('$message'); window.location.href = '../../home.php';</script>";
            exit();
        }
        else{
        
            // Delete entries from the Bookings table where username matches
            $sql_bookings = "DELETE FROM Bookings WHERE user_name = ?";
            $stmt_bookings = $conn->prepare($sql_bookings);
            $stmt_bookings->bind_param("s", $username_input);
            $stmt_bookings->execute();
            $stmt_bookings->close();
        
            // Delete entries from the Users table where username matches
            $sql_users = "DELETE FROM Users WHERE username = ?";
            $stmt_users = $conn->prepare($sql_users);
            $stmt_users->bind_param("s", $username_input);
            $stmt_users->execute();
            $stmt_users->close();
        
            // Close connection
            $conn->close();
        
            $message = "Entry deleted successfully!";
            echo "<script type='text/javascript'>alert('$message'); window.location.href = '../../home.php';</script>";
            exit();
        }

    } 
    else {
        echo "No username provided.";
    }

?>