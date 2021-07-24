<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $order = $connect->query("SELECT * FROM hoadon WHERE id_hoadon=$id and status=0");
    if(mysqli_num_rows($order) != 0){
        $alert = "Đang vận chuyển đơn hàng không thể xóa";
    }else{
        $connect->query("DELETE FROM hoadon WHERE id_hoadon=$id");
    }
}
?>

<?php
$connect = new mysqli('localhost', 'root', '', 'data_asm');
    $query = "SELECT * FROM hoadon";
    $result = $connect->query($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    <body>
        <h2 align="center">Thông tin đặt hàng</h2>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>SĐT</th>
                    <th>email</th>
                    <th>date</th>
                    <th>Trạng thái</th>
                    <th>Xóa hoặc Sửa</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                <?php foreach ($result as $item): ?>
                <tr>
                    <td><?=$count++?></td>
                    <td><?=$item['id_hoadon']?></td>
                    <td><?=$item['name']?></td>
                    <td><?=$item['sdt']?></td>
                    <td><?=$item['email']?></td>
                    <td><?=$item['ngaymua']?></td>
                    <td><?=$item['status']==1?'Đang gửi':'Đã gửi'?></td>

                    <td>
                        <a class="btn btn-sm btn-info" href="?option=updateorder&id=<?=$item['id_hoadon']?>">Update</a>
                        <a onclick="return confirm('Bạn có chắc muốn xóa')" class="btn btn-sm btn-danger" href="?option=showorder&id=<?=$item['id_hoadon']?>">Delete</a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h4 style="color: red; text-align: center"><?=isset($alert)?$alert:''?></h4>
    </body>
</html>
