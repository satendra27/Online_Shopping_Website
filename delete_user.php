<?php
include('login.php');
if(isset($_GET['delete_user'])){
    $user_id=$_GET['delete_user'];
    $delete_user="delete from user_info where user_id=$user_id";
    $result=mysqli_query($conn,$delete_user);
    
    if($result){
        echo "<script>alert('User has been removed Successfully')</script>";
        echo "<script>window.open('admin_database.php','_self')</script>";

    }else{
        echo "<script>alert('Some Error Occured!')</script>";

    }
}
?>