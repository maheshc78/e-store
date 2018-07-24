<?php

include 'db.php';
if(isset($_POST['signup'])){
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$pwd = $_POST['pwd'];
$repwd = $_POST['repwd'];
$adrs1 = $_POST['adrs1'];
$adrs2 = $_POST['adrs2'];
$name = "/^[A-Z][a-zA-z ]+$/";
$emailvalidation ="/^[a-z0-9]+(\.[]a-z0-9-])*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";

	if(empty($fname) || empty($lname) ||empty($email) || empty($mobile)
		|| empty($pwd) || empty($repwd) || empty($adrs1) || empty($adrs2)){
			
			
		echo "
			<div class='alert alert-danger fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			Please Fill all the Fields
			</div>

		
		
		";	
		exit();  
	}
	else{
	if(!preg_match($name,$fname)){
		echo "
			<div class='alert alert-danger fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			$fname is not valid
			</div>
		";	
		
		exit();
	}
	if(!preg_match($name,$lname)){
		echo "
			<div class='alert alert-danger fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			$lname is not valid
			</div>
		";
		exit();
	}
	if(!preg_match($emailvalidation,$email)){
		echo "
			<div class='alert alert-danger fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			$email is not valid
			</div>
		";
		exit(); 
	}
	if(strlen($pwd) < 7){
		echo "
			<div class='alert alert-danger fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			Password is weak
			</div>
		";
		exit();
	}
	if($pwd != $repwd){
		echo "
			<div class='alert alert-danger fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			Password is not same
			</div>
		";
		exit();
	}
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-danger fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			$mobile is not valid
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-danger fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			Mobile number must be 10 digit
			</div>
		";
		exit();
	}
	
	$sql = "SELECT id FROM user_info WHERE email = '$email' LIMIT 1"; 
	$check_query = mysqli_query($conn,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			Email Address is already available.Try another email Address
			</div>
		";
		exit();
	}
	else{
		$pwd = md5($pwd);
		$sql = "INSERT INTO user_info 
				VALUES(NULL,'$fname','$lname','$email','$pwd',
				'$mobile','adrs1','adrs2')";
		$run_query = mysqli_query($conn,$sql);
		if($run_query){
			
			echo "
				<div class='alert alert-success fade in alert-dismissable'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
				You are registered successfully!!
				</div>
		";
		}
	}
	}
}

if(isset($_POST['change'])){
	$pwd = $_POST['pwd'];
	$repwd = $_POST['repwd'];
	
	if(strlen($pwd) < 7){
		echo "
			<div class='alert alert-danger fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			Password is weak
			</div>
		";
		exit();
	}
	if($pwd != $repwd){
		echo "
			<div class='alert alert-danger fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			Password is not same
			</div>
		";
		exit();
	}
	
	
	$pwd = md5($pwd);
		$sql = "UPDATE user_info set password ='$pwd'";
		$run_query = mysqli_query($conn,$sql);
		if($run_query){
			
			echo "
				<div class='alert alert-success fade in alert-dismissable'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
				Password Changed successfully!!
				</div>
		";
		}
	
}

?>























