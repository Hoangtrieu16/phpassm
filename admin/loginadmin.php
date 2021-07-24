<!DOCTYPE html>
<html>
        <head>
            <meta charset="UTF-8">
            <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body{
            background-color: #171719;;
            font-family: 'Proxima-Nova',proxima-nova,sans-serif;
        }
        h1{
            color:white;
        }
        hr{
        width: 100px;
        height: 3px;
        border: none;
        background-color: rgb(202, 4, 4);
        }
        .cover{
            margin: 0 auto;
            width: 12%;
            color: white;
        }
        .box-img{
            width: 400px;
            margin: 0 auto;
        }
    </style>
    </head>
    <body>
        <h1 align="center" style="color: white;">Admin<hr></h1>
        <div class="box-img"><img class="" src="../images/csgoroll.png"></div>
        
        <h2 style="color: red; text-align: center;"><?=isset($alert)?$alert:''?></h2>
        <section class="cover">
            <section class="form-group">
                <form method="POST">
                    <label for="">Tài khoản(*)</label><br>
                    <input type="text" name="username" placeholder="Tài khoản"> <br>
                    <label for="">Mật khẩu(*)</label><br>
                    <input type="password" name="password" placeholder="Nhập mật khẩu"> <br>
                    <input style="margin-top: 20px;" class="btn btn-sm btn-success" type="submit" value="Đăng nhập">
                </form>
            </section>
        </section>
    </body>
</html>
