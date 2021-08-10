<?php

session_start();

function createDB(){
    $conn = mysqli_connect('localhost','root','');
    $sql = "
            create database if not exists Cart
    ";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function createTB($table_name) {
    $conn = mysqli_connect('localhost','root','','cart');

    $sql = "
            create table if not exists $table_name
            (
                STT int auto_increment primary key,
                ID int,
                IMAGEPRODUCT varchar(1000),
                NAMEPRODUCT varchar(500),
                PRICE int,
                COUNT int,
                COST int
            )
    ";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}


function addProduct($table_name, $id_product, $img_product, $name_product, $price, $count, $cost) {
    $conn = mysqli_connect('localhost','root','','Cart');

    $sql = "
            insert into $table_name(ID,IMAGEPRODUCT, NAMEPRODUCT, PRICE, COUNT, COST)
            values('$id_product','$img_product','$name_product','$price','$count','$cost')
    ";

    mysqli_query($conn, $sql);

    mysqli_close($conn);
}

$user_id = $_SESSION['id'];
$table_name = "cart_user_$user_id";

createDB();
createTB($table_name);
