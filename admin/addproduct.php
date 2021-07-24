<?php
if(isset($_POST['tensp'])){
    $tensp = $_POST['tensp'];
    $query = "SELECT * FROM sanpham WHERE Tensp='$tensp'";
    if(mysqli_num_rows($connect->query($query)) != 0){
        $alert = "Đã tồn tại sản phẩm này";
    }else{
        $tensp = $_POST['tensp'];
        $madm = $_POST['madm'];
        $gia = $_POST['gia'];
        $mota = $_POST['mota'];
        $soluong = $_POST['soluong'];
        // xử lý ảnh
        $store = "../img/";
        $imgName = $_FILES['img']['name'];
        $imgTemp = $_FILES['img']['tmp_name'];
        
        move_uploaded_file($imgTemp, $store.$imgName);
        $connect->query("INSERT INTO sanpham(`Tensp`,`img` , `Gia`, `Mota`, `Soluong`, `Madm`) VALUES ('$tensp','$imgName','$gia','$mota','$soluong','$madm')");
        header("location: ?option=showproduct");
       
    }
}
?>
<?php
$brand = $connect->query("SELECT * FROM danhmuc");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm sản phẩm</h2>
        </div>
        <div class="card-header">
            <h2><?=isset($alert)?$alert:''?></h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="madm">
                        <option hidden>--Chọn hãng--</option>
                        <?php foreach($brand as $item): ?>
                        <option value="<?=$item['Madm']?>"><?=$item['Tendm']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="tensp" class="form-control">
                </div>

                <div class="form-group">
                    <label>Ảnh sản phẩm</label> <br>
                    <input type="file" name="img">
                </div>

                <div class="form-group">
                    <label>Số lượng sản phẩm</label>
                    <input type="number" name="soluong" class="form-control">
                </div>

                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="number" name="gia" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <input type="text" name="mota" class="form-control">
                </div>
                
                <button name="" class="btn btn-success">Thêm mới</button>
            </form>
            <h2><?=isset($alert)?$alert:''?></h2>
        </div>
    </div>
</div>
    </body>
</html>
