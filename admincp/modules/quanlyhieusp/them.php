<h6>Thêm hiệu sản phẩm</h6>
<form action="modules/quanlyhieusp/xuly.php" method="POST">
    <table class="table table-bordered">
        <tr>
            <td><label class="form-check-label mr-2"  for="">Tên hiệu sản phẩm</label></td>
            <td><input class="form-control" name="tenhieusanpham" type="text"></td>
        </tr>
        <tr>
        <td>Danh mục</td>
            <td>
            <select name="tendanhmuc">
                <?php
                $sql="SELECT * from tbl_danhmuc";
                $sql_tble_danhmuc=mysqli_query($mysqli,$sql);
                while($row=mysqli_fetch_array($sql_tble_danhmuc)){
                 ?>
                <option value="<?php echo $row['tendanhmuc'] ?>" ><?php echo $row['tendanhmuc'] ?></option>
                <?php }?>
               </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><button class="btn btn-secondary" name="themhieusanpham" type="submit">Thêm</button></td>
        </tr>
    </table>
</form>