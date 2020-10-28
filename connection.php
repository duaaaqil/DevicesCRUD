<?php
$link = mysqli_connect("localhost","root","","devices");
if (mysqli_connect_errno()) {
    die(mysqli_connect_error($link));
}
?>