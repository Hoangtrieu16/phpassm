<?php
$connect = new mysqli('localhost', 'root', '', 'data_asm');
session_start();
if(isset($_POST['username'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $query = "SELECT * FROM member WHERE username='$username'";
    $result = $connect->query($query);
    if(mysqli_num_rows($result) != 0){
        $alert = "Tên tài khoản này đã tồn tại";
    }else{
        echo "<script>alert ('Bạn đăng kí thành công')</script>";
        $query = "INSERT INTO `member`(`fullname`, `username`, `password`, `sdt`, `email`) VALUES ('$fullname','$username','$password','$sdt','$email')";
        $connect->query($query);
        header('location:signin.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link rel="stylesheet" href="./css/dangki.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./mockup/mklienhe.css">
    <link rel="stylesheet" href="./icon/themify-icons/themify-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="./js/jquery.js"></script>
</head>
<body>
    <header>
        <div class="h-right">
            <div class="r-item"><span class="ti-facebook"></span></div>
            <div class="r-item"><span class="ti-google"></span></div>
            <div class="r-item">HOTLINE : <span class="red">0126 922 0162</span></div>
        </div>
        <div class="h-left">
            <div class="l-item red">
            <p style="float:right;color:white; margin:5px;">
                    <?php
                    function LucNayLa() {
                        $anh = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun", "am", "pm", ":");
                        $viet = array("Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy", "Chủ nhật", " phút, AM", " phút, PM", " giờ ");
                        $timenow = gmdate("D, d/m/Y - g:i a.", time() + 7 * 3600);
                        $t = str_replace($anh, $viet, $timenow);
                        return $t;
                    }
                    echo LucNayLa();
                    ?>
                </p>
            </div>
        </div>
    </header>

    <nav id="nav">
        <div id="icon-menu" class="icon-menu">
            <label class="ti-list"></label>
        </div>

        <div id="menu-logo" class="nav-img">
            <img src="./images/csgoroll.png" style="height: 80px; width: 150px;">
        </div>

        <div id="menu-list" class="list">
            <ul id="menu">
                <li><a class="nav__link" href="index.php">Trang chủ</a> </li>
                <li><a class="nav__link" href="#">Giới thiệu</a></li>
                <li><a class="nav__link" href="product.php">Sản phẩm</a>
                    <ul class="subnav">
                        <li><a class="nav__link" href="product.php">Skin M4A1-S</a></li>
                        <li><a class="nav__link" href="product.php">Skin M4A4</a></li>
                        <li><a class="nav__link" href="product.php">Skin AK47</a></li>
                        <li><a class="nav__link" href="product.php">Skin AWM</a></li>
                    </ul>
                </li>
                <?php if(empty($_SESSION['member'])): ?>
                <li><a class="nav__link" href="signin.php">Đăng nhập</a></li>
                <li><a class="nav__link" href="resign.php">Đăng kí</a></li>
                <?php else: ?>
                <li><span class="nav__linh">Hello: <?=$_SESSION['member']?></span></li>
                <li><a class="nav__linh" href="?option=logout">Đăng xuất</a></li>
                <?php endif; ?>
                <li><span class="ic ti-search"></span></li>
                <li> <a href="giohang.php"><span class="ic ti-shopping-cart"></span></a></li>
            </ul>
        </div>

        <div id="icon-menu-rp" class="icon-shopping">
            <label class="ti-shopping-cart"></label>
        </div>
    </nav>

        <!-- lien hệ -->
        <div class="container" >
            <div class="container-text">
                <h2>LIÊN HỆ</h2>
                <hr>
                <h3 >MONA MEDIA</h3>
                <ul>
                    <li>151 Hồ Bá Kiện, Phường 15, Quận 10, Tp.Hồ Chí Minh.</li>
                    <li>Email: <a href="#">demonhunter@gmail.com</a> </li>
                    <li>Điện thoại: <a href="#">0126 922 0162</a> </li>
                    <li>Skype: <a href="#">demonhunterp</a></li>
                </ul>
                <p><em>
                        Lorem Ipsum is simply dummy text of the printing and 
                        typesetting industry. Lorem Ipsum has been the industry’s
                        standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled
                        it to make a type specimen book. It has survived 
                        not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially
                        unchanged. It was popularised in the 1960s with
                        the release of Letraset sheets containing Lorem
                        Ipsum passages, and more recently with desktop 
                        publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.
                    </p></em>
                
            </div>
            <div class="tt">
                <h4 style="color: red; text-align: center"><?=isset($alert)?$alert:''?></h4>
                <form method="POST">
                    <label for="">Tên của bạn(*)</label> <br>
                    <input class="text" type="text" name="fullname" placeholder="Tên tài khoản" required>
                    <br> <br>
                    <label for="">Tên tài khoản(*)</label> <br>
                    <input class="text" type="text" name="username" placeholder="Tên tài khoản" required>
                    <br> <br>
                    <label for="">Mật khẩu(*)</label> <br>
                    <input class="text" type="password" name="password" placeholder="Mật khẩu" required> 
                    <br> <br>
                    <label for="">Email(*)</label> <br>
                    <input class="text" type="email" name="email" placeholder="Email" required>
                    <br> <br>
                    <label for="">Số điện thoại(*)</label> <br>
                    <input type="number" name="sdt" placeholder="Số điện thoại" required>
                    <br> <br>
                    <input type="submit" value="Đăng kí">
                </form>
            </div>
        </div>

        <!-- footer -->
        <footer>
            <div class="tren">
                <div class="vitri">
                    <img src="./images/csgoroll.png" style="height: 80px; width: 150px;"> <br><br>
                    <p>151 Hồ Bá Kiện, Phường 15, Quận 10, Tp.Hồ Chí Minh.</p> 
                    <p>Điện thoại: <span class="white">0126 922 0162</span></p>
                    <p>Email: <span class="white">demonhunter@gmail.com</span></p>
                    <p>Skype: <span class="white">demonhunterp</span></p>
                </div>
    
                <div class="vechungtoi">
                    <h3>VỀ CHÚNG TÔI</h3>
                    <ul>
                        <li><a href="">Tổng quan về công ty</a></li>
                        <li><a href="">Lịch sử hình thành</a></li>
                        <li><a href="">Tầm nhìn - Sứ mệnh</a></li>
                        <li><a href="">Câu chuyện thương hiệu</a></li>
                    </ul>
                    
                </div>
                <div class="hotro">
                    <h3>HỖ TRỢ KHÁCH HÀNG</h3>
                    <ul>
                        <li><a href="">Phiếu quà tặng</a> </li>
                        <li><a href="">Thẻ VIP</a> </li>
                        <li><a href="">Hướng dẫn chọn size</a></li>
                    </ul>
                </div>
                <div class="dk">
                    <h3>ĐĂNG KÍ BẢN TIN</h3>
                    <br>
                    <input type="email" class="email" id="" placeholder="Địa chỉ email">
                    <input type="submit" class="submid" value="Gửi">
                    <p>Đăng ký với chúng tôi để nhận email về <br> 
                    sản phẩm mới, khuyến mại đặc biệt và <br>
                    các sự kiện độc đáo.</p>
                </div>
            </div>
    
            <div class="duoi">
                <p>© All rights reserved. Thiết kế website <span class="white"><b>Mona Media</b></span></p>
            </div>
        </footer>
    <script src="./js/scrip.js"></script>
</body>
</html>