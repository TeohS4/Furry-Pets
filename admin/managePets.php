<?php
include '../connect.php';

if(isset($_POST['add-pet'])){
  $p_petname = $_POST['pet-name'];
  $p_petage = $_POST['pet-age'];
  $p_petbreed = $_POST['pet-breed'];
  $p_condition = $_POST['condition'];
  $p_fee = $_POST['fee'];
  $p_petdes = $_POST['pet-des'];
  $p_image = $_FILES['pet-image']['name'];
  $tempname = $_FILES['pet-image']['tmp_name'];
  $folder = '../uploads/'.$p_image;

  $query = mysqli_query($db, 'SELECT * FROM pets WHERE pet_name="'.$p_petname.'"');

  if(empty($_POST['pet-name'])||empty($_POST['pet-age'])||empty($_POST['pet-breed'])||empty($_POST['pet-des'])
      ||empty($_POST['condition'])||empty($_POST['fee'])){
    echo "<script>alert('Please fill in all the details');window.location='managePets.php';</script>";
  }elseif(empty($_FILES['pet-image']['name'])){
    echo "<script>alert('Please insert an image');window.location='managePets.php';</script>";
  }elseif(mysqli_num_rows($query)>0){
      $message[] = 'Pet already exists';
  }
  else{
    $sql = "INSERT INTO pets (pet_name,pet_age,pet_breed,pet_condition,adopt_fee,pet_des,pet_image)VALUES
            ('$p_petname','$p_petage','$p_petbreed','$p_condition','$p_fee','$p_petdes','$p_image')";

    mysqli_query($db,$sql);
    
    if(move_uploaded_file($tempname,$folder)){
      $message[] = 'Pet details submitted successfully!';
    }else{
      $message[] = 'Sorry something went wrong!';
    }
  }
}

if(isset($_POST['update'])){
  $id = $_POST['edit_id'];
  $name = $_POST['pet-name'];
  $age = $_POST['pet-age'];
  $breed = $_POST['pet-breed'];
  $condition = $_POST['condition'];
  $fee = $_POST['fee'];
  $des = $_POST['pet-des'];
  
  if(isset($_FILES['profile']['name'])&&($_FILES['profile']['name']!="")){
    $size = $_FILES['profile']['size'];
    $temp = $_FILES['profile']['tmp_name'];
    $type = $_FILES['profile']['type'];
    $profile_name = $_FILES['profile']['name'];
    unlink("../uploads/$old_image");
    move_uploaded_file($temp,"../uploads/$profile_name");
  }else{
    $profile_name=$old_image;
  }

  $sql = "UPDATE pets SET pet_name='$name',pet_age='$age',pet_breed='$breed',pet_condition='$condition',
          adopt_fee='$fee',pet_des='$des' ,pet_image='$profile_name' WHERE pet_id = '$id'";
  
  mysqli_query($db,$sql);

  $message[] = 'Updated';
}

