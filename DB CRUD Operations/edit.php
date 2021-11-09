<?php
include("action.php");

if(isset($_GET['type']) && $_GET['id']!==''){
    $id = $_GET['id'];
    // GET DATA


}else{
    header('location: index.php');
    die();
}



// INSERT DATA
if(isset($_POST['submit_update'])){
    $name = $_POST['name'];
    $buy_price = $_POST['buy_price'];
    $sell_price = $_POST['sell_price'];

    $qry = "UPDATE `products` SET `name` = '$name', `buy_price` = '$buy_price', `sell_price` = '$sell_price' WHERE id='$id' ";
     
    // $result = mysqli_query($con, $qry);
if(mysqli_query($con, $qry)){
    echo "Product Updated Successfully";
}

}

$qry_get = "SELECT * from products WHERE id='$id' ";
$result_get = mysqli_query($con, $qry_get);

$data_get = mysqli_fetch_assoc($result_get);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert- Products</title>
</head>
<body>
    
<div>
<h2 style="text-align:center;padding:5px;border:1px solid black;width:330px;margin:auto;background-color:gray;color:white;">UPDATE</h2>
    <form action="" method="POST">
        <input type="text" placeholder="Name*" name="name" value="<?php echo $data_get['name'] ?>" required>
        <input type="number" placeholder="Buying Price*" name="buy_price" value="<?php if(isset($data_get)){ echo $data_get['buy_price'];}else{ echo '';}?>" required>
       <input type="number" placeholder="Selling Price*" name="sell_price" value="<?php if(isset($data_get)){ echo $data_get['sell_price'];}else{ echo '';}?>" required>
        <button type="submit" name="submit_update">Save</button>
    </form>
    <div>
        <a href="index.php">Get All Data</a>
    </div>
</div>
</body>
</html>