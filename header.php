<?php
include 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center">
      <img src="assets/img/FurryPets.png" style="width:150px; height:150px">
    </a>

    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    <nav id="navbar" class="navbar">
      <ul class>
        <li><a href="index.php">Home</a></li>
        <li><a href="pet.php">Animals</a></li>
        <li><a href="shop.php">Product</a></li>
        <li><a href="service.php">Service</a></li>
        <li><a href="donate.php">Donation</a></li>
        <li><a href="tip.php">Pet's Care</a></li>
        <li class="nav-item dropdown me-3">
							<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Customer Service</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="contact.php">Contact Us</a></li>
								<li><a class="dropdown-item" href="faq.php">FAQ</a></li>
                <li><a class="dropdown-item" href="about.php">About Us</a></li>
							</ul>
						</li>
        <li><a href="cart.php">
          <div class="icon">
            <i class="fa-solid fa-cart-shopping" style="font-size:25px"></i>
          </div>
        </a></li>
        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fa-solid fa-user-astronaut pb-2" style="font-size:25px"></i></a>
							<ul class="dropdown-menu" style="left: -100px;">
							<?php
              if (isset($_POST['logout'])) {
                session_destroy();
                ?>
                <script>
                window.location.href = 'login.php';
                </script>
                <?php
              }

							if (isset($_SESSION['cust_id'])) {
                $cust_id = $_SESSION['cust_id'];
								echo '
								<li><a class="dropdown-item" href="userprofile.php">User Profile</a></li>
								<li><a class="dropdown-item" href="payment_history.php">Payment History</a></li>
								<li><a class="dropdown-item" href="DonateHistory.php">Donate History</a></li>
								<li><hr class="dropdown-divider"></li>
								<li>
									<form action="index.php" method="post">
										<input class="dropdown-item" type="submit" value="Logout">
										<input type="hidden" name="logout" value="true">
									</form>
								</li>
								';
							}
							else {
								echo '
								<li class="ms-3 mt-1 mb-1">Login As :</li>
								<li><a class="dropdown-item" href="login.php">User</a></li>
								<li><a class="dropdown-item" href="login_admin.php">Admin</a></li>
								';
							}
							?>
							</ul>
						</li>
        <!-- <li><a href="login.php">
          <div class="icon">
            <i class="fa-solid fa-user-astronaut"></i>
          </div>
        </a></li> -->
      </ul>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</html>