<?php
include("action.php");
// INSERT DATA
if(isset($_POST['submit_save'])){

    $name = $_POST['name'];
    $buy_price = $_POST['buy_price'];
    $sell_price = $_POST['sell_price'];
    if(isset($_POST['display'])){
        $display = 1;
    }else{
        $display = 2;
    }
   
    $qry = "INSERT `products` (`name`,`buy_price`,`sell_price`,`display`) VALUES('$name','$buy_price','$sell_price','$display')";
     
    // $result = mysqli_query($con, $qry);
if(mysqli_query($con, $qry)){
    echo "Product Saved Successfully";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert- Products</title>
    <style>
        input,button{
            width: 400px;
            height: 30px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    
<div>
    <h2 style="text-align:center;padding:5px;border:1px solid black;width:330px;margin:auto;background-color:gray;color:white;">INSERT</h2>
    <form style="display:flex;flex-direction:column;width:30%;margin:auto;" action="" method="POST">
        <input type="text" placeholder="Name*" name="name" required>
        <input type="number" placeholder="Buying Price*" name="buy_price" required>
        <input type="number" placeholder="Selling Price*" name="sell_price" required>
        <label style="font-size:24px;" >Display: <input style="width:20px!important;" type="checkbox" name="display" id=""></label>
        <button type="submit" name="submit_save">Save</button>
    </form>
    <div style="width:30%;margin:auto;padding:5px;margin-top:6px!important;">
        <a style="text-decoration:none;color:green;border:1px solid green;padding:5px;" href="index.php">Get All Data</a>
    </div>
</div>
</body>
</html>