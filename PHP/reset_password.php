<?php
session_start();
if (isset($_SESSION['id'])) {
	if (isset($_POST['submit'])) {
		if (strlen($_POST["Password"]) < 6 || strlen($_POST["Password"]) > 10) {
			echo "Password must contain 6 to 10 characters!<br>";
			echo "<a href= 'reset_password.php'>Try again</a>";
			exit();
		} else if ($_POST['Password'] != $_POST['Confirm_Password']) {
			echo "Paswords are not matched<br>";
			echo "<a href= 'reset_password.php'>Try again</a>";
			exit();
		} else {
			require_once "config.php";
			$Password = $_POST['Password'];
			$id =  $_SESSION['id'];
			$query = "UPDATE sign SET password='$Password' WHERE id = '$id'";
			$result = mysqli_query($link, $query);
			//redirect to log in page 
			header('Location:login.php');
		}
	}
} else {
	echo "Not done";
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Reset Password</title>
	<link rel="icon" href="../Images/ag3.png">

	<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
	<link href="../CSS/reset_password.css">
</head>

<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div>
			<center>
				<h2>Reset your Password</h2>
			</center>
			<center><input style="background-color: white; font-size:15px; font-family:monospace; color:darkblue;" type="text" name="Password" placeholder="New Password"><br><br>
				<input style="background-color: white; font-size:15px; font-family:monospace; color:darkblue;" type="text" name="Confirm_Password" placeholder="Confirm New Password"><br><br>
				<input style="background-color: white; font-size:17px; font-family:monospace; color:darkblue;" type="submit" name="submit"><br><br>
			</center>
		</div>
	</form>
	<center><a href="mainpage.php">Back to homepage</a></center>
</body>

</html>