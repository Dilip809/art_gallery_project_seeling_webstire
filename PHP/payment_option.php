<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Options</title>
    <!-- Add any necessary CSS stylesheets or links here -->
   <link rel="stylesheet" href="../CSS/payment_option.css">
</head>
<body>
    <header>
        <!-- Add header content here -->
        <h1>Payment Options</h1>
        <p>Welcome to our payment options page. Please select your preferred payment method.</p>
    </header>

    <main>
        <section>
            <h2>Choose a Payment Method</h2>
            <form action="process_payment.php" method="POST">
                <input type="radio" name="payment_method" value="credit_card">
                <label for="credit_card">Credit Card</label><br>
                <input type="radio" name="payment_method" value="paypal">
                <label onclick="credit_card.php" for="paypal" >PayPal</label><br>
                <!-- Add more payment options if needed -->
                <br>
                <button type="submit">Proceed to Payment</button>
            </form>
            <p class="back-home"><a href="mainpage.php">Back to Home Page</a></p>
        </section>
    </main>

    <footer>
        <!-- Add footer content here -->
        <p>&copy; <?php echo date("Y"); ?> Your Company Name. All rights reserved.</p>
    </footer>
</body>
</html>
