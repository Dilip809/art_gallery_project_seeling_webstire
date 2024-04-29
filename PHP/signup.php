<?php

require_once "config.php";

$uname = $pw = $cpw = $Email = $Contact = $address = "";
$uname_err = $pw_err = $cpw_err = $email_err = $contact_err = $address_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  //validation for username____________________________________

   $input_uname = trim($_POST["username"]);
   $query = "SELECT username, EmailAddress from sign";
   $result = $link -> query($query);

   if(empty($input_uname)){
        $uname_err = "<span style='color:red; font-size:18px'>Please enter username!</span>";
    }
    else if(strlen($input_uname) < 6 || strlen($input_uname) > 12){
      $uname_err = "<span style='color:red; font-size:18px'>Username must contain 6 to 15 character!</span>";
    }
    else if($result -> num_rows > 0){
      while($check = $result -> fetch_assoc()){
         if($input_uname == $check['username']){
            $uname_err = "<span style='color:red; font-size:18px'>This username  already exist!</span>";
         }
      }
    }
    else{
        $uname = $input_uname;
    }

    //validation for password___________________________________

    $input_pw = trim($_POST["password"]);
    if(empty($input_pw)){
      $pw_err = "<span style='color:red; font-size:18px'>Please enter password!</span>";
    }
    else if(strlen($input_pw) < 6 || strlen($input_pw) > 10){
      $pw_err = "<span style='color:red; font-size:18px'>Password must contain 6 to 10 characters!</span>";
    }
    else if(!preg_match("#[0-9]+#",$input_pw)) {
        $pw_err = "<span style='color:red; font-size:18px'>Your password must contain at least 1 number!</span>";
    }
    else if(!preg_match("#[A-Z]+#",$input_pw)) {
        $pw_err = "<span style='color:red; font-size:18px'>Your password must contain at least 1 capital letter!</span>";
    }
    else if(!preg_match("#[a-z]+#",$input_pw)) {
        $pw_err = "<span style='color:red; font-size:18px'>Your password must contain at least 1 lowercase letter!</span>";
      }
    else{
      $pw = $input_pw;
    }

    //validation for confirm password_______________________________

    $input_cpw = trim($_POST["cpassword"]);
    if(empty($input_cpw)){
      $cpw_err = "<span style='color:red; font-size:18px'>Please enter confirm password!</span>";
    }
    else if($input_pw != $input_cpw){
      $cpw_err = "<span style='color:red; font-size:18px'>Password and Confirm password must be same!</span>";
    }

    //validation for residental address____________________________________

     $input_address = trim($_POST["address"]);
    if(empty($input_address)){
      $address_err = "<span style='color:red; font-size:18px'>Please enter your address correctly!</span>";
    }
    else{
      $address = $input_address;
    }

     
    //validation for email address____________________________________

    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
      $email_err = "<span style='color:red; font-size:18px'>Please enter your email address!</span>";
    }
    else if(!filter_var($input_email, FILTER_VALIDATE_EMAIL)){
      $email_err = "<span style='color:red; font-size:18px'>Please enter valid email address!</span>";
    }
    else if($result -> num_rows > 0){
      while($check = $result -> fetch_assoc()){
         if($input_email == $check['EmailAddress']){
            $email_err = "<span style='color:red; font-size:18px'>This email address is already exist!</span>";
         }
      }
    }
    else{
      $Email = $input_email;
    }

    //validation for contact number____________________________________

    $input_contact = trim($_POST["phone_num"]);
    if(empty($input_contact)){
      $contact_err = "<span style='color:red; font-size:18px'>Please enter your contact number!</span>";
    }
    else if(!preg_match('/^[0-9]{10}+$/', $input_contact)){
      $contact_err = "<span style='color:red; font-size:18px'>Please enter valid contact number!</span>";
    }
    else{
      $Contact = $input_contact;
    }

    //insert data into database________________________________________

    if(empty($uname_err) && empty($pw_err) && empty($cpw_err) && empty($email_err) && empty($contact_err) && empty($address_err)){

      $sql = "INSERT INTO sign (username,password,EmailAddress,ContactNumber,ResidenceAddress) VALUES(?,?,?,?,?)";

      if($stmt = mysqli_prepare($link,$sql)){
         mysqli_stmt_bind_param($stmt ,"sssss",$param_uname, $param_pw, $param_email, $param_contact, $param_address);

         $param_uname = $input_uname;
         $param_pw = $pw;
         $param_email = $input_email;
         $param_contact = $Contact;
         $param_address = $address;

         if(mysqli_stmt_execute($stmt)){
            header("location: mainpage.php");
            exit();
         }
         else{
            echo "Something went wrong. Please try again later.";
         }
      }
      mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="ag3.png">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="../CSS/signup.css">
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Enter your username" required>
            <span class="error"><?php echo $uname_err; ?></span>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Enter your password" required>
            <span class="error"><?php echo $pw_err; ?></span>

            <label for="cpassword">Confirm Password:</label>
            <input type="password" name="cpassword" placeholder="Confirm your password" required>
            <span class="error"><?php echo $cpw_err; ?></span>

            <label for="email">Email Address:</label>
            <input type="text" name="email" placeholder="Enter your email address" required>
            <span class="error"><?php echo $email_err; ?></span>

            <label for="phone_num">Contact Number:</label>
            <input type="text" name="phone_num" placeholder="Enter your contact number" required>
            <span class="error"><?php echo $contact_err; ?></span>

            <label for="address">Address:</label>
            <textarea name="address" rows="4" placeholder="Enter your address" required></textarea>
            <span class="error"><?php echo $address_err; ?></span>

            <button type="submit" value="Submit">Submit</button>
            <button type="reset" value="Reset">Reset</button>
            <a href="login.php">Already Registered? Click here to login</a>
        </form>
    </div>
</body>
</html>

