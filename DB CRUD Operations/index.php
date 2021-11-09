<?php
include("action.php");

// DELETE
if(isset($_POST['product_delete'])){
    $id=$_POST['product_id'];
    $product_delete = "DELETE  FROM products WHERE id='$id'";
    if(mysqli_query($con, $product_delete)){
        echo "Procuct Deleted Successfully";
    }
}


if(isset($_POST['submit_search'])){
    $search = $_POST['name'];
    $qry_get = "SELECT * from products WHERE name='$search' AND display='1' ";
$result_get = mysqli_query($con, $qry_get);

$data_get = array();
while($data = mysqli_fetch_assoc($result_get)){
    $data_get[]= $data;
}
$rowcount=mysqli_num_rows($result_get);
}else{

    $qry_get = "SELECT * from products WHERE display='1' ";
$result_get = mysqli_query($con, $qry_get);

$data_get = array();
while($data = mysqli_fetch_assoc($result_get)){
    $data_get[]= $data;
}
$rowcount=mysqli_num_rows($result_get);

}

// GET DATA
// $qry_get = "SELECT * from products";
// $result_get = mysqli_query($con, $qry_get);

// $data_get = array();
// while($data = mysqli_fetch_assoc($result_get)){
//     $data_get[]= $data;
// }
// $rowcount=mysqli_num_rows($result_get);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        table{
            border-collapse: collapse;
        }
        th,td{
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    
<div syle="margin:auto">
<h2 style="text-align:center;padding:5px;border:1px solid black;width:330px;margin:auto;background-color:gray;color:white;">DISPLAY</h2>
    <form style="width:60%;margin:auto;margin-top:10px!important;" action='' method='POST'>
        <input type='test' name='name' ewquired>
    <input type='submit' name='submit_search' value="Search By Name" />
     </form>

    <table style="width:60%;margin:auto;margin-top:10px!important;">
        <tr>
            <th>NAME</th>
            <th>PROFIT</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        <?php
        if($rowcount>0){
        foreach($data_get as $data){?>
        <tr>
            <td><?php echo $data['name'];?></td>
            <td><?php $profit = $data['sell_price']-$data['buy_price']; echo $profit;?></td>
            <td><?php echo "<a href='edit.php?type=edit&id=".$data['id']."'>Edit</a>";?></td>
            <td><?php echo "<form action='' method='POST'><input type='hidden' name='product_id' value=".$data['id']."/><input  onClick=\"javascript: return confirm('Please confirm deletion');\" type='submit' name='product_delete' value='Delete' /></form>" ;?></td>
        </tr>

      <?php  }
        }else{
            ?>
          <tr>
              <td colspan="4"><?php echo "There is no data."; ?></td>
          </tr> 
            <?php
        }
        ?>
        
    </table>
    <div style="width:60%;margin:auto;padding:5px;border:1px solid white;text-align:left;"><a style="padding:4px;text-decoration:none;background-color:green;color:white;" href="insert.php">Insert New Data</a></div>
</div>
</body>
</html>