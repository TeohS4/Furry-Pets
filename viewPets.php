<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicons -->
  <link href="assets/img/FurryPets.png" rel="icon">
  <link href="assets/img/FurryPets.png" rel="apple-touch-icon">

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
    <script src="https://kit.fontawesome.com/a84d485a7a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>

    <body>

    <!-- ======= Header ======= -->
    <?php include 'header.php';?>
    <!-- ======= End Header ======= -->
  
    
     <!-- ======= Breadcrumbs ======= -->
     <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Pet for Adoption</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Pet</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <?php
    $db = mysqli_connect('localhost','root','','furrypets');

    $pet_id = $_GET['pet_id'];
  
    $sql = mysqli_query($db,"SELECT * FROM pets where pet_id= $pet_id");

      while($row = mysqli_fetch_array($sql)){
    
        echo'
        <br>
          <div class="container">
          <h2 align="center" style="font-family: Georgia, serif;"><b>Pet Details</b></h2>
          <div class="card shadow-sm text-dark bg-light mb-3 bg-gradient">
          <div class="row row-cols-4 pb-5">

          <div class="col ps-5 align-self-center">
            <div class="shadow bg-body rounded">
            <img src="uploads/'. $row['pet_image'] .'" class="rounded" width="300"><br>
            </div>
          </div>
          <div class="col-6 pt-4 ps-5">
            <h4 style="font-family: Georgia, serif;><i class="fa-solid fa-circle-info"></i> <b>Pet Name:</b> '. $row['pet_name'] .'</h4>
            <h4 style="font-family: Georgia, serif;><i class="fa-solid fa-circle-question"></i> <b>Pet Age:</b> '. $row['pet_age'] .'</h4>
            <h4 style="font-family: Georgia, serif;><i class="fa-solid fa-paw"></i> <b>Pet Breed:</b> '. $row['pet_breed'] .'</h4>
            <h4 style="font-family: Georgia, serif;><i class="fa-solid fa-heart"></i> <b>Condition:</b> '. $row['pet_condition'].'</h4>
            <h4 style="font-family: Georgia, serif;><i class="fa-solid fa-dollar-sign"></i> <b>Adoption Fee:</b> RM '. $row['adopt_fee'].'</h4>
            <h4 style="font-family: Georgia, serif;><i class="fa-solid fa-book-open"></i> <b>Pet Description:</b><br> '. $row['pet_des'].'</h4>
          </div>
          <div class="col-2 text-center align-self-center">
            <p style="font-family: Georgia, serif;">Interested of owning this pet? Chat with us for more details!</p>
            <a href="chat" class="btn btn-dark btn-lg btn-block"><i class="fa-regular fa-comment"></i> Inquiry</a><br><br>
            <a href="pet.php" class="btn btn-primary btn-lg btn-block"><i class="fa-solid fa-circle-chevron-left"></i> Go Back</a><br><br>
          </div>
        </div>
        </div>
        </div>

        ';
      }
?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  
<!-- ======= Footer ======= -->
<?php include 'footer.php';?>
<!-- ======= End Footer ======= -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>