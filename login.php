<?php

include "db.php";

session_start();

if(isset($_POST['userLogin'])){
	$usr = mysqli_real_escape_string($conn,$_POST['usr']);
	$pwd = md5($_POST['pwd']);
	$sql = "SELECT * FROM user_info WHERE email = '$usr' and password = '$pwd'";
	$run_query = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($run_query);
	if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION["id"] = $row['id'];
		$_SESSION["name"] = $row['first_name'];
		echo "hkjdsk";
		
	}
mysqli_close($conn);
}


?>