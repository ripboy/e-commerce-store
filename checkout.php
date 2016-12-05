<?php session_start();
include("functions/functions.php");
?>
<!DOCTYPE>

<html>
	<head>
		<title>FurnishCheap</title>


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
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				
				<li><a href="<?php
				if(isset($_SESSION['customer_email'])) {
					echo "customer/my_account.php";
				}
				else {
					echo "checkout.php";
				}
				?>">My Account</a></li>
		
				<?php
				if(!isset($_SESSION['customer_email'])) {
					echo "<li><a href='customer_register.php'>Sign Up</a></li>";
				}
				
				?>
				
				<li><a href="cart.php">Cart</a></li>
                <li><a href="contact">Support</a></li>
				<li><a href="sellermanagement">Seller</a></li>
                <li><a href="admin_area">Admin</a></li>

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

				<div id="sidebar_title">Categories</div>

				<ul id="cats">

				<?php getCats(); ?>

				</ul>




			</div>
			
			<span id="divider"></span>

			<div id="content_area">

			<?php cart(); ?>

			<div id="shopping_cart">

					<span style="float:right; font-size:12px; padding:5px; line-height:40px;">

					<?php
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome </b>" . $_SESSION['customer_email'] . "&nbsp;&nbsp;<b style='color:black;'>Your</b>" ;
					}
					else {
					echo "<b>Welcome Guest&nbsp;&nbsp;</b>";
					}
					?>


					<b style="color:black">Shopping Cart&nbsp;&nbsp;</b>&nbsp;&nbsp;Total Items:&nbsp;<?php total_items();?>&nbsp;&nbsp;Total Price:&nbsp;<?php total_price(); ?>&nbsp;&nbsp;
					<a href="cart.php" style="color:black">Go to Cart</a>
					&nbsp;&nbsp;
					<a href="wishlist.php" style="color:black">Go to Wishlist</a>&nbsp;&nbsp;
					
					<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='checkout.php' style='color:white;'>Login</a>";
					
					}
					else {
					echo "<a href='logout.php' style='color:white;'>Logout</a>";
					}
					
					
					
					?>



					</span>
			</div>

				<div id="products_box">

				<?php
				if(!isset($_SESSION['customer_email'])){

					include("customer_login.php");
				}
				else {

					include("payment.php");

				}

				?>

				</div>

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
