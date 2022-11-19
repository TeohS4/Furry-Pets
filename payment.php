<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Payment</title>
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
                <li><a href="index.php">Home</a></li>
                <li>Payment Receipt</li>
            </ol>
        
        </div>
    </div><!-- End Breadcrumbs -->

    <form action="payment.php" method="post">

    <?php
		if (isset($_SESSION['cust_id'])) {
			$cust_id = $_SESSION['cust_id'];
		}

        $query = "SELECT * FROM creditcard card, user cust 
                Where card.cust_id = cust.cust_id
                AND card.cust_id = $cust_id order by card_id desc";

        $okay = true;

        mysqli_select_db($db, 'furrypets');

        echo'
            <div class="container py-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center pb-5">
                            <div class="col-md-7 col-xl-5 mb-4 mb-md-0">
                                <div class="py-4 d-flex flex-row">
                                    <h5><span class="far fa-check-square pe-2"></span><b>Furry Pets</b> |</h5>
                                    <span class="ps-2">Payment</span>
                                </div>

                                    <div class="pt-2">
                                        <div class="d-flex pb-2">
                                            <div class="ms-auto">
                                                <p class="text-primary">
                                                    <i class="fas fa-plus-circle text-primary pe-1"></i><a href="card.php">Add payment card</a>
                                                </p>
                                            </div>
                                        </div>';

                                    if ($r = mysqli_query($db, $query)) {
                                        if (mysqli_num_rows($r) > 0 ) { 
                                            while ($row = mysqli_fetch_array($r)) {
                                    
                                                $card_id= $row['card_id'];
                                                $card_name= $row['card_name'];
                                                $card_number= $row['card_number'];
                                                    
                                                echo'                                          
                                                    <div class="d-flex flex-row pb-3">
                                                        <div class="d-flex align-items-center pe-2">
                                                            <input type="radio" class="form-check-input" name="choose_card"/>
                                                        </div>
                                                        <div class="rounded border d-flex w-100 p-3 align-items-center">
                                                            <p class="mb-0">
                                                            <i class="fab fa-cc-visa fa-lg text-primary pe-2"></i>'. $row['card_name'] .'
                                                            </p>

                                                            <div class="ms-auto">'. $row['card_number'] .'</div>
                                                        </div>
                                                    </div>';
                                                    
                                            }
                                        }

                                        else {
                                            echo '<tr><td colspan="5" class="text-center"><br/><br/><br/><br/><br/>No result found.<br/><br/><br/><br/></td></tr>';
                                        }
                                    }
                        
                                    else {
                                        echo mysqli_error($db) . "The query was: " . $query;
                                    }	
    
        echo'<input type="submit" value="Proceed to payment" class="btn btn-primary btn-block btn-lg">
			    <input type="hidden" name="payment" value="true">
                            </div>
                        </div>
                    
                            <div class="col-md-5 col-xl-4 offset-xl-1">
                                <div class="py-4 d-flex justify-content-end">
                                    <h6><a href="cart.php">Cancel and return to website</a></h6>
                                </div>';

                            $query2 = "SELECT * FROM user cust, cart cart, cart_details, shop s
                                        WHERE cust.cust_id = cart.cust_id 
                                        AND cart_details.item_id = s.item_id
                                        AND cart.cust_id = $cust_id";

                            if ($r = mysqli_query($db, $query2)) {
                                if (mysqli_num_rows($r) > 0) {

                                echo'
                                <div class="rounded d-flex flex-column p-2" style="background-color: #f8f9fa;">
                                    <div class="p-2 me-3">
                                        <h4>Order Receipt</h4>
                                    </div>';

                                    $total = 0;

                                    while ($row = mysqli_fetch_array($r)) {
                                            $item_id = $row['item_id'];
                                            $item_name = $row['item_name'];
                                            $item_price = $row['item_price'];
                                            $item_qty = $row['item_qty'];

                                        $total += $item_price;

                                   echo' <div class="p-2 d-flex">
                                        <div class="col-8">' . $item_name . '</div>
                                        <div class="ms-2">' . $item_qty . '</div>
                                        <div class="ms-auto">' . $item_price . '</div>
                                    </div>';

                                    echo'<div class="border-top px-2 mx-2"></div>';

                                        }

                                    echo'<div class="p-2 d-flex pt-3">
                                        <div class="col-8"><b>Total</b></div>';
                                        echo'<div class="ms-auto fw-bold" id="totalprice">'. $total. '</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';              
                                    
                                }
                                else {
                                    echo '
                                    <hr>
                                        <div class="col-12 d-flex justify-content-center align-items-center flex-column" style="height: 70vh;">
                                            <img src="img/emptycart.png" width="20%">
                                            <span class="mt-4 mb-2 text-muted">Oops, your receipt is empty.</span>
                                            <span class="mb-4 text-muted">Browse our awesome Furry Pets Shop now!</span>
                                            <a href="shop.php"><button class="btn btn-primary text-light" type="button" style="box-shadow: -1px 8px 20px 1px rgba(143,159,209,0.66);">Browse</button></a>
                                        </div>';			
                                }
                            }

                            else {
                                echo 'Error: '.mysqli_error($db);
                            }
            echo'
                    </div>
                    </div>
                    </div>
                </div>
            </div>';
                                    
        ?>
        <?php
        if (isset($_POST['payment'])) {
        if (isset($_SESSION['cust_id'])) { 

            $query3 = "SELECT * FROM user cust, cart cart, creditcard c
                        WHERE cust.cust_id = cart.cust_id 
                        AND c.cust_id = c.card_id
                        AND cart.cust_id = $cust_id";

            $select = "SELECT * FROM cart
            WHERE cust_id = $cust_id";

            $r = mysqli_query($db, $select);
            $row = mysqli_fetch_array($r);
            $cart_id = $row['cart_id'];
  
            $query4 = "INSERT INTO payment (payment_id, cart_id, cust_id, card_id, payment_date, payment_amount)
                        VALUES (0, $cart_id, $cust_id, $card_id, now(), $total)";

            mysqli_query($db, $query4);
            
            echo"<script>
                window.location = 'payment_history.php';
                </script>";
        }
      }
      ?>
        
        <br/>
        <?php include "footer.php"?> 

    </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>  
</html>