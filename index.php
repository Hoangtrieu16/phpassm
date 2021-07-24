<?php
session_start();
$connect = new mysqli('localhost', 'root', '', 'data_asm');
if(isset($_GET['option'])){
    switch ($_GET['option']){
        case 'logout':
            unset($_SESSION['member']);
            header("location:index.php");
            break;
    }
}

$query = "SELECT * FROM sanpham";
$result = $connect->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/trangchu.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="./js/jquery.js"></script>
</head>

<body>
    <header>
        <div class="h-right">
            <div class="r-item"><span class="ti-facebook red"></span></div>
            <div class="r-item"><span class="ti-google red"></span></div>
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
<!--            <div class="l-item red">TIN TỨC</div>
            <div class="l-item red">TUYỂN DỤNG</div>-->
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

    <!-- banner -->
    <div class="banner">
        <img src="" id="hinh">
        <div class="banner-text fade_in">
            <input type="submit" value="Bộ sưu tập">
            <h1>NEW: M4A4 Jalapeño CS:GO Skins</h1>
            <button>XEM THÊM</button>
        </div>
    </div>

    <!-- sản phẩm -->
    <div class="sanpham">
        <h2>Sản phẩm nổi bật</h2>
        <hr>
        <div class="sanpham-img">
            <?php foreach($result as $item): ?>
            <div class="trangphuc">
                <img src="img/<?=$item['img']?>">
                <p class="name"><?=$item['Tensp']?></p>
                <p class="cost"><b><?= number_format($item['Gia'],0,',','.')?> VNĐ</b></p>
                <div class="inf">
                    <i class="ti-eye"></i>
                    <i class="ti-shopping-cart" 
                        onclick="location='giohang.php?option=giohang&action=add&id=<?=$item['Masp']?>'"></i>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>

    <!-- cc -->
    <div class="qc">
        <div class="qc-item1">
            <img src="./images/bot1.jpg">
            <p>Vape</p>
            <hr>
        </div>
        <div class="qc-item2">
            <img src="./images/bot2.jpg">
            <p>Pod</p>
            <hr>
        </div>
        <div class="qc-item3">
            <div class="qc-item-top">
                <img src="./images/bot3.jpg">
                <p>Tinh dầu</p>
                <hr>
            </div>
            <div class="qc-item-down">
                <img src="./images/bot4.jpg">
                <p>Phụ kiện</p>
                <hr>
            </div>
        </div>
    </div>

    <div class="cty">
        <img src="./images/banner1.jpg">
        <div class="content">
            <p class="td">CS:GO ROLL</p>
            <hr>
            <button>Hiểu thêm về chúng tôi</button>
        </div>
    </div>


    <footer>
        <div class="tren">
            <div class="vitri">
                <img src="./images/csgoroll.png" alt=""> <br><br><br><br>
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
    <div class="return">
        <i class="ti-arrow-up"></i>
    </div>

    <script src="./js/scrip.js"></script>
</body>
</html>