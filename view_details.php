<!-- Includes the Session Manager -->
<?php include 'src/components/session_manager.php'; ?>
<?php include 'src/components/admin_session.php' ?>



<!-- Includes the Header Part -->
<?php include 'src/components/header1.php'; ?>
<link rel="stylesheet" href="src/css/details-style.css">
<?php include 'src/components/header2.php'; ?>


<div class="box-container">
    <!-- First Box -->
    <div class="box box1 orange-box" onclick="window.location.href='view_cities.php';">
        <div>
            <h2>Cities</h2>
            <?php
                if($_SESSION["login_user"]=="admin"){
                    echo "<p>Cities with active services</p>";
                }
                else{
                    echo "<p>View your current bookings here</p>";
                }
            ?>
        </div>
    </div>
    <div class="box box2 orange-box" onclick="window.location.href='view_languages.php';">
        <div>
            <h2>Languages</h2>
            <?php
                if($_SESSION["login_user"]=="admin"){
                    echo "<p>Supported Languages</p>";
                }
                else{
                    echo "<p>View your current bookings here</p>";
                }
            ?>
        </div>
    </div>
    <div class="box box1 green-box" onclick="window.location.href='view_quality.php';">
        <div>
            <h2>Qualities</h2>
            <?php
                if($_SESSION["login_user"]=="admin"){
                    echo "<p>Qualities Available</p></p>";
                }
                else{
                    echo "<p>View your current bookings here</p>";
                }
            ?>
        </div>
    </div>
    <div class="box box2 green-box" onclick="window.location.href='view_movies.php';">
        <div>
            <h2>Movies</h2>
            <?php
                if($_SESSION["login_user"]=="admin"){
                    echo "<p>Movies being shown</p>";
                }
                else{
                    echo "<p>View your current bookings here</p>";
                }
            ?>
        </div>
    </div>
</div>

<div class="filler"></div>

<!-- Includes the Footer Part -->
<?php include 'src/components/footer.php'; ?>