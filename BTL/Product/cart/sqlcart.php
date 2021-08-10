<?php
require_once('function.php');

$a =  $_REQUEST['AddPro'];

$conn = mysqli_connect('localhost', 'root', '', 'web_mysqli');

$sql = "select * 
        from tbl_sanpham
        where id_sanpham = '$a'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$id_product = $row['id_sanpham'];
$name_product =  $row['tensanpham'];
$img_product = $row['hinhanh'];
$img_product2 = substr($img_product, 11);

$price = $row['giasp'];
$count = 1;
$cost = (int)$price * $count;

$user_id = $_SESSION['id'];
$table_name = "cart_user_$user_id";

addProduct($table_name, $id_product, $img_product2, $name_product, $price, $count, $cost);

mysqli_close($conn);

header("Location: cart.php");
