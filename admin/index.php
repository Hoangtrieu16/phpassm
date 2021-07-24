<?php
session_start();
$connect = new mysqli('localhost', 'root', '', 'data_asm');
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    <body>
        
        <?php
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "select * from admin where username='$username' and password='$password'";
            $result = $connect->query($query);
            if(mysqli_num_rows($result) == 0){
                $alert = "Sai tên đăng nhập hoặc mật khẩu";
            }else{
                $result = mysqli_fetch_array($result); // nạp thành mảng 1 chiều
                if($result['status'] == 0){
                    $alert = "Tài khoản bị khóa";
                }else{
                    $_SESSION['admin'] = $username;
                    header("Refresh:0");
                }
            }
        }
        ?>
        
        <?php
        if(isset($_SESSION['admin'])){
            include 'quantri.php';
        }else{
            include 'loginadmin.php';
        }
        ?>
    </body>
</html>
