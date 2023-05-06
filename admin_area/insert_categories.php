<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_tiltle'];

    // select data from database
    $select_query="select * from `categories` where category_title='$category_title'";
    $result_select=mysqli_query($conn,$select_query);
    $number_row=mysqli_num_rows( $result_select);
    if($number_row>0)
    {
        echo "<script>alert('This category is already present')</script>";
    }
    else{
        $insert_query="insert into `categories` (category_title) values ('$category_title')";
        $result=mysqli_query($conn,$insert_query);
        if($result)
        {
            echo "<script>alert(' Category added successfully')</script>";
        }
    }
}

?>


<form action="" method="Post" class="mb-2" >
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control"name="cat_tiltle" placeholder="insert categories" aria-label="categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 ">
        <input type="submit" class=" bg-info border-0 p-2 my-3"name="insert_cat" value="Insert Categories" >
        
    </div>
</form>