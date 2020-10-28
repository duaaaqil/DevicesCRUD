<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<!-- PHP CODE FOR QUERY -->
<?php
require_once "connection.php";
if(isset($_POST['order_by'])){
    $query = "SELECT products.product_id, products.product_name, categories.category_name FROM products inner join categories on products.category_id = categories.category_id order by {$_POST['order_by']} {$_POST['order_with']} ";
}
elseif(isset($_POST['filter_submit']) ){
    if(!empty(trim($_POST['filter_by']))){
        $query = "SELECT products.product_id, products.product_name, categories.category_name FROM products
                  inner join categories on products.category_id = categories.category_id WHERE products.product_name LIKE  '%{$_POST['filter_by']}%' OR categories.category_name LIKE '%{$_POST['filter_by']}%' ";
  
    }else{
        $query = "SELECT products.product_id, products.product_name, categories.category_name FROM products inner join categories on products.category_id = categories.category_id";
    }
}
else{
    $query = "SELECT products.product_id, products.product_name, categories.category_name FROM products inner join categories on products.category_id = categories.category_id";
}
$result = mysqli_query($link, $query);
?>

<!-- FILTER FORM -->
<div>
    <form method="POST">
        <input type="text" name="filter_by" placeholder="search...">
        <input class="btn btn-warning" type="submit" value="filter" name="filter_submit">
    </form>
</div>

<!-- SORTING FORM -->
<div>
    <form method="POST">
        <label> ORDER BY </label>
        <select name="order_by">
            <option value="product_name">BY NAME</option>
        </select>

        <select name="order_with">
            <option value="asc">ASCENDING</option>
            <option value="desc">DESCENDING</option>
        </select>
        <input class="btn btn-warning" type="submit" value="search" name="sort_submit">
    </form>
</div>

<!-- PRODUCT TABLE -->
<?php
if(isset($result->num_rows) && $result->num_rows>0){ ?>
<h3> PRODUCTS TABLE </h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> Product ID </th>
                <th> NAME </th>
                <th> Category Id </th>
                <th> ACTION </th>
            </tr>
            <?php while($resultset = mysqli_fetch_assoc($result)){   ?>
            <tr>
            <td> <?php echo $resultset['product_id'] ?> </td>
            <td> <?php echo $resultset['product_name'] ?> </td>
            <td> <?php echo $resultset['category_name'] ?> </td>
            <td> 
                <a href="edit_product.php?product_id=<?php echo $resultset['product_id'] ?>">Edit</a> 
                <a href="delete_product.php?product_id=<?php echo $resultset['product_id'] ?>">Delete </a> 
            </td>
            </tr>

            <?php } ?>     
        </thead>
    </table>
<a href="add_product.php" class="btn btn-info"> ADD PRODUCT </a>
<?php }?>
