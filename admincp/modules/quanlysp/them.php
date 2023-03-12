<form class="form-inline mb-2" action="" method="GET">
    <h6 class="mr-3">Thêm sản phẩm</h6>
    <div class="form-group ml-auto">
    <input class="form-control mr-1" type="search" name="search_query" placeholder="tìm kiếm" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </div>
</form>

<form action="modules/quanlysp/xuly.php"  method="POST" enctype="multipart/form-data" onsubmit="return ValidateFormSanPham()">
    <table class="table table-bordered">
        <tr>
            <td><label class="form-check-label mr-2"  for="">Tên sản phẩm</label></td>
            <td><input class="form-control" id="tensp" name="tensp" type="text"></td>
        </tr>
       
        <tr>
            <td><label class="form-check-label mr-2"  for="">Giá sản phẩm (đ)</label></td>
            <td><input class="form-control" id="giasp" name="giasp" type="text"></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Số lượng</label></td>
            <td><input class="form-control" id="soluongsp" name="soluongsp" type="text"></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Giảm giá (%)</label></td>
            <td><input class="form-control" id="soluongsp" name="giam_gia" type="number"></td>
        </tr>
        <tr>
            <td><label class="form-check-label mr-2"  for="">Mô tả</label></td>
            <td><input class="form-control" id="motasp" name="motasp" type="text"></td>
        </tr>
        <tr>
            <td><Label class="form-check-label mr-2">Hình ảnh</Label></td>
            <td><input name="hinhanhsp" id="hinhanhsp" type="file"></td>
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