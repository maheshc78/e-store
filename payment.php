<?php
session_start();
include 'db.php';

if(!isset($_SESSION["id"]) || !isset($_GET['tx'])){
	header("location:home.php");
	
}
$trx_id = $_GET["tx"];
$p_st= $_GET["st"];
$userid = $_SESSION["id"];
$amt= $_GET["amt"];

$cc= $_GET["cc"];
$cm= $_GET["cm"];

if($p_st == "Completed" && $cm == $_SESSION['id']){
$sql = "select * from cart_info where user_id = '$userid'";
$run_query = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($run_query)){
     $pname = $row['product_title'];
     $p_price = $row['price'];
     $qty = $row['quantity'];
     $pid= $row['product_id'];
     $total = $row['total_amount'];
$sqll = "insert into customer_order(id,uid,pid,pname,qty,price,total)
				values(null,'$userid','$pid','$pname','$qty','$p_price','$total')";
mysqli_query($conn,$sqll);
}

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
	<style>
		table tr td{
			padding: 10px;
			
		}
		
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
	    <div class="navbar-header">
	      <a class="navbar-brand" id = "continue_shopping" href="home.php">E-Store</a>
	    </div>

	    <ul class="nav navbar-nav">
	      <li class="active"><a href="home.php" id = "continue_shopping"><span class= "glyphicon glyphicon-home"></span> Home</a></li>
	    </ul>
	</div>
</div>	

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		
			<div class="panel panel-default">
				<div class="panel-heading" style='background-color:#2D3E50; color:white;'>Confirmation</div>
		      	<div class="panel-body">
					<h1> Thank You </h1>
					<hr/>
					<p>Hello <?php echo $_SESSION["name"];  ?>, Your payment is successfully completed!!!<br>
                                         Your Transaction ID : <?php echo $trx_id  ?>
                                         Status : <?php echo $p_st?>
                                        </p>
					<a href="home.php" id = "continue_shopping" class="btn btn-success btn-lg">Continue shopping</a>
				</div>
				
			</div>
		
		</div>
		<div class="col-md-2"></div>
		
	</div>
</div>
</body>
</html>