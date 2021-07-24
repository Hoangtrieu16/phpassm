<?php
$connect = new mysqli('localhost', 'root', '', 'data_asm');
$product = mysqli_fetch_array($connect->query("SELECT * FROM sanpham WHERE Masp=".$_GET['id']));
echo $product['Masp'];
?>

<?php
if(isset($_POST['tensp'])){
        $tensp = $_POST['tensp'];
        $madm = $_POST['madm'];
        $gia = $_POST['gia'];
        $mota = $_POST['mota'];
        $soluong = $_POST['soluong'];
        // xử lý ảnh
        if(isset($_FILES['img'])){
        $store = "../img/";
        $imgName = $_FILES['img']['name'];
        $imgTemp = $_FILES['img']['tmp_name'];
        move_uploaded_file($imgTemp, $store.$imgName);
        unlink($store.$product['img']);
        }else{
            $imgName = $product['img'];
        }
        $result = ("UPDATE sanpham SET Tensp='$tensp', img='$imgName',Gia='$gia',Mota='$mota', Soluong='$soluong' ,Madm='$madm' WHERE Masp=".$product['Masp']);
        $connect->query($result);
        header("location: ?option=showproduct");
       
    
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
            <h2>Update sản phẩm</h2>
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
                    <input type="text" name="tensp" value="<?=$product['Tensp']?>" class="form-control">
                </div>

                <div class="form-group">
                    <label>Ảnh sản phẩm</label> <br>
                    <img style="width: 10%" src="../img/<?=$product['img']?>">
                    <input type="file" name="img">
                </div>

                <div class="form-group">
                    <label>Số lượng sản phẩm</label>
                    <input type="number" name="soluong" value="<?=$product['Soluong']?>" class="form-control">
                </div>

                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="number" name="gia" value="<?=$product['Gia']?>" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <input type="text" name="mota" value="<?=$product['Mota']?>" class="form-control">
                </div>
                
                <button name="" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
    </body>
</html>
