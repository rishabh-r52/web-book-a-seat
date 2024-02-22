<?php
// Replace these values with your database credentials
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "movie_ticket_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement based on option selected
$option = $_POST['option'];

if ($option === 'cities') {
    $stmt = $conn->prepare("INSERT INTO cities (city_name) VALUES (?)");
    $stmt->bind_param("s", $data);
    $data = $_POST['data'];
}
elseif ($option === 'languages') {
    $stmt = $conn->prepare("INSERT INTO languages (name) VALUES (?)");
    $stmt->bind_param("s", $data);
    $data = $_POST['data'];
} 
elseif ($option === 'quality') {
    $stmt = $conn->prepare("INSERT INTO quality (type) VALUES (?)");
    $stmt->bind_param("s", $data);
    $data = $_POST['data'];
}
elseif ($option === 'movies') {
    $stmt = $conn->prepare("INSERT INTO movies (title, release_date) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $release_date);
    $title = $_POST['movie_name'];
    $release_date = $_POST['release_date'];
}

// Execute SQL statement
$stmt->execute();

// Close connection
$stmt->close();
$conn->close();

// Redirect back to the form page
header("Location: ../../movies.php");
exit();
?>