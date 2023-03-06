<?php
    $sql_sua_donhang="SELECT * FROM tbl_donhang where id_donhang='".$_GET['id_donhang']."' LIMIT 1";
    $query_sua_donhang=mysqli_query($mysqli,$sql_sua_donhang);
   
    while($row= mysqli_fetch_array($query_sua_donhang)){
?>
<h6>Sửa đơn hàng</h6>
<form action="modules/quanlydonhang/xuly.php?id_donhang=<?php echo $_GET['id_donhang'] ?>" method="POST" enctype="multipart/form-data">
    <table class="table table-bordered">
        <!-- <tr>
            <td><label class="form-check-label mr-2"  for="">Chủ đơn hàng</label></td>
            <td><input class="form-control" value="<?php echo $row['id_taikhoan']; ?>" name="tendonhang" type="text"></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Ngày đặt hàng</label></td>
            <td><input class="form-control" value="<?php echo $row['ngay_dathang']; ?>" name="tendonhang" type="text"></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Ngày giao hàng</label></td>
            <td><input class="form-control" value="<?php echo $row['ngay_dathang']; ?>" name="tendonhang" type="text"></td>
        </tr> -->
        <tr>
        <td>Trạng thái đơn hàng</td>
            <td>
            <select name="trangthai">
                <option <?php echo $row['trangthai_donhang']==1 ? 'selected':'' ?> value="1">Đã duyệt</option>   
                <option <?php echo $row['trangthai_donhang']==0 ? 'selected':'' ?> value="0">Chưa duyệt</option>   
            </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><button class="btn btn-secondary" name="suadonhang" type="submit">Sửa</button></td>
        </tr>
    </table>
</form>
<?php } ?>