
<!DOCTYPE html>

<html>

<head>

<title>MeanBean - Admin - Edit Customer</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="styleSheet.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <style>

    table
    {
	    margin-left:auto;
	    margin-right:auto;
	    border-collapse:collapse;
    }

    td
    {
	    text-align: right;
	    padding: 5px;
    }

    </style>

</head>

<body>

<!-- Navigation Bar -->

<nav class="navbar navbar-inverse" style="margin-bottom:0px;">
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

<br>
<table>

<tr>
<td style="border-bottom:1px solid black;font-size:20px;">Edit Customer</td>
<td style="border-bottom:1px solid black;"></td>
</tr>

<tr>
<td >First Name:</td>
<td ><input type="text" /></td>
</tr>

<tr>
<td >Last Name:</td>
<td ><input type="text" /></td>
</tr>

<tr>
<td >Telephone:</td>
<td ><input type="text" /></td>
</tr>

<tr>
<td >E-mail:</td>
<td ><input type="text" /></td>
</tr>

<tr>
<td >Freebies:</td>
<td ><input type="text" /></td>
</tr>

<tr>
<td >Points:</td>
<td ><input type="text" /></td>
</tr>

<tr>
<td></td>
<td><input type="submit" value="Save" /></td>
</tr>

</table>

</body>

</html>