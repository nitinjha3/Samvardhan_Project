<!-- connect to database -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart_details</title>
   <?php
  include('functions\common_links.php');
   ?>
</head>
<body>
    <!--navbar -->
    <div class="container-fluid p-0 absolute">
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php Cart_number(); ?>
        </sup></a>
        </li>
       
        
      </ul>
      
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

<!-- fourth child table -->
<div class="container">
    <div class="row">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Soap</td>
                    <td><img src="img\beads1.jpeg" alt=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td>500</td>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>
                        <p>Update</p>
                        <p>Remove</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex mb-5">
            <h4 class="px-4">SubTotal :  <strong class="text-info" > 7000/-</strong></h4>
            <a href="index.php"><button class="bg-info px-3 py-2 mx-3  border-0">Continue Shopping</button></a>
            <a href="#"><button class="bg-secondary px-3 py-2 border-0 text-light">Checkout</button></a>
        </div>
    </div>
</div>

<?php
  include("./includes/footer.php")
?>
 <!-- Bootstsrap js link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
 
</body>
</html>