<style>
        .img{
             width:80px;
             height:80px;
             object-fit: contain;
}
</style>
<h3 class="text-success">All my Orders</h3>
<form action="" method="post">
    <table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Invoice Number</th>
            <th>Username</th>
            <th>Item</th>
            <th>Image</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Net Amt</th>
            <th>Date</th>
            <th>Delivered</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
          if(isset($_POST['mark_delivered'])){
            if (isset($_POST['selected_items'])){ //check if any checkbox is selected or not
            $selectedItems = $_POST['selected_items'];
            foreach ($selectedItems as $itemId) {
                $marked="UPDATE orders_pending SET delivery_status=1 WHERE invoice_pid='$itemId'";
                $run=mysqli_query($con,$marked);
              }
            if($run){
              header("Refresh: 0");
            }
          }
          else{
            echo "<script>alert('Please select items');</script>";
          }
           }
        $get_order_details="Select * from `orders_pending` where payment_status=1 and delivery_status=0 ORDER BY order_id DESC";
        $result_orders=mysqli_query($con,$get_order_details);

        while($row_data=mysqli_fetch_assoc($result_orders)){
            
            $invoice_number=$row_data['invoice_number'];
            $qty=$row_data['quantity'];
            $username=$row_data['username'];
            $invoice_pid=$row_data['invoice_pid'];

            // fetching product image
            $product_id=$row_data['product_id'];
            $select_products="Select * from `products` where product_id=$product_id";
            $result_products=mysqli_query($con,$select_products);
            $row_product=mysqli_fetch_assoc($result_products);
            $product_image1=$row_product['product_image1'];
            // details from user orders
            
            $get_total_amount="Select * from `user_orders` where invoice_number='$invoice_number'";
            $result_amt=mysqli_query($con,$get_total_amount);
            $row_amt=mysqli_fetch_assoc($result_amt);
            $amount=$row_amt['total_amount'];
            $order_date=$row_amt['order_date'];
            
        
            
            //product details
            $product_id=$row_data['product_id'];
            $get_product_details="Select * from `products` where product_id=$product_id";
            $result_product=mysqli_query($con,$get_product_details);
            $row_product=mysqli_fetch_assoc($result_product);
            $product_title=$row_product['product_title'];
            $product_price=$row_product['product_price'];
            

            echo "<tr>
            <td>$invoice_number</td>
            <td>$username</td>
            <td>$product_title</td>
            <td><img src='product_images/$product_image1' alt='' class='img'></td>
            <td>$qty</td>
            <td>$product_price</td>
            <td>$amount</td>
            <td>$order_date</td>
            <td><input type='checkbox' name='selected_items[]' value='$invoice_pid' id=''></td>
            </tr>";
        }
       
        ?>
        </tbody>
       </table> 
       <div class="d-flex justify-content-center align-items-center">
       <?php
        echo " <button class='btn btn-primary text-center px-3 py-2 border-0 mx-3' type='submit' name='mark_delivered'>Mark Selected Item as Delivered</button>";
        ?>
        </div>
    </form>
    </body>
    </html>