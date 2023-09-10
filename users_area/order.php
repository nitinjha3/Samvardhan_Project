<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
include_once('functions/auth.php');

if(isset($_GET['username'])){
    $username=$_GET['username'];
  
    $total_price= total_cart_price();
    $invoice_number=mt_rand();
    $status= 'pending'; 



$query="Select * from `cart_details` where username='$username'";
$result=mysqli_query($con,$query);
$count_products=mysqli_num_rows($result);
while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $product_quantity=$row['quantity'];
    //orders pending table
$insert_pending_orders="Insert into `orders_pending`(username,invoice_number,product_id,quantity,order_status)
values ('$username',$invoice_number,$product_id ,$product_quantity,'$status')";
$result_pending_query=mysqli_query($con,$insert_pending_orders);

}



//  user orders table


$insert_orders="Insert into `user_orders`(username,amount_due,invoice_number,total_products,order_date,order_status)
values ('$username',$total_price,$invoice_number,$count_products,NOW(),'$status')";
$result_query=mysqli_query($con,$insert_orders);
if($result_query){
    echo "<script>alert('Orders are placed successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

// delete items from cart
$empty_cart="Delete from `cart_details` where username='$username'";
$result_delete=mysqli_query($con,$empty_cart);
}

?>