if(isset($_GET['delete'])){
	$delete_id = $_GET['delete'];
	mysqli_query($db, "DELETE FROM pets WHERE pet_id = '$delete_id'");
	header('location:managePets.php');
 }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Pets</title>
    <script src="https://kit.fontawesome.com/a84d485a7a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="dashboard.html">Manage Pets</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><i class="fa-solid fa-cat"></i> FurryPets</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="dashboard.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="managePets.php"><i class="fa-solid fa-paw"></i> Manage Pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manageShop.php"><i class="fa-solid fa-shop"></i> Manage Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_donation.php"><i class="fa-solid fa-hand-holding-dollar"></i> Donation History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_payment.php"><i class="fa-solid fa-money-check"></i> Payment History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../chat/admin_login.php"><i class="fa-solid fa-headset"></i> Live Chat</a>
                </li>
              </ul>
              </form>
            </div>
          </div>
        </div>
      </nav><br><br><br>
    <div class="container">
      <?php
      if(isset($message)){
      foreach($message as $message){
        echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-bell"></i> '.$message.
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        };
      };
      ?>
      <!--Add Pet-->
      <form action="" method="post" class="add-pet-form" enctype="multipart/form-data">
        <h2><i class="fa-solid fa-plus"></i> Add New Pet</h2>
        <label>Pet Name</label>
        <input type="text" name="pet-name" placeholder="Pet Name" class="form-control"><br>
        <label>Pet Age</label>
        <input type="text" name="pet-age" placeholder="Pet Age" class="form-control"><br>
        <label>Pet Breed (name,sex,type)</label>
        <input type="text" name="pet-breed" placeholder="Pet Breed" class="form-control"><br>
        <label>Condition</label>
        <input type="text" name="condition" placeholder="Condition" class="form-control"><br>
        <label>Adoption Fee</label>
        <input type="text" name="fee" placeholder="Adoption Fee" class="form-control"><br>
        <label>Pet Info</label><br>
        <textarea name="pet-des" placeholder="Pet Description" rows="4" cols="50" class="form-control"></textarea><br>
        <label>Insert Image</label>
        <input type="file" name="pet-image" class="form-control" accept="image/png, image/jpg, image/jpeg"><br>
        <input type="submit" name="add-pet" value="Add Pet" class="btn btn-primary">
      </form>
      <br>
      
      <?php 
      $sql = "SELECT * FROM pets";
      $result = $db->query($sql);
      $db->close();
      ?>
    <!--Table View-->
      <table class="table table-striped table-hover">
        <tr>
          <th></th>
          <th>Pet Name</th>
          <th>Age</th>
          <th>Breed</th>
          <th>Condition</th>
          <th>Fee</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
        <?php 
        while($row = $result->fetch_assoc()){
        ?>
        <tr>
          <th><img src="../uploads/<?php echo $row['pet_image'];?>" width="100px" height="100px"></th>
          <th><?php echo $row['pet_name']; ?></th>
          <th><?php echo $row['pet_age']; ?></th>
          <th><?php echo $row['pet_breed']; ?></th>
          <th><?php echo $row['pet_condition']; ?></th>
          <th><?php echo $row['adopt_fee']; ?></th>
          <th><?php echo $row['pet_des']; ?></th>
          <th>
            <button type="button" class="btn btn-success editBtn" style="box-shadow: -1px 8px 20px 1px rgba(143,159,209,0.66);" data-bs-toggle="modal" 
            data-bs-target="#editModal<?php echo $row['pet_id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
            <br><br>
            <a href="managePets.php?delete=<?php echo $row['pet_id']; ?>" 
            onclick="return confirm('Delete this pet?')" class="btn btn-danger" style="box-shadow: -1px 8px 20px 1px rgba(143,159,209,0.66);">
			      <i class="fas fa-trash"></i></a>
        </th>
        </tr>
        
      <!--Edit Modal Pop Up-->
      <div class="modal fade" id="editModal<?php echo $row['pet_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square"></i> Edit Pets</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
          <form action="managePets.php" method="post"  enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label><b>Pet Name</b></label>
                <input type="text" name="pet-name" value="<?php echo $row['pet_name']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label><b>Pet Age</b></label>
                <input type="text" name="pet-age" value="<?php echo $row['pet_age']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label><b>Pet Breed (name,sex,type)</b></label>
                <input type="text" name="pet-breed" value="<?php echo $row['pet_breed']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label><b>Condition</b></label>
                <input type="text" name="condition" value="<?php echo $row['pet_condition']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label><b>Adoption fee</b></label>
                <input type="text" name="fee" value="<?php echo $row['adopt_fee']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label><b>Pet Info</b></label>
                <input type="text" name="pet-des" value="<?php echo $row['pet_des']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label><b>Insert Image</b></label>
                <input type="file" name="profile" class="form-control form-control-sm" accept="image/png, image/jpg, image/jpeg">
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="edit_id" value="<?php echo $row['pet_id']; ?>">
              <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="update">Save Changes</button>
            </div>
          </form>
          </div>
        </div>
      </div><?php } ?>
      </table>
    <!--container end-->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>