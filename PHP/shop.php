<?php
// session-start();
require_once "config.php";
?>

<?php
session_start();

if (isset($_POST['add-to-cart'])) {
  if (isset($_SESSION['id'])) {
    if (isset($_SESSION['cart'])) {
      $item_array_id = array_column($_SESSION['cart'], "id");

      if (in_array($_POST['id_no'], $item_array_id)) {
        echo "<script>alert('This painting is already added in the cart..!')</script>";
        echo "<script>window.location = 'shop.php'</script>";
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
        echo "<script>window.location = 'shop.php'</script>";
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
      echo "<script>window.location = 'shop.php'</script>";
    }
  } else {
    echo "<script>alert('Please login to use cart.')</script>";
    echo "<script>window.location = 'login.php'</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Art Gallery</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" href="../Images/img.png">
  <link rel="stylesheet" href="../CSS/shop.css">
  <link rel="stylesheet" href="../CSS/shop.css">
</head>

<body>
  <header>
    <nav>
      <div class="logo">
        <img src="../Images/ag3.jpg" alt="Art Gallery Logo">
      </div>
      <ul class="nav-links">
        <?php if (isset($_SESSION['username'])) { ?>
          <li><a href="logout.php">LOGOUT</a></li>
          <li><a href="edit.php">EDIT MY PROFILE</a></li>
          <li><a href="mycart.php">MY CART</a></li>
        <?php } else { ?>
          <li><a href="login.php">LOGIN</a></li>
          <li><a href="signup.php">SIGN UP</a></li>
        <?php } ?>
        <li class="dropdown">
          <a href="#" class="dropbtn">SEARCH BY CATEGORY <i class="fa fa-sort-desc"></i></a>
          <div class="dropdown-content">
            <a href="abstract_art.php">Abstract Art</a>
            <a href="modern_art.php">Modern Art</a>
            <a href="canvas_art.php">Canvas Paintings</a>
            <a href="graffitti_art.php">Graffitti</a>
            <a href="pop_art.php">Pop Art</a>
          </div>
        </li>
        <li><a href="mainpage.php">HOME</a></li>
      </ul>
    </nav>

    <p class="username">
      <?php
      if (isset($_SESSION['username'])) {
        echo "<span>" . $_SESSION['username'] . "</span>";
      }
      ?>
    </p>
  </header>

  <main>
    <div class="container">
      <?php
      $sql = "SELECT * FROM art";
      $result = mysqli_query($link, $sql);
      while ($row = mysqli_fetch_array($result)) {
      ?>
        <div class="art-piece">
          <img src="../Images/<?php echo $row['image']; ?>" alt="<?php echo $row['ArtName']; ?>">
          <div class="info">
            <p><strong>Name:</strong> <?php echo $row['ArtName']; ?></p>
            <p><strong>Category:</strong> <?php echo $row['category']; ?></p>
            <p><strong>Price:</strong> Rs.<?php echo $row['prize']; ?></p>
          </div>
          <div class="buttons">
            <form action="shop.php" method="post">
              <input type="hidden" name="img" value="../Images/<?php echo $row['image']; ?>">
              <input type="hidden" name="category" value="<?php echo $row['category']; ?>">
              <input type="hidden" name="price" value="<?php echo $row['prize']; ?>">
              <input type="hidden" name="name" value="<?php echo $row['ArtName']; ?>">
              <input type="hidden" name="detail" value="<?php echo $row['detail']; ?>">
              <input type="hidden" name="size" value="<?php echo $row['size']; ?>">
              <input type="hidden" name="id_no" value="<?php echo $row['id']; ?>">
              <button type="submit" name="add-to-cart" onclick="addToCart()">Add To Cart</button>
            </form>
            <form action="info.php" method="post">
              <input type="hidden" name="img" value="../Images/<?php echo $row['image']; ?>">
              <input type="hidden" name="category" value="<?php echo $row['category']; ?>">
              <input type="hidden" name="price" value="<?php echo $row['prize']; ?>">
              <input type="hidden" name="name" value="<?php echo $row['ArtName']; ?>">
              <input type="hidden" name="detail" value="<?php echo $row['detail']; ?>">
              <input type="hidden" name="size" value="<?php echo $row['size']; ?>">
              <input type="hidden" name="id_no" value="<?php echo $row['id']; ?>">
              <button class="view-btn" type="submit" name="view">View</button>
            </form>
          </div>
        </div>

      <?php
      }
      ?>
    </div>
  </main>

  <footer>
    <div class="footer-content">
      <div class="footer-section about">
        <h2>About Us</h2>
        <p>We are the top Image selling website which contain wide range of Art connection with different emotions , heritage , values we just not only sell the art but we also increase the passion of art in youth so that they can showcase there skill
          and talent to world through there art .</p>
        <div class="contact">
          <span><i class="fa fa-phone"></i> 123-456-789</span>
          <span><i class="fa fa-envelope"></i> info@example.com</span>
        </div>
        <div class="social">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-linkedin"></i></a>
        </div>
      </div>

      <div class="footer-section links">
        <h2>Quick Links</h2>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Shop</a></li>
          <li><a href="#">Gallery</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>

      <div class="footer-section contact-form">
        <h2>Contact Us</h2>
        <form action="#" method="post">
          <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
          <textarea name="message" class="text-input contact-input" placeholder="Your message..."></textarea>
          <button type="submit" class="btn btn-big contact-btn">
            <i class="fa fa-envelope"></i>
            Send
          </button>
        </form>
      </div>
    </div>

    <div class="footer-bottom">
      &copy; 2024 Art Gallery. All rights reserved.
    </div>
  </footer>
  <!-- Modal -->
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>Item added to cart!</p>
    </div>
  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

  <script>
    // Your custom JavaScript code can go here
    $(document).ready(function() {
      // Example: Toggle mobile menu
      $('.menu-toggle').click(function() {
        $('nav').toggleClass('active');
      });
    });
  </script>
  <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Function to show the modal
    function addToCart() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

</body>

</html>