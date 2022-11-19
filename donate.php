<!DOCTYPE html>
<html>
<head>

	<title>Donate</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/img/FurryPets.png" rel="icon">
  <link rel='stylesheet' id='tablepress-default-css'  href='https://www.paws.org.my/wp-content/tablepress-combined.min.css?ver=3' type='text/css' media='all' />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">

  <style>
    table.tablepress th, table.tablepress td {
    color: #666666 !important;
}	
.flex-container {
  display: flex;
}

.flex-container > div {
  background-color: #f1f1f1;
  margin: 40px;
  padding: 70px;
}
</style>
    <body>
<?php 

include('header.php'); 
include('connect.php'); 
?>
 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs d-flex align-items-center" style="background-image: url('img/donate-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Donate</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Donate</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->
<div class=" col-sm-2 col-lg-10 mx-auto p-5 p-md-5 mb-4">
    <div class="col-sm-2 col-lg-10 mx-auto px-0 d-flex">
    <p align="center" class="col-sm-2 col-lg-12 text display-7">Thank you so much for choosing FurryPets as your charity of choice.</p>
    </div><br>  
    <div class="col-sm-2 col-lg-10 mx-auto px-0 d-flex">
    <h1 align="center"class="col-sm-2 col-lg-12 text display-4 fw-bolder">Your Donation will Provide...</h1>
</div>
<div class="flex-container">
<div>
    <p align="center"class="text display-6 fw-bolder">RM 55</p>
  <p align ="center" class=" text display-7">Vaccination & Deworming</p></div>
  <div>
    <p align="center"class="text display-6 fw-bolder">RM 70</p>
  <p align=" center" class=" text display-7">Fills the bowl of a hungry animal</p></div>
  <div>
    <p align="center"class="text display-6 fw-bolder">RM 120</p>
  <p align=" center" class=" text display-7">Spraying/neutering for cats/ dogs</p></div>
</div>
      <p align="center"> *all prices are subject to change based on the cost of the medical supplies.</p><br>
      <div align =" center" class="col">
		<a href="donate_amount.php"><button type="button" class="btn btn-dark text-light">Donate Now</button></a></div>
</div>
  </div>
  <br>
<div class="row border col-7 d-flex justify-content-center align-items-center mx-auto" 
style="backdrop-filter:blur(200px);border-radius:20px;background-color: rgba(255, 255, 255, 0.183);box-shadow: 0px 0px 15px 1px rgba(0,0,0,0.08);"> 

    <div class="col-10 d-flex justify-content-center align-items-center flex-column">   
        <br/>
        <form action="donate.php" class="col-12" method="post" enctype="multipart/form-data">
        <br/>

  <br/>
  <h1 style="text-align:center">Wishlist</h1>
  <br/>
  <p>There are many ways you can help us. If you plan to visit our shelter, do remember to bring along any of the items featured below as sometimes even your throwaways can be put to good use at FurryPets. The list below ranges from the very important (and somewhat costly) to daily household items that cost next to nothing.</p>
  <p>Contact us via FurryPets@gmail.com if you not available for visit us.</p>
  <table id="tablepress-4" class="tablepress tablepress-id-4">
<thead>
<tr class="row-1 odd">
	<th class="column-1">Item</th><th class="column-2">Description</th>
</tr>
</thead>
<tbody class="row-hover">
<tr class="row-2 even">
	<td class="column-1">Cash Donations</td><td class="column-2">For food, medicines, salaries, shelter repairs, etc.</td>
</tr>
<tr class="row-3 odd">
	<td class="column-1">Canned Pet Food <strong>(URGENT!)</strong> or Dry Pet Food</td><td class="column-2">For our puppies, adult dogs, kittens and adult cats <strong>(URGENT!)</strong></td>
</tr>
<tr class="row-4 even">
	<td class="column-1">Stainless Steel Dog Bowls</td><td class="column-2">20cm in diameter</td>
</tr>
<tr class="row-5 odd">
	<td class="column-1">Dog Cages</td><td class="column-2">3ft × 3ft × 3ft</td>
</tr>
<tr class="row-6 even">
	<td class="column-1">Cat Litter</td><td class="column-2">Pinewood or tofu type</td>
</tr>
<tr class="row-7 odd">
	<td class="column-1">Pest Preventives</td><td class="column-2">Advocate, Frontline, Revolution (or other similar products)</td>
</tr>
<tr class="row-8 even">
	<td class="column-1">Surgical Gloves</td><td class="column-2">Sizes 6.5 and 8</td>
</tr>
<tr class="row-9 odd">
	<td class="column-1">Laundry Detergent Powder / Bleach / Liquid Hand Soap <strong>(URGENT!)</strong></td><td class="column-2">For washing the animals’ bedding, cleaning their cages or to wash our hands after handling them <strong>(URGENT!)</strong></td>
</tr>
<tr class="row-10 even">
	<td class="column-1">Large Garbage Bags</td><td class="column-2">There is always a mess to clear up!</td>
</tr>
<tr class="row-11 odd">
	<td class="column-1">Kitchen Towel / Roll</td><td class="column-2">There is always a mess to clear up!</td>
</tr>
<tr class="row-12 even">
	<td class="column-1">Old Newspapers</td><td class="column-2">As lining for cages and floors during transportation of animals and at events</td>
</tr>
<tr class="row-13 odd">
	<td class="column-1">Human-Grade Rice</td><td class="column-2">For our kennel workers</td>
</tr>
<tr class="row-14 even">
	<td class="column-1">Appliances / Furniture (preloved)</td><td class="column-2">Table or stand fan, fridge, office chair (small), table (large: approx. 9ft x 5ft)</td>
</tr>
<tr class="row-15 odd">
	<td class="column-1">Office Supplies</td><td class="column-2">Printer ink (Canon Ink 47 black / 57 colour / 740 black / 741 colour)</td>
</tr>
<tr class="row-16 even">
	<td class="column-1">Your Extra Time</td><td class="column-2">As a volunteer! Even if you only come once, you would be making a big difference to these animals’ lives.</td>
</tr>
<tr class="row-17 odd">
	<td class="column-1">Your Home &amp; Unconditional Love</td><td class="column-2">There are over 200 animals waiting for a new home at our shelter at any given time. Save a life by adopting today!</td>
</tr>
</tbody>
</table>
<br>
<p>Note: For all the relevant items above, any brand/grade will do. As we use these items in large amounts, going for quantity over quality would be advisable.

Thank you for your generosity and support!</p>
<br>
  </div>
  <br/>
</div>
</div>


<br/><br/><br/>
   <?php include "footer.php"?> 
</body>
</html>
