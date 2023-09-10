<?php
 session_start();
 if($_SESSION['username']!='saw'){
     echo "<script>window.open('deny_message.php','_self')</script>";
 }
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- css file  -->
    <link rel="stylesheet" href="../style.css">
    <style>
    @media (max-width: 800px) {
  body {
    width:fit-content;
  }
}
        .admin_image{
    width:100px;
    object-fit:contain;
}

/* .footer{
    position: absolute;
    bottom:0;
    width:100%;
} */
body{
    overflow-x:hidden;
}
.product_img{
    width:100px;
    object-fit:contain;
}
    </style>
</head>
<body>
  
<div class="container-fluid p-0" style="min-height: 100vh">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info" >
        <div class="container-fluid" >
            <img src="../img/logo.jpg" alt="" class="logo">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Welcome guest</a>
                    </li>
                </ul>

</nav>
        </div>
    </nav>
     <!-- second child -->
     <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
     </div>
     <!-- third child -->
     <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-3">
                <a href=""><img src="../img/soap.jpg" alt="" class="admin_image"></a>
                <p class="text-light text-center">Admin Name</p>
            </div>
            <div class="button text-center">
                <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
                <button><a href="index.php?pending_orders" class="nav-link text-light bg-info my-1">Pending Orders</a></button>
                <button><a href="index.php?completed_orders" class="nav-link text-light bg-info my-1">Completed Orders</a></button>
                <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
                <button><a href="../users_area/logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
            </div>
        </div>
     </div>
     <!-- fourth child -->
     <div class="container my-3">
        <?php
        if(isset($_GET['insert_category'])){ // insert-category is the get variable when this is set then only below php code will execute
        
            include('insert_categories.php');
        }
        if(isset($_GET['view_products'])){ // insert-category is the get variable when this is set then only below php code will execute
        
            include('view_products.php');
        }
        if(isset($_GET['edit_product'])){ // insert-category is the get variable when this is set then only below php code will execute
        
            include('edit_product.php');
        }
        if(isset($_GET['pending_orders'])){ // insert-category is the get variable when this is set then only below php code will execute
        
            include('pending_orders.php');
        }
        if(isset($_GET['completed_orders'])){ // insert-category is the get variable when this is set then only below php code will execute
        
            include('completed_orders.php');
        }
         if(isset($_GET['list_users'])){ // insert-category is the get variable when this is set then only below php code will execute
        
            include('list_users.php');
        }
        ?>
     </div>
     
<!-- last child -->

    </div>

    </div>

    <div class="bg-info p-3 text-center bg-info">All rights reserved. Developed by VOICE HALDIA</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>