<?php
if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];
    echo $delete_id;
    $delete_product="delete from product_table where product_id=$delete_id";
    $result=mysqli_query($con,$delete_product);
    
    if($result){
        echo "<script>alert('Product data is Updated Successfully')</script>";
        echo "<script>window.open('admin_database.php','_self')</script>";

    }else{
        echo "<script>alert('Some Error Occured!')</script>";

    }
}
?>