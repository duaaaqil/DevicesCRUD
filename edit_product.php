<?php require_once "connection.php"; ?>
<!-- RECORD FETCH -->
<?php
$query = 'SELECT * FROM categories';
$result = mysqli_query($link, $query);
$categories = mysqli_fetch_all($result,1);
?>

<?php
if(isset($_GET['product_id'])){
    $query = "SELECT * FROM products WHERE product_id = {$_GET['product_id']}";
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
if(isset($_POST['product_name']) && !empty(trim($_POST['product_name'])) ){
    $query = "UPDATE products SET product_name = '{$_POST['product_name']}', category_id = '{$_POST['category']}' WHERE product_id = {$_POST['product_id']} ";
    $result = mysqli_query($link,$query);
    if($result) {
        header('location:product_list.php');
    }
}
?>
<html>
<body>
    <form method="POST">
        <input type='text' placeholder="Edit Product" name='product_name' value="<?php echo $records['product_name']?>">
        <select name="category">
        <?php foreach($categories as $category){ ?>
        
            <option value="<?php echo $category['category_id'] ?>" <?php echo (isset($_POST['category_id']) && 
                $_POST['category_id'] == $category['category_id'] ? 'selected' : 
                (isset($_records['category_id']) && $_records['category_id'] == $category['category_id'] 
                ? 'selected': '' )) ; ?>
            >
            <?php echo $category['category_name'] ?>
            </option>;
        <?php } ?> 
    
        </select> 
        <input type="hidden" name="product_id" value="<?php echo $records['product_id']?>">
        <input type='submit' value="EDIT" name='submit'>
    </form>
</body>
</html>