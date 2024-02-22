<?php include 'src/components/session_manager.php' ?>

<?php include_once "src/components/db_connection.php" ?>

<?php include 'src/components/header1.php' ?>
<link rel="stylesheet" href="src/css/current-booking-style.css">
<?php include 'src/components/header2.php' ?>

<div class="container mt-5">
    <h2>Book Your Movie Tickets</h2>
    <form action="src/components/process_booking.php" method="POST">
        <div class="mb-3">
            <label for="city" class="form-label">Your Location:</label>
            <select class="form-select" id="city" name="city" required>
                <option value="">Select City</option>
                <?php
                // Assuming $conn is your database connection
                // Fetch cities from the database
                $query = "SELECT * FROM cities";
                $result = mysqli_query($conn, $query);

                // Loop through the results to generate options
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['city_name'] . "'>" . $row['city_name'] . "</option>";
                }
                ?>
            </select>
        </div>        

        <div class="mb-3">
            <label for="movie" class="form-label">Which Movie would you like to watch?</label>
            <select class="form-select" id="movie" name="movie" required>
                <option value="">Select Movie</option>
                <?php
                // Assuming $conn is your database connection
                // Fetch cities from the database
                $query = "SELECT * FROM movies";
                $result = mysqli_query($conn, $query);

                // Loop through the results to generate options
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['title'] . "'>" . $row['title'] . "</option>";
                }
                ?>
            </select>
        </div>        

        <div class="mb-3">
            <label for="language" class="form-label">Your Preferred Language:</label>
            <select class="form-select" id="language" name="language" required>
                <option value="">Select Language</option>
                <?php
                // Assuming $conn is your database connection
                // Fetch cities from the database
                $query = "SELECT * FROM languages";
                $result = mysqli_query($conn, $query);

                // Loop through the results to generate options
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="quality" class="form-label">Choose Quality:</label>
            <select class="form-select" id="quality" name="quality" required>
                <option value="">Select Quality</option>
                <?php
                // Assuming $conn is your database connection
                // Fetch cities from the database
                $query = "SELECT * FROM quality";
                $result = mysqli_query($conn, $query);

                // Loop through the results to generate options
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['type'] . "'>" . $row['type'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="movie_date" class="form-label">Please select a Date:</label>
            <input type="date" class="form-control" id="movie_date" name="movie_date" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include 'src/components/footer.php' ?>