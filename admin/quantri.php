<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1" width="100%" cellpadding="0" cellspacing="0">
            <tbody>
                <tr height="100px">
                    <td width="15%">
                        Hello: <span style="color: blue;"><?=$_SESSION['admin']?></span> <br>
                        <a style="margin-top: 20px" class="btn btn-sm btn-danger" href="?option=logout">Logout</a>
                    </td>
                    
                    <td align="center"><img src="../images/csgoroll.png" style="height: 80px; width: 150px;"></td>
                </tr>
                <tr>
                    <td>
                        <a style="margin: 20px 0 0 0; background-color: #F05A22" class="btn btn-danger" href="?option=danhmuc">Xem danh mục</a> <br>
                        <a style="margin: 20px 0; background-color: #F05A22" class="btn btn-success" href="?option=showproduct">Xem thông tin sản phẩm</a>
                        <a style="background-color: #F05A22"class="btn btn-primary" href="?option=member">Xem thông tin member</a>
                        <a style="margin: 20px 0; background-color: #F05A22" class="btn btn-danger" href="?option=showorder">Xem thông tin đặt hàng</a>
                        
                    </td>
                    <td>
                        <?php
                        if(isset($_GET['option'])){
                            switch ($_GET['option']){
                                case 'logout':
                                    unset($_SESSION['admin']);
                                    header("location: .");
                                    break;
                                case 'danhmuc':
                                    include 'danhmuc.php';
                                    break;
                                case 'addbrand':
                                    include 'addbrand.php';
                                    break;
                                case 'updatebrand':
                                    include 'updatebrand.php';
                                    break;
                                case 'showproduct':
                                    include 'showproduct.php';
                                    break;
                                case 'addproduct':
                                    include 'addproduct.php';
                                    break;
                                case 'updateproduct':
                                    include 'updateproduct.php';
                                    break;
                                case 'member':
                                    include 'member.php';
                                    break;
                                case 'updatemember':
                                    include 'updatemember.php';
                                    break;
                                case 'showorder':
                                    include 'showorder.php';
                                    break;
                                case 'updateorder':
                                    include 'updateorder.php';
                                    break;    
                            }
                        }
                        ?>
                    </td>
                    
                </tr>
            </tbody>
        </table>

    </body>
</html>
