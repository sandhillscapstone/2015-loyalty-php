
<!DOCTYPE html>

<html>

<head>

	<title>MeanBean New Customer</title>

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
      <a class="navbar-brand" href="freebies.php">MeanBean</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="admin.php">Admin</a></li>
        <li><a href="new.php">New Customer</a></li>
        <li><a href="search.php">Search</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- End Navigation Bar -->

<!-- Add New User Container -->

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">

<div id="formRow" style="height:300px;width:330px;margin-left:auto;margin-right:auto;">
<div style="font-size:35px;font-weight:bold;margin-bottom:10px;border-bottom:1px solid silver;">New Customer</div>
<div id="formLabel" style="float:left;text-align:right;margin-right:1%;">
<div class="labels" style="font-size:20px;height:50px;margin-bottom:10px;vertical-align:middle;line-height:50px;">First Name:</div>
<div class="labels" style="font-size:20px;height:50px;margin-bottom:10px;vertical-align:middle;line-height:50px;">Last Name:</div>
<div class="labels" style="font-size:20px;height:50px;margin-bottom:10px;vertical-align:middle;line-height:50px;">Telephone:</div>
<div class="labels" style="font-size:20px;height:50px;margin-bottom:10px;vertical-align:middle;line-height:50px;">E-Mail:</div>
</div>

<div id="formInput" style ="float:left;">
<input type="text" name="firstName" tabindex="1" style="font-size:20px;height:50px;margin-bottom:10px;width:222px;" /><br>
<input type="text" name="lastName" tabindex="2" style="font-size:20px;height:50px;margin-bottom:10px;width:222px;" /><br>
<input type="text" name="phoneNumber" tabindex="3" style="font-size:20px;height:50px;margin-bottom:10px;width:222px;" /><br>
<input type="text" name="email" tabindex="4" style="font-size:20px;height:50px;margin-bottom:10px;width:222px;" /><br>
<input type="submit" name="newSubmit" value="Add Customer" tabindex="5" style="font-size:20px;height:50px;padding:5px;" />
</div>

</div>
</div>
</div>
</div>

<!-- End Add New User Container -->

</body>

</html>