<?php include 'src/components/session_manager.php' ?>

<?php include 'src/components/header1.php' ?>
<link rel="stylesheet" href="src/css/settings-style.css">
<?php include 'src/components/header2.php' ?>

<div class="usermessage">
    <p>Hi, <?php echo $_SESSION["login_user"]; ?>!</p>
</div>

<div class="container main_container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-3">Change Password</h2>
            <form action="src/components/changepassword.php" method="post">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="submit_button btn btn-primary">Change Password</button>
            </form>
            <?php
                if($_SESSION["login_user"]=="admin"){
                    echo "<hr class=\"mb-1\">" ;
                    echo "<h2 class=\"mb-3\">Delete User</h2>" ;
                    echo "<form action=\"src/components/deleteuser.php\" method=\"post\">" ;
                    echo "   <div class=\"form-group\">" ;
                    echo "       <label for=\"username\">Enter Username to Delete</label>" ;
                    echo "       <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" required>" ;
                    echo "   </div>" ;
                    echo "   <button type=\"submit\" class=\"submit_button btn btn-danger\">Delete User</button>" ;
                    echo "</form>";
                }
            ?>
        </div>
    </div>
</div>



<?php include 'src/components/footer.php' ?>