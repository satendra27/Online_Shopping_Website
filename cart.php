<?php
@session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart Details</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="cstyle.css">
    <link rel="stylesheet" href="script.js">
    <link rel="stylesheet" href="product.php">
    <link rel="stylesheet" href="cart_styles.css">
  
    <style>
      .footer{
        background-color: #FF6103;
      }
      .cart_noitem{
        text-align: center;
        color: red;
      }
      .cart_price input{
       height: 32px;
       margin-top: 20px;

      }

      .input-class:hover{
        background-color: white;
      }
      
      
    </style>

</head>
<body>

  <div class="width-100 search-panel">
    <div class="container">
      <div class="width-20">
        <img src="./click-to-buy-high-resolution-logo.png" class="logo">
      </div>
      
      <div class="width-30">
        <ul class="cart-sect">
          <!-- <li>
            <a href="#" style="font-size: 17px;">Welcome Guest</a>
          </li>
          <li>
            <a href="./account.html" style="font-size: 17px;">Login <i class="fa-solid fa-right-to-bracket"></i></a>
          </li> -->
          <?php 
          // echo $_SESSION['user_email'];
          include('login.php');
          

          if(!isset($_SESSION['user_email'])){
            echo "<li>
            <a href='#' style='font-size: 17px;'>Welcome Guest</a>
          </li>";
          }else{
    $user_email=$_SESSION['user_email'];
  $get_details="select *from user_info where user_email='$user_email'";
  $result_query=mysqli_query($conn,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_name=$row_query['user_name'];}
            echo "<li>
            <a href='profile.php' style='font-size: 16px;'>Welcome ".$user_name."</a>
          </li>";
          }

          if(!isset($_SESSION['user_email'])){
            echo "<li>
            <a href='./account.php' style='font-size: 16px;'>Login <i class='fa-solid fa-right-to-bracket'></i></a>
          </li>";
          }else{
            echo "<li>
            <a href='./logout.php' style='font-size: 16px;'>Logout <i class='fa-solid fa-right-to-bracket'></i></a>
          </li>";
          }
          ?>
          
        </ul>
        
      </div>

      

    </div>
    <!-- <div class="cart">
      <h2 class="cart-title">Your Cart</h2>

      <div class="cart-content">


      </div>

      <div class="total">
          <div class="total-title">Total</div>
          <div class="total-price">$0</div>
      </div>
      <button type="button" class="btn-buy">Buy Now</button>
      <i class="fa-solid fa-xmark" id="cart-close"></i>
  </div> -->
  </div>

  
