<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?php
// gộp lệnh
$order = mysqli_fetch_array($connect->query("select * from hoadon where id_hoadon=".$_GET['id'])); 
?>
<?php
if(isset($_POST['sdt'])){
    $sdt = $_POST['sdt'];
    $status = $_POST['status'];
    $connect->query("UPDATE hoadon SET sdt='$sdt', status='$status' WHERE id_hoadon=".$order['id_hoadon']);
    header("location: ?option=showorder");
    
}
?>
<h1 align="center">Thêm danh mục</h1>
<section class="container col-md-6">
    <form method="POST">
        <section class="form-group">
            <label>Số điện thoại</label> <br>
            <input type="number" value="<?=$order['sdt']?>" name="sdt" class="form-group"> <br>
            
            <div class="form-group">
                <label>Trạng thái</label> <br>
                    <input type="radio" name="status" value="1" <?=$order['status']==1?'checked':''?>> Đang giao hàng
                    <input type="radio" name="status" value="0" <?=$order['status']==0?'checked':''?>> Đã giao hàng
                    <input type="radio" name="status" value="1" <?=$order['status']==1?'checked':''?>> Hủy giao hàng
                </div>
            <button class="btn btn-sm btn-info">Update</button>
            <a href="?option=showorder" class="btn btn-sm btn-danger">Back</a>
        </section>
    </form>
</section>


