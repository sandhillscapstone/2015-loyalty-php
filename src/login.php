<?php 
	
	include_once("empconfig.php");
?>

<?php if( !(isset( $_POST['login'] ) ) ) { ?>


<!DOCTYPE html>

<html>

<head>

	<title>MeanBean Login</title>

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
      <a class="navbar-brand" href=#>MeanBean</a>
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

<!-- Start Login Container -->

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">

<div id="formRow" style="height:300px;width:330px;margin-left:auto;margin-right:auto;">
<div style="font-size:35px;font-weight:bold;margin-bottom:10px;border-bottom:1px solid silver;">Login</div>
<div id="formLabel" style="float:left;text-align:right;margin-right:1%;">
<div class="labels" style="font-size:20px;height:50px;margin-bottom:10px;vertical-align:middle;line-height:50px;">Username:</div>
<div class="labels" style="font-size:20px;height:50px;margin-bottom:10px;vertical-align:middle;line-height:50px;">Password:</div>
</div>
<form action="" method="post">
<div id="formInput" style ="float:left;">
<input type="text" name="username" tabindex="1" style="font-size:20px;height:50px;margin-bottom:10px;width:228px;" /><br>
<input type="password" name="password" tabindex="2" style="font-size:20px;height:50px;margin-bottom:10px;width:228px;" /><br>
<input type="submit" name="login" value="Login" tabindex="5" style="font-size:20px;height:50px;padding:5px;" />
</div>
</form>
</div>
</div>
</div>
</div>

<!-- End Login Container -->

</body>

</html>

<?php 
} else {
	$usr = new Users;
	$usr->storeFormValues( $_POST );
	
	if( $usr->userLogin() ) {
		header('Location: custSearch.php');	
	} else {
		echo "Incorrect Username/Password";	
	}
}
?>