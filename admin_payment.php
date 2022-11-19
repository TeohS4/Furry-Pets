<?php
    $dbc = mysqli_connect("localhost",'root','','furrypets');
?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Date', 'Amount'],
            <?php
                $sql = "SELECT * FROM  payment";
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
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Total Payment</h5>
                    <p class="card-text">RM '.$total_amount.'</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Highest Amount</h5>
                    <p class="card-text">RM '.$highest_amount.'</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                </div>
            </div>';
            ?>

            <br/>
            <h1 align="center">Total Payment</h1>
            <br/>

            <div id="chart_div" style="width: 2000px; height: 500px;"></div>

    </body>
</html>