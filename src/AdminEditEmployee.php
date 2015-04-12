<?php
session_start();

if (isset($_SESSION["logged_in"]) && isset($_SESSION["admin_logged_in"]))
{
?>
<!DOCTYPE html>

<html>

<head>

<script>
function checkForm(form){
if(form.password.value != form.conpassword.value){
alert("Error: passwords do not match");
return false;
}
}
</script>

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

<br>
<table>
<?php
$employeeid = $_GET["employeeid"];
echo"<form onsubmit='return checkForm(this);' action='EmployeeEditAdmin.php"."?employeeid=".$employeeid."' method='post'>";
?>
<tr>
<td style="border-bottom:1px solid black;font-size:20px;">Edit Employee</td>
<td style="border-bottom:1px solid black;"></td>
</tr>
<?php include 'EmployeeEditPopulate.php'; ?>
<tr>
<td >First Name:</td>


<td ><input name="firstname" type="text" value="<?php echo $row['FirstName'] ?>" /></td>
</tr>

<tr>
<td >Last Name:</td>
<td ><input name="lastname" type="text" value="<?php echo $row['LastName'] ?>" /></td>
</tr>

<tr>
<td >Telephone:</td>
<td ><input name="telephone" type="text" value="<?php echo $row['telephone'] ?>" /></td>
</tr>

<tr>
<td >Email</td>
<td ><input name="email" type="text" value="<?php echo $row['Email'] ?>" /></td>
</tr>

<tr>
<td >Login:</td>
<td ><input name="login" type="text" value="<?php echo $row['login'] ?>" /></td>
</tr>

<tr>
<td >Password:</td>
<td ><input name="password" type="password" value="" /></td>
</tr>

<tr>
<td >Confirm Password:</td>
<td ><input name="conpassword" type="password" value="" /></td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="save" value="Save" /><input type="submit" name="delete" value="Delete" /></td>
<td></td>
</tr>

</form>
</table>



</body>

</html>


<?php
}
else{
	
	echo "You are not logged in.  Click the <a href='login.php'>login page</a> link.";
}
?>