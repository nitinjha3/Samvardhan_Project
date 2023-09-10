<?php
include('includes/connect.php');
include_once('functions/common_function.php');

session_start();
include_once('functions/auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samvardhan-Cart Details</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <!-- font awesome link  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- css file  -->
     <link rel="stylesheet" href="style.css">
     <style>
      @media (max-width: 800px) {
  body {
    width:fit-content;
  }
}
        .cart_img{
             width:80px;
             height:80px;
             object-fit: contain;
}
     </style>
    </head>
<body> 
  <!-- first child -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./img/logo.jpg" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">All Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="users_area/profile.php">My Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i>MyCart</a>
        </li>
        
        
      </ul>
      
    </div>
  </div>
</nav>
<!-- calling cart function  -->
<?php cart(); ?>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  <?php
    
    if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a href='' class='nav-link'>Welcome Guest</a>
    </li>";
    echo "<li class='nav-item'>
    <a href='./users_area/user_login.php' class='nav-link'>Login</a>
  </li>";
    }else{
      echo "<li class='nav-item'>
      <a href='' class='nav-link'>Welcome ".$_SESSION['username']."</a>
    </li>";
    echo "<li class='nav-item'>
    <a href='./users_area/logout.php' class='nav-link'>Logout</a>
  </li>";
    }
  ?>
  </ul>
</nav>
<!-- third child -->
<div class="bg-light">
  <h3 class="text-center">Welcome to Samvardhan</h3>
  <p class="text-center">Serving devotees...Serving Lord...</p>
</div>

<!-- fourth child -->
<div class="container" >
    <div class="row" style="height:100vh">
      <form action="" method="post">
        <table class="table table-bordered text-center">
           
           <tbody>
            <!-- php code to display dynamic data  -->
            <?php
                global $con;
                $get_username=$_SESSION['username'];
                $total_price=0;
            if(isset($_POST['update_cart'])){
              $val=$_POST['qty'];
              $product_id=$_POST['pid'];
              $length = count($product_id);
              $i = 0;
              while ($i < $length){
                
                $update_cart="UPDATE cart_details SET quantity=$val[$i] WHERE username='$get_username' and product_id='$product_id[$i]'";
                $result_qty=mysqli_query($con,$update_cart);
                $i++;
              }
              echo '<script>alert("Quantity Updated");</script>';
              header("Refresh: 0");
            }
            
            if(isset($_POST['remove_cart'])){
              if (isset($_POST['selected_items'])){ //check if any checkbox is selected or not
              $selectedItems = $_POST['selected_items'];
              foreach ($selectedItems as $itemId) {
                  $delete_cart="delete from `cart_details`  WHERE username='$get_username' and product_id='$itemId'";
                  $run_delete=mysqli_query($con,$delete_cart);
                }
              if($run_delete){
                header("Refresh: 0");
              }
            }
            else{
              echo "<script>alert('Please select items to remove ');</script>";
            }
             }
            if(isset($_POST['continue_shopping'])){
              echo "<script>window.open('index.php','_self')</script>";
            }
            if(isset($_POST['checkout'])){
              echo "<script>window.open('./users_area/checkout.php','_self')</script>";
            }
            // End of handling all post requests

            // Every time will be executed 
            $get_username=$_SESSION['username'];
                $cart_query="Select * from `cart_details` where username='$get_username'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){
                  echo "<thead>
                  <tr>
                      <th>Product title</th>
                      <th>Product Image</th>
                      <th>Total Price</th>
                      <th>Update Quantity</th>
                      <th>Remove</th>
                      <!-- <th colspan='2'>Operations</th> -->
                  </tr>
             </thead> ";
                 while($row=mysqli_fetch_assoc($result)){
                  $product_id=$row['product_id'];
                  $show_qty=$row['quantity'];
             
                  $select_products="Select * from `products` where product_id='$product_id'";
                  $result_products=mysqli_query($con,$select_products);
                  while($row_product=mysqli_fetch_assoc($result_products)){
                    $product_price=$row_product['product_price'];
                    $product_title=$row_product['product_title'];
                    $product_image1=$row_product['product_image1'];
                    
                    
                
                
            echo "<tr>
                <td>$product_title</td>
                <td><img src='./admin_area/product_images/$product_image1' alt='' class='cart_img'></td>
                <td>₹ $product_price/-</td>
                <td><input type='number'  min='1' onkeypress='return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))' name='qty[]' id='' class='form-input w-50' value='$show_qty'></td>
                
                <td><input type='checkbox' name='selected_items[]' value='$product_id' id=''></td>
                <td><input type='text' name='pid[]' value='$product_id' hidden> </td>
                
            </tr>";
           }} }
           else{
            echo "<h2 class='text-center text-danger'>Your Cart is Empty</h2>";
            echo "<input type='submit' name='continue_shopping' value='Continue shopping' class='bg-info px-3 py-2 border-0 mx-3'>";
           }?>
           
          
         </tbody>
        </table>
        <?php
         $get_ip_add = getIPAddress();
         $get_username=$_SESSION['username'];
         $cart_query="Select * from `cart_details` where username='$get_username'";
         $result=mysqli_query($con,$cart_query);
         $result_count=mysqli_num_rows($result);
         if($result_count>0){
        
    
        echo "<div class='container d-flex justify-content-center align-items-center'>
        <button class='btn btn-primary text-center px-3 py-2 border-0 mx-3' type='submit' name='update_cart'>Update</button>
        <button class='btn btn-primary text-center px-3 py-2 border-0 mx-3' type='submit' name='remove_cart'>Remove</button>
          </div>
        <!-- subtotal  -->
        <div class='mb-5'>
            <h4 class='px-3'>Subtotal:<strong class='text-info'>₹".total_cart_price()."/-</strong></h4>
            <input type='submit' name='checkout' value='Checkout' class='bg-secondary text-light px-3 py-2 border-0 mx-3'>
            <input type='submit' name='continue_shopping' value='Continue shopping' class='bg-info px-3 py-2 border-0 mx-3'>
            
            
            
        </div>
          
    </div>";}?>
</div>
</form>




<!-- last child  -->
<!-- include footer  -->
<?php include("./includes/footer.php") ?>
</div>









    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>