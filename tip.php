<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet's Care</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <!-- Favicons -->
  <link href="assets/img/FurryPets.png" rel="icon">
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
  <style>
    .accordion-button:not(.collapsed) {
    color: #ffffff; 
    background-color: #bbc5e6;
    box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%); 
}
  .space{
    width:20px;
  }

</style>
</head>

<body>
<?php 
$page = "pet";
include('header.php'); 
?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('img/tips-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Pet's Care</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Pet's Care</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row position-relative justify-content-center">
          <div class="col-lg-9">
            <div class="our-story">
              <h3>Prepare for the new addition</h3>
              <h4>Discuss these questions ahead of time so everyone can give the new pet a warm welcome:</h4>
              <ul>
                <li><i class="bi bi-check-lg"></i></i> <span>Which family members will feed, walk and bathe the pet?</span></li>
                <li><i class="bi bi-check-lg"></i></i> <span>Do the kids know how to treat a new pet gently?</span></li>
                <li><i class="bi bi-check-lg"></i></i> <span>Will a new pet be an issue with a landlord or roommate?</span></li>
                <li><i class="bi bi-check-lg"></i></i> <span>How might other pets in the house be affected?</span></li>
                <li><i class="bi bi-check-lg"></i></i> <span>Are there any areas of the home where the pet shouldn’t be allowed?</span></li>
                <li><i class="bi bi-check-lg"></i></i> <span>Is anyone in the home allergic to fur or saliva?</span></li>
              </ul>
          
              <div class="watch-video d-flex align-items-center position-relative">
              <i class="bi bi-forward"></i>
                <a href="faq.php">Learn More</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter section-bg">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item align-items-center w-100 h-100">
            <i class="bi bi-1-circle"></i>
              <div></br>
                <h3>Bring the right mindset</h3>
                <p>Don’t set your sights on a specific dog or cat you find online, but be ready for commitment. You’ll have to be patient with your dog as they learn their new role in the family.</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item align-items-center w-100 h-100">
            <i class="bi bi-2-circle"></i>              
            <div></br>
                <h3>Bring the right materials & documentation</h3>
                <p>Don’t forget to ask for a spay or neuter certificate as well as a detailed list of vaccinations and any other medical history, if available.</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item align-items-center w-100 h-100">
            <i class="bi bi-3-circle"></i>
              <div></br>
              <h3>Have a veterinarian ready</h3>
              <p>If you don’t have a trusted veterinarian already, there’s no better time to find one near you so you can schedule an appointment early.</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item align-items-center w-100 h-100">
            <i class="bi bi-4-circle"></i>
            <div></br>
                <h3>Give your new pet a familiar taste</h3>
                <p>Quality nutrition is key to a happy, healthy life. Try to continue feeding the food your pet ate at the shelter, or change pet foods gradually to avoid an upset stomach.</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>
    </section><!-- End Stats Counter Section -->
  <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row position-relative">

          <div class="col-lg-7 about-img" style="background-image: url(img/tip.jpg);"></div>

          <div class="col-lg-7">
            <h2>First-time pet parent?</h2>
            <div class="our-story">
              <h3>Cat or Dog</h3>
              <p>There's no doubt that people love cats and dogs – but does one stand out over the other? </p>
              <ul>
                <li><i class="bi bi-check-circle"></i> <span>Difficulty of Care</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Cleanliness</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Variety of Breeds</span></li>
              </ul>
              <p>Please watch the video for have a better understanding</p>

              <div class="watch-video d-flex align-items-center position-relative">
                <i class="bi bi-play-circle"></i>
                <a href="https://youtu.be/IiilA0dsciY" class="glightbox stretched-link">Watch Video</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End About Section -->

  </main><!-- End #main -->
  <div class="col-lg-12 bg-warning">
<h1 class="text-center fw-bolder" style="color:white"><br>First-time pet parent?</h1>
<p class="text-center fw-bold" style="color:white">It’s tough to prepare for a new dog or cat if you’re not sure what to expect. Don’t <br/> worry, we have plenty of tips and resources to help.</p>
<div class="d-flex justify-content-center">
<a href="contact.php"><button type="button" class="btn btn-outline-light">Contact Us</button></a>
<div class="space"></div>
<a href="faq.php"><button type="button" class="btn btn-outline-light">FAQ</button></a>
</div>
<br><br>
</div>

    <?php include "footer.php"?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>