<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Payment History</title>

	<style>
	table th, td {
		padding: 10px;
	}
	tbody [rowspan],
	tbody [rowspan] ~ th,
	tbody [rowspan] ~ td {
		border-top: 1px solid #d4d4d4;
	}
	table th {
		background: #ededed;
	}
	</style>
</head>

<body>
<?php
	include 'header.php';
	include 'connect.php';
?>
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Payment History</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Payment History</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->
</br></br>
<?php

    if (!$db) {
		die("Error: " . mysqli_connect_error($db));
	}

	if (isset($_SESSION['cust_id'])) {
		$cust_id = $_SESSION['cust_id'];
        
        echo '<br/><h1 class="col-9 mx-auto">Payment History</h1>
        <br/><table class="mx-auto" style="max-width:75%">
            <tr>
                <th width="5%" class="text-center">Payment ID</th>
                <th width="20%" class="text-center">Date & Time</th>
                <th width="5%" class="text-center">Payment Amount</th>
                <th width="5%" class="text-center"></th>
            </tr>';
    }
	
        $query = "SELECT * FROM payment p, user c 
        Where p.cust_id = c.cust_id
        AND p.cust_id = $cust_id  order by payment_id desc";
	
	if ($r = mysqli_query($db, $query)) {
		if (mysqli_num_rows($r) > 0 ) { 
			while ($row = mysqli_fetch_array($r)) {
				$payment_id= $row['payment_id'];
				$payment_date= $row['payment_date'];
				$payment_amount= $row['payment_amount'];
				
				echo"<tr>
				<td width=\"5%\" class=\"text-center\">{$row['payment_id']}</td>
					<td width=\"20%\" class=\"text-center\">{$row['payment_date']}</td>
					<td width=\"5%\" class=\"text-center\">RM {$row['payment_amount']}</td>
					<td width=\"10%\" class=\"text-center\"><a href=\"payment_historydetails.php?payment_id=$payment_id\"><button class=\"btn btn-dark rounded-circle\" style=\"width:38px;height:38px\"><i class=\"fa fa-angle-right text-light\" style=\"font-size:14pt\"></i></button></a></td>
			   </tr>";
			}
		}
		else {
			echo '<tr><td colspan="5" class="text-center"><br/><br/><br/><br/><br/>No result found.<br/><br/><br/><br/></td></tr>';
		}
        echo"</table><br/><br/><br/><br/>"; 
	}
    
    else {
        echo mysqli_error($db) . "The query was: " . $query;
    }	

	include('footer.php');
?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>