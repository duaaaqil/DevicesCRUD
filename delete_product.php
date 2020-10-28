<?php require_once "connection.php"; ?>
<?php
if(isset($_GET['product_id'])){
    $query = "DELETE FROM products WHERE product_id = {$_GET['product_id']}";
    $result= mysqli_query($link,$query);
    if($result) {
        header('location:product_list.php');
    }
}

?>