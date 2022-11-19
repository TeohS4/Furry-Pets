<?php
$db = mysqli_connect('localhost','root','','furrypets');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>

  <body>
    <!-- ======= Header ======= -->
    <?php include 'header.php';?>
    <!-- ======= End Header ======= -->
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
      <h2>User Profile</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>User Profile</li>
        </ol>
      </div>
    </div><!-- End Breadcrumbs -->
    <?php
      if(isset($_SESSION['cust_id'])){

        $query = "SELECT * FROM user WHERE cust_id = {$_SESSION['cust_id']}";
        
        if ($r = mysqli_query($db,$query)) { 
          $row = mysqli_fetch_array($r);
          
          $id = $row['cust_id'];
          $user_username = $row['username'];
          $user_email = $row['email'];
          $user_password = $row['password'];
          $user_gender = $row['gender'];
          $user_dob = $row['dob'];
          $user_address = $row['address'];
          
        }
      }else{
        echo'
            <script>
            alert("Please login to your account before editing profile.");
            window.location.href = "login.php";
            </script>';
      }

      if(isset($_POST['update'])){
        if(empty($_POST['user_username'])||empty($_POST['user_email'])||empty($_POST['user_password'])||
        empty($_POST['user_gender'])||empty($_POST['user_dob'])||empty($_POST['user_address'])){
          
          echo"<script>alert('Fill in all the details to continue');window.location='userprofile.php';</script>";

        }else{
        $username = $_POST['user_username'];
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        $gender = $_POST['user_gender'];
        $dob = $_POST['user_dob'];
        $address = $_POST['user_address'];
      
        $update = "UPDATE user SET username='$username',email='$email',password='$password',gender='$gender',
        dob='$dob',address='$address' WHERE cust_id ='$id'";
        mysqli_query($db,$update);
      
        $message[] = 'User Info Updated Successfully';
        }
      }

      if(isset($_POST['delete'])){
        mysqli_query($db,"DELETE FROM user WHERE cust_id = '$id'");
        echo "<script>alert('Your account has been deleted!');window.location='login.php';</script>";
        header('location:login.php');
      }
      ?>
    <form action="" method="post">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img width="550px" 
                src="img/laptopgirl.png"><span class="font-weight-bold"><h3 style="font-family: Georgia, serif;">
                <b><?php echo $user_username?></b></h3></span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                <?php
                  if(isset($message)){
                    foreach($message as $message){
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="fa-solid fa-check"></i> '.$message.
                      '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                      }
                    }
                  ?>
                    <div class="col-md5">
                        <h2 style="font-family: Georgia, serif;"><b>Edit User Profile</b></h2>
                        <p>You can edit your user account information here</p>
                    </div>

                    <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Username</label>
                    <input type="text" name="user_username" class="form-control" value="<?php echo $user_username?>"></div>
                    </div>

                    <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Email</label>
                    <input type="text" name="user_email" class="form-control" value="<?php echo $user_email?>"></div>
                    </div>

                    <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Password</label>
                    <input type="password" name="user_password" class="form-control"></div>
                    </div>

  		            <label>Select your gender</label><br>
  		            <select name="user_gender" class="form-select" aria-label="Default select example">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    <br>
                    <div class="col-sm-12 col-lg-6">
                        <label for="startDate">Change Date of Birth</label>
		                <input id="startDate" name="user_dob" class="form-control" type="date"/>
                    </div>

                    <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Home Address</label>
                    <input type="text" name="user_address" class="form-control" value="<?php echo $user_address?>"></div>
                    </div><br>

                    <br>
                    <input type="submit" name="update" class="btn btn-success" value="Save Changes">
                    <button type="submit" class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</button>
                  
                </div>
            </div>
        </div>
        
    </div>
    </form>

      


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