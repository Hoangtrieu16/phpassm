<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $product = $connect->query("SELECT * FROM sanpham WHERE Madm=$id");
    if(mysqli_num_rows($product) != 0){
        $alert = "Vẫn còn sản phẩm trong danh mục này";
    }else{
        $connect->query("DELETE FROM danhmuc WHERE Madm=$id");
    }
}
?>

<?php
$connect = new mysqli('localhost', 'root', '', 'data_asm');
    $query = "SELECT * FROM danhmuc";
    $result = $connect->query($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style>

        </style>
    </head>
    <body>
        <h2 align="center">Thông tin danh mục</h2>
        <section style="text-align: center;margin: 20px 0;">
            <a href="?option=addbrand" class="btn btn-sm btn-success">Thêm danh mục</a>
        </section>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Xóa hoặc Sửa</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                <?php foreach ($result as $item): ?>
                <tr>
                    <td><?=$count++?></td>
                    <td><?=$item['Madm']?></td>
                    <td><?=$item['Tendm']?></td>
                    <td>
                        <a class="btn btn-sm btn-info" href="?option=updatebrand&id=<?=$item['Madm']?>">Update</a>
                        <a onclick="return confirm('Bạn có chắc muốn xóa')" class="btn btn-sm btn-danger" href="?option=danhmuc&id=<?=$item['Madm']?>">Delete</a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h4 style="color: red; text-align: center"><?=isset($alert)?$alert:''?></h4>
    </body>
</html>
