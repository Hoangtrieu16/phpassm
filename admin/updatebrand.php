<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?php
// gộp lệnh
$brand = mysqli_fetch_array($connect->query("select * from danhmuc where Madm=".$_GET['id'])); 
?>
<?php
if(isset($_POST['tendm'])){
    $tendm = $_POST['tendm'];
    $query = "SELECT * FROM danhmuc WHERE Tendm='$tendm' and Madm!=".$brand['Madm'];
    if(mysqli_num_rows($connect->query($query)) != 0){
        $alert = "Đã tồn tại danh mục này";
    }else{
        $connect->query("UPDATE danhmuc SET Tendm='$tendm' WHERE Madm=".$brand['Madm']);
        header("location: ?option=danhmuc");
    }
}
?>
<h1 align="center">Thêm danh mục</h1>
<h4 style="color: red; text-align: center"><?=isset($alert)?$alert:''?></h4>
<section class="container col-md-6">
    <form method="POST">
        <section class="form-group">
            <label>Tên danh mục </label> <br>
            <input type="text" value="<?=$brand['Tendm']?>" name="tendm" placeholder="nhập tên danh mục" class="form-group"> <br>
            <button class="btn btn-sm btn-info">Update</button>
            <a href="?option=danhmuc" class="btn btn-sm btn-danger">Back</a>
        </section>
    </form>
</section>


