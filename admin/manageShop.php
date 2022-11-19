<?php
include '../connect.php';

if(isset($_POST['add-item'])){
  $p_itemname = $_POST['item-name'];
  $p_itemprice = $_POST['item-price'];
  $p_itemdes = $_POST['item-des'];
  $p_image = $_FILES['item-image']['name'];
  $tempname = $_FILES['item-image']['tmp_name'];
  $folder = '../uploads/'.$p_image;

  $query = mysqli_query($db, 'SELECT * FROM shop WHERE item_name="'.$p_itemname.'"');
  
  if(empty($_POST['item-name'])||empty($_POST['item-price'])||empty($_POST['item-des'])){
    echo "<script>alert('Please fill in all the details');window.location='manageShop.php';</script>";
  }elseif(empty($_FILES['item-image']['name'])){
    echo "<script>alert('Please insert an image');window.location='manageShop.php';</script>";
  }elseif(mysqli_num_rows($query)>0){
      $message[] = 'Item already exists';
  }
  else{
    $sql = "INSERT INTO shop (item_name,item_price,item_des,item_image)VALUES
            ('$p_itemname','$p_itemprice','$p_itemdes','$p_image')";

    mysqli_query($db,$sql);
    
    if(move_uploaded_file($tempname,$folder)){
      $message[] = 'Item details submitted successfully!';
    }else{
      $message[] = 'Sorry something went wrong!';
    }
  }
}

if(isset($_POST['update'])){
  $id = $_POST['edit_id'];
  $item_name = $_POST['item-name'];
  $item_price = $_POST['item-price'];
  $item_des = $_POST['item-des'];
  
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

  $sql = "UPDATE shop SET item_name='$item_name',item_price='$item_price',item_des='$item_des',
          item_image='$profile_name' WHERE item_id = $id";
  
  mysqli_query($db,$sql);

  $message[] = 'Updated';
}

if(isset($_GET['delete'])){
	$delete_id = $_GET['delete'];
	mysqli_query($db, "DELETE FROM shop WHERE item_id = '$delete_id'");
	header('location:manageShop.php');
 }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Product</title>
    <script src="https://kit.fontawesome.com/a84d485a7a.js" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
  <body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="dashboard.html">Manage Product</a>
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
                    <a class="nav-link" href="managePets.php"><i class="fa-solid fa-paw"></i> Manage Pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="manageShop.php"><i class="fa-solid fa-shop"></i> Manage Products</a>
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
      <form action="" method="post" class="add-item-form" enctype="multipart/form-data">
        <h2><i class="fa-solid fa-cart-plus"></i> Add New Product</h2>
        <label>Product Name</label>
        <input type="text" name="item-name" placeholder="Item Name" class="form-control"><br>
        <label>Product Price</label>
        <input type="text" name="item-price" placeholder="Item Price" class="form-control"><br>
        <label>Product Description</label>
        <textarea name="item-des" placeholder="Item Description" rows="4" cols="50" class="form-control"></textarea><br>
        <label>Insert Image</label>
        <input type="file" name="item-image" class="form-control" accept="image/png, image/jpg, image/jpeg"><br>
        <input type="submit" name="add-item" value="Add Item" class="btn btn-primary">
      </form>
      <br>
      
      <?php 
      $sql = "SELECT * FROM shop";
      $result = $db->query($sql);
      $db->close();
      ?>

      <table class="table table-striped table-hover">
        <tr>
          <th>Image</th>
          <th>Product Name</th>
          <th>Product Price</th>
          <th>Product Description</th>
          <th>Actions</th>
        </tr>
        <?php 
        while($row = $result->fetch_assoc()){
        ?>
        <tr>
          <th><img src="../uploads/<?php echo $row['item_image'];?>" width="100px" height="100px"></th>
          <th><?php echo $row['item_name']; ?></th>
          <th><?php echo $row['item_price']; ?></th>
          <th><?php echo $row['item_des']; ?></th>
          <th>
            <button type="button" class="btn btn-success editBtn" style="box-shadow: -1px 8px 20px 1px rgba(143,159,209,0.66);" data-bs-toggle="modal" 
            data-bs-target="#editModal<?php echo $row['item_id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
            <br><br>
            <a href="manageShop.php?delete=<?php echo $row['item_id']; ?>" 
            onclick="return confirm('Delete this item?')" class="btn btn-danger" style="box-shadow: -1px 8px 20px 1px rgba(143,159,209,0.66);">
			      <i class="fas fa-trash"></i></a>
        </th>
        </tr>
      <!--Edit Modal Pop Up-->
      <div class="modal fade" id="editModal<?php echo $row['item_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square"></i> Edit Pets</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
          <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label><b>Product Name</b></label>
                <input type="text" name="item-name" value="<?php echo $row['item_name']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label><b>Price</b></label>
                <input type="text" name="item-price" value="<?php echo $row['item_price']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label><b>Product Description</b></label>
                <input type="text" name="item-des" value="<?php echo $row['item_des']; ?>" class="form-control">
              </div><br>
              <div class="form-group">
                <label><b>Insert Image</b></label>
                <input type="file" name="profile" class="form-control form-control-sm" accept="image/png, image/jpg, image/jpeg">
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="edit_id" value="<?php echo $row['item_id']; ?>">
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
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>