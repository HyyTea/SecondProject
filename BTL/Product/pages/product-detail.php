<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chi tiết sản phẩm - Danh mục sản phẩm | Detail-Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit-no">
    <link rel="stylesheet" href="../css/detail.css">
    <link rel="stylesheet" href="../css/headdetail.css">
</head>

<body>
    <?php
    #Bước 1: Tạo kết nối đến máy chủ, csdl
    $con = mysqli_connect("localhost", "root", "", "web_mysqli");
    //Kiểm tra kết nối
    if (mysqli_connect_errno()) {
        echo "Không thể kết nối đến CSDL: " . mysqli_connect_error($con);
    } else {
        // echo "Kết nối thành công!";
    }
    ?>
    <?php
    include("../../web_mysqli/admincp/config/config.php");
    ?>
    <nav class="navbar">
        <div class="container">
            <img src="../ảnh/10.png" width=150 height="150">
            <div class="collapse">

                <ul class="navitem">
                    <li>
                        <a id="link1" href="../../Home/BTLN2/trangchu.html" class="active">Trang chủ</a>
                    </li>
                    <li id="item2">
                        <a href="product.php">Sản phẩm</a>
                    </li>
                    <li id="item3">
                        <a href="about.html">Giới thiệu</a>
                    </li>
                    <li id="item4">
                        <a href="contact.html">Liên hệ</a>
                    </li>
                </ul>
                <form class="formin" method="GET" action="search.html">
                    <input class="control" type="text" placeholder="Tìm kiếm" name="keyword_tensanpham">
                    <button class="button" type="submit">Search</button>
                </form>
            </div>
            <ul class="CartLog">
                <li class="Clog">
                    <a href="../cart/cart.php"><img width="40" src=../ảnh/cart.png><input style="background-color:khaki;" type="button" value="Giỏ hàng"></a>
                </li>
                <li class="Clog">
                    <a href="../php/login.php"><img width="30" src=../ảnh/login.png><input style="background-color:khaki;" type="button" value="Đăng nhập"></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- <?php
            $sql_sanpham = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC";
            $query_sanpham = mysqli_query($mysqli, $sql_sanpham);
            ?>
    <?php
    while ($row_sanpham = mysqli_fetch_array($query_sanpham)) {
    ?>
        <a href="product-detail.php?quanly=sanpham&id=<?php echo $row_sanpham['id_sanpham'] ?>"></a>
    <?php
    }
    ?> -->
    <?php

    if (isset($_GET['id_sanpham'])) {
        $sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='{$_GET['id_sanpham']}'";
    } else {
        echo "Sản phẩm không tồn tại";
    }
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    $row_chitiet = mysqli_fetch_array($query_chitiet);
    ?>
    <div>
        <form method="POST" action="#">
            <div class="detail">
                <div class="detailleft">
                    <img style="background-color: black; margin: 1px;" width="100%" src="../../web_mysqli/admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
                    <!-- <img width="24%" src="../ảnh/b22-2.jpg">
                        <img width="24%" src="../ảnh/b22-3.jpg">
                        <img width="24%" src="../ảnh/b22-4.jpg">
                        <img width="24%" src="../ảnh/b22-5.jpg"> -->
                </div>
                <div class="info">
                    <div class="detailright">
                        <h1><?php echo $row_chitiet['tensanpham'] ?></h1>
                        <ul class="rate">
                            <li id="Ar" class="prdrate">
                            <li id="Ar">
                                <img class="prdimg" src="../ảnh/Rate.png"> 0 Đánh giá(s) | Thêm đánh giá
                            </li>
                            </li>
                        </ul>
                        <p class="inf"><?php echo $row_chitiet['tomtat'] ?></p>
                        <h3>Chi tiết</h3>
                        <div class="prdmore">
                            <ul class="prdprice">
                                <li class="price"><?php echo number_format($row_chitiet['giasp'], 0, ',', '.') . ' ₫' ?></li>
                                <li id="Ar" class="stock"><i>Còn hàng</i></li>
                                <div class="clear"> </div>
                            </ul>
                            <ul class="color">
                                <h3>Màu sắc:</h3>
                                <li class="color2">
                                </li>
                                <li class="color9">
                                </li>
                                <li class="color3">
                                </li>
                                <li class="color4">
                                </li>
                                <li class="color5">
                                </li>
                                <li class="color6">
                                </li>
                                <li class="color7">
                                </li>
                                <li class="color8">
                                </li>
                                <div class="clear"> </div>
                            </ul>
                            <ul class="sluong">
                                <span>Số lượng</span>
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                </select>
                            </ul>
                            <?php
                            echo '
                                        <a href="../cart/sqlcart.php?AddPro=' . $row_chitiet['id_sanpham'] . '"><input class="input" type="button" value="Thêm vào giỏ hàng"></a>
                                    ';
                            ?>
                            <ul class="prdshare">
                                <h3>Chia sẻ</h3>
                                <ul id="Ar">
                                    <li>
                                        <a href="https://www.facebook.com/" class="share"><img width=50 src=../ảnh/fb.png></a>
                                        <a href="https://www.twitter.com/" class="share"><img width=35 src=../ảnh/twitter.png></a>
                                        <a href="https://www.tiktok.com/" class="share"><img width=32 src=../ảnh/tiktok.png></a>
                                        <a href="https://www.instagram.com/" class="share"><img width=40 src=../ảnh/ins.png></a>
                                    </li>
                                    <div class="clear"> </div>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
        </form>
    </div><br>
    <div>
        <a href="../php/logout.php">Đăng xuất</a>
    </div>

</body>

</html>