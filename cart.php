<?php session_start();
include("functions/functions.php");
include("includes/db.php");
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
					echo "<b>Welcome </b>" . $_SESSION['customer_email'] . "&nbsp;&nbsp;<b style='color:black;'>Your&nbsp;</b>";
					}
					else {
					echo "<b>Welcome Guest&nbsp;&nbsp;</b>";
					}
					?>

					<b style="color:black">Shopping Cart:&nbsp;&nbsp;</b>Total Items:&nbsp;<?php total_items();?>&nbsp;&nbsp;Total Price:&nbsp;<?php total_price(); ?>&nbsp;&nbsp;
					<a href="index.php" style="color:black">Back to Shop</a>
					&nbsp;&nbsp;
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

			<form action="" method="post" enctype="multipart/form-data">

				<table style="border-spacing: 1em;" align="center" width="740" bgcolor="#A5794F">

					<tr align="center">
						<th>Remove</th>
						<th>Product(S)</th>
						<!-- <th>Quantity</th> -->
						<th>Total Price</th>
					</tr>

		<?php
		$total = 0;

		global $con;

		$ip = getIp();

		$sel_price = "select * from cart where ip_add='$ip'";

		$run_price = mysqli_query($con, $sel_price);

		while($p_price=mysqli_fetch_array($run_price)){

			$pro_id = $p_price['p_id'];

			$pro_price = "select * from products where product_id='$pro_id'";

			$run_pro_price = mysqli_query($con,$pro_price);

			while ($pp_price = mysqli_fetch_array($run_pro_price)){

			$product_price = array($pp_price['product_price']);

			$product_title = $pp_price['product_title'];

			$product_image = $pp_price['product_image'];

			$single_price = $pp_price['product_price'];

			$values = array_sum($product_price);

			$total += $values;

					?>

					<tr align="center">
						<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
						<td><?php echo $product_title; ?><br>
						<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60"/>
						</td>
						<!-- <td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty'];?>"/></td> -->
						<?php
						if(isset($_POST['update_cart'])){

							$qty = $_POST['qty'];

							$update_qty = "update cart set qty='$qty'";

							$run_qty = mysqli_query($con, $update_qty);

							$_SESSION['qty']=$qty;

							$total = $total*$qty;
						}


						?>


						<td><?php echo "$" . $single_price; ?></td>
					</tr>


				<?php } } ?>
				
				
				
					<tr align="center">
						<td style="font-size: 13px;" colspan="4"><p>Sub Total:</p><?php echo "$" . $total;?></td>
					</tr>

					
					<tr align="center">
						<td colspan="2"><input id='button' type="submit" name="update_cart" value="Update Cart"/></td>
						<td><input id='button' type="submit" name="continue" value="Continue Shopping" /></td>
						<td><button id='button'><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
					</tr>

				</table>

			</form>

	<?php

	function updatecart(){

		global $con;

		$ip = getIp();

		if(isset($_POST['update_cart'])){

			foreach($_POST['remove'] as $remove_id){

			$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";

			$run_delete = mysqli_query($con, $delete_product);

			if($run_delete){

			echo "<script>window.open('cart.php','_self')</script>";

			}

			}

		}
		if(isset($_POST['continue'])){

		echo "<script>window.open('index.php','_self')</script>";

		}

	}
	echo @$up_cart = updatecart();

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
