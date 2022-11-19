<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Credit Card</title>

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
        $page = "card";
        include('header.php'); 
        include('connect.php'); 
    ?>
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Cards</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Cards</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <br/>
    <?php
        $dbc = mysqli_connect('localhost','root','','furrypets');

        $card_name = $card_number = $expire = $cvv = "";
        $card_nameErr = $card_numberErr = $expireErr = $cvvErr = "";

        if(isset($_POST['submitted'])){

            if (isset($_SESSION['cust_id'])) {

                $cust_id = $_SESSION['cust_id'];
                $card_name = ucwords(strtolower($_POST['card_name']));
                $card_number = $_POST['card_number'];
                $expire = $_POST['expire'];
                $cvv = $_POST['cvv'];
                $okay = true;

                //Name validation
                if (!ctype_alpha(str_replace(' ', '', $card_name))) {
                    $card_nameErr = "* Only letters and spaces are allowed". "<br>";
                    $okay = false;
                }

                //Number validation
                if (strlen($card_number) < 16 || !$card_number) {
                    $card_numberErr = "* Number must be at least 16 characters in length.". "<br>";
                    $okay = false;
                }

                //Number validation
                if (strlen($expire) < 5 || !$expire) {
                    $expireErr = "* Expire date must be at least 5 characters in length.". "<br>";
                    $okay = false;
                }

                //Number validation
                if (strlen($cvv) < 3 || !$cvv) {
                    $cvvErr = "* Cvv must be at least 3 characters in length.". "<br>";
                    $okay = false;
                }

                if ($okay) {
                    $query = "INSERT INTO creditcard (card_id, card_name, card_number, expire, cvv, cust_id)
                        VALUES (0, '$card_name', '$card_number', '$expire', '$cvv', $cust_id)";

                    if(mysqli_query($dbc, $query)) {

                           
                    }
                    
                    else {
                        echo "Fail to type in because: <br/>" . mysqli_error($dbc) . "The query was: " . $query;
                    }
                }
        

            //close the database
            mysqli_close($dbc);
                
            }   
            else {
                ?>
                    <script>
                    alert("Please login to your account before type in the cards.");
                    window.location.href = 'login.php';
                    </script>
                <?php
                        
            }
            
        }
                            
                        
    ?>

        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="card rounded-3">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h6>Cards</h6>
                        </div>
                                                    
                        <form action="card.php" class="col-8" method="post" enctype="multipart/form-data">
                        <p class="fw-bold mb-4">Add new card:</p>

                        <div class="form-outline mb-4">
                            <input type="text" name="card_name" class="form-control form-control-lg" required>
                            <label class="form-label">Cardholder Name</label>
                        </div>

                        <div class="form-outline mb-4">
                            <div class="form-outline">
                                <input type="text" name="card_number" class="form-control form-control-lg" required>
                                <label class="form-label">Card Number</label>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="form-outline">
                                    <input type="password" name="expire" class="form-control form-control-lg" required>
                                    <label class="form-label">Expire</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-outline">
                                    <input type="password"  name="cvv" class="form-control form-control-lg" required>
                                    <label class="form-label">Cvv</label>
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Add Card" class="btn btn-success btn-lg btn-block">   
			            <input type="hidden" name="submitted" value="true">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <br/>
    <?php include "footer.php"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>