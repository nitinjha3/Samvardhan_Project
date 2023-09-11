<?php 
    if(isset($_GET['edit_product'])){
        $edit_id=$_GET['edit_product'];
        $get_data ="Select * from `products` where product_id=$edit_id";
        $result=mysqli_query($con,$get_data);
        $row=mysqli_fetch_assoc($result);
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];

        //fetching category name
        $select_category = "select * from `categories` where category_id=$category_id";
         $result_category = mysqli_query($con,$select_category);
         $row_category= mysqli_fetch_assoc($result_category);
         $category_title=$row_category['category_title'];

    }

?>




<div class="container mt-3 ">
        <h2 class="text-center text-success">Edit Product</h2>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
        <!-- Title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" name="product_title" value="<?php echo $product_title?>" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
        </div>
        <!-- Description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label">Product description</label>
            <input type="text" name="product_description" value="<?php echo $product_description?>" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
        </div>
        <!-- Keyword -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keyword" class="form-label">Product keyword</label>
            <input type="text" name="product_keywords" value="<?php echo $product_keywords?>" id="product_keyword" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
        </div>
        <!-- Select category -->
        <div class="form-outline mb-4 w-50 m-auto">
          <select name="product_category" id="" class="form-select">
          <!-- <option value="">Select a category</option> -->
          <option value="<?php echo $category_id?>" selected><?php echo $category_title?></option>
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
          <!--Image 1 -->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Product image1</label>
            <div class="d-flex">
            <input type="file" name="product_image1" id="product_image1" class="form-control w-90 m-auto">
            <img src="./product_images/<?php echo $product_image1?>" alt="" class="product_img">
            </div>
          </div>
        
          <!-- Price -->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" name="product_price" value="<?php echo $product_price?>" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
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
         
          <div class="form-outline mb-4 w-50 m-auto">
          <button class="btn btn-primary" type="submit" name="edit_product">Save Changes</button>
        </div>
        </form>
    
       

    </div>

    <!-- updating products to databse  -->
    <?php
    if(isset($_POST['edit_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $in_stock =$_POST['in_stock'];

  

    if (isset($_FILES['product_image1']) && $_FILES['product_image1']['error'] === 0){
      
    // Accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    // accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    $update_product="update `products` set product_title='$product_title',
    product_description='$product_description',product_keywords='$product_keywords',
    category_id='$product_category',product_image1='$product_image1',
    product_price='$product_price',date=NOW(),in_stock='$in_stock' where product_id=$edit_id";
    $result_update=mysqli_query($con,$update_product);
    if($result_update){
        echo "<script>alert('Product updated successfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
        
        
    }
  }else{
    $update_product="update `products` set product_title='$product_title',
    product_description='$product_description',product_keywords='$product_keywords',
    category_id='$product_category',
    product_price='$product_price',date=NOW(),in_stock='$in_stock' where product_id=$edit_id";
    $result_update=mysqli_query($con,$update_product);
    if($result_update){
        echo "<script>alert('Product updated successfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
        
        
    }
  }
    
    }





    ?>