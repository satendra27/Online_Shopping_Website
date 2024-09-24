<?php
$con = new mysqli('localhost:3306','root','','mystore');
if(!$con){
    die('Connection Failed:'.$con->connect_error);
}
?>

<!-- product_image1,product_image2,product_image3,product_image4, -->
<!-- '$dir_image1','$dir_image2','$dir_image3','$dir_image4, -->