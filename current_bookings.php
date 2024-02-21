<?php include 'src/components/session_manager.php' ?>

<?php

// Include database connection file
include_once "src/components/db_connection.php";

$user_name = $_SESSION['login_user'];

// Query to fetch data from the bookings table
if($user_name=="admin"){
    $sql = "SELECT * FROM bookings";
}
else{
    $sql = "SELECT * FROM bookings where user_name='$user_name' ";
}

$result = $conn->query($sql);
?>

<?php include 'src/components/header1.php' ?>
<link rel="stylesheet" href="src/css/current-booking-style.css">
<?php include 'src/components/header2.php' ?>

<div class="movies-header">
    MOVIES
</div>

<div class="container mt-5">
    <h1 class="text-center">Current Bookings</h1>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>User</th>
                    <th>Movie</th>
                    <th>City</th>
                    <th>Language</th>
                    <th>Quality</th>
                    <th>Movie Date</th>
                    <th>Date of Booking</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['booking_id'] . "</td>";
                        echo "<td>" . $row['user_name'] . "</td>";
                        echo "<td>" . $row['movie_name'] . "</td>";
                        echo "<td>" . $row['city_name'] . "</td>";
                        echo "<td>" . $row['language'] . "</td>";
                        echo "<td>" . $row['quality_type'] . "</td>";
                        echo "<td>" . $row['date_of_show'] . "</td>";
                        echo "<td>" . $row['date_of_booking'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No bookings found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'src/components/footer.php' ?>
