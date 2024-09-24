<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
       <style>
        .form-control{
            height: 25px;
            width: 700px;
            border-radius: 0px;
            margin-left: 0px;
            border-collapse: collapse;
        }
        .fa-solid{
            
    padding: 10px;
    background-color: orangered;
    border-collapse: collapse;
    margin-top: 5px;

        }
        .ins_container{
            margin-top: 25px;
            margin-left: 50px;
        }
        .input-group{
            margin-left: 47px;
            margin-top: 5px;
        }
       </style>
</head>
<form action="" method="post">
    <div class="ins_container">
        <span><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addoni">
    </div>
    <div class="input-group">
      <button>Submit</button>
    </div>
</form>