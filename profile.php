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
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="bootstrap.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="main.js"></script>
	
	<!--<style>
	body{
			
		background-color: #eff1f4;
	}
	#main{
		padding-left:2%;
		padding-right:2%;
	}
	#this_product{
		
		background-color: #eff1f4;
	}
	#get_category ul li {
		
	}
	#this_bar{
		background-color:#f4a142;
	}
	.nav-pills>li.active>a{
		background-color:#7fbo69;
	}
	.col-md-10 #product_heading{
		background-color:#5767ff;
		color:white;
	}

	.col-md-2{
		background-color:white;
		padding:0.2%;
		border-radius: 2%;
	}
	#product_actual{
		background-color:#5767ff;
	}
	
	</style>-->
</head>

<body>
<div class="masthead">
  <img src="bg.jpg" style="width:100%; height:100px;"/>
</div>
<div class="navbar navbar-default" >
	<div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="home.php">E-Store</a>
	    </div>

	    <ul class="nav navbar-nav">
	      <li class="active"><a href="home.php"><span class= "glyphicon glyphicon-home"></span> Home</a></li>
	    </ul>

	    <form class="navbar-form navbar-left">
      		<div class="form-group">
        		<input type="text" id = "search" class="form-control" placeholder="Search">
      		</div>
      		<button id = "search_btn" class="btn btn-primary">Search</button>
    	</form>

    	<ul class="nav navbar-nav navbar-right">
	      <li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class= "glyphicon glyphicon-shopping-cart"></span> Cart<span class="badge"></span></a>

	      		<div class="dropdown-menu" style="width: 400px;">
	      			<div class="panel panel-success">	
	      				<div class="panel-heading">
			      			<div class="row">
			      				
			      				<div class="col-md-3">Slno.</div>
			      				<div class="col-md-3">Product Image</div>
			      				<div class="col-md-3">Product Name</div>
								<div class="col-md-3">Price</div>

			      			</div>
			      		</div>
						<div class="panel-body">
							<div id ="cart_body">
							<!--<div class = "row">
								<div class="col-md-3">Slno.</div>
			      				<div class="col-md-3">Product Image</div>
			      				<div class="col-md-3">Product Name</div>
								<div class="col-md-3">Price</div>
							</div>-->
						</div>
	      			</div>
	      		</div>
	      </li>
	      <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class= "glyphicon glyphicon-user"></span> <?php echo "Hi,".$_SESSION["name"];  ?></a>
	      		<ul class="dropdown-menu">
				   <li><a href="cart.php" style="text-decoration:none; color:blue;"><span class= "glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
				   <li class="divider"></li>
				   <li><a href="change.php" style="text-decoration:none; color:blue;">Change Password</a></li>
				   <li class="divider"></li>
				   <li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
			    </ul>
	      </li>
	    </ul>
    </div>
</div>

	<div id ="main" class="row">
		<div class="col-md-2">
			
			<ul id="get_category" class= "nav nav-pills nav-stacked">
			</ul>
			
			<ul id="get_brand" class= "nav nav-pills nav-stacked">
			</ul> 
			
			<!--<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="">Brand</a></li>
				<li ><a href="">1Brand</a></li>
				<li ><a href="">2Brand</a></li>
				<li ><a href="">3Brand</a></li>
				<li ><a href="">4Brand</a></li>
			</ul>-->
		</div>
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-12" id ="product_msg">
				</div>
			</div>
			<div class="panel panel-default">
				<div  class="panel-heading" style='background-color:#2D3E50; color:white;'>Products</div>
		      	<div class="panel-body">
					<div id = "get_product">
						
					</div>
		      		<!--<div class="col-md-4">
		      			<div class="panel panel-info">
		      				<div class="panel-heading"> Samsung galaxy</div>
		      				<div class="panel-body">
		      					<img src=""/>
		      				</div>
		      				<div class="panel-heading"> 
		      				$500.00
		      				<button class="button btn-primary" style="float: right;">Add to cart</button>
		      				</div>
		      			</div>
		      		</div>
		      		<div class="col-md-4">
		      			<div class="panel panel-info">
		      				<div class="panel-heading"> Samsung galaxy</div>
		      				<div class="panel-body">
		      					<img src=""/>
		      				</div>
		      				<div class="panel-heading"> 
		      				$500.00
		      				<button class="button btn-primary" style="float: right;">Add to cart</button>
		      				</div>
		      			</div>
		      		</div>
		      		<div class="col-md-4">
		      			<div class="panel panel-info">
		      				<div class="panel-heading"> Samsung galaxy</div>
		      				<div class="panel-body">
		      					<img src=""/>
		      				</div>
		      				<div class="panel-heading"> 
		      				$500.00
		      				<button class="button btn-primary" style="float: right;">Add to cart</button>
		      				</div>
		      			</div>
		      		</div>
		      		<div class="col-md-4">
		      			<div class="panel panel-info">
		      				<div class="panel-heading"> Samsung galaxy</div>
		      				<div class="panel-body">
		      					<img src=""/>
		      				</div>
		      				<div class="panel-heading"> 
		      				$500.00
		      				<button class="button btn-primary" style="float: right;">Add to cart</button>
		      				</div>
		      			</div>
		      		</div>-->
			
		      	</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<center>
				<ul class="pagination" id ="pageno">
					
				</ul>
			</center>
	</div>
</body>
</html>