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
                <th>Product Id</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Catagory</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
include('./connect.php');
$get_products="Select * from `product_table`";
$result=mysqli_query($con,$get_products);
$number=0;
while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_catagory=$row['product_catagories'];
    $product_image=$row['product_image1'];
    $product_price=$row['discounted_product_price'];
    $number++;
    echo "<tr>
    <td>$number</td>
    <td>$product_title</td>
    <td><img src='./$product_image' class='product-image'></td>
    <td>$product_catagory</td>
    <td>Rs. $product_price</td>
    <td>1</td>
    <td>true</td>
    <td><a href='admin_database.php?edit_products=$product_id'><i class='fa-regular fa-pen-to-square'></i></a></td>
    <td><a href='admin_database.php?delete_product=$product_id'><i class='fa-solid fa-trash'></i></a></td>
</tr>";
}


?>
            
        </tbody>
    </table>
</body>
</html>

