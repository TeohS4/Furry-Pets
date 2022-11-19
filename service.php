<!DOCTYPE html>
<html>
<head>

	<title>Service</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/img/FurryPets.png" rel="icon">
  <link rel='stylesheet' id='tablepress-default-css'  href='https://www.paws.org.my/wp-content/tablepress-combined.min.css?ver=3' type='text/css' media='all' />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="service.css">

  <style>
    table.tablepress th, table.tablepress td {
    color: #666666 !important;
}	
  .color{
    background-color:#fdd2b3;
  }

  .counter{
    background-color:white;
    border-radius: 25px;
    padding: 20px;
  width: 380px;
  height: 100px;
  }
  .zoom:hover{
    transform: scale(1.1);
    transition: transform .2s;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
</style>
    <body>
<?php 

include('header.php'); 
include('connect.php'); 

?>

<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);
$alert ='';

if (isset($_POST['submitted'])) {
  $service = ($_POST['service']);
  $pet = $_POST['pet'];
  $email = $_POST['email'];
  $okay = true;

if (empty($email)) {
echo "Please fill out all the field.<br/><br/>";
$okay = false;
}

else {

  if (empty($email)) {
    echo "Email is required.<br/><br/>";	
    $okay = false;		
  }

}

if ($okay) {
  echo "Your message has been sent successfully.";

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'drbread2002@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'mgwmcikftyuxocag'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom($email); // Gmail address which you used as SMTP server
    $mail->addAddress('drbread2002@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received';
    $mail->Body = '<h3>Pet Category: ' . $pet . '<br>Service Category: ' . $service . '<br>Email: ' .$email. '</h3>';

    $mail->send();
    $alert = '<div class="alert-success">
          <span>Message Sent! Thank you for contacting us.</span>
        </div>';
  }

  catch (Exception $e){
    $alert = '<div class="alert-error">
          <span>'.$e->getMessage().'</span>
        </div>';
  }
}
}
?>

 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs d-flex align-items-center" style="background-image: url('img/services-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Service</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Service</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->
    
<div class=" col-sm-2 col-lg-10 mx-auto p-5 p-md-5 mb-4">
    <div class="col-sm-2 col-lg-10 mx-auto px-0 d-flex">
      <h1 align="center"class="col-sm-2 col-lg-12 text display-4 fw-bolder">Most popular services</h1>
</div>
<br><br>
<div class="d-flex justify-content-around">
      <div class="card zoom" style="width: 20rem; padding:20px">
  <img class="card-img-top; rounded hover-zoom" src="img/p1.jpeg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Pet Veterinary & Pet Hotel</h5>
  </div>
</div>
<div class="card zoom" style="width: 20rem; padding:20px">
  <img class="card-img-top; rounded" src="img/p2.jpeg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title text-center">Pets Insurance</h5>
  </div>
</div>
<div class="card zoom" style="width: 20rem; padding:20px">
  <img class="card-img-top;rounded" src="img/p3.jpeg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title text-center">Pet Grooming</h5>
  </div>
</div>
</div>
  </div>
  <div class="col p-3 color">
    <div class="col-sm-2 col-lg-10 mx-auto px-0 d-flex ">
      <h1 align="center"class="col-sm-2 col-lg-12 text display-4 pt-5">Pet protection coverage so far 💵</h1>
</div>
<p style="font-size:120%; padding:25px;" class="text-center">This is the amount of pet protection coverage we've accumulated for our customers so far. We strive for your pets to get the greatest of care by making sure you save on your medical bills.</p>
<div class="col-lg-10 d-flex justify-content-center text display-4 mx-auto">
<div class="counter text-center">  RM      
<span data-purecounter-start="0" data-purecounter-end="5874329" data-purecounter-duration="1" class="purecounter"></span>
</div>
</div>
  <br><br>
  </div>
  <br><br>
  <div class="col col-7 d-flex justify-content-center align-items-center mx-auto display-6 fw-bolder">
    <p>Choose Your Service</p>
  </div>
<div class="row border col-7 d-flex justify-content-center align-items-center mx-auto" 
style="backdrop-filter:blur(200px);border-radius:20px;background-color: rgba(255, 255, 255, 0.183);box-shadow: 0px 0px 15px 1px rgba(0,0,0,0.08);"> 

    <div class="col-10 d-flex justify-content-center align-items-center flex-column">   
        <br/>
        <br/>
  <form action="service.php" method="post">
    
  <div class="container-sm text-center">
  <div class="form-group">
    <label for="exampleFormControlSelect1" class="text display-6 fw-bolder">Tell me more about your furkids</label><br><br>
    <label for="exampleFormControlSelect1">Type of furkids</label><br><br>
    <label class="custom-radio-button__container">
            <input type="radio" name="pet" value="cat" checked>
            <span class="custom-radio-button designer">
            <img loading="lazy" src="https://global-uploads.webflow.com/5f7adfe5ed7d772770050d98/604a51f2ab5f69845a574adc_cat-basic.svg" width="100" height="60" alt="" class="choose-pet-img"><g fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                </g>
              </svg>
              Cat
            </span>
          </label>
          <label class="custom-radio-button__container">
            <input type="radio" name="pet" value="dog">
            <span class="custom-radio-button">
            <img loading="lazy" src="https://global-uploads.webflow.com/5f7adfe5ed7d772770050d98/604771d24a3f691d03efcc4d_dog-plus.svg" width="100" height="60" alt="" class="choose-pet-img">
              Dog
            </span>
          </label><br><br>
    <select class="form-select" id="exampleFormControlSelect1" name="service">
      <option>Pet Vetrinary</option>
      <option>Pet Hotel</option>
      <option>Pet Insurance</option>
      <option>Pet Grooming</option>
    </select>
  </div><br>
  <div class="form-group">
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
  </div><br>
  <button type="submit" name="submitted" class="btn btn-dark">Submit</button>
  <br><br>
</div>
</form>
</div>
</div>
<br><br><br><br>
<div class="row col-12 mx-auto color">
	<div class="col-sm-10 col-lg-6 d-flex justify-content-center align-items-center">
		<img src="img/catdog.png" class="img-fluid" width="80%">
	</div>
	<div class="col-sm-12 col-lg-6 ps-0 d-flex justify-content-center align-items-center flex-column">
		<h1 class="col-9 lh-base fw-bold">Get your furkid some accesssory</h1>
		<br/>
		<p class="col-9 text-muted">Get started by press the button below and you can get your furkid a new toy</p>
		<br/>
		<a href="shop.php"><button type="button" class="btn btn-dark text-light">Order Now</button></a>
	</div>

</div>

<!-- ======= Footer ======= -->
<?php include 'footer.php';?>
<!-- ======= End Footer ======= -->
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

</body>

</html>