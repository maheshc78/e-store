<?php

session_start();
if(!isset($_SESSION["id"])){
	header("location:home.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Store</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="bootstrap.css"/>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="main.js"></script>
	
	
	<style>
	body{
			
		background-color: #eff1f4
	}
	</style>
</head>

<body>
<div class="masthead">
  <img src="bg.jpg" style="width:100%; height:100px;"/>
</div>
<div class="navbar navbar-default">
	<div class="container-fluid">
	    
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="home.php"><span class= "glyphicon glyphicon-home"></span> Home</a></li>
	    </ul>
	</div>
</div>

<div class="container-fluid">
	<div class ="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" id ="cart_msg">
			<!--cart message-->
		</div>
	</div>
	<div class="row">
		<div class="col-md-2"> </div>
		<div class="col-md-8"> 
			<div class="panel panel-default">
				<div class="panel-heading"  style='background-color:#2D3E50; color:white;'>Checkout</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-2">Action</div>
						<div class="col-md-2">Product Image</div>
						<div class="col-md-2">Product Name</div>
						<div class="col-md-2">Quantity</div>
						<div class="col-md-2">Product Price</div>
						<div class="col-md-2">Total Price</div>
						
						
					</div>
					<div id="checkout">
					
					</div>
					<!--<div class="row">
					<div class="col-md-2">
						<div class="btn-group">
							<a href="" class="btn btn-danger"> <span class = "glyphicon glyphicon-trash"></span></a>
							<a href="" class="btn btn-primary"> <span class = "glyphicon glyphicon-ok-sign"></span></a>
						</div>
					</div>
					</div>-->
					<!--<div class="row">
						<div class="col-md-10"></div>
						<div class="col-md-2">
							<b>Total  $50</b>
						</div>
					</div>
					-->
				</div>
					
				
			</div>
		</div>
		<div class="col-md-2"> </div>
	</div>
</div>
</body>
</html>