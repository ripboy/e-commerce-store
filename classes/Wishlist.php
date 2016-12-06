<?php

$con = mysqli_connect("localhost","root","","ecommerce");

class Wishlist {
	
	function wishlist() {
  global $con;

  if(isset($_GET['add_wishlist'])) {
    $ip = getIp();

    $pro_id = $_GET['add_wishlist'];

    $check_pro = "select * from wishlist where ip_add='$ip' AND p_id='$pro_id'";
    $run_check = mysqli_query($con, $check_pro);
    if(mysqli_num_rows($run_check) > 0) {
      echo "";
    }
    else {
      $insert_pro = "insert into wishlist (p_id, ip_add, qty) values ('$pro_id', '$ip', 1)";
      $run_pro = mysqli_query($con, $insert_pro);
      echo "<script>window.open('index.php', '_self')</script>";
    }
  }
}




function total_items_wishlist() {
  global $con;
  if(isset($_GET['add_wishlist'])) {
    $ip = getIp();
    $get_items = "select * from wishlist where ip_add='$ip'";
    $run_items = mysqli_query($con, $get_items);
    $count_items = mysqli_num_rows($run_items);
  }
  else {
    $ip = getIp();
    $get_items = "select * from wishlist where ip_add='$ip'";
    $run_items = mysqli_query($con, $get_items);
    $count_items = mysqli_num_rows($run_items);
  }

  echo $count_items;
}




function total_price_wishlist() {
  $total = 0;
  global $con;
  $ip = getIp();
  $sel_price = "select * from wishlist where ip_add='$ip'";
  $run_price = mysqli_query($con, $sel_price);
  while($p_price = mysqli_fetch_array($run_price)) {
    $pro_id = $p_price['p_id'];
    $pro_price = "select * from products where
    product_id='$pro_id'";
    $run_pro_price = mysqli_query($con, $pro_price);
    while($pp_price = mysqli_fetch_array($run_pro_price)) {
      $product_price = array($pp_price['product_price']);
      $values = array_sum($product_price);
      $total += $values;
    }
  }
  echo "$".$total;
}

}

?>