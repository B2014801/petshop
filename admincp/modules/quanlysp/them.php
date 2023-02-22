<h6>Thêm sản phẩm</h6>
<form action="modules/quanlysp/xuly.php"  method="POST" enctype="multipart/form-data">
    <table class="table table-bordered">
        <tr>
            <td><label class="form-check-label mr-2"  for="">Tên sản phẩm</label></td>
            <td><input class="form-control" name="tensp" type="text"></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Mã sản phẩm</label></td>
            <td><input class="form-control" name="masp" type="text"></td>
        </tr>
        <tr>
            <td><Label class="form-check-label mr-2">Hình ảnh</Label></td>
            <td><input name="hinhanhsp" type="file"></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Giá sản phẩm</label></td>
            <td><input class="form-control" name="giasp" type="text"></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Số lượng</label></td>
            <td><input class="form-control" name="soluongsp" type="text"></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Mô tả</label></td>
            <td><input class="form-control" name="motasp" type="text"></td>
        </tr>
        <tr>
            <td>Hiệu sản phẩm</td>
            <td>
            <select name="hieusanpham">
                <?php
                    $sql_tbl_chon_hieusp="SELECT id_hieusanpham,tenhieusp from tbl_hieusanpham";
                    $sql_query=mysqli_query($mysqli,$sql_tbl_chon_hieusp);
                    while($row=mysqli_fetch_array($sql_query)){
                 ?>
                <option value="<?php echo $row['id_hieusanpham'] ?>" ><?php echo $row['tenhieusp'] ?></option>

                <?php }?>
               </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrangsp" id="">
                    <option value="1">kích hoạt</option>
                    <option value="0">ẩn</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td colspan="2" class="text-left"><button class="btn btn-secondary w-25" name="themsp" type="submit">Thêm</button></td>
        </tr>
    </table>
</form>