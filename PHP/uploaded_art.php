<?php
require_once "config.php";
session_start();
$id = $_SESSION['id'];
$sql = "SELECT * FROM `art` WHERE id = $id";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
    } else {
        echo "<p><font size='5'><span color:'red'><em>No records were found.</em></span></font></p>";
        echo "<a href='upload.php'>Add Other Art</a><br>";
        echo "<a href='mainpage.php'>Back to home</a>";
        exit();
    }
}
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $name = $_GET['to_remove'];
    $delete = "DELETE FROM art WHERE id = ? AND ArtName = ?";

    if ($stmt = mysqli_prepare($link, $delete)) {
        mysqli_stmt_bind_param($stmt, "is", $param_id, $param_name);

        $param_id = trim($id);
        $param_name = trim($name);

        if (mysqli_stmt_execute($stmt)) {
            header("location: uploaded_art.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}
?>
<html>

<head>
    <title>Art Gallary</title>
    <link rel="icon" href="img.png">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;700&family=Poppins:wght@900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d5ca9b667.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/checkout.css">
    <link rel="shortcut icon" href="./img/logo.png">
    <link rel="stylesheet" href="../CSS/uploaded_art.css">
</head>

<body>
    <div class="go-back">
        <a href="javascript:history.back()"><i class="fa fa-arrow-left" style="font-size:24px"></i></a>
    </div>
    <center>
        <div class="table">

            <br>
            <table>
                <tr style="background-color: grey;">

                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Details</th>
                    <th>Remove</th>
                </tr>


                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><img src="<?php echo $row['image']; ?>"></td>
                        <td><?php echo $row['ArtName']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo "Rs. " . $row['prize']; ?></td>
                        <td><?php echo $row['size']; ?></td>
                        <td><?php echo $row['detail']; ?></td>
                        <td><a href="uploaded_art.php?remove=<?php echo $row['id']; ?>&to_remove=<?php echo $row['ArtName']; ?>">Remove</td>
                    </tr>
                <?php } ?>

            </table>
            <div style="text-align:center;margin-right: -400px;">
                <a href="upload.php">Add Other Art</a>
            </div>

        </div>
        <font size="4"><a href="mainpage.php">Back to Home Page</a></font>
    </center>
</body>

</html>