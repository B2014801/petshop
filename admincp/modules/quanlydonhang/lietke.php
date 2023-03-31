<?php
$sql_lietke_donhang='SELECT * FROM tbl_taikhoan a 
JOIN tbl_donhang b ON  a.id_taikhoan=b.id_taikhoan 
WHERE b.hien_thi=0 ';
 if(isset($_POST['orderbysp'])){
    $sort=$_POST['orderbysp'];
    
    if($sort=='CHUADUYET'){
        $sql_lietke_donhang.='AND b.trangthai_donhang=0';
    }
    if($sort=="DADUYET"){
        $sql_lietke_donhang.='AND b.trangthai_donhang=1';
    }
    if($sort=="DANGGIAO"){
        $sql_lietke_donhang.='AND b.trangthai_donhang=2';
    }
    if($sort=="DAGIAO"){
        $sql_lietke_donhang.='AND b.trangthai_donhang=3';
    }
    if($sort=="TATCA"){
        $sql_lietke_donhang.='';
    }
    }
    // $sql_lietke_sp='SELECT * FROM tbl_sanpham,tbl_hieusanpham where tbl_sanpham.id_hieusanpham=tbl_hieusanpham.id_hieusanpham';
    $query_lietke_donhang=mysqli_query($mysqli,$sql_lietke_donhang);
?>
<form class="form-inline" id="formsapxepspkho" method="POST">
<h6>Liệt kê đơn hàng </h6>
    <div class="mx-auto">
        <select class="p-1" name="orderbysp" id="sapxepspkho">
            <!-- co the lam theo cach lay trong csdl ra :))) -->
            <option <?php if(isset($_POST['orderbysp'])) {echo $_POST['orderbysp']=='TATCA'? 'selected':'';} ?> value="TATCA">Tất cả</option>
            <option <?php if(isset($_POST['orderbysp'])) {echo $_POST['orderbysp']=='CHUADUYET'? 'selected':'';} ?> value="CHUADUYET">Chưa duyệt</option>
            <option <?php if(isset($_POST['orderbysp'])) {echo $_POST['orderbysp']=='DADUYET'? 'selected':'';} ?> value="DADUYET">Đã duyệt</option>
            <option <?php if(isset($_POST['orderbysp'])) {echo $_POST['orderbysp']=='DANGGIAO'? 'selected':'';} ?> value="DANGGIAO">Đang giao</option>
            <option <?php if(isset($_POST['orderbysp'])) {echo $_POST['orderbysp']=='DAGIAO'? 'selected':'';} ?> value="DAGIAO">Đã giao</option>
        </select>
    </div>
</form>
<table  class="table table-bordered" id="dataTable">
    <thead>
        <tr>
            <th><label class="form-check-label mb-2"  for="">STT</label></th>
            <th><label class="form-check-label mb-2"  for="">Tên</label></th>
            <th><label class="form-check-label mb-2"  for="">Sản phẩm</label></th>
            <th><label class="form-check-label mb-2"  for="">Tổng tiền</label></th>
            <th><label class="form-check-label"  for="">Ngày đặt hàng</label></th>
            <th><label class="form-check-label"  for="">Ngày giao hàng</label></th>
            <th><label class="form-check-label mb-2"  for="">Địa chỉ</label></th>
            <th><label class="form-check-label mb-2"  for="">Trạng thái</label></th>
            <th><label class="form-check-label mb-2 "  for="">Quản lý</label></th>
        </tr>
    </thead>
    <tbody>
            <?php
             $i=1;
             while($row=mysqli_fetch_array($query_lietke_donhang)){
                
            ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['hoten'] ?></td>
            <td>
            <?php 
                $sql2="SELECT * FROM tbl_chitietdonhang a Join tbl_sanpham b 
                ON a.id_sanpham=b.id_sanpham  WHERE a.id_donhang = '$row[id_donhang]'";
                $sanpham=mysqli_query($mysqli,$sql2);
                
                while($sp=mysqli_fetch_array($sanpham)){
                echo '<div class="p-0 m-0" style="overflow-wrap: break-word; width:250px"><span class="m-0">'.$sp['tensp'].' <b>x'. $sp['soluong_sanpham'].'</b></span></div>';
                $i++;
            }
                ?>
            </td>
            <td><?php echo $row['tong_tien'] ?></td>
            <td><?php echo $row['ngay_dathang'] ?></td>
            <td><?php echo $row['ngay_giao'] ?></td>
            <td><?php echo '<div style="overflow-wrap: break-word; width:200px"> <b>SDT</b>: '.$row['so_dien_thoai']."<br>".$row['diachi'].'</div>' ?></td>
            <td><?php 
             if($row['trangthai_donhang']==0) {
                echo 'Chưa duyệt';
             }
             if($row['trangthai_donhang']==1) {
                echo 'Đã duyệt';
             }
             if($row['trangthai_donhang']==2) {
                echo 'Đang giao';
             }
             if($row['trangthai_donhang']==3) {
                echo 'Hoàn tất';
             }
             if($row['trangthai_donhang']==4) {
                echo 'Đã huỷ';
             }
             ?></td>
            <td>
                <!-- <a href="index.php?action=quanlydonhang&query=suadonhang&id_donhang=<php echo $row['id_donhang']?>">Sửa</a>
                <a href="modules/quanlydonhang/xuly.php?id_donhang=<php echo $row['id_donhang']?>">Xoá</a> |  -->
            <?php
                if($row['trangthai_donhang']==0) {
                    echo '<a href="modules/quanlydonhang/xuly.php?id_donhang='.$row['id_donhang'].'&tt=1">Duyệt</a>|';
                    echo '<a href="modules/quanlydonhang/xuly.php?id_donhang='.$row['id_donhang'].'&xoa_don_hang">Huỷ</a>';
                }
                if($row['trangthai_donhang']==1) {
                    echo '<a href="modules/quanlydonhang/xuly.php?id_donhang='.$row['id_donhang'].'&tt=2">Giao</a>|';
                    echo '<a href="modules/quanlydonhang/xuly.php?id_donhang='.$row['id_donhang'].'&xoa_don_hang">Huỷ</a>';
                }
                if($row['trangthai_donhang']==2) {
                    echo '<a href="modules/quanlydonhang/xuly.php?id_donhang='.$row['id_donhang'].'&tt=3">Hoàn tất</a>';
                }
                if($row['trangthai_donhang']==3) {
                    echo '<a href="modules/quanlydonhang/xuly.php?id_donhang='.$row['id_donhang'].'&an_don_hang">Ẩn</a>';
                }
                if($row['trangthai_donhang']==4){
                    echo '<a href="modules/quanlydonhang/xuly.php?id_donhang='.$row['id_donhang'].'&xoa_don_hang">Xoá</a>';
                }
             ?>
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

