<?php
session_start();
include 'db.php';

if(isset($_POST['page'])){
	$product_query = "SELECT * FROM products_info ";
	$run_query = mysqli_query($conn,$product_query); 
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i = 1; $i <= $pageno;$i++){
		echo "
		<li><a href='' page='$i' id='page' >$i</a></li>
		";
		
	}
	
}
if(isset($_POST['getProduct'])){
	$limit = 9;
	if(isset($_POST['setPage'])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	
	}
	else{
		$start = 0;
		
	}	
	
	$product_query = "SELECT * FROM products_info LIMIT $start,$limit";
	$run_query = mysqli_query($conn,$product_query);
	
	if(mysqli_num_rows($run_query) > 0){
			
		while($row = mysqli_fetch_array($run_query)){
			$pro_id = $row['id'];
			$pro_cat = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_price = $row['product_price'];
			$pro_desc = $row['product_desc'];
			$pro_img = $row['product_img'];
			$pro_title = $row['product_title'];	
			
			echo "
			<div class='col-md-4'>
						<div class='panel panel-default'>
							<div id ='product_actual' class='panel-heading'>$pro_title</div>
							<div class='panel-body'>
								<img src='product_images/$pro_img' style = 'width: 250px; height: 200px;'/>
							</div>
							<div id ='product_actual' class='panel-heading'> 
							$$pro_price.00
							<button pid = '$pro_id'class='btn btn-success btn-xs' style='float: right;' id ='product'>Add to cart</button>
							</div>
						</div>
					</div>
			
			";
			
		}
		
	}
	mysqli_close($conn);
	
}
if(isset($_POST['category'])){
	$category_query = "SELECT * FROM category_info";
	$run_query = mysqli_query($conn,$category_query);				
	echo "
	<ul class='nav nav-pills nav-stacked'>
				<li class='active'><a href='#'>Category</a></li>
	
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cname = $row["cat_title"];
			echo "
			<li style='border-bottom: solid 1px #222833;'><a href='#' class = 'category' cid='$cid'>$cname</a></li>
			
			";
		}
		
		echo " </div>";
	}
	mysqli_close($conn);
}

if(isset($_POST['brand'])){
	$category_query = "SELECT * FROM brands_info";
	$run_query = mysqli_query($conn,$category_query);				
	echo "
	<ul class='nav nav-pills nav-stacked'>
				<li class='active'><a href='#'>Brands</a></li>
	
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$bname = $row["brand_title"];
			echo "
			<li style='border-bottom: solid 1px #222833;'><a href='#' class ='selectBrand' bid ='$bid'>$bname</a></li>
			
			";
		}
		
		echo " </div>";
	}
	mysqli_close($conn);
	
}

if(isset($_POST['select_category']) || isset($_POST['selectBrand']) || isset($_POST['search'])){
	if(isset($_POST['select_category'])){
		$cid = $_POST["cat_id"];
		$query = "SELECT * FROM products_info WHERE product_cat = '$cid'";
	}
	else if(isset($_POST["selectBrand"])){
		$bid = $_POST["brand_id"];
		$query = "SELECT * FROM products_info WHERE product_brand = '$bid'";
	}
	else{
		$keyword = $_POST["keyword"];
		$query = "SELECT * FROM products_info WHERE product_keywords LIKE '%$keyword%'";
	}
	$run_query = mysqli_query($conn,$query);
	
	while($row = mysqli_fetch_array($run_query)){
			$pro_id = $row['id'];
			$pro_cat = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_price = $row['product_price'];
			$pro_desc = $row['product_desc'];
			$pro_img = $row['product_img'];
			$pro_title = $row['product_title'];	
			
			echo "
			<div class='col-md-4'>
						<div class='panel panel-default'>
							<div class='panel-heading'>$pro_title</div>
							<div class='panel-body'>
								<img src='product_images/$pro_img' style = 'width: 250px; height: 250px;'/>
							</div>
							<div class='panel-heading'> 
							$$pro_price.00
							<button pid = '$pro_id'class='btn btn-success btn-xs' style='float: right;' id ='product'>Add to cart</button>
							</div>
						</div>
					</div>
			
			";
			
	}
	
}

if(isset($_POST['add_Product'])){
	
	if(isset($_SESSION["id"])){
	
			$p_id = $_POST['proid'];
			$userid = $_SESSION["id"];
			$sql = "select * from cart_info where product_id = '$p_id' and user_id = '$userid' ";
			$run_query = mysqli_query($conn,$sql);
			$count = mysqli_num_rows($run_query);
			if($count > 0){
				
				echo "<div class='alert alert-success fade in alert-dismissable'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
					Product has already been Added!!
					</div>";
				
			}
			else{
				$sql = "select * from products_info where id = '$p_id'";
				$run_query = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($run_query);
				$id = $row["id"];
				$product_name = $row['product_title'];
				$pro_image = $row['product_img'];
				$pro_price = $row['product_price'];
				$sql = "insert into cart_info(cart_id,product_id,ip_add,user_id,product_title,product_image,quantity,price,total_amount)
				values(null,'$id','0','$userid','$product_name','$pro_image','1','$pro_price','$pro_price')";
				if(mysqli_query($conn,$sql)){
					echo "<div class='alert alert-success fade in alert-dismissable'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
					Product is Added!!
					</div>";
				}	
				mysqli_close($conn);
			}
			
	}
	if(!isset($_SESSION["id"])){
			echo "<div class='alert alert-success fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			Sorry!! Go and sign up first.
			</div>";
	}

}

