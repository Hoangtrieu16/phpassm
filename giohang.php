<?php
    
    $connect = new mysqli('localhost', 'root', '', 'data_asm');
    session_start();
    $query = "SELECT * FROM sanpham where status = 1";
    $result = $connect->query($query);
?>
<?php
if(empty($_SESSION['giohang'])){
    $_SESSION['giohang']=array();
}
if(isset($_GET['action'])){
    $id = $_GET['id'];
    switch ($_GET['action']){
        case 'add':
            if(array_key_exists($id, array_keys($_SESSION['giohang']))){ //kiểm tra nếu tồn tại tăng 1
                $_SESSION['giohang'][$id]++;
            }else{
                $_SESSION['giohang'][$id] = 1; // nếu k tồn tại bằng 1
            }
            break;
        case 'delete':
            unset($_SESSION['giohang'][$id]);
            break;
        case 'updatemore':
            $_SESSION['giohang'][$id]++;
            header("location: ?option=giohang");
            break;
        case 'updateasc':
            $_SESSION['giohang'][$id]--;
            header("location: ?option=giohang");
            break;
        case 'order':
            if(isset($_SESSION['member'])){
                header("location:product.php");
            }else{
                header("location:signin.php?option=signin&order=1");
            }
            break;
    }
}
 error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./icon/themify-icons/themify-icons.css">
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
            <img src="./images/csgoroll.png">
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
    
    <main>
        <h1>Giỏ hàng của bạn <hr></h1>
        
        <div class="container">
            <?php
            if(!empty($_SESSION['giohang'])):
//                $ids = "0"; cách 1
//                foreach(array_keys($_SESSION['giohang']) as $key)
//                $ids.=",".$key;
                $ids = implode(',', array_keys($_SESSION['giohang'])); // cách 2
//                var_dump($ids);
                $query = "SELECT * FROM sanpham WHERE Masp in($ids)";
                $result = $connect->query($query);
            ?>
            <table border="1" >
                <tr><th class="full" colspan="6">Sản phẩm bạn đã chọn</th></tr>
                <tr>
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Tổng tiền</th>
                    <th>Xóa</th>
                </tr>
                <?php foreach($result as $item): ?>
                <tr id="row">
                    <td><?=$item['Tensp']?></td>
                    <td class="img"><img src="img/<?=$item['img']?>"></td>
                    <td><?= number_format($item['Gia'],0,',','.')?> VNĐ</td>
                    <td>
                        <button class="update" onclick="location='?option=giohang&action=updateasc&id=<?=$item['Masp']?>'">-</button>
                        <?=$_SESSION['giohang'][$item['Masp']]?> 
                        <button class="update" onclick="location='?option=giohang&action=updatemore&id=<?=$item['Masp']?>'">+</button>
                    </td>
                    <td><?= number_format($subToTal = $item['Gia'] * $_SESSION['giohang'][$item['Masp']],0,',','.')?> VNĐ</td>
                    <td><button class="delete" onclick="location='?option=giohang&action=delete&id=<?=$item['Masp']?>'">Delete</button></td>
                
                <?php $total += $subToTal;?>
                <?php endforeach; ?>
                </tr>
                <tr>
                    <th colspan="4">Tổng tiền toàn bộ sản phẩm</th>
                    <th colspan="2"><?= number_format($total,0,',','.')?> VNĐ</th>
                </tr>
                <tr><th class="full" colspan="6"><button onclick="location='order.php?option=giohang&action=order'">Đặt hàng</button></th></tr>
            </table>
            <?php else : ?>
            <div class="trong">
                <h1>Giỏ hàng trống</h1>
                <a href="product.php">Về trang sản phẩm</a>
            </div>
           <?php endif; ?>
        </div>
    </main>








    <footer>
        <div class="tren">
            <div class="vitri">
                <img src="./images/csgoroll.png" style="height: 80px; width: 150px;"> <br><br><br><br>
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