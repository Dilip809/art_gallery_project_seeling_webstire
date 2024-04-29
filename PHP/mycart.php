<?php require_once "config.php"; ?>
<?php 
session_start();

if(isset($_GET['empty'])){
    unset($_SESSION['cart']);
}

if(isset($_GET['remove']) && isset($_SESSION['cart'])){
    $id = $_GET['remove'];
    foreach($_SESSION['cart'] as $k => $part){
        if($id == $part['id']){
            unset($_SESSION['cart'][$k]);
        }
    }
}

$total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="icon" href="../Images/ag3.png">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;700&family=Poppins:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/mycart.css">
</head>
<body>
    <div class="container">
        <h2>My Cart</h2>
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
            <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {?>
                <?php foreach($_SESSION['cart'] as $k => $item) {?>
                    <tr>
                        <td><img src="<?php echo $item['img']; ?>" alt="<?php echo $item['name']; ?>"></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['category']; ?></td>
                        <td><?php echo "Rs. " .$item['price']; ?></td>
                        <td><input type="number" value="1" min="1"></td>
                        <td><?php $quantity = 1; echo "Rs. " .($item['price'] * $quantity); ?></td>
                        <td><a href="mycart.php?remove=<?php echo $item['id']; ?>">Remove</a></td>
                    </tr>
                <?php 
                    $total += $item['price'] * $quantity; // Update total
                } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="7">Your cart is empty.</td>
                </tr>
            <?php } ?>
        </table>
        <div class="total">
            <h2>Total: Rs <span><?php echo $total; ?></span></h2>
        </div>
        <div class="button-container">
            <button class="empty" onclick="confirmEmpty()">Empty Cart</button>
            <button class="btn btn-primary btn-purchase" onclick="purchase()">Purchase</button>
        </div>
        <p class="back-home"><a href="mainpage.php">Back to Home Page</a></p>
    </div>
    
    <script>
        function confirmEmpty() {
            if(confirm('Are you sure you want to empty your cart?')) {
                window.location.href = 'mycart.php?empty=1';
            }
        }

        function purchase() {
            if(confirm('Thanks for purchasing. The item will be delivered to your address soon.')) {
                window.location.href = 'payment_option.php';
            }
        }
    </script>
</body>
</html>
