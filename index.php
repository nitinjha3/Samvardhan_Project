<!-- connect to database -->
<?php
include('includes/connect.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samvardhan</title>
    <!--Bootstrap Css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!--font awesome_link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!--css file -->
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--navbar -->
    <div class="container-fluid p-0">
         <!--first child -->
         <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
  <img src="./img/logo.jpg" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup>1</sup></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: 100/-</a>
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- second Child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Login</a>
        </li>
  </ul>
</nav>
<!-- third Child -->
<div class="bg-light">
  <h3 class="text-center">Welcome to Samvardhan</h3>
  <p class="text-center">Serving devotees...Serving Lord...</p>
</div>

<!--fourth Child -->
<div class="row px-3">
  <div class="col-md-10">
    <!-- products -->
    <div class="row">
      <!-- fetching Products from database-->
      <?php
        $selct_query="select * from `products`";
        $result_query=mysqli_query($conn,$selct_query);
        // $row=mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
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

      ?>
      <!-- <div class="col-md-4 mb-2">
      <div class="card">
        <img src="./img/soap.jpg" class="card-img-top" alt="...">
        <div class="card-body">
           <h5 class="card-title">Card title</h5>
           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
      </div>
      </div>-->
    </div>
  </div> 

  <div class="col-md-2 bg-dark p-0">
    <!-- sidenav -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-items bg-info">
        <a href="#" class="nav-link text-light"><h4>categories</h4></a>
      </li>
      <?php
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


      ?>


    </ul>

  </div>
</div>




<!-- footer-->
<div class="bg-info p-3 text-center">
  <p>All rights reserved. Developed by VOICE HALDIA</p>
</div>
</div>

 <!-- Bootstsrap js link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
 
</body>
</html>