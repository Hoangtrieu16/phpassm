<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<?php
 $query = "SELECT * FROM member";
$result = $connect->query($query); 
?>
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $member=$connect->query("SELECT * FROM member WHERE id_member=$id");
    if(mysqli_num_rows($member) != 0){
        $connect->query("DELETE FROM member WHERE id_member=$id");
    }
}
?>
<table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Tài khoản</th>
                    <th>Password</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $item): ?>
                <tr>
                    <td><?=$item['id_member']?></td>
                    <td><?=$item['fullname']?></td>
                    <td><?=$item['username']?></td>
                    <td><?=$item['password']?></td>
                    <td><?=$item['sdt']?></td>
                    <td><?=$item['status']==1?'Active':'Unactive'?></td>
                    <td>
                        <a class="btn btn-sm btn-info" href="?option=updatemember&id=<?=$item['id_member']?>">Update</a>
                        <a onclick="return confirm('Bạn có chắc muốn xóa khách hàng này')" class="btn btn-sm btn-danger" href="?option=member&id=<?=$item['id_member']?>">Delete</a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>