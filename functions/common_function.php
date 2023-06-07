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
    $selct_query="select * from `products` order by rand() LIMIT 0,2";
    $result_query=mysqli_query($conn,$selct_query);
    while($row=mysqli_fetch_assoc($result_query))
    {
      $product_id=$row['product_id'];
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
           <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
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
      $product_id=$row['product_id'];
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
           <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
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

// serach products 
function SearchProducts()
{
    global $conn;
     // to check isset or not
    if(isset($_GET['search_data_products']))
    {
    $search_value=$_GET['search_data'];
    $search_query="select * from `products` where product_keywords like '%$search_value%'";
    $result_query=mysqli_query($conn,$search_query);
    while($row=mysqli_fetch_assoc($result_query))
    {
      $product_id=$row['product_id'];
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
           <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
        </div>
      </div>
      </div>";
    }
  }
}

//getting all products
function Get_allProducts()
{
  global $conn;
  // to check isset or not
 if(!isset($_GET['category']))
 {
 $selct_query="select * from `products` order by rand()";
 $result_query=mysqli_query($conn,$selct_query);
 while($row=mysqli_fetch_assoc($result_query))
 {
   $product_id=$row['product_id'];
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
        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
     </div>
   </div>
   </div>";
 }
}
}

// get IP Address function

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


// Cart Function
function Add_to_cart()
{
  if(isset($_GET['add_to_cart']))
  {
    global $conn;
    $get_ip = getIPAddress(); 
    $get_product_id=$_GET['add_to_cart'];
    $select_query="select * from `cart_details` where ip_address='$get_ip' and product_id=$get_product_id";
    $result_query=mysqli_query($conn,$select_query);
    $rows=mysqli_num_rows($result_query);
    if($rows>0)
    {
      echo "<script>alert('This Item is already added in cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    else{
      $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip',0) ";
      $result_query=mysqli_query($conn,$insert_query);
      echo "<script>alert('This Item is added to cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}
?>
