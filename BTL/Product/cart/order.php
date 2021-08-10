<?php
session_start();

function createTB()
{
    $conn = mysqli_connect('localhost', 'root', '', 'web_mysqli');

    $sql = "
            create table if not exists order_1
            (
                STT int auto_increment primary key,
                id int,
                infor varchar(500),
                name varchar(500),
                phone varchar(20),
                address varchar(500),
                note varchar(1000),
                orderinfor varchar(500),
                date varchar(100)
            )
    ";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function kiemtra($user_id) {
    $conn = mysqli_connect('localhost', 'root', '', 'web_mysqli');

    $sql = "
            select *
            from order_1
            where id = '$user_id'
    ";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $total = mysqli_num_rows($result);
    } else {
        $total = 0;
    }

    mysqli_close($conn);

    return $total;
}

$today = date("d/m/Y");

$user_id = $_SESSION['id'];
$a = kiemtra($user_id);
$infor = "user_$user_id"."_$a";

createTB();

if (isset($_GET['name']) && isset($_GET['phone']) && isset($_GET['address'])) {
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $address = $_GET['address'];

    if (isset($_GET['note'])) {
        $note = $_GET['note'];
    } else {
        $note = "";
    }

    $orderinfor = $_SESSION['order'];

}

function insertOrder($user_id,$infor,$name, $phone, $address, $note, $orderinfor, $date) {
    $conn = mysqli_connect('localhost', 'root', '', 'web_mysqli');

    $sql = "
            insert into order_1(id,infor, name, phone, address, note, orderinfor, date)
            values('$user_id','$infor','$name','$phone','$address','$note','$orderinfor','$date')
    ";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

insertOrder($user_id,$infor, $name, $phone, $address, $note, $orderinfor, $today);
function delCart() {

}
header("Location: cart.php");