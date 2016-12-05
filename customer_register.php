<?php session_start();
include("functions/functions.php");
include("includes/db.php");
?>
<!DOCTYPE>
<html>
	<head>
		<title>FurnishCheap</title>
		
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


	<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>

<body>
<div align="center" id='logodiv'>
<a align="center" href="/index.php">FURNISHCHEAP</a>
    	<img src='/logo.png' alt='logo'>
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
				
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>

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

					Welcome Guest!&nbsp;&nbsp;
					<b style="color:black">Shopping Cart:</b>&nbsp;&nbsp;
					Total Items:&nbsp;<?php total_items();?>&nbsp;&nbsp;
					Total Price:&nbsp;<?php total_price(); ?>&nbsp;&nbsp;
					<a href="cart.php" style="color:black">Go to Cart</a>&nbsp;&nbsp;
					<a href="wishlist.php" style="color:white">Go to Wishlist</a>



					</span>
			</div>

				<form action="customer_register.php" method="post" enctype="multipart/form-data">

					<table style="color:white; border-spacing: 1em;" align="center" width="750">

						<tr align="center">
							<td colspan="6"><h2>Create an Account</h2></td>
						</tr>

						<tr>
							<td align="right">Customer Name:</td>
							<td><input id="input_field" type="text" name="c_name" required/></td>
						</tr>

						<tr>
							<td align="right">Customer Email:</td>
							<td><input id="input_field" type="text" name="c_email" required/></td>
						</tr>

						<tr>
							<td align="right">Customer Password:</td>
							<td><input id="input_field" type="password" name="c_pass" required/></td>
						</tr>

						<tr>
							<td align="right">Customer Image:</td>
							<td><input type="file" name="c_image" required/></td>
						</tr>



						<tr>
							<td align="right">Customer Country:</td>
							<td>
							<select id="dropdown" name="c_country">
								<option>Select a Country</option>
								<option>Afghanistan</option>
								<option>India</option>
								<option>Japan</option>
								<option>Pakistan</option>
								<option>Israel</option>
								<option>Nepal</option>
								<option>United Arab Emirates</option>
								<option>United States</option>
								<option>United Kingdom</option>
							</select>

							</td>
						</tr>

						<tr>
							<td align="right">Customer City:</td>
							<td><input id="input_field" type="text" name="c_city" required/></td>
						</tr>

						<tr>
							<td align="right">Customer Contact:</td>
							<td><input id="input_field" type="text" name="c_contact" required/></td>
						</tr>

						<tr>
							<td align="right">Customer Address</td>
							<td><input id="input_field" type="text" name="c_address" required/></td>
						</tr>
					
					<tr align="center">
						
						<td colspan="6"><input type="submit" id="button" name="register" value="Create Account" /></td>
					</tr>



					</table>

				</form>

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
<?php
	if(isset($_POST['register'])){


		$ip = getIp();

		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];


		move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

		 $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";

		$run_c = mysqli_query($con, $insert_c);

		$sel_cart = "select * from cart where ip_add='$ip'";

		$run_cart = mysqli_query($con, $sel_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if($check_cart==0){

		$_SESSION['customer_email']=$c_email;

		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";

		}
		else {

		$_SESSION['customer_email']=$c_email;

		echo "<script>alert('Account has been created successfully, Thanks!')</script>";

		echo "<script>window.open('checkout.php','_self')</script>";


		}
	}





?>
