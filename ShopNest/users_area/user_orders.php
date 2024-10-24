<html>
    <head>
        <title>User Orders</title>
    </head>
 
<body>
    <?php
    $username=$_SESSION['username'];
    $get_user="SELECT * FROM `user_table` WHERE username='$username'";
    $result=mysqli_query(mysql: $con,query: $get_user);
    $row_fetch=mysqli_fetch_assoc(result: $result);
    $user_id=$row_fetch['user_id'];      
    ?>

    <h3 class="text-success">All My Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Sl no</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $get_order_details="SELECT * FROM `user_orders` WHERE user_id=$user_id";
            $result_orders=mysqli_query(mysql: $con,query: $get_order_details);
            $number = 1;
            while($row_orders=mysqli_fetch_assoc(result: $result_orders)){
                $order_id=$row_orders['order_id'];
                $amount_due=$row_orders['amount_due'];
                $total_product=$row_orders['total_products'];
                $invoice_number=$row_orders['invoice_number'];
                $order_status=$row_orders['order_status'];
                if ($order_status== 'pending'){
                    $order_status= 'incomplete';
                } else{
                    $order_status= 'complete';
                }
                $order_date=$row_orders['order_date'];
                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>";
                if ($order_status=='Complete'){
                    echo"<td> Paid </td>";
                } else{
                    echo"<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td></tr>";

                }
                $number++;
                
            }    
            ?>
        </tbody>
    </table>
</body>    
</html>