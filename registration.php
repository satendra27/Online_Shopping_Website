<?php
include('comman_function.php');
// include('connect.php');
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_mobile = $_POST['user_mobile'];
$user_password = $_POST['user_password'];
$hash_password= password_hash($user_password,PASSWORD_DEFAULT);
$conn = new mysqli('localhost:3306','root','','registration_form_data');
$user_ip=getIPAddress();

$select_query="Select * from user_info where user_email='$user_email' or user_mobile='$user_mobile'";
$result=mysqli_query($conn,$select_query);
$rows_count=mysqli_num_rows($result);

if($conn->connect_error){
    die('Connection Failed:'.$conn->connect_error);
}
elseif($rows_count>0){
    echo "<script>alert('User Email and User Mobile No. already exist')</script>";
}
else{
    $stmt=$conn->prepare("INSERT INTO user_info(user_name,user_email,user_mobile,user_password)
    values(?, ?, ?, ?)");
    $stmt->bind_param("ssis",$user_name,$user_email,$user_mobile,$hash_password);
    $stmt->execute();
    echo "<script>alert('Registration Successfully...')</script>";
    $stmt->close();
    $conn->close();
}


$select_cart_item = "Select * from cart_details where ip_address='$user_ip'";
$result_cart = mysqli_query($con,$select_cart_item);
$rows_count_item = mysqli_num_rows($result_cart);
if($rows_count_item>0){
  $_SESSION['user_email']=$user_email;
  echo "<script>alert('You have items in your Cart')</script>";
  echo "<script>window.open('checkout.php','_self')</script>";
}
else{
  echo "<script>window.open('index.php','_self')</script>";

}

?>