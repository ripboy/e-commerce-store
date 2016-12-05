<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
?>
<html>
	<head>
		<title>FurnishCheap</title>


	<link rel="stylesheet" href="styles/style2.css" media="all" />
	</head>

<body>

	<!--Main Container starts here-->
	<div class="main_wrapper">

    <div id="footer">

		<h2 style="text-align:center; padding-top:30px;">Welcome New Seller, Lets create your account</h2>

		</div>


	

		

				<form action="customer_register.php" method="post" enctype="multipart/form-data">

					<table align="center" width="750">

						<tr align="center">
							<td colspan="6"><h2>Enter the following details</h2></td>
						</tr>

						<tr>
							<td align="right">Seller Name:</td>
							<td><input type="text" name="s_name" required/></td>
						</tr>

						<tr>
							<td align="right">Seller Email:</td>
							<td><input type="text" name="s_email" required/></td>
						</tr>

						<tr>
							<td align="right">Seller Password:</td>
							<td><input type="password" name="s_pass" required/></td>
						</tr>

						<tr>
							<td align="right">Seller Image:</td>
							<td><input type="file" name="s_image" required/></td>
						</tr>



						<tr>
							<td align="right">Seller Country:</td>
							<td>
							<select name="s_country">
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
							<td align="right">Seller City:</td>
							<td><input type="text" name="s_city" required/></td>
						</tr>

						<tr>
							<td align="right">Seller Contact:</td>
							<td><input type="text" name="s_contact" required/></td>
						</tr>

						<tr>
							<td align="right">Seller Address</td>
							<td><input type="text" name="s_address" required/></td>
						</tr>


					<tr align="center">
						<td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
					</tr>



					</table>

				</form>

			</div>
		</div>
		<!--Content wrapper ends-->



		<div id="footer">

		<h2 style="text-align:center; padding-top:30px;">&copy; FurnishCheap</h2>

		</div>

	</div>
<!--Main Container ends here-->


</body>
</html>
<?php
	if(isset($_POST['register'])){


		$ip = getIp();

		$s_name = $_POST['s_name'];
		$s_email = $_POST['s_email'];
		$s_pass = $_POST['s_pass'];
		$s_image = $_FILES['s_image']['name'];
		$s_image_tmp = $_FILES['s_image']['tmp_name'];
		$s_country = $_POST['s_country'];
		$s_city = $_POST['s_city'];
		$s_contact = $_POST['s_contact'];
		$s_address = $_POST['s_address'];


		move_uploaded_file($s_image_tmp,"customer/customer_images/$s_image");

		 $insert_s = "insert into seller (seller_ip,seller_name,seller_email,seller_pass,seller_country,seller_city,seller_contact,seller_address,seller_image) values ('$ip','$s_name','$s_email','$s_pass','$s_country','$s_city','$s_contact','$s_address','$s_image')";

		$run_s = mysqli_query($con, $insert_s);

		

		

		$_SESSION['seller_email']=$s_email;

		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('login.php','_self')</script>";

		
		
	}





?>
