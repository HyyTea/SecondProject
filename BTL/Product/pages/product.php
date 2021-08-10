<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sản phẩm - Danh mục sản phẩm | Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit-no">
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="contact.php">
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
    <?php
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
    ?>
    <nav class="navbar">
        <a href="../ảnh/Binanmal.png"></a>
        <div class="container">
            <a href="../../web_mysqli/admincp/login.php"><img src="../ảnh/10.png" width=150 height="150"></a>
            <div class="collapse">

                <ul class="navitem">
                    <li>
                        <a id="link1" href="../../Home/BTLN2/trangchu.html" class="active">Trang chủ</a>
                    </li>
                    <li id="item2">
                        <a href="product.php">Sản phẩm</a>
                    </li>
                    <?php
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                        <li id="item2">
                            <a href="product.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a>
                        </li>
                    <?php
                    }
                    ?>
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
    <main role="main">
        <section class="center">
            <div class="container">
                <h1>Danh sách sản phẩm</h1>
            </div>
            <p>Các sản phẩm của shop Đô Đô được đánh giá cao về chất lượng, uy tín, cam kết từ nhà sản xuất, phân phối và bảo hành.</p>
        </section>
        <div class="danhsachsanpham">
            <div class="container">
                <div class="row">
                    <?php
                    // Nếu không có id trong url, thì câu lệnh bỏ từ AND cho đến OrB
                    if (isset($_GET['id'])) {
                        $sql_pro = "SELECT * FROM tbl_danhmuc,tbl_sanpham WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_danhmuc='{$_GET['id']}' ORDER BY tbl_sanpham.id_sanpham DESC";
                    } else {
                        $sql_pro = "SELECT * FROM tbl_danhmuc,tbl_sanpham WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC";
                    }
                    $query_pro = mysqli_query($mysqli, $sql_pro);
                    $row_title = mysqli_fetch_array($query_pro);
                    ?>
                    <?php
                    while ($row_pro = mysqli_fetch_array($query_pro)) {
                    ?>
                        <div class="mainpr">
                            <div class="prd">
                                <a href="product-detail.php?id_sanpham=<?php echo $row_pro['id_sanpham']; ?>">
                                    <img class="imgtop" width="100%" height="350" src="../../web_mysqli/admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                                </a>
                                <div class="infor">
                                    <a href="product-detail.php?id_sanpham=<?php echo $row_pro['id_sanpham']; ?>">
                                        <h5><?php echo $row_pro['tensanpham'] ?></h5>
                                    </a>
                                    <h6><?php echo $row_pro['tomtat'] ?></h6>
                                    <p class="inf"><?php echo $row_pro['masp'] ?></p>
                                    <div class="taskbar">
                                        <div class="group">
                                            <a class="groupsec" href="product-detail.php?id_sanpham=<?php echo $row_pro['id_sanpham']; ?>">Xem chi tiết</a>
                                        </div>
                                        <small class="text">
                                            <b><?php echo number_format($row_pro['giasp'], 0, ',', '.') . ' ₫' ?></b>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        if (isset($_GET['p'])) { //Lấy trang hiện tại
            $p = (int) $_GET['p'];
            if ($p <= 1) $p = 1;
        } else {
            $p = 1;
        }
        $length = 9;
        $start = $length * ($p - 1);
        //Lấy toàn bộ dữ liệu, không sắp xếp
        $sql1 = "SELECT * FROM tbl_sanpham";
        $result1 = mysqli_query($con, $sql1);

        $sql = "SELECT * FROM tbl_sanpham ORDER BY SUBSTRING_INDEX (SUBSTRING_INDEX(tensanpham, ' ', 3), ' ', -1) LIMIT $start,$length";

        if ($result = mysqli_query($con, $sql)) {
            // echo "Lấy được dữ liệu";
        } else {
            echo "Có lỗi xảy ra: " . mysqli_error($con);
        }
        //Kỹ thuật phân trang sử dụng LIMIT
        $numpage = ceil(mysqli_num_rows($result1) / $length);
        for ($i = 1; $i <= $numpage; $i++) {
            if ($i != $p)
                echo "<a href='http://localhost/BTL/Product/pages/product.php?quanly_danhmucsanpham&id=1?p=$i'> </a>";
            else echo "<span style='font-size:20px'>Trang</span>";
            echo "<a style='color: red' href='http://localhost/BTL/Product/pages/product.php?quanly_danhmucsanpham&id=1?p=$i'> <fontcolor='red' size='4'>$i</font>  </a>";
        }
        ?>
        <div>
            <a href="../php/logout.php">Đăng xuất</a>
        </div>
    </main>
    <footer class="foot">
        <a href="#" id="toTop" style="display: block;">
            <span id="toTopHover" style="opacity: 0;"></span><span id="toTopHover" style="opacity: 1;"></span></a>
    </footer>
</body>

</html>