if(isset($_POST['add_Cart']) || isset($_POST['checkout'])){
	
	$userid = $_SESSION["id"];
	
	$sql ="select * from cart_info where user_id = '$userid' ";
	$run_query = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){
		$no = 1;
		$total_amt = 0;
		while($row = mysqli_fetch_array($run_query)){
			
			$pro_id = $row['product_id'];
			$pro_price = $row['price'];
			$pro_img = $row['product_image'];
			$pro_title = $row['product_title'];	
			$pro_qty = $row['quantity'];
			$total = $row['total_amount'];
			
			$price_array = array($total);
			$total_sum = array_sum($price_array);
			$total_amt = $total_amt + $total_sum;
                        $ta = "total";
                        setcookie($ta, $total_amt, time() + (86400 * 30), "/");
              
			if(isset($_POST['add_Cart'])){
				
				echo "<div class = 'row'>
								<div class='col-md-3'>$no</div>
			      				<div class='col-md-3'><img src='product_images/$pro_img' style = 'width: 60px; height: 50px;'/></div>
			      				<div class='col-md-3'>$pro_title</div>
								<div class='col-md-3'>$$pro_price.00</div>
				</div>";
				
			$no = $no + 1;
			}
			else{
				echo"
				<br>
				<div class='row'>
					<div class='col-md-2'>
						<div class='btn-group'>
							<a href='' remove_id = '$pro_id' class='btn btn-danger remove'> <span class = 'glyphicon glyphicon-remove'></span></a>
							<a href='' update_id = '$pro_id'class='btn btn-primary update'> <span class = 'glyphicon glyphicon-saved'></span></a>
						</div>
					</div>
					<div class='col-md-2'><img src='product_images/$pro_img' style = 'width: 60px; height: 50px;'/></div>
					<div class='col-md-2'>$pro_title</div>
										<div class='col-md-2'><input type='text' class='form-control qty' pid = '$pro_id' id = 'qty-$pro_id'value = '$pro_qty'></div>
					<div class='col-md-2'><input type='text' class='form-control price' pid = '$pro_id' id = 'price-$pro_id'value = '$pro_price'disabled></div>
					<div class='col-md-2'><input type='text' class='form-control total' pid = '$pro_id' id = 'total-$pro_id'value = '$total' disabled></div>
				</div>
				";
				
			}
			
			
		}
		if(isset($_POST["checkout"])){
				echo"
				<div class='ro'>
						<div class='col-md-10'></div>
						<div class='col-md-2'>
							<b>     Total  $total_amt</b>
						</div>
					</div>";
				
			}
			
			echo '
			
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
				  <input type="hidden" name="cmd" value="_cart">
				  <input type="hidden" name="business" value="shoppingcart@estore.com">
				  <input type ="hidden" name = "upload" value="1">
				  
				  ';
				  
				  $x = 0;
				  $sql = "select * from cart_info where user_id = '$userid'";
				  $run_query = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($run_query)){
					
					
					
					$x++;
				
				 
				  echo '<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
				  <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
				  <input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
				<input type="hidden" name="qty_'.$x.'" value="'.$row["quantity"].'">
				<input type="hidden" name="amount_'.$x.'" value="'.$row["total_amount"].'">';
				}
				
				echo '
				  <input type ="hidden" name="return" value ="http://maheshc78.000webhostapp.com/payment.php"/>
				  <input type ="hidden" name="cancel_return" value ="http://maheshc78.000webhostapp.com/payment.php"/>
				  <input type ="hidden" name="currency_code" value ="USD"/>
				  <input type ="hidden" name="custom" value ="'.$userid.'"/>
				  <input type="image" name="submit"
					src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
					alt="PayPal - The safer, easier way to pay online">
			</form>
							
			';
			
			
			
			
	}
		
}

if(isset($_POST['cart_count'])){
	if(isset($_SESSION["id"])){
	$userid = $_SESSION["id"];
	$sql = "select * from cart_info where user_id = '$userid' ";
	$run_query = mysqli_query($conn,$sql);
	echo $count = mysqli_num_rows($run_query);
	}
}

if(isset($_POST['removeFromCart'])){
	
	$pid = $_POST["removeId"];
	$uid =$_SESSION["id"];
	$sql = "delete from cart_info where user_id ='$uid' and product_id ='$pid'";
	
	$run_query = mysqli_query($conn,$sql);
	
	if($run_query)
		echo "<div class='alert alert-success fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			Product is Removed from cart Continue Shopping!!
			</div>";	
}

if(isset($_POST['updateProduct'])){
	
	$pid = $_POST["updateId"];
	$uid =$_SESSION["id"];
	$qty =$_POST["qty"];
	$price =$_POST["price"];
	$total =$_POST["total"];
	
	$sql = "update cart_info set quantity = '$qty', price ='$price', 
			total_amount ='$total'where user_id ='$uid' and product_id ='$pid'";
	
	$run_query = mysqli_query($conn,$sql);
	
	if($run_query)
		echo "<div class='alert alert-success fade in alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			Product is Updated from cart Continue Shopping!!
			</div>";	
}

if(isset($_POST['clear_cart'])){
	$userid = $_SESSION["id"];
	$sql = "delete from cart_info where user_id = '$userid'";
	
	$run_query = mysqli_query($conn,$sql);
	
}

?>