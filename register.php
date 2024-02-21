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
        <h2>User Registration</h2>
        <form action="src/components/process_register.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <a class="create-account-link" href="index.php">Go back to Login</a>
            <br>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
