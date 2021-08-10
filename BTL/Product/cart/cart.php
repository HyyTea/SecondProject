<?php
session_start();

$user_id = $_SESSION['id'];
$table_name = "cart_user_$user_id";

if (isset($_GET['del_id'])) {
    $del_id = $_GET['del_id'];
    $conn = mysqli_connect('localhost', 'root', '', 'cart');

    $sql = "
                delete 
                from $table_name
                where ID = '$del_id'
        ";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="cart.css">
</head>

<body>
<div class ="container">
            <a href="../pages/product.php">Trang sản phẩm</a>
            <h1>Giỏ hàng</h1>
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th width="50px" style="text-align: center;">STT</th>
            <th width="50px">ID</th>
            <th width="200px">IMAGE</th>
            <th width="300px">NAME</th>
            <th width="100px">PRICE</th>
            <th width="100px">COUNT</th>
            <th width="100px">COST</th>
            <th width="100px"></th>
        </tr>
        <?php

        $conn = mysqli_connect('localhost', 'root', '', 'cart');

        $user_id = $_SESSION['id'];
        $table_name = "cart_user_$user_id";

        $sql = "
                    select *
                    from $table_name
            ";
        $result = mysqli_query($conn, $sql);
        $sohang = mysqli_num_rows($result);
        mysqli_close($conn);
        if($sohang > 0) {

        $i = 1;
        $cost = 0;
        $_SESSION['order'] = "";
        while ($row = mysqli_fetch_array($result)) {
            echo '
                        <tr>
                            <td  style="text-align: center;">' . $i . '</td>
                            <td  style="text-align: center;">' . $row['ID'] . '</td>
                            <td height="200px"><img src="../ảnh/' . $row['IMAGEPRODUCT'] . '" width="200px"></td>
                            <td style="padding-left: 25px; font-weight: bold">' . $row['NAMEPRODUCT'] . '</td>
                            <td  style="text-align: center;">' . $row['PRICE'] . '</td>
                            <td  style="text-align: center;">' . $row['COUNT'] . '</td>
                            <td style="text-align: center;">' . $row['COST'] . '</td>
                            
                                <td  style="text-align: center;"><a href="?del_id=' . $row['ID'] . '"><button style="background-color: red; width: 80px; height: 30px; color: white">
                                    Xóa
                                </button></a></td>
                        </tr>
                ';
            $i++;
            $namepro = $row['NAMEPRODUCT'];
            $count = $row['COUNT'];
            $_SESSION['order'] = $_SESSION['order']."$namepro"."_$count"."_$cost"."<br>";
            $cost += $row['COST'];
        }

        ?>
        <tr>
            <td colspan="6" height="30px" style="text-align: center; font-weight: bold; font-size: 25px; background-color: #b3b3b3">Tính tiền</td>
            <td style="background-color: #b3b3b3; text-align: center; border-left: 1px solid black; color: black; font-size: 25px; width: 200px">
                <?php
                echo "$cost";
                ?>
            </td>
            <td style="background-color: #b3b3b3;"></td>
        </tr>
        <?php
        } else {
            echo '
                <h2>Giỏ hàng chưa có sản phẩm</h2>
            ';
        }
        ?>
    </table>
    <hr>
    <form action="order.php" method="get">
    <div>
        <label>Người nhận: </label><span style="padding-left:20px"><input type="text" value="" name="name" />
    </div><br>
    <div><label>Điện thoại: </label><span style="padding-left:33px"><input type="text" value="" name="phone" /></div><br>
    <div><label>Địa chỉ: </label><span style="padding-left:57px"><input type="text" value="" name="address" /></div><br>
    <div><label>ghi chú: </label><span style="padding-left:52px"><textarea name="note" cols="50" rows="4" ></textarea></div><br>
    <input type="submit" name="order_click" value="Đặt hàng" /><br>
    </form>
</body>
<div>
        <a href="../php/login.php">Đăng nhập</a>
        </div>
<div>
        <a href="../php/logout.php">Đăng xuất</a>
        </div>

</html>