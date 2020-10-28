<?php require_once "connection.php"; ?>
<!-- RECORD FETCH -->
<?php
if(isset($_GET['category_id'])){

    $query = "SELECT * FROM categories WHERE category_id = {$_GET['category_id']}";
    $result = mysqli_query($link,$query);
    $records = null;
    if(mysqli_errno($link)){
        var_dump(mysqli_errno($link));die;
        
    }else{
        $records = mysqli_fetch_assoc($result);
    }
}
?>
<!-- RECORD UPDATE -->
<?php
if(isset($_POST['category_name']) && !empty(trim($_POST['category_name'])) ){
    $query = "UPDATE categories SET category_name = '{$_POST['category_name']}' WHERE category_id = {$_POST['category_id']} ";
    $result = mysqli_query($link,$query);
    if($result) {
        header('location:category_list.php');

    }
}
?>
<html>
<body>
<form method="POST">
    <input type='text' placeholder="Category name edit" name='category_name' value="<?php echo $records['category_name']?>">
    <input type="hidden" name="category_id" value="<?php echo $records['category_id']?>">
    <input type='submit' value="EDIT" name='submit'>
</form>
</body>
</html>