<?php 
require_once "config.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tourney:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/info.css">
</head>
<body>

    <div class="go-back">
        <a href="javascript:history.back()"><i class="fa fa-arrow-left" style="font-size:24px"></i> Go Back</a>
    </div>

    <div class="container">
        <div class="image">
            <img src="../Images/<?php echo $_POST['img']; ?>">
        </div>
        <div class="info">
            <h2>Name: <?php echo $_POST['name']; ?></h2>
            <div class="details">
                <p>Category of the painting: <?php echo $_POST['category']; ?></p>
                <p>Details: <?php echo $_POST['detail']; ?></p>
                <p>Size: <?php echo $_POST['size']; ?></p>
                <p>Price: Rs.<?php echo $_POST['price']; ?></p>
            </div>
        </div>
    </div>

</body>
</html>