<div class="width-100">
  <div class="container navbar">
    <ul class="main-menu">
      <li class="home">
        <a href="./index.php"><img src="./house-solid.svg" style="height: 15px;" alt=""> Home</a>
      </li>
      <li>
        <a href="./mobile.php"><img src="./mobile-screen-button-solid.svg" alt="" style="height: 15px;"> Mobile</a>
      </li>
      <li>
        <a href="./accessories.php"><img src="./headphones-simple-solid.svg" alt="" style="height: 15px;"> Accessories</a>
      </li>
      <li>
        <a href="./fashion.php"><img src="./shirt-solid.svg" alt="" style="height: 15px;"> Fashion</a>
      </li>
      <li>
        <a href="./electronics.php"><img src="./bolt-solid.svg" alt="" style="height: 15px;"> Electronics</a>
      </li>
      <li>
        <a href="./appliances.php"><img src="./lightbulb-solid.svg" alt="" style="height: 15px;"> Appliances</a>
      </li>
      <li>
        <a href="#"><img src="./gift-solid.svg" alt="" style="height: 15px;"> Top Offers</a>
      </li>
    </ul>
  </div>

  <!-- Slider start -->
  <div class="w3-content w3-section" style="max-width: 1350px;">
    <img class="mySlides" src="./slide4.png" style="width: 100%;">
    <img class="mySlides" src="./slide5.jpg" style="width: 100%;">
    <img class="mySlides" src="./slider3.jpg" style="width: 100%;">
    
  </div>
  <script>
    var myIndex = 0;
    carousel();
    function carousel(){
      var i;
      var x = document.getElementsByClassName("mySlides");
      for(i=0;i<x.length;i++){
        x[i].style.display="none";
      }
       myIndex++;
      if(myIndex>x.length) {myIndex=i}
      x[myIndex-1].style.display="block";
      setTimeout(carousel,3000);
    }
  </script>
  <!-- Slider End -->

  <div class="row_cart">
    <h2>Shopping Cart Products</h2>
  </div>

  <!-- Product-Cart-Section HTML Code STARTS -->

  <div class="cart_container">
    <div class="cart_row">
      <form action="" method="post">
        <table class="table_data">
            
              <?php
              // include("comman_function.php");
              $ip = getIPAddress();
              $total_price=0;
              $cart_query="Select * from cart_details where ip_address='$ip'";
              $result=mysqli_query($con,$cart_query);
              $result_count = mysqli_num_rows($result);
              if($result_count>0){
               echo " <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody class='table_row'>";

              while($row=mysqli_fetch_array($result)){
                $product_id=$row['product_id'];
                $select_products="Select * from product_table where product_id='$product_id'";
                $result_products=mysqli_query($con,$select_products);
                while($row_product_price=mysqli_fetch_array($result_products)){
                  $product_price=array($row_product_price['discounted_product_price']);
                  $price_table=$row_product_price['discounted_product_price'];
                  $product_title=$row_product_price['product_title'];
                  $product_image1=$row_product_price['product_image1'];
                  $product_values=array_sum($product_price);
                  $total_price+=$product_values;
                
              
              ?>
                <tr>
                    <td><?php echo $product_title; ?></td>
                    <td><img src="./<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td><input type="text" style="width: 70px;" value="" name="quantity"></td>
                    <?php
              $ip = getIPAddress();
              if(isset($_POST['update_cart'])){
                $quantities=$_POST['quantity'];
                $update_cart = "UPDATE cart_details set quantity = $quantities where ip_address='$ip'";
                $result_products_quantity=mysqli_query($con,$update_cart);
                $price_table=$quantities*$price_table;
                $total_price=$price_table;
              }


                    ?>
                    <td>Rs.<?php echo $price_table ?></td>
                    <td><input type="checkbox" name="remove_item[]" value="<?php echo $product_id ?>"></td>
                    <td><input type="submit" name="update_cart" id="" value="Update Cart" class="button" style="background-color:#FF6103; padding:8px; color:white; margin-right:10px; border-color:#FF6103; cursor:pointer;">
                     <input type="submit" value="Remove" class="button" name="remove_cart" style="background-color:#FF6103; padding:8px; color:white; margin-right:10px; border-color:#FF6103; cursor:pointer;">            </td>
                </tr>
                <?php
                }
              }
            }
            else{
              echo "<h2 class='cart_noitem'>Cart is Empty</h2>";
            }
            
                ?>
            </tbody>
        </table>
        <div class="cart_price">
          <?php
           $ip = getIPAddress();
           $cart_query="Select * from cart_details where ip_address='$ip'";
           $result=mysqli_query($con,$cart_query);
           $result_count = mysqli_num_rows($result);
           if($result_count>0){
            echo "<h4>Total Price:<strong> Rs. $total_price</strong></h4>
            <input class='input-class' type='submit' name='continue_shopping' value='Continue Shopping' style='background-color:#FF6103; padding:8px; color:white; margin-right:10px; border-color:#FF6103; cursor:pointer;'>
            <button class='input-class' style='background-color:#FF6103;border-color:#FF6103; height: 32px; margin-top:20px; padding-right:6px'><a href='checkout.php' style='color: white;' >CheckOut</a></button>";
           }
           else{
            echo "<input class='input-class' type='submit' name='continue_shopping' value='Continue Shopping' style='background-color: #FF6103; padding: 8px; color:white; border-color: #FF6103;'>";
           }

           if(isset($_POST['continue_shopping'])){
            echo "<script>window.open('index.php','_self')</script>";
           }
          ?>
  

        </div>
    </div>
  </div>
  </form>

<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['remove_item'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from cart_details where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
     
    }
  }
}
 echo $remove_item = remove_cart_item();
?>

<footer class="footer">
  <div class="follow">
    <h2>----------Follow us on----------</h2><br><br>
    <a href="#" class="flogo"><img src="./fb.svg" alt="facebook"></a>
    <a href="#" class="flogo"><img src="./instagram.svg" alt="facebook"></a>
    <a href="#" class="flogo"><img src="./linkedin.svg" alt="facebook"></a>
    <a href="#" class="flogo"><img src="./twitter.svg" alt="facebook"></a>
    <a href="#" class="flogo"><img src="./youtube.svg" alt="facebook"></a>
    
  </div><br><br>
  <div class="sub-footer">
  <div class="content content1">
    <h2><u>Contact</u></h2>
    <p class="footer-data"><br>Contact:1234678812 <br><br>E-mail:baghelsatendra27@gmail.com</p>
  </div>
  <div class="content content2">
    <h2><u>Company</u></h2>
    <p class="footer-data"><br>Customer support link <br>
      FAQ page link <br><br>
      Return and exchange policy <br> <br>
      Terms and conditions <br><br>
      Privacy policy</p>
  </div>
  <div class="content content2">
    <h2><u>Support</u></h2>
    <p><br>Product categories <br> <br>
      Popular products <br><br>
      New arrivals <br><br>
      Sale items <br><br>
      Gift cards</p>
  </div>
  <div class="content content2">
    <h2><u>About</u></h2>
    <p><br>Leadership <br><br>Customers <br><br>Shipping information
      <br><br>Returns and exchanges information
      <br><br>Estimated delivery times</p>
  </div>
  </div>
  
</footer>
<div class="copyright">
  <h2>
    Copyright © 2027 - All rights reserved</h2>
</div>

<script src="script.js"></script>

</body>
</html>