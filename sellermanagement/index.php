<?php 
session_start(); 

if(!isset($_SESSION['seller_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?> 

<!DOCTYPE> 

<html>
	<head>
		<title>Seller Panel</title> 
		
	<link rel="stylesheet" href="styles/style.css" media="all" /> 
	</head>


<body> 

	<div class="main_wrapper">
	
	
		<div id="header"></div>
		
		<div id="right">
		<h2 style="text-align:center;">Manage Content</h2>
			<a href="index.php?view_products_se">View All Products</a>
			<a href="index.php?insert_product">Insert New Product</a>
			<a href="index.php?view_products_se">Edit Product</a>
			<a href="index.php?view_orders">View Orders</a>
			<a href="index.php?view_payments">View Payments</a>
			<a href="logout.php">Logout</a>		
		</div>
		
		<div id="left">
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
		<?php 
		
		if(isset($_GET['view_payments'])){
		
		include("view_payments.php"); 
		
		}
		if(isset($_GET['view_orders'])){
		
		include("view_orders.php"); 
		
		}
		if(isset($_GET['insert_product'])){
		
		include("insert_product.php"); 
		
		}
		if(isset($_GET['view_products_se'])){
		
		include("view_products_se.php"); 
		
		}
		if(isset($_GET['edit_pro'])){
		
		include("edit_pro.php"); 
		
		}
		if(isset($_GET['insert_cat'])){
		
		include("insert_cat.php"); 
		
		}
		
		if(isset($_GET['view_cats'])){
		
		include("view_cats.php"); 
		
		}
		
		if(isset($_GET['edit_cat'])){
		
		include("edit_cat.php"); 
		
		}
		
/*		if(isset($_GET['insert_brand'])){
		
		include("insert_brand.php"); 
		
		}
		
		if(isset($_GET['view_brands'])){
		
		include("view_brands.php"); 
		
		}
		if(isset($_GET['edit_brand'])){
		
		include("edit_brand.php"); 
		
		}*/
		if(isset($_GET['view_customers'])){
		
		include("view_customers.php"); 
		
		}
		
		?>
		</div>






	</div>


</body>
</html>

<?php 	} ?>

<?php
	include("includes/db.php");
	if(isset($_GET['confirm_order'])){
	
	$get_id = $_GET['confirm_order'];
	$status = 'Completed';
	$update_order = "update orders set status= '$status' where order_id='$get_id'";
	$run_update = mysqli_query($con,$update_order);
	
	if($run_update){
	
	echo "<script>alert('Order was updated')</script>";
	echo "<script>window.open('index.php?view_orders','_self')</script>";
	
	}
	
	}












?>
