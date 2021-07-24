<?php
$connect = new mysqli('localhost', 'root', '', 'data_asm');
session_start();
$query = "SELECT * FROM member WHERE username='".$_SESSION['member']."'";
$member = mysqli_fetch_array($connect->query($query));
?>
<?php
if(isset($_SESSION['member'])){
    if(!empty($_POST)){
    $name = $_POST['name'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $idmember = $member['id_member'];
    $connect = new mysqli("localhost","root","","data_asm");
    $query = "INSERT INTO `hoadon`(`name`, `id_member` ,  `sdt`, `email`) VALUES ('$name','$idmember','$sdt','$email')";
        if(mysqli_query($connect,$query)){
            $idhoadon = mysqli_insert_id($connect);
            unset($_SESSION['giohang']);
            echo '<script>location="index.php";alert("Bạn đã đặt hàng thành công!");</script>';
        }            
    }
        }else{
            header('location:signin.php');
            echo "<script>alert('Bạn cần đăng nhập để mua hàng');</script>";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn</title>
    <link rel="stylesheet" href="./css/orders.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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

    <div class="container_ff">
        <h1>Thông tin đặt hàng<hr></h1>

        <div class="border">
            <form method="POST" >
                <table border="1" class="table table-bordered">
                    <tr>
                        <td><label>Tên: </label></td>
                        <td><input type="text" name="name" value="<?=$member['username']?>"></td>
                    </tr>
                    <tr>
                        <td><label>Số điện thoại : </label></td>
                        <td><input name="sdt" type="text" value="<?=$member['sdt']?>"> </td>
                    </tr>
                    <tr>
                        <td><label>Email : </label></td>
                        <td><input type="text" name="email" value="<?=$member['email']?>"></td>
                    </tr>
                    <tr><td colspan="2"><input class="btn btn-sm btn-success" type="submit" value="Đặt hàng"></td></tr>
                </table>
            </form>
         
        </div>
    </div>

    <footer>
        <div class="tren">
            <div class="vitri">
                <img src="./images/csgoroll.png" style="height: 80px; width: 150px;">
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