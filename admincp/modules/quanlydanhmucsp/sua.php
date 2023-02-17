<?php
    $sql_sua_danhmucsp="SELECT * FROM tbl_danhmuc where id_danhmuc='".$_GET['id_danhmuc']."' LIMIT 1";
    $query_sua_danhmucsp=mysqli_query($mysqli,$sql_sua_danhmucsp);
?>
<h6>Sửa danh mục sản phẩm</h6>
<form action="modules/quanlydanhmucsp/xuly.php?id_danhmuc=<?php echo $_GET['id_danhmuc'] ?>" method="POST">
    <?php
    while($row= mysqli_fetch_array($query_sua_danhmucsp)){

    ?>
    <table class="table table-bordered">
        <tr>
            <td><label class="form-check-label mr-2"  for="">Tên danh mục</label></td>
            <td><input class="form-control" value="<?php echo $row['tendanhmuc']?>" name="tendanhmuc" type="text"></td>
        </tr>
        <tr>
            <td><Label class="form-check-label mr-2">Thứ tự</Label></td>
            <td><input class="form-control" value="<?php echo $row['thutu']?>" name="thutu" type="number"></td>
        </tr>
        <tr>
            <td colspan="2"><button class="btn btn-secondary" name="suadanhmuc" type="submit">Sửa</button></td>
        </tr>
        <?php
    }
        ?>
    </table>
</form>