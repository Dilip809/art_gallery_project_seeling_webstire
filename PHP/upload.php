
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
	<style type="text/css">
		.logo{
			width: 150px;
			cursor: pointer;
        	margin: 0;
        	padding:1px;
        	margin-left: 15px;
		}

		header{background-color: #3a3a3a;margin-top: -10px;}
		 
		form{
			margin-top: 60px;
			margin-left: 36%;
			width: 400px;
  			border: 0.5px solid black;
  			padding: 10px 0;
  			font-size: 20px;
  			font-family: 'Mate SC', serif;
		}
		input{margin-left: 10px;}
		th{padding: 15px 15px;}
		
		label{margin-left: 10px;}
		h1{
			color: #ccc;
			text-align: right;
			padding: 22px;
		}
		 select {
  			width: 75%;
 			padding: 12px 20px;
  			border: none;
  			border-radius: 4px;
  			background-color: #f1f1f1;
		}
		input[type=text]{
			border: 0.5px bold #ddd;
			width: 90%;
			padding: 12px 0px;
		}
		input[type=submit]{
  background-color: #222;
  border: none;
  color: white;
  padding: 10px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  margin-left: 10px;
  font-size: 16px;
}
	a{
		margin-top: 0px;
		text-decoration: none;
		background-color: limegreen;
		padding: 8px 30px;
		color: white;
	}
	.go-back a{
		color: black;
		text-decoration: none;
		background-color: white;
		margin-left: -30px;
	}
	</style>
</head>
<body>
	<div class="go-back">
			<a href = "javascript:history.back()"><i class="fa fa-arrow-left" style="font-size:24px"></i></a>
		</div>
	<header>
	<img src="../Images/ag3.jpg" class="logo" style="float: left;">
	<h1>Upload your painting</h1>
</header>

<img src="../Images/bg2 - copy.png" style="float:left; width: 25%; margin-top: 10px; height: auto;">
 <img src="../Images/bg2.png" style="float:right; margin-top: 210px;">
	<form method="post" action="upload.php" enctype="multipart/form-data">
		<label>Category: </label>
	
		<select name="category">
  		<option value="abstract">Abstract Art</option>
  		<option value="modern">Modern Art</option>
  		<option value="canvas">Canvas Painting</option>
  		<option value="graffitti">Graffitti</option>
  		<option value="pop">Pop Art</option>
		</select>

		<br><br>
		
		<label>Image name: </label><br>
		<input type="text" name="imgName" required>

		<br><br>
		
		<label>Detail: </label><br>
		<input type="text" name="detail" required>

		<br><br>
		
		<label>Painting size: </label><br>
		<input type="text" name="size" required>

		<br><br>

		
		<label>Price:</label><br>
		<input type="text" name="prize" required>
		
		<br><br>
		
			<input type="file" name="image" style="font-size: 15px;font-family: 'Mate SC', serif;">
		
		<br><br>
		<input type="submit" name="submit">
		<a class="home" href="mainpage.php">Home</a>
	</form>
	<!-- <a href="mainpage.php">Back to Home</a> -->
</body>
</html>
<br>

<?php
	require_once "config.php";
	session_start();
	if(isset($_SESSION["id"])){
		$id = $_SESSION["id"];
		if(isset($_POST['submit'])){
			// "C:\xampp\htdocs\Art-gallery\Online-Art-Gallery-main\ICTWllb_Project_CE083_CE007_CE079\uploaded file"
			$location ="C:/xampp/htdocs/Art-gallery/Online-Art-Gallery-main/ICTWllb_Project_CE083_CE007_CE079/uploaded file";
			$image = $_FILES['image']['name'];
			$tmp_name = $_FILES['image']['tmp_name'];
			$category = $_POST['category'];
			$detail = $_POST['detail'];
			$prize = $_POST['prize'];
			$size = $_POST['size'];
			$image_name = $_POST['imgName'];
		
			// echo $size;
			$sql = "INSERT INTO art (id, category, detail, prize, size, image, ArtName) VALUES ('$id', '$category', '$detail', '$prize', '$size', '$image', '$image_name')";
			mysqli_query($link, $sql);

			if(move_uploaded_file($tmp_name, $location.$image)){
				echo '<i class="fa fa-check" style="font-size:24px;color:limegreen;margin-left:36%"></i>';
				echo "<span style='color:limegreen;font-size:20px;margin-left:10px'>Image uploaded successfully</span><br><br>";
				// echo "<a href = 'mainpage.php' style='margin-left:36%'>Go to home</a>";
				exit();
			}
			else{
				echo '<i class="fa fa-exclamation-circle" style="font-size:26px;color:red;margin-left:36%"></i>';
				echo "<span style='color:red;font-size:20px;margin-left:10px'>There was a problem.</span>";
				exit();
			}
		}
		else{
			echo '<i class="fa fa-exclamation-circle" style="font-size:26px;color:red;margin-left:36%"></i>';
			echo "<span style='color:red;font-size:20px;margin-left:10px'>Kindly, select a file.</span>";
		}
	}
	else{
		echo "<script>alert('Please login to continue.')</script>";
        echo "<script>window.location = 'login.php'</script>";
	}
?>
