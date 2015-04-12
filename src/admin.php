<?php
session_start();

if (isset($_SESSION["logged_in"]) && isset($_SESSION["admin_logged_in"]))
{
?>
<!DOCTYPE html>

<html>

<head>

	<title>MeanBean Admin Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="styleSheet.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>

<body>

<!-- Navigation Bar -->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="custSearch.php">MeanBean</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="admin.php">Admin</a></li>
        <li><a href="AddCustomer.php">New Customer</a></li>
        <li><a href="custSearch.php">Search</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- End Navigation Bar -->

<!-- Start Admin Container -->

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
<center>
<div id="formRow" style="height:300px;width:330px;margin-left:auto;margin-right:auto;">
<div style="font-size:35px;font-weight:bold;margin-bottom:10px;border-bottom:1px solid silver;">Admin Dashboard</div>
<div class="adminBox" style="float:left;width:50%;">
<a href="AddCustomer.php"><input type="button" name="addCustomer" value="Add Customer" tabindex="1" style="font-size:20px;height:50px;margin-bottom:10px;width:180px;" /></a><br>
<a href="adminAddEmployee.php"><input type="button" name="addEmployee" value="Add Employee" tabindex="3" style="font-size:20px;height:50px;margin-bottom:10px;width:180px;" /></a><br>
<a href="accounting.php"><input type="button" name="accounting" value="Accounting" tabindex="5" style="font-size:20px;height:50px;margin-bottom:10px;width:180px;" /></a><br>
</div>

<div class="adminBox" style ="float:left;width:50%;">
<a href="custSearch.php"><input type="button" name="custSearch" value="Edit Customer" tabindex="2" style="font-size:20px;height:50px;margin-bottom:10px;width:180px;margin-left:20px;" /></a><br>
<a href="empSearch.php"><input type="button" name="empSearch" value="Edit Employee" tabindex="4" style="font-size:20px;height:50px;margin-bottom:10px;width:180px;margin-left:20px;" /></a><br>
<a href="newadminlogin.php"><input type="button" name="newadminlogin" value="Edit Admin Login" tabindex="2" style="font-size:20px;height:50px;margin-bottom:10px;width:180px;margin-left:20px;" /></a><br>
</div>
</center>
</div>
</div>
</div>
</div>

<!-- End Admin Container -->

</body>

</html>

<?php
}
else{
	
	header('Location: adminlogin.php');
}
?>