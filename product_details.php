<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product Details</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="product1.css">
  <style>
    .main-images img {
    height: 100%;
    margin-left: 50px;
    width: 700px;
    /* border: 5px solid #FF6103; */
    object-fit: contain;
}
.small-images img{
  /* border: 2px solid #FF6103; */
  margin-left: 5px;
  margin-bottom: 5px;
  /* height: 130px; */
  width: 130px;
  object-fit: contain;
}
.product-box{
  /* background-color: lightgray; */
  border: 1px solid #FF6103;
}
body{
  margin: 20px;
}
  </style>
</head>

<body>

 <?php 
    include("./connect.php");
    if(isset($_GET['product_id'])){
        $product_id=$_GET['product_id'];
    $select_query = "Select * from product_table where product_id=$product_id";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_catagory=$row['product_catagories'];
      $product_image1=$row['product_image1'];
      $product_image2=$row['product_image2'];
      $product_image3=$row['product_image3'];
      $product_image4=$row['product_image4'];
      $dis_product_price=$row['discounted_product_price'];
      $ori_product_price=$row['original_product_price'];
      if($ori_product_price<=0){
        $product_discount=0;
      }
      else{
      $product_discount = round((($ori_product_price - $dis_product_price)/$ori_product_price)*100);
      }
      
      echo "<div class='container'>
        <div class='wrapper'>
          <div class='product-box'>
            <div class='all-images'>
            <div class='small-images'>
              <img src='./$product_image1' onclick='clickimg(this)'>
              <img src='./$product_image2' onclick='clickimg(this)'>
              <img src='./$product_image3' onclick='clickimg(this)'>
              <img src='./$product_image4' onclick='clickimg(this)'>
            </div>
            <div class='main-images'>
              <img src='./$product_image1' id='imagebox'>
            </div>
            </div>
          </div>
        </div>
      </div>
    
      <div class='text'>
        <div class='content'>
          
          <h2>$product_title</h2>
          <div class='review'>
            <span class='fa fa-star checked'></span>
                  <span class='fa fa-star checked'></span>
                  <span class='fa fa-star checked'></span>
                  <span class='fa fa-star'></span>
                  <span class='fa fa-star'></span>
          </div>
          <div class='price-box'>
            <p class='price'>Rs.$dis_product_price</p>
            <strike>$ori_product_price</strike>
          </div>

          <h4>Product Description:</h4>
          <p>$product_description</p>
        
          
          <a class='shopping-cart' href='product_details.php?add_to_cart=$product_id'>
            <button>Add to Cart</button>
          </a>
          <button class='buy'>
            <span class='shopping-cart'>Buy now </span>
          </button>
        </div>
      </div>";

  
    }

}
include("comman_function.php");
cart();

    ?> 
    

<script>
    function clickimg(smallimg){
      var fullimg=document.getElementById("imagebox")
      fullimg.src=smallimg.src
    }
  </script>
  
</body>
</html>