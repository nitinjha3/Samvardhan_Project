<?php
include('../includes/connect.php');
include('../functions/common_function.php');
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
   <?php
  include('..\functions\common_links.php');
   ?>

</head>
<style>
    .img1{
        
        width:100%;
    }
   </style>
<body>
    <!-- php code to get user_ip -->
    <?php
    $user_ip=getIPAddress();
    $get_user="select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($conn,$get_user);
    $select_query=mysqli_fetch_array($result);
    $user_id=$select_query['user_id'];

    ?>


    <div class="container">
        <h2 class="text-center text-info my-2">Payment Options</h2>
        <div class="row justify-content-center align-items-center">
            <div class="col md-6 my-4">
                <a href="https://www.paypal.com" target="_blank"><img src="../img/upi-qr.jpg" alt="" class="img1"></a>
            </div>
            <div class="col md-6 my-4">
                <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay offline</h2></a>
            </div>
        </div>
    </div>
</body>