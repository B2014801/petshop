<?php
    // cong san pham
    if(isset($_POST['capnhat-tatca'])){
        $sort=$_POST['key'];
        $soluong=$_POST['soluong'];
        if($sort=='DUOI10'){
            $sql="UPDATE tbl_sanpham a SET soluongsp=soluongsp+'$soluong' WHERE a.soluongsp < 10 AND a.soluongsp >=1";
        }
        if($sort=="HET"){
            $sql="UPDATE tbl_sanpham a SET soluongsp=soluongsp+'$soluong' WHERE a.soluongsp =0";
        }
        mysqli_query($mysqli,$sql);
    }
    // loc san pham
    if(isset($_POST['orderbysp'])){
    $sort=$_POST['orderbysp'];
    if($sort=='DUOI10'){
        $sql_lietke_sp='SELECT * FROM tbl_sanpham a,tbl_hieusanpham b WHERE a.id_hieusanpham=b.id_hieusanpham AND a.soluongsp < 10 AND a.soluongsp >=1 ';
        
    }
    if($sort=="HET"){
        $sql_lietke_sp='SELECT * FROM tbl_sanpham a,tbl_hieusanpham b WHERE a.id_hieusanpham=b.id_hieusanpham AND a.soluongsp = 0';
    }
    if($sort=="ALL"){
        $sql_lietke_sp='SELECT * FROM tbl_sanpham a,tbl_hieusanpham b WHERE a.id_hieusanpham=b.id_hieusanpham';
    }}
    else{
        $sql_lietke_sp='SELECT * FROM tbl_sanpham a,tbl_hieusanpham b WHERE a.id_hieusanpham=b.id_hieusanpham';
    }
    // $sql_lietke_sp='SELECT * FROM tbl_sanpham,tbl_hieusanpham where tbl_sanpham.id_hieusanpham=tbl_hieusanpham.id_hieusanpham';
    $query_lietke_sp=mysqli_query($mysqli,$sql_lietke_sp);

    //cap nhat sl


?>
 <!-- form loc sp -->
<form class="form-inline" id="formsapxepspkho" method="POST">
<h6>Liệt kê sản phẩm </h6>
    <div class="mx-auto">
        <select class="p-1" name="orderbysp" id="sapxepspkho">
            <option <?php if(isset($_POST['orderbysp'])) {echo $_POST['orderbysp']=='ALL'? 'selected':'';} ?> value="ALL">Tất cả</option>
            <option <?php if(isset($_POST['orderbysp'])) {echo $_POST['orderbysp']=='DUOI10'? 'selected':'';} ?> value="DUOI10">Số lượng dưới 10 (chưa hết)</option>
            <option <?php if(isset($_POST['orderbysp'])) {echo $_POST['orderbysp']=='HET'? 'selected':'';} ?> value="HET">Hết hàng</option>
        </select>
    </div>
</form>
<?php
    if(isset($_POST['orderbysp'])){
    if($_POST['orderbysp']=='DUOI10'||$_POST['orderbysp']=='HET'){
?>
 <!-- form cap nhat so luong -->
<form class="form-inline mb-2"  method="POST" onsubmit="return checkCongThemSp()">
    <div class="form-group">
            <input class="form-control w-25 mr-1" type="number" name="soluong" id="sl-sp-cong-them">
            <input type="hidden" name="key" value="<?php echo $_POST['orderbysp'] ?>">
            <button class="btn btn-secondary" name="capnhat-tatca">Cộng Thêm Số Lượng Cho Tất Cả</button>
    </div>
</form>
<?php }}?>
<table  class="table table-bordered text-center table-responsive" id="dataTable">
    <thead>
        <tr>
            <th><label class="form-check-label mb-2"  for="">ID</label></th>
            <th><label class="form-check-label mb-2"  for="">Tên sản phẩm</label></th>
            <th><label class="form-check-label mb-2"  for="">Hiệu sản phẩm</label></th>
            <th><label class="form-check-label"  for="">Hỉnh ảnh sản phẩm</label></th>
            <th><label class="form-check-label"  for="">Giá sản phẩm</label></th>
            <th><label class="form-check-label"  for="">Số lượng sản phẩm</label></th>
            <th><label class="form-check-label mb-2"  for="">Mô tả sản phẩm</label></th>
            <th><label class="form-check-label"  for="">Giảm giá</label></th>
            <th><label class="form-check-label"  for="">Tình trạng sản phẩm</label></th>
            <th><label class="form-check-label"  for="">Quản lý</label></th>
        </tr>
    </thead>
    <tbody>
            <?php
             $i=0;
             while($row=mysqli_fetch_array($query_lietke_sp)){
                $i++;
             
            ?>
        <tr>
            <td><?php echo $row['id_sanpham'] ?></td>
            <td><?php echo $row['tensp'] ?></td>
            <td><?php echo $row['tenhieusp'] ?></td>
            <td class="text-center"><img src="modules/quanlysp/uploads/<?php echo $row['hinhanhsp']?>"  alt="" width="100px" height="60px"></td>
            <td><?php echo $row['giasp'] ?></td>
            <td><?php echo $row['soluongsp'] ?></td>
            <td><?php echo $row['motasp'] ?></td>
            <td><?php echo $row['giam_gia'].' %' ?></td>
            <td><?php
             if($row['tinhtrangsp']==1)
                echo 'Kích hoạt';
            else
                echo 'Ẩn';
            ?></td>
            <td class="form-inline">
                <a class="mx-auto" href="modules/quanlysp/xuly.php?id_sanpham=<?php echo $row['id_sanpham']?>">Xoá</a>
                <a class="mt-2 mx-auto" href="index.php?action=quanlysanpham&query=suasanpham&id_sanpham=<?php echo $row['id_sanpham']?>">Sửa</a>
            </td>
        </tr>
        <?php
             }
            ?> 
            
    </tbody>
        
</table>
<script>
      const selectElement = document.getElementById('sapxepspkho');
  selectElement.addEventListener('change', (event) => {
    document.getElementById('formsapxepspkho').submit();
  });
</script>