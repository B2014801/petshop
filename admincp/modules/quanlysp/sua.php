<?php
    $sql_sua_sp="SELECT * FROM tbl_sanpham where id_sanpham='".$_GET['id_sanpham']."' LIMIT 1";
    $query_sua_sp=mysqli_query($mysqli,$sql_sua_sp);
?>
<h6>Sửa sản phẩm</h6>
<form action="modules/quanlysp/xuly.php?id_sanpham=<?php echo $_GET['id_sanpham'] ?>" method="POST" enctype="multipart/form-data">
    <?php
    while($row= mysqli_fetch_array($query_sua_sp)){

    ?>
    <table class="table table-bordered">
    <tr>
            <td><label class="form-check-label mr-2"  for="">Tên sản phẩm</label></td>
            <td><input class="form-control" value=<?php echo $row['tensp'] ?> name="tensp" type="text"></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Mã sản phẩm</label></td>
            <td><input class="form-control" value=<?php echo $row['masp'] ?> name="masp" type="text"></td>
        </tr>
        <tr>
            <td><Label class="form-check-label mr-2">Hình ảnh</Label></td>
            <td><input name="hinhanhsp" type="file"></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Giá sản phẩm</label></td>
            <td><input  name="giasp" type="text"  class="form-control" value=<?php echo $row['giasp'] ?>></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Số lượng</label></td>
            <td><input class="form-control" value=<?php echo $row['soluongsp'] ?> name="soluongsp" type="text"></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Mô tả</label></td>
            <td><input name="motasp" type="text" class="form-control" value=<?php echo $row['motasp']?> ></td>
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
                <option <?php echo ($row_danhmuc['id_danhmuc']==$row['id_danhmuc']) ? 'selected' : '' ?> value="<?php echo $row_danhmuc['id_danhmuc'] ?>" ><?php {echo $row_danhmuc['tendanhmuc']; } ?></option>
                <?php }?>
               </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrangsp" id="">
                    <?php if($row['tinhtrangsp']==1){ ?>
                    <option selected value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                    <?php } else?>
                    <option  value="1">Kích hoạt</option>
                    <option selected value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><button class="btn btn-secondary" name="suasanpham" type="submit">Sửa</button></td>
        </tr>
        <?php
    }
        ?>
    </table>
</form>