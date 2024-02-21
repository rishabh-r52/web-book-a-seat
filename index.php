<?php
session_set_cookie_params(0);

$_SESSION = array();

session_start();

// var_dump($_SESSION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "movie_ticket_booking";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $myusername = mysqli_real_escape_string($conn, $_POST['username']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = $conn->query($sql);
    $count = $result->num_rows;

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        header("Location: home.php");
        exit();
    } else {
        $login_error = "Your Login Name or Password is invalid";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book-a-Seat</title>
    <link rel="icon" href="src/images/favicon-32x32.png" type="image/png" sizes="32x32">
    <link rel="stylesheet" href="src/css/index.css">
    
</head>
<body>
    <div class="heading">
        <span class="word-book">Book</span><span class="word-dashes">-</span><span class="word-a">a</span><span class="word-dashes">-</span><span class="word-seat">Seat</span>.com
    </div>

    <div class="auth-container">
        <h2>User Authentication</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <a class="create-account-link" href="register.php">Create account</a>
            <br>
            <br>
            <input type="submit" value="Login">
        </form>
        <?php if(isset($login_error)) { ?>
            <div class="error-message"><?php echo $login_error; ?></div>
        <?php } ?>
    </div>
</body>
</html>
