<?php
include('../includes/connect.php');
if(isset($_POST['insert_brands']))
{ 
  $brand_title = $_POST['brand_title']; 


  // Check if the brand already exists
  $select_query = "SELECT * FROM brands WHERE brand_title = '$brand_title'";
  $result_select = mysqli_query($con, $select_query);
  $number = mysqli_num_rows($result_select);
  if($number > 0)
  {
    echo "<script>alert('This Brand was already exists')</script>";
  } 
  else 
  {
    // Insert the brand if it doesn't exist
    $insert_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')"; 
    $result = mysqli_query($con, $insert_query);
    if($result)
    {
      echo "<script>alert('Brand has been inserted successfully')</script>";
    } 
    else {
      echo "<script>alert('Error inserting brand')</script>";
    }
  }
}
?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brand" aria-label="Categories" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-info border-0 p-2 my-2" name="insert_brands" value="Insert Categories">
</div>
</form>