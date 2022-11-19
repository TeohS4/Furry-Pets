<?php
    $dbc = mysqli_connect("localhost",'root','','furrypets');
?>

<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a84d485a7a.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Date', 'Amount'],
            <?php
                $sql = "SELECT * FROM payment";
                $query = mysqli_query($dbc, $sql);

                while($result = mysqli_fetch_assoc($query)){
                    echo"['" .$result['payment_date']. "'," .$result['payment_amount']."],";
                }
            ?>
            ]);

            var options = {
            title: 'FurryPets Payment',
            hAxis: {title: 'Date & Time',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        </script>
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
                    <a class="nav-link" aria-current="page" href="dashboard.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
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
                    <a class="nav-link active" href="admin_payment.php"><i class="fa-solid fa-money-check"></i> Payment History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../chat/admin_login.php"><i class="fa-solid fa-headset"></i> Live Chat</a>
                </li>
              </ul>
              </form>
            </div>
          </div>
        </div>
      </nav><br><br>
        <div class="container">
        <br/>
        <?php
			if(!$dbc) {
				die("Unable to connect" . mysqli_error($connection));
			}

				if (isset($_SESSION['payment'])) {
					$login = true;
					mysqli_select_db($dbc, 'furrypets');
				}
	
            $query = "SELECT SUM(payment_amount) AS total_amount FROM payment";
                
                if ($r = mysqli_query($dbc, $query)) { 
                    $row = mysqli_fetch_array($r);
                    $total_amount = number_format($row['total_amount'],2);
                }
                else {
                    echo mysqli_error($dbc) . "The query was: " . $query;
                }    
                
            echo'<div class="row">
                <div class="col-sm-6">
                <div class="card text-bg-light mb-3 border-0 border-top border-dark border-5 shadow rounded-3">
                    <div class="card-body">
                    <h5 class="card-title">Total Payment</h5>
                    <p class="card-text"><b>RM '.$total_amount.'</b></p>
                    </div>
                </div>
                </div>';
                
            $query = "SELECT MAX(payment_amount) AS highest_amount FROM payment";
                    
                if ($r = mysqli_query($dbc, $query)) { 
                    $row = mysqli_fetch_array($r);
                    $highest_amount = number_format($row['highest_amount'], 2);
                }
                else {
                    echo mysqli_error($dbc) . "The query was: " . $query;
                }

            echo'<div class="col-sm-6">
                <div class="card text-bg-light mb-3 border-0 border-top border-dark border-5 shadow rounded-3">
                    <div class="card-body">
                    <h5 class="card-title">Highest Amount</h5>
                    <p class="card-text"><b>RM '.$highest_amount.'</b></p>
                    </div>
                </div>
                </div>
            </div>';
            ?>
        </div>
            <br/>
            <h1 align="center">Total Payment</h1>
            <br/>

            <div id="chart_div" style="width: 1500px; height: 500px;"></div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>