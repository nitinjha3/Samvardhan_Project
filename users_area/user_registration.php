<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_Registration</title>
    <?php
    include('..\functions\common_links.php');
   ?>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Your Username"
                         autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- email -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email"
                         autocomplete="off" required="required" name="user_email">
                    </div>
                    <!-- Image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">Email</label>
                        <input type="file" id="user_image" class="form-control" 
                         autocomplete="off" required="required" name="user_image">
                    </div>
                     <!-- Password -->
                     <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="text" id="user_password" class="form-control" placeholder="Enter Your Password"
                         autocomplete="off" required="required" name="user_password">
                    </div>
                     <!-- Confirm Password -->
                     <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="text" id="conf_user_password" class="form-control" placeholder="Confirm Your Password"
                         autocomplete="off" required="required" name="conf_user_password">
                    </div>
                     <!-- Address -->
                     <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Confirm Your Address"
                         autocomplete="off" required="required" name="user_address">
                    </div>
                     <!-- contact -->
                     <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter Your Mobile Number"
                         autocomplete="off" required="required" name="user_contact">
                    </div>
                    <div class="text-center ">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold">Already have an account?<a href="user_login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html> 