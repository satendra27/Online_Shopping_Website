<?php
include('./connect.php');
if(isset($_POST['insert_product'])){
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


    // if($product_title=='' or $product_description=='' or $product_catagory=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' or $product_image4==''){
    //     echo "<script>alert('Please fill all the available fields')</script>";
    //     echo "$dir_image1";
    //     exit();
    // }
    
        move_uploaded_file($product_temp1,$dir_image1);
        move_uploaded_file($product_temp2,$dir_image2);
        move_uploaded_file($product_temp3,$dir_image3);
        move_uploaded_file($product_temp4,$dir_image4);

        $stmt=("INSERT INTO product_table(product_title,product_description,product_catagories,product_image1,product_image2,product_image3,product_image4,discounted_product_price,original_product_price) 
        values('$product_title','$product_description','$product_catagory','$dir_image1','$dir_image2','$dir_image3','$dir_image4','$dis_product_price','$ori_product_price')");
        // $result_query=$conn->query($stmt);
        $result_query=mysqli_query($con,$stmt);
        
        if($result_query){
            echo "<script>alert('Successfully Inserted the Products')</script>";
        }else{
            echo "<script>alert('Some Error Occured!')</script>";

        }
    

    }

?>
<!-- ,NOW(),'$product_status' -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <style>
        /* 
        
       
        
        .form-out{
            margin-left: 380px;
        }

        .product-catagories{
            margin-right: 5px;
            height: 30px;
            width: 600px;
        } */
        /* 
        .container{
            border: 1px solid black;
            background-color: lightgray;
            margin: 0px;
        }
        
        .form2{
            margin-right: 425px;
        } */
        .text-center{
            text-align: center;
        }

        input[type="file"]{
            border: 2px solid black;
            background-color: white;
            height: 30px;
            width: 40%;
        }
        input[type="file"]::file-selector-button{
            /* padding: 7px; */
            border: none;
           background-color: lightgray;
           border: 1px solid black;
           height: 30px;

        }
        select{
            height: 30px;
            width: 40.5%;
            border: 2px solid black;
        }
        label{
            font-size: large;
        }
        
        .btn{

padding: 10px;
margin-right: 425px;
background-color: #FF6103;
border: 1px solid #FF6103;
color: white;
}
        .form-control{
            width: 39.8%;
            height: 30px;
            border-radius: 0px;
        }
        form{
            /* margin-left: 475px; */
            text-align: center;

        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
           <div class="form-outline">
            <label for="product-title" class="form">Product title:</label><br>
            <input type="text" name="product_title" maxlength="40" class="form-control" placeholder="Enter Product-title" required><br><br>
           </div>

           <div class="form-outline">
            <label for="description" class="form2">Product Description:</label><br>
            <input type="text" name="product_description" class="form-control" placeholder="Enter Product description" required><br><br>
           </div>

           <div class="form-outline">
            <select name="product_catagories" class="product-catagories"><br>
                <option value="Select Catagory">Select Catagory</option>
                <option value="Mobile" name="product_catagories">Mobile</option>
                <option value="Accessories">Accessories</option>
                <option value="Fashion">Fashion</option>
                <option value="Electronics">Electronics</option>
                <option value="Appliances">Appliances</option>
            </select>
           </div>

           <div class="form-out">
                <br><Label for="product-image1" class="form-label">Product Image 1</Label><br>
                <input type="file" name="product_image1" class="form-control" required><br><br>
           </div>

           <div class="form-out">
                <Label for="product-image2" class="form-label">Product Image 2</Label><br>
                <input type="file" name="product_image2" class="form-control" required><br><br>
           </div>

           <div class="form-out">
                <Label for="product-image3" class="form-label">Product Image 3</Label><br>
                <input type="file" name="product_image3" class="form-control" required><br><br>
           </div>

           <div class="form-out">
                <Label for="product-image4" class="form-label">Product Image 4</Label><br>
                <input type="file" name="product_image4" class="form-control" required><br><br>
           </div>

           <div class="form-outline">
            <label for="product-price" class="form">Product Discounted Price:</label><br>
            <input type="text" name="dis_product_price" class="form-control" placeholder="Enter Product Discounted price" required><br><br>
           </div>

           <div class="form-outline">
            <label for="product-price" class="form">Product Original Price:</label><br>
            <input type="text" name="ori_product_price" class="form-control" placeholder="Enter Product Original price" required><br>
           </div>

           <div class="form-outline">
           <br> <input type="Submit" name="insert_product" class="btn" value="Insert Products">
           </div>
        </form>
    </div>
    <div id="display-image">
	<?php
		$query = " select * from product_table ";
		$result = mysqli_query($con, $query);

		while ($data = mysqli_fetch_assoc($result)) {
	?>
		<img src="./product_images/<?php echo $data['product_title']; ?>">

	<?php
		}
	?>
	</div>

</body>
</html>