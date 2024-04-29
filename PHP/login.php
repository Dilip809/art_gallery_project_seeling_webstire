<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="ag3.png">
    <title>User Login</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="../CSS/login.css"> 
</head>
<body>
    <div class="container">
        <h1>User Login</h1>
        <form action="mainpage.php" method="POST">
            <label for="username">Username</label><br>
            <input type="text" name="username" required><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" required><br><br>
            <button type="submit" name="submit">Submit</button>
            <button type="reset" name="reset">Reset</button><br><br>
            <div class="links">
                <!-- <a href="forgot_password.php">Forgot Password?</a><br><br> -->
                <a href="signup.php">New Registration? Click here to sign up</a><br><br>
                <a href="mainpage.php">Skip Login</a>
            </div>
        </form>
    </div>
</body>
</html>
