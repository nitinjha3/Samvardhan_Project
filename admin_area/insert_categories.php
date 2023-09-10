<!-- This code will be executed when post variable from below button(name is insert_cat is set ) -->
<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
  $category_title = $_POST['cat_title'];
  // select data from database
  $select_query="Select * from `categories` where category_title='$category_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
        echo "<script>alert('This category is present inside the database')</script>";
  }else{
    $insert_query="insert into `categories` (category_title) values ('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
      echo "<script>alert('Category has been inserted successfully')</script>";
    }
  }
}
?>

<!-- //This code will be executed when get variable insert_category from index.php(admin_area) is set  -->
<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info"><i class="fa-solid fa-receipt"></i></span>
  <div class="form-floating">
    <input type="text" class="form-control" name="cat_title" id="floatingInputGroup1" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon">
    
  </div>
</div>
<div class="input-group w-10 mb-2 m-auto">

    <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat"  value="Insert Categories"id="floatingInputGroup1" aria-label="Username" aria-describedby="basic-addon" class="bg-info">
    
</div>
</form>