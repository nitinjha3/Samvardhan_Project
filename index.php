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
<div class="row">
  <div class="col-md-10">
    <!-- products -->
    <div class="row">
      <div class="col-md-4 mb-2">
      <div class="card">
  <img src="./img/soap.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Add to Cart</a>
  </div>
</div>
  </div>
      <div class="col-md-4 mb-2">
      <div class="card">
      <img src="img\download.jpeg"  class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title">Beads</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Add to Cart</a>
      </div>
      </div>
  </div>
  <div class="col-md-4">
      <div class="card">
      <img src="./img/brush.jpg" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Add to Cart</a>
     </div>
     </div>
  </div>
  <div class="col-md-4">
      <div class="card">
      <img src="./img/colgate.jpg" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Add to Cart</a>
     </div>
     </div>
  </div>
  <div class="col-md-4">
      <div class="card">
      <img src="img\mat.jpg" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Add to Cart</a>
     </div>
     </div>
  </div>
  <div class="col-md-4">
      <div class="card">
      <img src="./img/surf.jpg" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Add to Cart</a>
     </div>
     </div>
  </div>
  </div>
</div>
  <div class="col-md-2 bg-dark p-0">
    <!-- sidenav -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-items bg-info">
        <a href="#" class="nav-link text-light"><h4>categories</h4></a>
      </li>
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