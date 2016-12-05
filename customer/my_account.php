<?php session_start();
include("functions/functions.php");

?>
<!DOCTYPE>
<html>
	<head>
		<title>Furnish Cheap</title>
		
		
	<link rel="stylesheet" href="styles/style.css" media="all" /> 
	
	<script type="text/javascript">
			var height = 0;
			var height2 = 0;
			window.onload = function() {
				height = document.getElementById('content_area').clientHeight + 'px';
				document.getElementById('sidebar').style.height = height;
				
				height2 = document.getElementsByTagName("body")[0].clientHeight - 50;
				document.getElementsByTagName("body")[0].style.height = height2 + 'px';
				
			}
		</script>
	
	</head>
	
<body>
	<div align="center" id='logodiv'>
    	<a align="center" href="/index.php">FURNISHCHEAP</a>
    	<img src='logo.png' alt='logo'>
    	</div>
    
	<!--Main Container starts here-->
	<div class="main_wrapper">
	
		
		
		<!--Navigation Bar starts-->
		<div class="menubar">
			
			<ul id="menu">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../all_products.php">All Products</a></li>
				<li><a href="/customer/my_account.php">My Account</a></li>
				
				<?php
				if(!isset($_SESSION['customer_email'])) {
					echo "<li><a href='customer_register.php'>Sign Up</a></li>";
				}
				
				?>
				
				<li><a href="../cart.php">Cart</a></li>
                <li><a href="../contact">Support</a></li>
				
			
			</ul>
			
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input id="search" type="text" name="user_query" placeholder="Search a Product"/ > 
					<input id="button" type="submit" name="search" value="Search" />
				</form>
			
			</div>
			
		</div>
		<!--Navigation Bar ends-->
	
		<!--Content wrapper starts-->
		<div class="content_wrapper">
		
			<div id="sidebar">
			
				<div id="sidebar_title">My Account</div>
				
				<ul id="cats">
				<?php 
				$user = $_SESSION['customer_email'];
				
				$get_img = "select * from customers where customer_email='$user'";
				
				$run_img = mysqli_query($con, $get_img); 
				
				$row_img = mysqli_fetch_array($run_img); 
				
				$c_image = $row_img['customer_image'];
				
				$c_name = $row_img['customer_name'];
				
				echo "<p style='text-align:center;'><img src='customer_images/$c_image' width='150' height='150'/></p>";
				
				?>
				<li><a href="my_account.php?my_orders">My Orders</a></li>
				<li><a href="my_account.php?edit_account">Edit Account</a></li>
				<li><a href="my_account.php?change_pass">Change Password</a></li>
				<li><a href="my_account.php?delete_account">Delete Account</a></li>
				<li><a href="logout.php">Logout</a></li>
				
				<ul>
				
				</div>
					
		
			<div id="content_area">
			
			<?php cart(); ?>
			
			<div id="shopping_cart"> 
					
					 <span style="float:right; font-size:12px; padding:5px; line-height:40px;">
					
					<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome </b>" . $_SESSION['customer_email']."&nbsp;&nbsp;&nbsp;&nbsp;<b style='color:black;'></b>" ; 
					
					}
					?>
					
					
					<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a style='padding-right: 10px; color:white;' href='../checkout.php'>Login</a>";
					
					}
					else {
					echo "<a style='padding-right: 10px; color:white;' href='logout.php'>Logout</a>";
					}
					
					
					
					?>
					
					
					
					</span>
			</div>
			
			
			
				<div id="products_box">
				
				
				
				<?php 
				if(!isset($_GET['my_orders'])){
					if(!isset($_GET['edit_account'])){
						if(!isset($_GET['change_pass'])){
							if(!isset($_GET['delete_account'])){
							
				echo "
				<h2 style='padding:20px;'>Welcome  $c_name </h2>
				<b>You can see your orders progress by clicking this <a style='color: #D3B396;' href='my_account.php?my_orders'>link</a></b>";
				}
				}
				}
				}
				?>
				
				<?php 
				if(isset($_GET['edit_account'])){
				include("edit_account.php");
				}
				if(isset($_GET['change_pass'])){
				include("change_pass.php");
				}
				if(isset($_GET['delete_account'])){
				include("delete_account.php");
				}
				if(isset($_GET['my_orders'])){
				include("my_orders.php");
				}
				?>
				
				</div>
				
				<!-- <span id="divider"></span> -->

			
			</div>
		</div>
		<!--Content wrapper ends-->
		
		
		
		<div id="footer">
		
	<h2 style="text-align:center; padding-top:30px;">&copy; 2016 FurnishCheap</h2>
		
		</div>
	
	
	
	
	
	
	</div> 
<!--Main Container ends here-->


</body>
</html>