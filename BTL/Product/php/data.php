<?php
    #Bước 1: Tạo kết nối đến máy chủ, csdl
    $con=mysqli_connect("127.0.0.1","root","","web_mysqli");
    //Kiểm tra kết nối
    if(mysqli_connect_errno($con)){
        echo "Không thể kết nối đến CSDL: ".mysqli_connect_error($con);
    }else{
        echo "Kết nối thành công!";
    }