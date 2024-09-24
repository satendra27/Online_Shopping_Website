<?php
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <div class="container-fluid">
                <img src="./click-to-buy-high-resolution-logo.png" alt="" class="logo">
                <nav class="navbar navbar-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="navigation">Welcome Guest</a>
                        </li>
                    </ul>

                </nav>
            </div>
        </nav>
        <div class="bg-light">
            <h3 class="text-center">Manage Details</h3>
        </div>
        <div class="row">
            <div class="col">
                <div>
                    <a href="#"><img src="./download.jpeg" alt="" class="admin-image"></a>
                    <p class="admin-name">Admin Name</p>
                </div>
                <div class="button">
                    <button><a href="insert_product.php" class="nav-link tet-light bg-info">Insert Products</a></button>
                    <button><a href="admin_database.php?view_products" class="nav-link tet-light bg-info">View Products</a></button>
                    <button><a href="" class="nav-link tet-light bg-info">All Orders</a></button>
                    <button><a href="" class="nav-link tet-light bg-info">All Payments</a></button>
                    <button><a href="admin_database.php?list_users" class="nav-link tet-light bg-info">List Users</a></button>
                    <button><a href="" class="nav-link tet-light bg-info">Log Out</a></button>
                </div>
            </div>
        </div>
        <div class="container">
            <?php
            if(isset($_GET['Insert_Catagory'])){
                include('insert_catagories.php');
            }
            if(isset($_GET['Insert_Brands'])){
                include('insert_brand.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_product'])){
                include('delete_product.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            if(isset($_GET['delete_user'])){
                include('delete_user.php');
            }
            
            
            ?>
        </div>
    </div>
</body>
</html>