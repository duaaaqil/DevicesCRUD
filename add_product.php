<?php require_once "connection.php"; ?>
<!DOCTYPE html >
<html>

<head>
    <title> DEVICES </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>

<body>
<?php

$query = 'SELECT * FROM categories';
$result = mysqli_query($link, $query);
$categories = mysqli_fetch_all($result,1);

?>

<?php 
if(isset($_POST['submit'])){
    if (isset($_POST['product_name']) && !empty(trim($_POST['product_name'])) ) {
    $query = "INSERT INTO `products`(`product_name`, `category_id`) VALUES ('{$_POST['product_name']}' , '{$_POST['category']}')";
    $result = mysqli_query($link,$query);
    header('location:product_list.php');
    
    }
    else {
        echo "Product field cannot be empty !";
    }

}
?>

<form method="POST">
    <input type='text' placeholder="Add Product" name='product_name'>
    <select name="category">
    <?php 
    foreach($categories as $category){
        echo "<option value=".$category['category_id'].">".$category['category_name']."</option>";
    }
    ?> 
    </select> 
    <input class="btn btn-warning" type='submit' value="submit" name='submit'>
</form>

<a href="product_list.php" class="btn btn-link"> View Product list </a>
</body>
</html>