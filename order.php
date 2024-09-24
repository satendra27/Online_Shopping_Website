<?php
include('connect.php');
// include('comman_function.php');
include('login.php');
$user_email=$_SESSION['user_email'];
  $get_details="select *from user_info where user_email='$user_email'";
  $result_query=mysqli_query($conn,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];}
$ip=getIPAddress();
$total_price=0;
$cart_query="select * from cart_details where ip_address='$ip'";
$result_cart_price=mysqli_query($con,$cart_query);
$count_products=mysqli_num_rows($result_cart_price);
$invoice_number=mt_rand();
$status='pending';
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];
    $select_products="Select * from product_table where product_id=$product_id";
    $run_price=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price=array($row_product_price['discounted_product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;

    }

}

$get_cart="select * from cart_details";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity=='0'){
    $quantities=1;
    $subtotal=$total_price;
}
else{
    $quantities=$quantity;
    $subtotal=$total_price*$quantities;
}

$insert_orders="insert into user_orders(user_id,amount_due,invoice_number,total_products,order_date,order_status) values($user_id,$subtotal,$invoice_number,$quantities,NOW(),'$status')";
$result_query=mysqli_query($con,$insert_orders);
if($result_query){
    echo "<script>alert('orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}


$insert_pending_orders="insert into order_pending(user_id,invoice_number,product_id,quantity,order_status) values($user_id,$invoice_number,$product_id,$quantities,'$status')";
$result_pending_orders=mysqli_query($con,$insert_pending_orders);

$empty_cart="delete from cart_details where ip_address='$ip'";
$result_delete=mysqli_query($con,$empty_cart);
?>