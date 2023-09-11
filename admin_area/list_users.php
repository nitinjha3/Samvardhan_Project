<style>
        .img{
             width:80px;
             height:80px;
             object-fit: contain;
}
</style>
<h3 class="text-success">All Users</h3>
<form action="" method="post">
    <table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Username</th>
            <th>Image</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
         
        $get_users="Select * from `user_table` ORDER BY username";
        $result=mysqli_query($con,$get_users);

        while($row_data=mysqli_fetch_assoc($result)){
            
            $username=$row_data['username'];
            $contact=$row_data['user_mobile'];
            $email=$row_data['user_email'];
            $address=$row_data['user_address'];
            $image=$row_data['user_image'];
    
        

            echo "<tr>
            
            <td>$username</td>
            <td><img src='../users_area/user_images/$image' alt='' class='img'></td>
            <td>$contact</td>
            
            <td>$email</td>
            <td>$address</td>
            </tr>";
        }
       
        ?>
        </tbody>
       </table> 
       
    </form>
    </body>
    </html>