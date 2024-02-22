<?php include 'src/components/session_manager.php' ?>

<?php include 'src/components/header1.php' ?>
<link rel="stylesheet" href="src/css/movies-style.css">
<?php include 'src/components/header2.php' ?>

<div class="movies-header">
    MOVIES
</div>

<!-- Movies content -->
<div class="box-container">
    <!-- First Box -->
    <div class="box" onclick="window.location.href='current_bookings.php';">
        <div>
            <h2>Current Bookings</h2>
            <?php
                if($_SESSION["login_user"]=="admin"){
                    echo "<p>View all the current bookings here</p>";
                }
                else{
                    echo "<p>View your current bookings here</p>";
                }
            ?>
        </div>
    </div>
    
    <!-- Second Box -->
    <?php 
        if($_SESSION["login_user"]=="admin"){
            echo " <div class=\"box\" onclick=\"window.location.href='add_details.php';\"> ";
            echo " <div> ";
            echo "    <h2>Add Details</h2> ";
            echo "    <p>Add more options for Users!</p> ";
            echo " </div> ";
            echo " </div> ";

            echo " <div class=\"box\" onclick=\"window.location.href='view_details.php';\"> ";
            echo " <div> ";
            echo "    <h2>View Details</h2> ";
            echo "    <p>View existing User options!</p> ";
            echo " </div> ";
            echo " </div> ";
        }
        else{
            echo " <div class=\"box\" onclick=\"window.location.href='new_bookings.php';\"> ";
            echo " <div> ";
            echo "    <h2>New Bookings</h2> ";
            echo "    <p>Make new bookings here</p> ";
            echo " </div> ";
            echo " </div> ";
        }
    ?>
</div>

<?php include 'src/components/footer.php' ?>