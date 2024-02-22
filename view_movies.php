<?php include 'src/components/session_manager.php' ?>
<?php include 'src/components/admin_session.php' ?>

<?php

// Include database connection file
include "src/components/db_connection.php";

$user_name = $_SESSION['login_user'];

// Query to fetch data from the cities table
$sql = "SELECT * FROM movies ORDER BY id ASC";

$result = $conn->query($sql);
?>

<?php include 'src/components/header1.php' ?>
<link rel="stylesheet" href="src/css/current-booking-style.css">
<?php include 'src/components/header2.php' ?>

<div class="movies-header">
    EXISTING DETAILS
</div>

<div class="container col-md-4 mt-5 mx-auto">
    <h1 class="text-center">Movies</h1>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Movie Title</th>
                    <th>Release Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['release_date'] . "</td>";
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
