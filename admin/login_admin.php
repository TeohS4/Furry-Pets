<?php
include '../connect.php';
if(isset($_POST['submit'])){
      $username = $_POST['username'];
      $password = $_POST['password'];

    if(empty($_POST['username'])||empty($_POST['password'])){
      $message[] = 'Please fill in all the details';
    }
    else if($_POST['username']=="admin" && $_POST['password']=="admin123"){
      header('location: dashboard.php');
    }else{
      $message[] = 'Wrong username or password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://kit.fontawesome.com/a84d485a7a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    
<div class="row g-0">
  <form action="" method="post">
            <div class="col-8 col-lg-2 mx-auto">
            <h3 align='center'>Admin Login</h3>
            <img src="../img/furrypetslogo.png" width="200px" height="200px" class="rounded mx-auto d-block">
                <div class="form-floating my-3">
                    <input type="text" name="username" class="form-control" placeholder="Usernamme" required>
                    <label for="Username">Username</label>
                    <div class="invalid-feedback">
                        Please enter a valid username.
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <label for="password">Password</label>
                    <div class="invalid-feedback">
                        Please enter your password.
                    </div>
                </div>
                <?php
                if(isset($message)){
                foreach($message as $message){
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="fa-solid fa-circle-info"></i> '.$message.
                  '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                  };
                };
                ?>
                <input type="submit" class="w-100 btn btn-lg btn-dark fs-6"  name="submit" value="Login">
            </div>
          </form>
        </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>