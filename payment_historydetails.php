<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Payment - history details</title>

        <link rel="icon" href="images/titleicon.png">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&family=Sofia&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        <style>
            body {
                margin: 50px;
            }
        </style>
    </head>

    <body>
    <?php 
        $page = "payment";
        include('header.php'); 
        include('connect.php'); 
    ?>

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        
            <h2>Payment Receipt</h2>
            <ol>
                <li><a href="payment_history.php">Payment History</a></li>
                <li>Payment Receipt</li>
            </ol>
        
        </div>
    </div><!-- End Breadcrumbs -->

<?php
    if (!$db) {
		die("Error: " . mysqli_connect_error($db));
	}

	if (isset($_SESSION['cust_id'])) {
		$cust_id = $_SESSION['cust_id'];
    }

	
	if (isset($_GET['payment_id'])) {
		$payment_id = $_GET['payment_id'];
		
		$query = "SELECT * FROM payment p, user cust, creditcard c, shop s, cart cart, cart_details cartdetails
        WHERE p.cust_id = cust.cust_id
        AND cust.cust_id = cart.cust_id 
		AND cartdetails.item_id = s.item_id
        AND c.cust_id = cust.cust_id
        AND p.payment_id = $payment_id";

        $item_names = array();

		if ($r = mysqli_query($db, $query)) {
            while ($row = mysqli_fetch_array($r)) {
                $payment_id= $row['payment_id'];
				$payment_date= $row['payment_date'];
				$payment_amount= $row['payment_amount'];

                $cart_id = $row['cart_id'];
                $card_number= $row['card_number'];
                $item_name= $row['item_name'];
                $username= $row['username'];
                array_push($item_names, $row['item_name']);
            }
                
        }
        else {
            echo mysqli_error($db) . "The query was: " . $query;
        }
        
        $item_names = implode(" , ", $item_names);

                echo '
                    <div class="col-sm-6 col-lg-6 mx-auto">
                    <br/>
                    <div class="print_title d-flex justify-content-center align-items-center flex-column">
                    <h4>Furrypets Company</h4>
                    <p class="mb-1">1-45-7B & 7, All Season Jalan Ikan, Allau 10600 Air Itam, Pulau Pinang</p>
                    <p>04-4344019</p>
                </div>';

                    echo'<div class="receipt border rounded p-5">
                        <h4>Receipt</h4>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <tr>
                                    <td>Payment ID</td>
                                    <br/><br/><br/>
                                    <td>Date & Time</td>
                                    <br/><br/><br/>
                                    <td>Username</td>
                                    <br/><br/><br/>
                                    <td>Credit Card Number</td>
                                    <br/><br/><br/>
                                    <td>Item Name</td>
                                    <br/><br/><br/>
                                    <td>Amount</td>
                                </tr>
                            </div>';
                            
                            echo'<div class="col text-end">
                                <tr>';
                                    echo"<td>{$payment_id}</td>
                                    <br/><br/><br/>
                                    <td>{$payment_date}</td>
                                    <br/><br/><br/>
                                    <td>{$username}</td>
                                    <br/><br/><br/>
                                    <td>{$card_number}</td>
                                    <br/><br/><br/>
                                    <td>{$item_names}</td>
                                    <br/><br/><br/>
                                    <td>RM{$payment_amount}</td>";
                                echo"</tr>
                            </div>
                        </div>
                <br/><br/>";	
				
				echo'<div class="row">
                    <div class="col-7 text-end">
                        <a href="payment_history.php"><button type="button" class="btn btn-dark text-light">Back to Payment History</button></a>
                    </div>        
                    <div class="col-5">            
                    <a href="#"><button type="button" class="btn btn-dark text-light" button onclick="window.print();">Print Receipt</button></a>
                    </div>
                </div>
                </div>
                </div>';
	}
    ?></br></br>
<?php
    include('footer.php');
    
?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>