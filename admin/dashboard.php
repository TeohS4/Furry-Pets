<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/a84d485a7a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="dashboard.html">Dashboard</a>
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
                    <a class="nav-link active" aria-current="page" href="dashboard.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="managePets.php"><i class="fa-solid fa-paw"></i> Manage Pets</a>
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
<?php 
include '../connect.php';
$total_donate = 0;
$row_count = 0;
$total_adopt = 0;
$total_sold = 0;

//Total Animals
$result = mysqli_query($db,"SELECT * FROM pets");
$row_count = mysqli_num_rows($result);

//Total Products
$result = mysqli_query($db,"SELECT * FROM shop");
$row_count_product = mysqli_num_rows($result);

//Total Product Sold
$result = mysqli_query($db,"SELECT * FROM payment");
$row_count_sold = mysqli_num_rows($result);

//Total Donation Earned
$count = mysqli_query($db, "SELECT donation_amount FROM donation");
while($row = mysqli_fetch_assoc($count)) {
    $total_donate += $row['donation_amount'];
}
//Product Sold Amount
$count = mysqli_query($db, "SELECT payment_amount FROM payment");
while($row = mysqli_fetch_assoc($count)) {
    $total_sold += $row['payment_amount'];
}
?>
      <div class="row g-0">
              <div class="col-sm-12 col-lg-3 px-4 pe-sm-4">
                <div class="card text-bg-light mb-3 border-0 border-top border-dark border-5 shadow rounded-3" >
                  <div class="card-body">
                    <i class="bi bi-calendar3-week" style="font-size: 20pt"></i>
                    <p class="card-text mt-2">Animals Available</p>
                    <h3 class="card-title"><?php echo $row_count; ?></h3>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-lg-3 px-4 pe-sm-4">
                <div class="card text-bg-light mb-3 border-0 border-top border-dark border-5 shadow rounded-3" >
                  <div class="card-body">
                    <i class="bi bi-calendar3-week" style="font-size: 20pt"></i>
                    <p class="card-text mt-2">Products Available</p>
                    <h3 class="card-title"><?php echo $row_count_product; ?></h3>
                  </div>
                </div>
              </div>
      </div>

      <div class="row g-0">
      <div class="col-sm-12 col-lg-3 px-4 pe-sm-4">
                <div class="card text-bg-light mb-3 border-0 border-top border-dark border-5 shadow rounded-3">
                  <div class="card-body">
                    <i class="bi bi-calendar3" style="font-size: 20pt"></i>
                    <p class="card-text mt-2">Total Animals Adopted</p>
                    <h3 class="card-title"><?php echo $total_adopt; ?></h3>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-lg-3 px-4 pe-sm-4">
                <div class="card text-bg-light mb-3 border-0 border-top border-dark border-5 shadow rounded-3">
                  <div class="card-body">
                    <i class="bi bi-calendar3" style="font-size: 20pt"></i>
                    <p class="card-text mt-2">Total Product Sold</p>
                    <h3 class="card-title"><?php echo $row_count_sold; ?></h3>
                  </div>
                </div>
              </div>
      </div>
      <div class="row g-0">
              <div class="col-sm-12 col-lg-3 px-4 pe-sm-4">
                <div class="card text-bg-light mb-3 border-0 border-top border-dark border-5 shadow rounded-3">
                  <div class="card-body">
                    <i class="bi bi-calendar3" style="font-size: 20pt"></i>
                    <p class="card-text mt-2">Total Donation Earned</p>
                    <h3 class="card-title">RM <?php echo $total_donate; ?></h3>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-lg-3 px-4 pe-sm-4">
                <div class="card text-bg-light mb-3 border-0 border-top border-dark border-5 shadow rounded-3">
                  <div class="card-body">
                    <i class="bi bi-calendar3" style="font-size: 20pt"></i>
                    <p class="card-text mt-2">Product Sold Amount</p>
                    <h3 class="card-title">RM <?php echo $total_sold; ?></h3>
                  </div>
                </div>
              </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>