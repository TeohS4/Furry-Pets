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

        <h2>Item</h2>
        <ol>
          <li><a href="shop.php">Shop</a></li>
          <li>Item</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <?php
    $db = mysqli_connect('localhost','root','','furrypets');

    $item_id = $_GET['item_id'];

    $sql = mysqli_query($db,"SELECT * FROM shop where item_id= $item_id");

      while($row = mysqli_fetch_array($sql)){
    
        echo'

        <br>
        <div class="container">
        <h2 align="center" style="font-family: Georgia, serif;"><b>Product Details</b></h2>
          <div class="card shadow-sm text-dark bg-light mb-3 bg-gradient">
            <div class="row row-cols-4 pb-5">

              <div class="col ps-5 pt-4 align-self-center">

                <div class="shadow bg-body rounded">
                <img src="uploads/'. $row['item_image'] .'" class="rounded" width="300"><br>
                </div>
                
              </div>

              <div class="col-6 pt-4 ps-5">
                <h4 style="font-family: Georgia, serif;><i class="fa-solid fa-circle-info"></i> <b>Name:</b> '.$row['item_name'].'</h4>
                <h4 style="font-family: Georgia, serif;><i class="fa-solid fa-tag"></i> <b>Price: RM</b> '.$row['item_price'] .'</h4>
                <h4 style="font-family: Georgia, serif;><i class="fa-solid fa-book-open"></i> <b>Description:</b><br>'. $row['item_des'].'</h4>
              </div>

              <div class="col text-center align-self-center">
                <form action="viewItem.php?item_id=' . $item_id .'" method="post">
                <button type="submit" value="Add to Cart" name="add_to_cart" class="btn btn-dark btn-lg btn-block"><i class="fa-solid fa-cart-arrow-down"></i> Add To Cart</button></a>
                <br><br>
              </form>
                <a href="shop.php" class="btn btn-primary btn-lg btn-block"><i class="fa-solid fa-circle-chevron-left"></i> Go Back</a><br><br>
              </div>
            </div>
          </div>
        </div>

    ';
      }

      if (isset($_POST['add_to_cart'])) {

        if (isset($_SESSION['cust_id'])){

          $query = "SELECT * FROM cart
          WHERE cust_id = $cust_id";

          if ($r = mysqli_query($db, $query)) {
            if (mysqli_num_rows($r) == 0) {

              $query2 = "INSERT INTO cart (cart_id, cust_id)
                         VALUES (0, $cust_id)";

              mysqli_query($db,$query2);
            }
          }
                $qty = 1;
                
                $item_qty =1;
                
                $row = mysqli_fetch_array($r);
                $cart_id = $row['cart_id'];

                $query3 = "INSERT INTO cart_details (cartdetails_id, item_id, item_qty, cart_id)
                            VALUES (0, $item_id, $qty, $cart_id)";
                            mysqli_query($db,$query3);
                // $qty = $_POST['item_qty'] + $row['item_qty'];
                $query4 = "UPDATE cart_details SET qty = $qty 
                          WHERE item_id = $item_id";

                  $query4 = "SELECT * FROM cart_details
                  WHERE item_id = $item_id
                  AND cart_id = $cart_id
                  AND item_qty = $item_qty";

                if (mysqli_query($db, $query4)) {
                  echo '<br/><div class="alert alert-success col-9 mx-auto" role="alert"> Item has been successfully added to the cart!</div>';
                }
       }
      }   
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  
    <script>
        var qtyInput = document.getElementById("qty");
        var qty = 0;
		var stock = <?php echo $box_qty; ?>;

        function addQty() {
			qty = parseInt(qtyInput.value);
			if (qty < stock) {
                qty = qty+1;
				qtyInput.value=qty;
            }
        }

        function minusQty() {
			qty = parseInt(qtyInput.value);
            if (qty > 1) {
                qty = qty-1;
                qtyInput.value=qty;
            }
        }
    </script>

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