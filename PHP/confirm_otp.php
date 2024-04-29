<?php
session_start();
if (isset($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
} else {
    date_default_timezone_set("Asia/Calcutta");
    if (isset($_POST["submit"])) {
        require_once "config.php";
        $result = mysqli_query($link, "SELECT * FROM reset_password where id='" . $_SESSION['id'] . "'");
        $row = mysqli_fetch_assoc($result);
        $id =  $_SESSION['id'];
        $entered_otp = $_POST['type_otp'];
        $otp = $row['otp'];
        $expiryTime = $row['ExpiryTime'];
        $date = date('m/d/Y h:i:s', time());
        if ($entered_otp == $otp && (strtotime($date) > strtotime($expiryTime))) {

            header('Location:http://localhost/dhvani/art%20gallery/reset_password.php');
        } else if ($entered_otp != $otp) {
            echo "Incorrect OTP<br>";
            echo "<a href = 'forgot_password.php'>Try Again</a>";
            exit();
        } else if (strtotime($date) < strtotime($expiryTime)) {
            echo "OTP expired<br>";
            echo "<a href = 'forgot_password.php'>Try Again</a>";
            exit();
        }
    }
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <link rel="icon" href="ag3.png">
    <title> Confirm OTP</title>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/confirm_otp.css">
</head>

<body>
   
    <center>
        <h1>OTP Verification<h1>
    </center>
    <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
        <table cellspacing='5' align='center'>
            <tr>
                <td>Enter OTP </td>
                <td><input type='password' name='type_otp' /></td>
            </tr>
            <tr>
                <td></td>
                <td><input style="background-color: white; font-size:20px; font-family:monospace; color:darkblue;" type='submit' name='submit' value='Submit' /></td>
            </tr>
        </table>
    </form>
    <center><a href="mainpage.php">Back to homepage</a></center>
</body>