<?php
	include("includes/db.php");

	if(isset($_GET['delete_pro'])){
		$delete_id = $_GET['delete_pro'];

		$delete_pro = "delete from products where product_id='$delete_id'";
		$run_delete = mysqli_query($con, $delete_pro);

		$check_in_cart = "select * from cart where p_id='$delete_id'";
		$run_check_in_cart = mysqli_query($con, $check_in_cart);

		if(mysqli_fetch_array($run_check_in_cart) != null) {
			$delete_from_cart = "delete from cart where p_id='$delete_id'";
			$run_delete_from_cart = mysqli_query($con, $delete_from_cart);
		}

		$check_in_wishlist = "select * from wishlist where p_id='$delete_id'";
		$run_check_in_wishlist = mysqli_query($con, $check_in_wishlist);

		if(mysqli_fetch_array($run_check_in_wishlist) != null) {
			$delete_from_wishlist = "delete from wishlist where p_id='$delete_id'";
			$run_delete_from_wishlist = mysqli_query($con, $delete_from_wishlist);
		}

		if($run_delete){
			echo "<script>alert('A product has been deleted!')</script>";
			echo "<script>window.open('index.php?view_products','_self')</script>";
		}
	}
?>
