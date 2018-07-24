  $(document).ready(function(){
	
	category();
	brand();
	product();
		
		function category(){
			$.ajax({
				url : "action.php",
				method: "POST",
				data : {category:1},
				success : function(data){
					$("#get_category").html(data);
				}
			})
		}
		
		function brand(){
			$.ajax({
				url : "action.php",	
				method: "POST",
				data : {brand:1},
				success : function(data){
					$("#get_brand").html(data);
				}
			})
		}
		
		function product(){
			$.ajax({
				url : "action.php",
				method: "POST",
				data : {getProduct:1},
				success : function(data){
					$("#get_product").html(data);
				}
			})
		}
		
	$("body").delegate(".category","click", function(event){
        event.preventDefault();
		var cid = $(this).attr('cid');
		$.ajax({
			url : "action.php",
			method: "POST",
			data : {select_category:1, cat_id:cid},
			success : function(data){
				$("#get_product").html(data);
			}
		})
    })
	
	 $("body").delegate(".selectBrand","click", function(event){
        event.preventDefault();
		var bid = $(this).attr('bid');
		$.ajax({
			url : "action.php",
			method: "POST",
			data : {selectBrand:1, brand_id:bid},
			success : function(data){
				$("#get_product").html(data);
			}
		})
    })

	$("#search_btn").click(function(event){
		event.preventDefault();
		var keyword = $("#search").val();
		if(keyword != ""){
			
				$.ajax({
				url : "action.php",
				method: "POST",
				data : {search:1, keyword:keyword},
				success : function(data){
					$("#get_product").html(data);
				}
				})
			
		}
	})
	$("#signup_btn").click(function(event){
		event.preventDefault();
		var fname = $("#f_name").val();
		var lname = $("#l_name").val();
		var mobile = $("#mobile").val();
		var email = $("#email").val();
		var pwd = $("#password").val();
		var repwd = $("#repassword").val();
		var adrs1 = $("#adrs1").val();
		var adrs2 = $("#adrs2").val();
		
		
		$.ajax({
				url : "register.php",
				method: "POST",
				data : {signup:1,fname:fname,lname:lname,mobile:mobile,
						email:email,pwd:pwd,repwd:repwd,adrs1:adrs1,adrs2:adrs2},
				success : function(data){
					$("#signup_msg").html(data);
				}
		})
	})
	
	$("#change_btn").click(function(event){
		event.preventDefault();
		var pwd = $("#pwd").val();
		var repwd = $("#repwd").val();
		
		$.ajax({
				url : "register.php",
				method: "POST",
				data : {change:1,pwd:pwd,repwd:repwd},
				success : function(data){
					$("#change_msg").html(data);
				}
		})
	})
	
	$("#login").click(function(event){
		event.preventDefault();
		var usr = $("#usr").val();
		var pwd = $("#pwd").val();
		$.ajax({
				url : "login.php",
				method: "POST",
				data : {userLogin:1,usr:usr,pwd:pwd},
				success : function(data){
					if(data == "hkjdsk"){
						window.location.href = "profile.php";
					}
				}
		})
		
	})
	$("body").delegate("#product","click",function(event){
		event.preventDefault(); 
		var p_id = $(this).attr('pid');
		$.ajax({
				url : "action.php",
				method: "POST",
				data : {add_Product:1,proid : p_id},
				success : function(data){
					
					$("#product_msg").html(data);
					cart_count();
				}
		})
	})
	cart_container();
	function cart_container(){
		
		$.ajax({
				url : "action.php",
				method: "POST",
				data : {add_Cart:1},
				success : function(data){
					
					$("#cart_body").html(data);
				}
		})
		cart_count();
	}
	
	function cart_count(){
		
		$.ajax({
				url : "action.php",
				method: "POST",
				data : {cart_count:1},
				success : function(data){
					
					$(".badge").html(data);
				}
		})
	}
	$("#cart_container").click(function(event){
		event.preventDefault();
		$.ajax({
				url : "action.php",
				method: "POST",
				data : {add_Cart:1},
				success : function(data){
					
					$("#cart_body").html(data);
				}
		})
			
	})
	checkout();
	function checkout(){
		$.ajax({
				url : "action.php",
				method: "POST",
				data : {checkout:1},
				success : function(data){
					
					$("#checkout").html(data);
				}
		})
			
	}
	$("body").delegate(".qty","keyup",function(){
		
		var pid = $(this).attr("pid");
		var qty = $("#qty-"+pid).val();
		var price =$("#price-"+pid).val();
		var total = qty * price;
		$("#total-"+pid).val(total);
		
	})
	$("body").delegate(".remove","click",function(event){
		
		event.preventDefault();
		var pid = $(this).attr("remove_id");
		
		$.ajax({
				url : "action.php",
				method: "POST",
				data : {removeFromCart:1,removeId:pid},
				success : function(data){
					
					$("#cart_msg").html(data);
					checkout();
				}
		})
		
	})
	$("body").delegate(".update","click",function(event){
		
		event.preventDefault();
		var pid = $(this).attr("update_id");
		var qty = $("#qty-"+pid).val();
		var price = $("#price-"+pid).val();
		var total = $("#total-"+pid).val();
		$.ajax({
				url : "action.php",
				method: "POST",
				data : {updateProduct:1,updateId:pid,qty:qty,price:price,total:total},
				success : function(data){
					
					$("#cart_msg").html(data);
					checkout();
				}
		})
	})
	page();
	function page(){
		$.ajax({
				url : "action.php",
				method: "POST",
				data : {page:1},
				success : function(data){
					$("#pageno").html(data);
				}
		})
		
	}
	$("body").delegate("#page","click",function(event){
		event.preventDefault();		
		var pn = $(this).attr("page");
		$.ajax({
				url : "action.php",
				method: "POST",
				data : {getProduct:1,setPage:1,pageNumber:pn},
				success : function(data){
					$("#get_product").html(data);
				}
		})
		
	})
	
	$("body").delegate("#continue_shopping","click",function(event){
		
		$.ajax({
				url : "action.php",
				method: "POST",
				data : {clear_cart:1},
				success : function(data){
					
				}
		})
	})
})
