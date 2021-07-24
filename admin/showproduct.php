<?php
$connect = new mysqli('localhost', 'root', '', 'data_asm');
    $query = "SELECT * FROM sanpham";
    $result = $connect->query($query);
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $product=$connect->query("SELECT * FROM sanpham WHERE Masp =$id");
    if(mysqli_num_rows($product) != 0){
        $connect->query("DELETE FROM sanpham WHERE Masp=$id");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    <body>
        <h2 align="center">Thông tin</h2>
        <section style="text-align: center;margin: 20px 0;">
            <a href="?option=addproduct" class="btn btn-sm btn-success">Thêm sản phẩm</a>
        </section>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $item): ?>
                <tr>
                    <td><?=$item['Masp']?></td>
                    <td><?=$item['Tensp']?></td>
                    <td width="100px" ><img style="width: 100%" src="../img/<?=$item['img']?>"></td>
                    <td width="400px"><?=$item['Mota']?></td>
                    <td><?=$item['Soluong']?></td>
                    <td><?= number_format($item['Gia'],0,',','.')?> VNĐ</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="?option=updateproduct&id=<?=$item['Masp']?>">Update</a>
                        <a onclick="return confirm('Bạn có chắc muốn xóa SP này')" class="btn btn-sm btn-danger" href="?option=showproduct&id=<?=$item['Masp']?>">Delete</a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </body>
</html>
