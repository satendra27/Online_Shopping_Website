<?php
if(isset($_GET['edit_products'])){
    $get_id=$_GET['edit_products'];
    $get_data="Select * from product_table where product_id=$get_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_catagory=$row['product_catagories'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_image4=$row['product_image4'];
    $dis_product_price=$row['discounted_product_price'];
    $ori_product_price=$row['original_product_price'];
    
}
?>
<div class="container">
    <h1>Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline">
            <label for="product-title" class="form">Product title:</label><br>
            <input type="text" value=<?php echo $product_title ?> name="product_title" class="form-control" placeholder="Enter Product-title" required>
           </div>

           <div class="form-outline">
            <label for="description" class="form2">Product Description:</label><br>
            <input type="text" value=<?php echo $product_description ?> name="product_description" class="form-control" placeholder="Enter Product description" required>
           </div>

           <div class="form-outline">
            <select name="product_catagories" class="product-catagories" >
                <option value=<?php echo $product_catagory ?>><?php echo $product_catagory ?></option>
                <option value="Mobile" name="product_catagories">Mobile</option>
                <option value="Accessories">Accessories</option>
                <option value="Fashion">Fashion</option>
                <option value="Electronics">Electronics</option>
                <option value="Appliances">Appliances</option>
            </select>
           </div>

           <div class="form-out">
                <Label for="product-image1" class="form-label">Product Image 1</Label>
                <input type="file" name="product_image1" class="form-control" required>
                <img src="./<?php echo $product_image1?>" alt="" style="height:50px; width:40px; object-fit: contain;">
           </div>

           <div class="form-out">
                <Label for="product-image2" class="form-label">Product Image 2</Label>
                <input type="file" name="product_image2" class="form-control" required>
                <img src="./<?php echo $product_image2?>" alt="" style="height:50px; width:40px; object-fit: contain;">

           </div>

           <div class="form-out">
                <Label for="product-image3" class="form-label">Product Image 3</Label>
                <input type="file" name="product_image3" class="form-control" required>
                <img src="./<?php echo $product_image3?>" alt="" style="height:50px; width:40px; object-fit: contain;">

           </div>

           <div class="form-out">
                <Label for="product-image4" class="form-label">Product Image 4</Label>
                <input type="file" name="product_image4" class="form-control" required>
                <img src="./<?php echo $product_image4?>" alt="" style="height:50px; width:40px; object-fit: contain;">
           </div>

           <div class="form-outline">
            <label for="product-price" class="form">Product Discounted Price:</label><br>
            <input type="text" name="dis_product_price" class="form-control" value=<?php echo $dis_product_price ?> placeholder="Enter Product Discounted price" required>
           </div>

           <div class="form-outline">
            <label for="product-price" class="form">Product Original Price:</label><br>
            <input type="text" name="ori_product_price" class="form-control" value=<?php echo $dis_product_price ?> placeholder="Enter Product Original price" required>
           </div>

           <div class="form-outline">
            <input type="Submit" name="edit_product" class="btn" value="Update Product">
           </div>
    </form>
</div>

<?php
if(isset($_POST['edit_product'])){
     $product_title = $_POST['product_title'];
     $product_description = $_POST['product_description'];
     $product_catagory = $_POST['product_catagories'];
     $product_image1 = $_FILES['product_image1']['name'];
     $product_image2 = $_FILES['product_image2']['name'];
     $product_image3 = $_FILES['product_image3']['name'];
     $product_image4 = $_FILES['product_image4']['name'];
     $dis_product_price = $_POST['dis_product_price'];
     $ori_product_price = $_POST['ori_product_price'];
     // $product_status = 'true';
     
     $product_temp1 = $_FILES['product_image1']['tmp_name'];
     $product_temp2 = $_FILES['product_image2']['tmp_name'];
     $product_temp3 = $_FILES['product_image3']['tmp_name'];
     $product_temp4 = $_FILES['product_image4']['tmp_name'];
 
     $dir_image1="product_images/".$product_image1;
     $dir_image2="product_images/".$product_image2;
     $dir_image3="product_images/".$product_image3;
     $dir_image4="product_images/".$product_image4;
 
     
         move_uploaded_file($product_temp1,$dir_image1);
         move_uploaded_file($product_temp2,$dir_image2);
         move_uploaded_file($product_temp3,$dir_image3);
         move_uploaded_file($product_temp4,$dir_image4);
 
     //     $stmt=("update INTO product_table(product_title,product_description,product_catagories,product_image1,product_image2,product_image3,product_image4,discounted_product_price,original_product_price) 
     //     values('$product_title','$product_description','$product_catagory','$dir_image1','$dir_image2','$dir_image3','$dir_image4','$dis_product_price','$ori_product_price')");
     //     $result_query=$conn->query($stmt);
     //     $result_query=mysqli_query($con,$stmt);
     $update_product="update product_table set product_title='$product_title',product_description='$product_description',product_catagories='$product_catagory',product_image1='$dir_image1',product_image2='$dir_image2',product_image3='$dir_image3',product_image4='$dir_image4',discounted_product_price='$dis_product_price',original_product_price='$ori_product_price' where product_id=$get_id";
     $result_update=mysqli_query($con,$update_product);
         
         if($result_update){
             echo "<script>alert('Product data is Updated Successfully')</script>";
             echo "<script>window.open('admin_database.php','_self')</script>";

         }else{
             echo "<script>alert('Some Error Occured!')</script>";
 
         }
     
 
     }
 
 ?>
?>
