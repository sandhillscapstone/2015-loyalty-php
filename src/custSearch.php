<!DOCTYPE html>

<html>

<head>

	<title>MeanBean - Search</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="styleSheet.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
	
	<script type="text/javascript" src="jquery-1.5.1.js"></script>

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

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<script>

	$(document).ready(function() {
	
	xx();
	
	$( "#search" ).keyup(xx);
	
	function xx () {
		
		var url = "getData.php";
          var text = $("#search").val();
		  
		  if(text==""){}
		  
		  else{
          $.post(url, {searchString: text}, function(data){
		  
          	$("#result").html(data).show();

          });  //$.post close
		  }
	} //function close
	 
	}); //document ready close
	
	</script>

</head>

<body>
<nav class="navbar navbar-inverse" style="margin-bottom:0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="custSearch.php">MeanBean</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="admin.php">Admin</a></li>
        <li><a href="adminAddCustomer.html">New Customer</a></li>
        <li><a href="custSearch.php">Search</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>



<?php 
if (isset($_GET["firstname"]) && isset($_GET["lastname"]))
	{
		$firstname = $_GET["firstname"];
		$lastname = $_GET["lastname"];
	
	
	echo "<center><div>Start typing to find customers</div></center>";
	echo "<center><input type='text' id='search' value='".$firstname.' '.$lastname."'></center>";
	
	}
else
	{
	echo "<center><div>Start typing to find customers</div></center>";
	echo "<center><input type='text' id='search' /></center>";
	}


?>
    <div id="result"></div>
</body>
</html>