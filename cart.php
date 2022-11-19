<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Cart</title>
	
	<style>
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		    -webkit-appearance: none;
		    margin: 0;
		}
		body {
		    background: #edeff5
	    }
	</style>
</head>

<body>

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Cart</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li><i class="fa-solid fa-cart-shopping"></i></li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

<?php
	include('header.php');
	
	echo '
	<br/>
	<form action="cart.php" method="post">
    <div class="col-9 mx-auto">';

	//connect the database
    $dbc = mysqli_connect('localhost', 'root', '');

    if (!$dbc) {
		die("Error: " . mysqli_connect_error($dbc));
	}

    //select the database
    mysqli_select_db($dbc, 'furrypets');

	if (isset($_SESSION['cust_id'])) {
		$cust_id = $_SESSION['cust_id'];
	
	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_GET['item_id']) && isset($_GET['item_qty'])) {
		$query = "SELECT * FROM cart
          WHERE cust_id = $cust_id";
        $r = mysqli_query($db, $query);
		$row = mysqli_fetch_array($r);
        $cart_id = $row['cart_id'];
		$query = "UPDATE cart_details SET item_qty = {$_GET['item_qty']} 
					WHERE item_id = {$_GET['item_id']}
					AND cart_id = $cart_id";
		if (!mysqli_query($dbc, $query)) {
			echo mysqli_error($dbc) . "The query was: " . $query;
		}
	}

	if (isset($_POST['checkout'])) {
		?>
		<script>
		window.location = 'payment.php';
		</script>
		<?php
	}
	
	if (isset($_GET['delete'])) {
		$query = "SELECT * FROM cart
          WHERE cust_id = $cust_id";
        $r = mysqli_query($db, $query);
		$row = mysqli_fetch_array($r);
        $cart_id = $row['cart_id'];

		$query = "DELETE FROM cart_details
					WHERE item_id = {$_GET['item_id']}
					AND cart_id = $cart_id";

		if (mysqli_query($dbc, $query)) {
			?>
			<script>
			window.location = 'cart.php';
			</script>
			<?php
		}
		else {
			echo mysqli_error($dbc) . "The query was: " . $query;
		}
	}

    $query = "SELECT * FROM user cust, cart cart, cart_details, shop s
				WHERE cust.cust_id = cart.cust_id 
				AND cart_details.item_id = s.item_id
				AND cart_details.cart_id = cart.cart_id
				AND cart.cust_id = $cust_id";

    if ($r = mysqli_query($dbc, $query)) {
        if (mysqli_num_rows($r) > 0) {
			echo'
				<br/>
				<table class="table table-hover align-middle" style="display: block; height: 80vh; overflow: auto;">
					<tr>
						<th></th>
						<th>Item Logo</th>
						<th>Item Name </th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th></th>
					</tr>';
				
			while ($row = mysqli_fetch_array($r)) {
				$item_id = $row['item_id'];
				$item_name = $row['item_name'];;
				$item_price = $row['item_price'];
				$item_image = $row['item_image'];
				$item_des = $row['item_des'];

				$cart_id = $row['cart_id'];

				$item_qty = $row['item_qty'];
				$currentDateTime = date('Y-m-d H:i');
				
				$item_add = $item_id . ", " . $item_name . ", " . $item_price . ", " . $item_image . " " . $item_des;

						if ($item_qty == 0) {
							echo '
							<tr>
								<td></td>
								<td class="col-2 pt-3 pb-3">
									<img src="uploads/' . $item_image . '" class="img-thumbnail" alt="">
								</td>
								<td class="col-6">
									<p class="fs-5 fw-bold"><a href="shop.php?item_id=' . $item_id . '" class="text-decoration-none text-dark">' . $item_name . '</a></p>
									<p class="text-muted">' . $item_add . '</p>
								</td>
								<td class="col-4" colspan="2">
									<div class="alert alert-danger" role="alert">You need to go back shop order again.</div>
								</td>';
						}
						
						else {
							echo '
							<tr>
								<td>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="box_selected[]" value="' . $item_id . '" onclick="calcTotalPrice(this.id, '. $item_qty . ', ' . $item_price . ')" id="cart' . $item_id . '">
									</div>
								</td>
								<td class="col-2 pt-3 pb-3">
									<img src="uploads/' . $item_image . '" class="img-thumbnail" alt="">
								</td>
								<td class="col-6">
									<p class="fs-5 fw-bold"><a href="shop.php?item_id=' . $item_id . '" class="text-decoration-none text-dark">' . $item_name . '</a></p>
									<p class="text-muted">' . $item_add . '</p>
								</td>';
							if ($item_qty < $item_qty) {
								$item_qty = $item_qty;
								$query = "UPDATE cart SET item_qty = $item_qty
											WHERE item_id = $item_id 
											AND cust_id = $cust_id";

											
								if (!mysqli_query($dbc, $query)) {
									echo mysqli_error($dbc) . "The query was: " . $query;
								}
							}
							echo '
							<td class="col-3">
								<div class="input-group" style="width:40%" >
									<a href="cart.php?item_id=' . $item_id . '&item_qty=' . $item_qty - 1 . '"><button class="btn btn-outline-primary" type="button">-</button></a>
									<input class="form-control text-center" name="cart_item_qty['.$item_id.']" type="text" value="' . $item_qty . '">							
									<a href="cart.php?item_id=' . $item_id . '&item_qty=' . $item_qty + 1 . '"><button class="btn btn-outline-primary" type="button">+</button></a>
								</div>
							</td>
							<td class="col-1">
								<p class="fs-5 fw-bold">RM ' . $item_price . '</p>
							</td>
							';
							
						}
						echo '
						<td class="col-1">
							<a href="cart.php?delete=true&item_id=' . $item_id . '" class="btn btn-danger rounded-circle">
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>';

			}
			echo '</table>';

        }
		else {
			echo '
			<hr>
				<div class="col-12 d-flex justify-content-center align-items-center flex-column" style="height: 70vh;">
					<img src="img/emptycart.png" width="20%">
					<span class="mt-4 mb-2 text-muted">Oops, your shopping cart is empty.</span>
					<span class="mb-4 text-muted">Browse our awesome Furry Pets Shop now!</span>
					<a href="shop.php"><button class="btn btn-primary text-light" type="button" style="box-shadow: -1px 8px 20px 1px rgba(143,159,209,0.66);">Browse</button></a>
				</div>
			';			
		}
    }
    else {
        echo 'Error: '.mysqli_error($dbc);
    }
	}
	else {
			echo '
			<hr>
				<div class="col-12 d-flex justify-content-center align-items-center flex-column" style="height: 70vh;">
					<img src="img/emptycart.png" width="20%">
					<span class="mt-4 mb-2 text-muted">Oops, you haven\'t login yet.</span>
					<span class="mb-4 text-muted">Login and browse our awesome Furry Pets Shop now!</span>
					<a href="login.php"><button class="btn btn-primary text-light" type="button" style="box-shadow: -1px 8px 20px 1px rgba(143,159,209,0.66);">Login</button></a>
				</div>';	
	}
		
	echo '
    </div>
	<br><br><br><br><br>
    <div class="row col-9 fixed-bottom mx-auto d-flex align-items-center flex-column text-end bg-light">
        <hr>
        <div class="ps-4 pe-5">
            <span class="fs-4 fw-bold">Total : &nbsp; RM</span>
			<span class="fs-4 fw-bold" id="totalprice">0</span>
        </div>
        <div class="pt-3 pb-3 pe-4">
			<input type="submit" value="Check Out" class="btn btn-primary text-light" style="box-shadow: -1px 8px 20px 1px rgba(143,159,209,0.66);">
			<input type="hidden" name="checkout" value="true">
        </div>        
    </div>
</form>';

?>

	<script>

		var totalprice = document.getElementById("totalprice");
		var total = parseFloat(totalprice.innerHTML);

		window.onload = function(){
		var checkbox = document.getElementsByTagName("input");

		for(var i=0; i<checkbox.length; i++) {
			if(checkbox[i].type == "checkbox") {
				checkbox[i].checked = false;
			}
		}
		}

		function calcTotalPrice(checkbox_id, item_qty, item_price) {
			var checkbox = document.getElementById(checkbox_id);

			if (checkbox.checked==true) {
				total = total + (item_qty * item_price);
				totalprice.innerHTML = total.toFixed(2);
			}
			else {
				total = total - (item_qty * item_price);
				totalprice.innerHTML = total.toFixed(2);
			}
			
		}

	</script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>

</html>