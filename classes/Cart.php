<?php

$con = mysqli_connect("localhost","root","","ecommerce");

class Cart {
	function cart(){

if(isset($_GET['add_cart'])){
    global $con; 
	
	$ip = getIp();
	
	$pro_id = $_GET['add_cart'];

	$check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
    $run_check = mysqli_query($con, $check_pro); 
	
	if(mysqli_num_rows($run_check)>0){

	echo "";
    
}
else
    {
    $insert_pro = "insert into cart (p_id,ip_add) values ('$pro_id','$ip')";
	
	$run_pro = mysqli_query($con, $insert_pro); 
	
	echo "<script>window.open('index.php','_self')</script>";
    }
}
}
	
	
	function total_items(){
 
	if(isset($_GET['add_cart'])){
	
		global $con; 
		
		$ip = getIp(); 
		
		$get_items = "select * from cart where ip_add='$ip'";
		
		$run_items = mysqli_query($con, $get_items); 
		
		$count_items = mysqli_num_rows($run_items);
		
		}
		
		else {
		
		global $con; 
		
		$ip = getIp(); 
		
		$get_items = "select * from cart where ip_add='$ip'";
		
		$run_items = mysqli_query($con, $get_items); 
		
		$count_items = mysqli_num_rows($run_items);
		
		}
	
	echo $count_items;
	}
  
  // Getting the total price of the items in the cart 
	
	function total_price(){
	
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
			
			$values = array_sum($product_price);
			
			$total +=$values;
			
			}
		
		
		}
		
		echo "$" . $total;
		
	
	}
	
	
}

?>