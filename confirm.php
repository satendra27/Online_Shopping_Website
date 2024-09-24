<?php
include('connect.php');
// session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="Select * from user_orders where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}
if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into user_payments(order_id,invoice_number,amount,payment_mode) values($order_id,$invoice_number,$amount,'$payment_mode')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<h2>Successfully Completed the Payment</h2>";
        echo "<script>window.open('profile.php?order_details','_self')</script>";
    }else{
        echo "error";
    }
}
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
</head>
<body>
    <div>
        <h1>Confirm Payment</h1>
        <form action="" method="post">
            <div>
                <input type="text" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div>
                <label for="text">Amount</label><br>
                <input type="text" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div>
                <select name="payment_mode" id="">
                <option value="">Select Payment Mode</option>
                <option value="UPI">UPI</option>
                <option value="Netbanking">Netbanking</option>
                <option value="Paypal">Paypal</option>
                <option value="Cash on Delivery">Cash on Delivery</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html> -->


<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Website</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="confirm_style.css">
    
    <link rel="stylesheet" href="script.js">
    <link rel="stylesheet" href="product.php">
  
    <style>
      .footer{
        background-color: #FF6103;
      }
      .noproduct{
        color: #FF6103;
        text-align: center;
        font-size: 30px;
        margin-top: 20px;
      }
.product-img{
  object-fit: contain;
}
      
    </style>

</head>
<body>

  <div class="width-100 search-panel">
    <div class="container">
      <div class="width-20">
        <img src="./click-to-buy-high-resolution-logo.png" class="logo">
      </div>
      <div class="width-50">
        <form action="search_product.php" method="get">
        <input class="search-textbox" type="text" placeholder="Search for products, brand and more" name="search_data">
        <input type="submit" class="search-button" value="Search" name="search_data_product">
        </form>
        
       
      </div>
      <div class="width-30">
        <ul class="cart-sect">
          <!-- <li>
            <a href="#" style="font-size: 17px;">Welcome Guest</a>
          </li>
          <li>
            <a href="./account.php" style="font-size: 17px;">Login <i class="fa-solid fa-right-to-bracket"></i></a>
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
          <li>
          <a id="cart-icon" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php ;
           cart_item();?></sup></a>
           
          </li>
          <li>
            
          </li>
        </ul>
        
      </div>

      

    </div>
  
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

  <div>
        <h1>Confirm Payment</h1>
        <form action="" method="post">
            <div>
                <input type="text" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div>
                <label for="text">Amount</label><br>
                <input type="text" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div>
                <select name="payment_mode" id="">
                <option value="">Select Payment Mode</option>
                <option value="UPI">UPI</option>
                <option value="Netbanking">Netbanking</option>
                <option value="Paypal">Paypal</option>
                <option value="Cash on Delivery">Cash on Delivery</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>

  

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