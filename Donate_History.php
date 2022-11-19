<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Receipt</title>

    <style>
	.print_title *{
		display: none;
	}
	@media print {
		body * {
			visibility: hidden;
		}
		.receipt *{
			visibility: visible;
		}
		.print_title *{
			display: block;
			visibility: visible;
		}
    }
	</style>

</head>

<body>
<?php include('header.php'); ?>
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Donate</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Donate History</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <br/>
    <div class="col-6 mx-auto">
        <div class="alert alert-success" role="alert">
            <span class="fs-4 fw-bold">Donate Done - </span>
            <span class="fs-5">Thanks for your donate! One good turn deserves another.</span>
        </div>

        <br/>

    <?php
        include('connect.php');

		if (!$dbc) {
			die("Error: " . mysqli_connect_error($dbc));
		}
		
		if (isset($_SESSION['cust_id'])) {
			$cust_id = $_SESSION['cust_id'];
		}

        $query = "SELECT * FROM donation d, user c 
                    Where d.cust_id = c.cust_id
                    AND d.cust_id = $cust_id  order by donation_id desc";

            $okay = true;

            if ($r = mysqli_query($dbc, $query)) {

                //if no record found
                if (mysqli_num_rows($r) == 0) {
                    echo "Donation and User not found.";
                }

                else {
                    while ($row = mysqli_fetch_array($r)) {
                        echo '<br/><br/><br/><br/><br/><br/>
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
                                            <td>Donate ID</td>
                                            <br/><br/><br/>
                                            <td>Date & Time</td>
                                            <br/><br/><br/>
                                            <td>Name</td>
                                            <br/><br/><br/>
                                            <td>E-mail</td>
                                            <br/><br/><br/>
                                            <td>Donation (RM)</td>
                                        </tr>
                                </div>';
                            
                                echo'<div class="col text-end">
                                <tr>';
                                    echo"<td>{$row['donation_id']}</td>
                                    <br/><br/><br/>
                                    <td>{$row['donation_datetime']}</td>
                                    <br/><br/><br/>
                                    <td>{$row['username']}</td>
                                    <br/><br/><br/>
                                    <td>{$row['email']}</td>
                                    <br/><br/><br/>
                                    <td>RM{$row['donation_amount']}</td>";
                                echo"</tr>
                                </div>
                            </div>
                        </div>
                        <br/>";
                    

                        echo'<div class="row">
                            <div class="col-6 text-end">
                                <a href="Donate.php"><button type="button" class="btn btn-primary text-light">Go Back!</button></a>
                            </div>
                            <div class="col-6">
                                
                                <a href="#"><button type="button" class="btn btn-primary text-light" button onclick="window.print();">Print Receipt</button></a>
                            </div>
                        </div>';
                    }
                }
            }

            else{
                echo "Fail to donate because: <br/>" . mysqli_error($dbc) . "The query was: " . $query;
            }
        /*}*/
    ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>