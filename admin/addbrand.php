<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?php
if(isset($_POST['tendm'])){
    $tendm = $_POST['tendm'];
    $query = "SELECT * FROM danhmuc WHERE Tendm='$tendm'";
    if(mysqli_num_rows($connect->query($query)) != 0){
        $alert = "Đã tồn tại danh mục này";
    }else{
        $query = "INSERT INTO `danhmuc`(`Tendm`) VALUES ('$tendm')";
        $connect->query($query);
    }
}
?>
<h1 align="center">Thêm danh mục</h1>
<h4 style="color: red; text-align: center"><?=isset($alert)?$alert:''?></h4>
<section class="container col-md-6">
    <form method="POST">
        <section class="form-group">
            <label>Tên danh mục </label> <br>
            <input type="text" name="tendm" placeholder="nhập tên danh mục" class="form-group"> <br>
            <button class="btn btn-sm btn-info">Update</button>
        </section>
    </form>
</section>


