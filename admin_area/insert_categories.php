<?php
include('../includes/connect.php');

?>


<form action="" method="Post" class="mb-2" >
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control"name="cat_tiltle" placeholder="insert categories" aria-label="categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 ">
        <!-- <input type="submit" class="form-control bg-info"name="insert_cat" value="Insert" > -->
        <button class="bg-info p-3 my-2 border-0" >Insert</button>
    </div>
</form>