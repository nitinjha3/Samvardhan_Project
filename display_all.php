<?php
include('includes/connect.php');
include('functions/common_function.php');

session_start();
include_once('functions/auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samvardhan</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <!-- font awesome link  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- css file  -->
     <link rel="stylesheet" href="style.css">
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
        <li class="nav-item">
          <a class="nav-link" href="#">Total amt: ₹ <?php echo total_cart_price();?>/-</a>
        </li>
        
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get" >
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button>-->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

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
 
<div class="row px-1">
  <div class="col-md-10">
    <!-- Products -->
    <div class="row">
      <!-- fetching products  -->
      <?php
          get_all_products();
          get_unique_categories();
        ?>
  
<!-- row end  -->
</div>
<!-- column end  -->
</div>
  <div class="col-md-2 bg-secondary p-0">
    <ul class="navbar-nav me-auto text-center ">
      <li class="nav-item bg-info text-light">
        <a href="" class="nav-link text-light"><h4>Categories</h4> </a>
      </li>
      <?php
     getcategories();
    
      ?>

      
      
    
    </ul></div>
</div>
  


<div class="bg-info p-3 text-center text-dark" >All rights reserved. Developed by VOICE HALDIA</div>
    </div>









    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>