<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?php
// gộp lệnh
$member = mysqli_fetch_array($connect->query("select * from member where id_member=".$_GET['id'])); 
?>
<?php
if(isset($_POST['password'])){
    $password = $_POST['password'];
    $status = $_POST['status'];
    $connect->query("UPDATE member SET password='$password', status='$status' WHERE id_member=".$member['id_member']);
    header("location: ?option=member");
    
}
?>
<h1 align="center">Thêm danh mục</h1>
<section class="container col-md-6">
    <form method="POST">
        <section class="form-group">
            <label>Mật khẩu</label> <br>
            <input type="text" value="<?=$member['password']?>" name="password" class="form-group"> <br>
            
            <div class="form-group">
                <label>trạng thái</label> <br>
                    <input type="radio" name="status" value="1" <?=$member['status']==1?'checked':''?>> Active
                    <input type="radio" name="status" value="0" <?=$member['status']==0?'checked':''?>> Unactive
                </div>
            <button class="btn btn-sm btn-info">Update</button>
            <a href="?option=member" class="btn btn-sm btn-danger">Back</a>
        </section>
    </form>
</section>


