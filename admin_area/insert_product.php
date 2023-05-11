<?php
  include('../includes/connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
        <!-- Bootsstrap Css Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!--css file -->
     <link rel="stylesheet" href="../style.css">
     <!-- font awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-light">
    
    <div class="container my-3 w-50 m-auto">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4">
                <label for="product_title" class="from-control">Product_title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" 
                placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <!-- Description -->
            <div class="form-outline mb-4">
                <label for="product_description" class="from-control">Product_description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" 
                placeholder="Enter Product description" autocomplete="off" required="required">
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4">
                <label for="product_keywords" class="from-control">Product_keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" 
                placeholder="Enter Product Keyword" autocomplete="off" required="required">
            </div>
            <!-- Caregories -->
            <div class="form-outline mb-4">
               <select name="product-categories" id="" class="form-select">
                <option value="">Select  Category</option>
                <!-- selecting categories from the database -->
                <?php
                 $select_query="select * from `categorie`";
                 $result_query=mysqli_query($conn,$select_query);
                 while($row=mysqli_fetch_assoc($result_query))
                 {
                    $category_title=$row['category_title'];
                    $category_id=$row['category_id'];
                    echo "<option value='$caetgory_id'>$category_title</option>";
                 }

                ?>
               </select>
            </div>

             <!-- image1 -->
             <div class="form-outline mb-4">
                <label for="product_image1" class="from-control">Product_Image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" 
                 required="required">
            </div>
             <!-- image2 -->
             <div class="form-outline mb-4">
                <label for="product_image2" class="from-control">Product_Image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" 
                 required="required">
            </div>
             <!-- image3 -->
             <div class="form-outline mb-4">
                <label for="product_image3" class="from-control">Product_Image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" 
                 required="required">
            </div>

            <!-- Pirce -->
            <div class="form-outline mb-4">
                <label for="product_price" class="from-control">Product_price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" 
                placeholder="Enter Product price" autocomplete="off" required="required">
            </div>

            <!-- submit-->
            <div class="form-outline mb-4 m-2">
                <input type="submit" value="Insert Product" name="insert_product" class="btn bg-info mb-3 px-3">
            </div>

            
        </form>
    </div>
    
</body>
</html>