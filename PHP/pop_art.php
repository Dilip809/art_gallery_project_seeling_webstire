<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Art Gallary</title>
    <link rel="icon" href="../Images/img.png">
    <link rel="stylesheet" href="../CSS/pop_art.css">
</head>

<body>

    <?php

    session_start();

    if (isset($_POST['add-to-cart'])) {
        if (isset($_SESSION['id'])) {

            if (isset($_SESSION['cart'])) {

                $item_array_id = array_column($_SESSION['cart'], "id");

                if (in_array($_POST['id_no'], $item_array_id)) {
                    echo "<script>alert('This painting is already added in the cart..!')</script>";
                    echo "<script>window.location = 'pop_art.php'</script>";
                } else {

                    $count = count($_SESSION['cart']);
                    $item_array = array(
                        'id' => $_POST['id_no'],
                        'name' => $_POST['name'],
                        'price' => $_POST['price'],
                        'category' => $_POST['category'],
                        'img' => $_POST['img'],
                    );

                    $_SESSION['cart'][$count] = $item_array;
                    echo "<script>alert('Painting added to the cart successfully.')</script>";
                    echo "<script>window.location = 'pop_art.php'</script>";
                }
            } else {

                $item_array = array(
                    'id' => $_POST['id_no'],
                    'name' => $_POST['name'],
                    'price' => $_POST['price'],
                    'category' => $_POST['category'],
                    'img' => $_POST['img'],
                );

                // Create new session variable
                $_SESSION['cart'][0] = $item_array;
                echo "<script>alert('Painting added to the cart successfully.')</script>";
                echo "<script>window.location = 'pop_art.php'</script>";
            }
        } else {
            echo "<script>alert('Please login to use cart.')</script>";
            echo "<script>window.location = 'login.php'</script>";
        }
    }
    ?>
    <div class="go-back">
        <a href="javascript:history.back()"><i class="fa fa-arrow-left" style="font-size:24px"></i></a>
    </div>
    <h1 style="margin-top:5px"><?php
                                if (isset($_SESSION['username']))
                                    echo "<span style='font-size:20px;float:left;font-family:arial'>" . $_SESSION['username'] . "</span>";
                                ?>
        Pop Art</h1>
    <a href="mycart.php" style="color:white;float:right;margin-right:50px;margin-top:-78px"><i class="fa fa-shopping-cart" style="font-size:36px"></i></a>
    <header>Art is not, as the metaphysicians say, the manifestation of some mysterious idea of beauty or God; it is not, as the aesthetical physiologists say, a game in which man lets off his excess of stored-up energy; it is not the expression of man’s emotions by external signs; it is not the production of pleasing objects; and, above all, it is not inly pleasure; but it is a means of union among men, joining them together in the same feelings, and indispensable for the life and progress toward well-being of individuals and of humanity. – Leo Tolstoy </header>


    <?php

    require_once "config.php";
    $sql = "SELECT * FROM art";
    $query = mysqli_query($link, $sql);
    $count = 0;
    while ($row = mysqli_fetch_array($query)) {
        if ($row['category'] == "pop") {
            $count++;
    ?>

            <div class="box">
                <img src="../Images/<?php echo $row['image']; ?>">
                <div class="info">
                    <p>Category: <?php echo $row['category'] ?></p>
                    <p>Price: Rs.<?php echo $row['prize'] ?> </p>
                    <p>Name: <?php echo $row['ArtName'] ?></p>
                </div>
                <div class="form">
                    <form action="pop_art.php" method="post">
                        <input type="hidden" name="img" value="<?php echo $row['image']; ?>" placeholder="Name" required>
                        <input type="hidden" name="category" value="<?php echo $row['category']; ?>" placeholder="Name" required>
                        <input type="hidden" name="price" value="<?php echo $row['prize']; ?>" placeholder="price" required>
                        <input type="hidden" name="name" value="<?php echo $row['ArtName']; ?>" placeholder="price" required>
                        <input type="hidden" name="detail" value="<?php echo $row['detail']; ?>" placeholder="detail" required>
                        <input type="hidden" name="size" value="<?php echo $row['size']; ?>" placeholder="size" required>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" placeholder="size" required>
                        <button type="submit" name="add-to-cart">Add To Cart</button>
                    </form>
                    <form action="info.php" method="post">
                        <input type="hidden" name="img" value="<?php echo $row['image']; ?>" placeholder="Name" required>
                        <input type="hidden" name="category" value="<?php echo $row['category']; ?>" placeholder="Name" required>
                        <input type="hidden" name="price" value="<?php echo $row['prize']; ?>" placeholder="price" required>
                        <input type="hidden" name="name" value="<?php echo $row['ArtName']; ?>" placeholder="price" required>
                        <input type="hidden" name="detail" value="<?php echo $row['detail']; ?>" placeholder="detail" required>
                        <input type="hidden" name="size" value="<?php echo $row['size']; ?>" placeholder="size" required>
                        <input type="hidden" name="id_no" value="<?php echo $row['id']; ?>" placeholder="size" required>
                        <button class="view-btn" type="submit" name="view">View</button>
                    </form>
                    <form action="delete_image.php" method="post">
                        <input type="hidden" name="img" value="<?php echo $row['image']; ?>" placeholder="Name" required>
                        <button class="delete-btn" type="submit" name="delete">Delete</button>
                    </form>
                </div>
            </div>

    <?php

        }
    }
    if ($count == 0) {
        echo "<h2><center>No paintings available of Pop Art.</center></h2>";
    }
    ?>



</body>

</html>