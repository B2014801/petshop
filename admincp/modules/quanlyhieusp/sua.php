<?php
    $sql_sua_hieusp="SELECT * FROM tbl_hieusanpham where id_hieusanpham='".$_GET['id_hieusanpham']."' LIMIT 1";
    $query_sua_hieusp=mysqli_query($mysqli,$sql_sua_hieusp);
   
    while($row= mysqli_fetch_array($query_sua_hieusp)){
?>
<h6>Sửa loại sản phẩm</h6>
<form action="modules/quanlyhieusp/xuly.php?id_hieusanpham=<?php echo $_GET['id_hieusanpham'] ?>" method="POST" enctype="multipart/form-data">
    <table class="table table-bordered">
        <tr>
            <td><label class="form-check-label mr-2"  for="">Tên loại sản phẩm</label></td>
            <td><input class="form-control" value="<?php echo $row['tenhieusp']; ?>" name="tenhieusanpham" type="text"></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Hình ảnh loại sản phẩm</label></td>
            <td><input  name="anhhieusanpham"  type="file"></td>
        </tr>
        <tr>
        <td>Danh mục</td>
            <td>
            <select name="tendanhmuc">
                <?php
                $sql="SELECT * from tbl_danhmuc";
                $sql_tble_danhmuc=mysqli_query($mysqli,$sql);
                while($row_danhmuc=mysqli_fetch_array($sql_tble_danhmuc)){
                 ?>
                <option <?php echo ($row_danhmuc['tendanhmuc']==$row['tendanhmuc']) ? 'selected' : '' ?> value="<?php echo $row_danhmuc['tendanhmuc'] ?>" ><?php {echo $row_danhmuc['tendanhmuc']; } ?></option>
                <?php }?>
               </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><button class="btn btn-secondary" name="suahieusanpham" type="submit">Sửa</button></td>
        </tr>
    </table>
</form>
<?php } ?>