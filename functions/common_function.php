<?php
//including connect file
include('./includes/connect.php');

//getting products
function getProducts()
{
    global $conn;
     // to check isset or not
    if(!isset($_GET['category']))
    {
    $selct_query="select * from `products`";
    $result_query=mysqli_query($conn,$selct_query);
    while($row=mysqli_fetch_assoc($result_query))
    {
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_keywords=$row['product_keywords'];
      $category_id=$row['category_id'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];

      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
        <img src='./admin_area/product_images/$product_image1'class='card-img-top' alt='product_title'>
        <div class='card-body'>
           <h5 class='card-title'>$product_title</h5>
           <p class='card-text'>$product_description</p>
           <a href='#' class='btn btn-primary'>Add to Cart</a>
        </div>
      </div>
      </div>";
    }
  }
}

function unique_categories()
{
  global $conn;
     // to check isset or not
    if(isset($_GET['category']))
    {
      $cat_id=$_GET['category'];
    $selct_query="select * from `products` where category_id=$cat_id";
    $result_query=mysqli_query($conn,$selct_query);
    $rows=mysqli_num_rows($result_query);
    if($rows==0)
    {
      echo "<h2 class='text-center text-danger'>No Stock Available for this Category</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query))
    {
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_keywords=$row['product_keywords'];
      $category_id=$row['category_id'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];

      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
        <img src='./admin_area/product_images/$product_image1'class='card-img-top' alt='product_title'>
        <div class='card-body'>
           <h5 class='card-title'>$product_title</h5>
           <p class='card-text'>$product_description</p>
           <a href='#' class='btn btn-primary'>Add to Cart</a>
        </div>
      </div>
      </div>";
    }
  }
}

function fetchCategories()
{
  global $conn;
  $select_categories="Select * from `categorie`";
  $result_categories=mysqli_query($conn,$select_categories);

  while($row_data=mysqli_fetch_assoc($result_categories))
  {
    $category_title=$row_data['category_title'];
    $category_id=$row_data['category_id'];

    echo "<li class='nav-items'>
    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
    </li>";
  }
}

?>
