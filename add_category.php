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
if(isset($_POST['submit'])){
    if (isset($_POST['category_name']) && !empty(trim($_POST['category_name'])) ) {
       
    $query = "INSERT INTO `categories`(`category_name`) VALUES ('{$_POST['category_name']}') ";
    $result = mysqli_query($link,$query);
    }
    else {
        echo "Category field cannot be empty !";
    }

}
?>
<form method="POST">
    <input type='text' placeholder="Add Category" name='category_name'>
    <input class="btn btn-warning" type='submit' value="submit" name='submit'>
</form>
<a href="category_list.php" class="btn btn-link"> View category list </a>
</body>
</html>