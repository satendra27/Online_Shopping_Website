<?php
    include("./connect.php");
    // include("./search_product.php");

function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
     $search_data_value = $_GET['search_data'];
    $search_query="Select * from product_table where product_title like '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_catagory=$row['product_catagories'];
      $product_image1=$row['product_image1'];
      
      $dis_product_price=$row['discounted_product_price'];
      $ori_product_price=$row['original_product_price'];
      if($ori_product_price<=0){
        $product_discount=0;
      }
      else{
      $product_discount = round((($ori_product_price - $dis_product_price)/$ori_product_price)*100);
      }
      echo "<div class='width-25'>
      <div class='product-section'>
        <div class='product-border' style='height: 250px;'>
         
          <div class='product-img-center'>
            <a href='./product1.html'>
              <img class='product-img' src='./$product_image1' alt='$product_title'>
            </a>
          </div>
          <div>
            <p class='product-name'>
              <a href='./product1.html'>$product_title</a>
            </p>
            <div class='product-rating'>
              <span class='fa fa-star checked'></span>
              <span class='fa fa-star checked'></span>
              <span class='fa fa-star checked'></span>
              <span class='fa fa-star'></span>
              <span class='fa fa-star'></span>

            </div>
            
              
            <p class='product-price'>
              <span class='product-discounted-price'>Rs.$dis_product_price</span>
              <span class='product-original-price'>Rs.$ori_product_price</span><br>
              <span class='product-discount'>$product_discount%OFF</span>
          </div>
        </div>
      </div>
    </div>";
  
    }


}
}




function getIPAddress() {  
  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  

  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  


function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];
    $select_query = "Select * from cart_details where ip_address='$ip' and product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo "<script>alert('This item is already present inside the database')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    else{
      $insert_query="insert into cart_details (product_id,ip_address,quantity) values('$get_product_id','$ip',0)";
      $result_query=mysqli_query($con,$insert_query);
      echo "<script>alert('Item is Added to Cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";

    }
  }
}





function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress();
    $select_query = "Select * from cart_details where ip_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_item=mysqli_num_rows($result_query);
  }
    else{
      global $con;
    $ip = getIPAddress();
    $select_query = "Select * from cart_details where ip_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_item=mysqli_num_rows($result_query);

    }
    echo $count_cart_item;
  }



  function total_cart_price(){
    global $con;
    $ip = getIPAddress();
    $total_price=0;
    $cart_query="Select * from cart_details where ip_address='$ip'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $select_products="Select * from product_table where product_id='$product_id'";
      $result_products=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['discounted_product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
      }
    }
    echo $total_price;

  }





?>