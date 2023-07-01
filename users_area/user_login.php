<!-- connect database -->
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
//   session_start();
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_Registration</title>
    <!--Bootstrap Css link-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!--font awesome_link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--css file -->
  <link rel="stylesheet" href="style.css">
  <style>
    body{
        overflow-x:hidden;
    }
  </style>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center"> User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Your Username"
                         autocomplete="off" required="required" name="user_username">
                    </div>
                     <!-- Password -->
                     <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password"
                         autocomplete="off" required="required" name="user_password">
                    </div>
                    
                    <div class="text-center ">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?<a href="user_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html> 

<?php
  if(isset($_POST['user_login']))
  {
     $user_username=$_POST['user_username'];
     $user_password=$_POST['user_password'];

     $selct_query="select * from `user_table` where username='$user_username'";
     $result_login=mysqli_query($conn,$selct_query);
     $row=mysqli_num_rows($result_login);
     $row_data=mysqli_fetch_assoc($result_login);
     $user_ip=getIPAddress();

    //  cart items
    $selct_query_cart="select * from `cart_details` where ip_address='$user_ip'";
     $result_login_cart=mysqli_query($conn,$selct_query_cart);
     $row_count=mysqli_num_rows($result_login_cart);
     if($row>0)
     {
          $_SESSION['username']=$user_username;
          if(password_verify($user_password,$row_data['user_password'])){
            // echo "<script>alert('Login Successful')</script>";
            if($row_count==0)
            {
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
            else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
                
            }
            }else{
            echo "<script>alert('Wrong Password')</script>";
          }
     }else{
        echo "<script>alert('Invalid Credentials')</script>";

     }

  }

?>