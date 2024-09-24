<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Products</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="view_products.css">
    <style>
        .product-image{
    height: 40px;
    width: 50px;
    object-fit: contain;
}
    </style>
</head>
<body>
    <h1>All Products</h1>
    <table>
        <thead>
            <tr class="row-heading">
                <th>S. No.</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
include('./connect.php');
// include('login.php');
  global $conn;
  $user_email=$_SESSION['user_email'];
  $get_details="select * from user_info where user_email='$user_email'";
  $result_query=mysqli_query($conn,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
  }
$get_products="Select * from `user_orders` where user_id=$user_id";
$result=mysqli_query($con,$get_products);
$number=0;
while($row=mysqli_fetch_assoc($result)){
    $order_id=$row['order_id'];
    $product_amount=$row['amount_due'];
    $total_products=$row['total_products'];
    $product_invoice=$row['invoice_number'];
    $product_date=$row['order_date'];
    $product_status=$row['order_status'];
    if($product_status=='pending'){
        $product_status="Incomplete";
        }else{
        $product_status="Complete";
            
        }
    $number++;
    echo "<tr>
    <td>$number</td>
    <td>$product_amount</td>
    <td>$total_products</td>
    <td>$product_invoice</td>
    <td>$product_date</td>
    <td>$product_status</td>
    <td><a href='confirm.php?order_id=$order_id' style='color:black;'>Complete</a></td>
</tr>";
}


?>
            
        </tbody>
    </table>
</body>
</html>

