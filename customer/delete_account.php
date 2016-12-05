<br>
<br>
<br>
<h2 style="text-align:center; ">Are you sure you want to delete your account?</h2>
<br>
<br>
<br>

<form action="" method="post">

<br>
<input id="button" type="submit" name="yes" value="Yes " />&nbsp;&nbsp;&nbsp;&nbsp;
<input id="button" type="submit" name="no" value="No" />


</form>

<?php 
include("includes/db.php"); 

	$user = $_SESSION['customer_email']; 
	
	if(isset($_POST['yes'])){
	
	$delete_customer = "delete from customers where customer_email='$user'";
	
	$run_customer = mysqli_query($con,$delete_customer); 
	
	echo "<script>alert('We are really sorry, your account has been deleted!')</script>";
	echo "<script>window.open('../index.php','_self')</script>";
	}
	if(isset($_POST['no'])){
	
	echo "<script>alert('Your account is secure!')</script>";
	echo "<script>window.open('my_account.php','_self')</script>";
	
	}
	


?>