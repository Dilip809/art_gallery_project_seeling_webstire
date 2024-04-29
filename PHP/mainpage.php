<?php
if (isset($_POST["username"]) && isset($_POST["password"])) {
  require_once "config.php";
  $result = mysqli_query($link, "SELECT * FROM sign WHERE username='" . $_POST["username"] . "' and password = '" . $_POST["password"] . "'");
  $count  = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
  if ($count == 0) {
    echo "<script>alert('Invalid Username or Password!')</script>";
    echo "<script>window.location = 'login.php'</script>";
    exit();
  } else {
    session_start();
    $_SESSION["id"] = $row["id"];
    $_SESSION['username'] = $_POST['username'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Art Gallery</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="mainpage.css">
  <link rel="icon" href="img.png">
  <link rel="stylesheet" href="../CSS/mainpage.css">
</head>

<body>
  <div class="container">
    <nav>
      <img src="../Images/ag3.jpg" class="logo">
      <ul>
        <li><a href="logout.php">LOGOUT</a></li>
        <li><a href="upload.php">ADD ART</a></li>
        <li><a href="edit.php">EDIT MY PROFILE</a></li>
        <li><a href="mycart.php">MY CART</a></li>
        <li class="dropdown">
          <button class="dropbtn">SEARCH BY CATEGORY
            <i class="fa fa-sort-desc"></i>
          </button>
          <div class="dropdown-content">
            <a href="abstract_art.php">Abstract Art</a>
            <a href="modern_art.php">Modern Art</a>
            <a href="canvas_art.php">Canvas Paintings</a>
            <a href="graffitti_art.php">Graffiti</a>
            <a href="pop_art.php">Pop Art</a>
          </div>
        </li>
        <li><a href="mainpage.php">HOME</a></li>
      </ul>
    </nav>
    <div class="text-box">
      <h1>Welcome to the ART STUDIO, the art gallery</h1>
      <p>Design with creativity &ensp; Design with smile &ensp; Keeping ART alive!! :) 🤍🎨🖌</p>
      <form action="shop.php">
        <button>Shop now</button>
      </form>
    </div>
  </div>

  <div class="page2">
    <h1><u>Discover the creative world of Artists and their masterpieces</u></h1>
  </div>

  <div class="swiper-container mySwiper">
    <div class="swiper-wrapper">
      <!-- Add your swiper slides here -->
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>

  <footer class="footer">
    <div class="f1">
      <div class="row">
        <div class="footer-col">
          <h4>Company</h4>
          <ul>
            <li><a href="team.php">About our Team</a></li>
            <li><a href="shop.php">Our products</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Get help</h4>
          <ul>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Shipping</a></li>
            <li><a href="#">Returns</a></li>
            <li><a href="#">Order status</a></li>
            <li><a href="#">Payment options</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Follow us</h4>
          <div class="social">
            <a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 5,
      spaceBetween: 10,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
</body>

</html>

