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
    <table style="margin-left:370px">
        <thead>
            <tr class="row-heading">
                <th>Serial No.</th>
                <th>User Name</th>
                <th>User E-mail</th>
                <th>Contact</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
include('./login.php');
$get_products="Select * from `user_info`";
$result=mysqli_query($conn,$get_products);
$number=0;
while($row=mysqli_fetch_assoc($result)){
    $user_id=$row['user_id'];
    $user_name=$row['user_name'];
    $user_email=$row['user_email'];
    $user_mobile=$row['user_mobile'];
    $number++;
    echo "<tr>
    <td>$number</td>
    <td>$user_name</td>
    <td>$user_email</td>
    <td>$user_mobile</td>
    <td><a href='admin_database.php?delete_user=$user_id'><i class='fa-solid fa-trash'></i></a></td>
</tr>";
}


?>
            
        </tbody>
    </table>
</body>
</html>

