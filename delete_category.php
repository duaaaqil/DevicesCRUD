<?php require_once "connection.php"; ?>
<?php
if(isset($_GET['category_id'])){
    $query = "DELETE FROM categories WHERE category_id = {$_GET['category_id']}";
    $result= mysqli_query($link,$query);
    if($result) {
        header('location:category_list.php');

    }
    
}

?>