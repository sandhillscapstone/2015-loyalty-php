<?php
session_start();

if (isset($_SESSION["logged_in"]))
{
?>

<!DOCTYPE html>

<html>

<head>

	<title>MeanBean Freebies Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="styleSheet.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- link to external jQuery file -->
    <script src="calculator.js"></script>
	

	
</head>

<body>

<!-- Navigation Bar -->

<nav class="navbar navbar-inverse" style="margin-bottom:0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="custSearch.php">MeanBean</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="admin.php">Admin</a></li>
        <li><a href="adminAddCustomer.php">New Customer</a></li>
        <li><a href="custSearch.php">Search</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- End Navigation Bar -->

<!-- Start Freebies Container -->

<?php include 'freebiesPopulate.php'; ?>


<div class="container-fluid">

<div class="row">

<div class="col-sm-5 col-md-5 col-lg-5">

	<div class="row" >

	     <div class="col-sm-12 col-md-12 col-lg-12">

			<table style="margin-top:10px;">

				<th colspan="2" style="border-bottom:1px solid black;text-align:center;font-size:25px;">Customer Information</th>
				<input type="hidden" id="customerid" value='<?php echo $row['CustomerID']; ?>'>
               	<tr style="font-size:20px;"><td style="font-weight:bold;padding-bottom:10px;">Name:</td><td id="customerName" style="padding-bottom:10px;"><?php echo $row['FirstName']." ".$row['LastName']; ?></td></tr>
				<tr style="font-size:20px;"><td style="font-weight:bold;padding-bottom:10px;">Points in System:</td><td id="systemPoints" style="padding-bottom:10px;"><?php echo $row['Points']; ?></td></tr>
				<!-- <tr style="font-size:20px;"><td style="font-weight:bold;padding-bottom:10px;">Freebies:</td><td id="customerFreebies" style="padding-bottom:10px;"></td></tr> -->
				<tr style="font-size:20px;"><td style="font-weight:bold;padding-bottom:10px;">Points to +/- :</td><td id="customerPoints" style="padding-bottom:10px;"></td></tr>

			</table>

		</div>
	</div>



</div>

<div class="col-sm-7 col-md-7 col-lg-7">

<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<br>
		<div id="calc_display" style="border:1px solid black;height:75px;width:273px;margin-left:10px;text-align:center;font-size:54px;"></div>
			<input type="button" value="1" class="numberButtons" style="margin:10px;width:75px;height:75px;"/>
			<input type="button" value="2" class="numberButtons" style="margin:10px;width:75px;height:75px;"/>
			<input type="button" value="3" class="numberButtons" style="margin:10px;width:75px;height:75px;"/>
			<input type="button" value="Add" id="add" style="margin:10px;width:100px;height:75px;"/><br>
			<input type="button" value="4" class="numberButtons" style="margin:10px;width:75px;height:75px;"/>
			<input type="button" value="5" class="numberButtons" style="margin:10px;width:75px;height:75px;"/>
			<input type="button" value="6" class="numberButtons" style="margin:10px;width:75px;height:75px;"/>
			<input type="button" value="Subtract" id="minus" style="margin:10px;width:100px;height:75px;"/><br>
			<input type="button" value="7" class="numberButtons" style="margin:10px;width:75px;height:75px;"/>
			<input type="button" value="8" class="numberButtons" style="margin:10px;width:75px;height:75px;"/>
			<input type="button" value="9" class="numberButtons" style="margin:10px;width:75px;height:75px;"/>
			<input type="button" value="Redeem" id="redeem" style="margin:10px;width:100px;height:75px;"/>
			<br>
               <input type="button" value="Clear" id="clear" style="margin:10px;width:75px;height:75px;"/>
			<input type="button" value="0" class="numberButtons" style="margin:10px;width:75px;height:75px;"/>
		</div>
</div>

</div>

</div>

</div>

<!-- End Freebies Container -->

</body>

</html>

<?php
}
else{
	
	echo "You are not logged in.  Click the <a href='login.php'>login page</a> link.";
}
?>