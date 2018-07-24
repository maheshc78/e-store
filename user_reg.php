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
	    <div class="navbar-header">
	      <a class="navbar-brand" href="home.php">E-Store</a>
	    </div>

	    <ul class="nav navbar-nav">
	      <li class="active"><a href="home.php"><span class= "glyphicon glyphicon-home"></span> Home</a></li>
	    </ul>
	</div>
</div>


<div class="container">
	<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				
			</div>
			<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div> 
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading" style='background-color:#2D3E50; color:white;'>User SignUp</div>
				<div class="panel-body">
				
				<form method="post">
					<div class="row">
					
						<div class="col-md-6">
							<label for="f_name">First Name</label>
							<input type="text" class = "form-control" id="f_name" >
						</div> 
						<div class="col-md-6">
							<label for="l_name">Last Name</label>
							<input type="text" class = "form-control" id="l_name" >
						</div>
						
					</div>
					<br/>
					<div class="row">
					
						<div class="col-md-6">
							<label for="password">Password</label>
							<input type="password" class = "form-control" id="password" >
						</div>
					
						<div class="col-md-6">
							<label for="repassword">Re-enter Password</label>
							<input type="password" class = "form-control" id="repassword" >
						</div> 
						
					</div>
					<br/>
					<div class="row">
					
						<div class="col-md-12">
							<label for="email">E-mail</label>
							<input type="text" class = "form-control" id="email" >
						</div>
					
					</div>
					<br/>
					<div class="row">
					
						<div class="col-md-12">
							<label for="mobile">Mobile</label>
							<input type="text" class = "form-control" id="mobile" >
						</div>
					
					</div>
					<br/>
					<div class="row">
					
						<div class="col-md-12">
							<label for="adrs1">Address Line 1</label>
							<input type="text" class = "form-control" id="adrs1" >
						</div>
					
					</div>
					<br/>
					<div class="row">
					
						<div class="col-md-12">
							<label for="adrs2">Address Line 2</label>
							<input type="text" class = "form-control" id="adrs2" >
						</div>
					
					</div>
					<br/>
					<div class="row">
						<div class="col-md-10"></div> 
						<div class="col-md-2">
							<button id = "signup_btn" class="btn btn-success">Sign Up</button>
						</div>
					
					</div>
				</form>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
</body>
</html>





















