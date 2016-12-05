!<DOCTYPE>

<?php
include("includes/db.php");

if(isset($_GET['add_product_review'])) {
  $pro_id = $_GET['add_product_review'];
  ?>

  <html>
    <head>
      <title>Add Product Review</title>

      <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
      <script>
        tinymce.init({selector:'textarea'});
      </script>

    </head>


    <body bgcolor="skyblue">

      <form action="" method="post" enctype="multipart/form-data">

        <table align="center" width="795" border="2" bgcolor="#187eae">

          <tr align="center">
    				<td colspan="7"><h2>Add Product Review</h2></td>
    			</tr>

          <tr>
            <td align="right"><b>Product ID:</b></td>
            <td><input type="text" name="pro_id" size="40" value="<?php echo $pro_id;?>" disabled></input></td>
          </tr>

          <tr>
            <td align="right"><b>Product Review:</b></td>
            <!-- <td><input type="textarea" rows="10"></input></td> -->
            <td><textarea name="pro_review" rows="10"></textarea></td>
          </tr>

          <tr>
            <td align="right"><b>Product Rating:</b></td>
            <td><input type="text" name="pro_rating" size="20"</td>
          </tr>

          <tr align="center">
    				<td colspan="7"><input type="submit" name="submit_review" value="Submit Review"/></td>
    			</tr>

        </table>

      </form>

    </body>

  </html>


<?php
}

if(isset($_POST['submit_review'])) {
  $pro_review = $_POST['pro_review'];
  $pro_rating = $_POST['pro_rating'];

  $insert_query = "insert into reviews (p_id, review, rating) values ($pro_id, '$pro_review', $pro_rating)";
  $run_insert = mysqli_query($con, $insert_query);

  echo "<script>alert('Review has been inserted.')</script>";
  echo "<script>window.open('index.php', '_self')</script>";
}
?>
