
<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    echo "<script>console.log('success')</script>";
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $in_stock =$_POST['in_stock'];

    // Accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];

    // accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    
    if( $product_title=='' or    $product_description=='' or  $product_keyword=='' or  $product_category=='' or  $product_price=='' or  $product_image1=='' or  $product_image2==''){
        echo "<script>alert('Please fill all the available fields')</script>";  
        exit();
    }
    else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");

        // insert query
        $insert_products = "insert into `products`(product_title ,product_description,product_keywords,category_id,product_image1,product_image2,product_price,Date,in_stock) values('$product_title','$product_description','$product_keyword','$product_category','$product_image1','$product_image2','$product_price', NOW(),'$in_stock')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Successfully inserted the products')</script>";
        }
    
    
 
        }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product_Admin Dashboard</title>
        <!-- Bootstrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
            width:50%;
            height:10%;
            

            object-fit  : contain;
        }
        .footer{
            position: absolute;
            bottom:0;
            width:100%;
        }
    </style>
    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">

</head>
<body class="bg-light">
    <div class="container mt-3 ">
        <h1 class="text-center">Insert products</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
        <!-- Title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
        </div>
        <!-- Description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label">Product description</label>
            <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
        </div>
        <!-- Keyword -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keyword" class="form-label">Product keyword</label>
            <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
        </div>
        <!-- Select category -->
        <div class="form-outline mb-4 w-50 m-auto">
          <select name="product_category" id="" class="form-select">
            <option value="">Select a category</option>
            <?php
            $select_query = "select * from `categories`";
            $result_query = mysqli_query($con,$select_query);
            while($row= mysqli_fetch_assoc($result_query)){
                $category_title = $row['category_title'];
                $category_id = $row['category_id'];
                echo "<option value='$category_id'> $category_title</option>";
            }
            ?>
          </select>
        </div>

          <!-- in stock -->
          <div class="form-outline mb-4 w-50 m-auto">
          <select name="in_stock" id="" class="form-select">
            <option value="">In stock???</option>
            <?php
                echo "<option value='Yes'>Yes</option>";
                echo "<option value='No'>No</option>";
                
            
            ?>
          </select>
        </div>
          <!--Image 1 -->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Product image1</label>
            <input type="file" name="product_image1" id="product_image1" class="form-control"  required="required">
        </div>
        <!--Image 2 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">Product image2</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control"  required="required">
        </div>
          <!-- Price -->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
        </div>
        
          <div class="form-outline mb-4 w-50 m-auto">
          <button class="btn btn-primary" type="submit" name="insert_product">UPLOAD</button>
        </div>
        </form>
    
       

    </div>
     
    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>