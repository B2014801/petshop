<?php
    $sql_lietke_donhang='SELECT * FROM tbl_taikhoan a 
    JOIN tbl_donhang b ON  a.id_taikhoan=b.id_taikhoan 
    WHERE hien_thi=0';
    $query_lietke_donhang=mysqli_query($mysqli,$sql_lietke_donhang);
?>
<h6>Liệt kê hiệu đơn hàng</h6>
<table  class="table table-bordered" id="dataTable">
    <thead>
        <tr>
            <th><label class="form-check-label"  for="">Tên</label></th>
            <th><label class="form-check-label"  for="">Sản phẩm</label></th>
            <th><label class="form-check-label"  for="">Tổng tiền</label></th>
            <th><label class="form-check-label"  for="">Ngày đặt hàng</label></th>
            <th><label class="form-check-label"  for="">Ngày giao hàng</label></th>
            <th><label class="form-check-label"  for="">Địa chỉ</label></th>
            <th><label class="form-check-label"  for="">Trạng thái</label></th>
            <th><label class="form-check-label"  for="">Quản lý</label></th>
        </tr>
    </thead>
    <tbody>
            <?php
             $i=0;
             while($row=mysqli_fetch_array($query_lietke_donhang)){
                $i++;
            ?>
        <tr>
            <td><?php echo $row['hoten'] ?></td>
            <td>
            <?php 
                $sql2="SELECT * FROM tbl_chitietdonhang a Join tbl_sanpham b 
                ON a.id_sanpham=b.id_sanpham  WHERE a.id_donhang = '$row[id_donhang]'";
                $sanpham=mysqli_query($mysqli,$sql2);
                $i=1;
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
                    echo '<a href="modules/quanlydonhang/xuly.php?id_donhang='.$row['id_donhang'].'&tt=1">Duyệt </a>|';
                    echo '<a href="modules/quanlydonhang/xuly.php?id_donhang='.$row['id_donhang'].'&xoa_don_hang"> Huỷ</a>';
                }
                if($row['trangthai_donhang']==1) {
                    echo '<a href="modules/quanlydonhang/xuly.php?id_donhang='.$row['id_donhang'].'&tt=2">Giao hàng</a>|';
                    echo '<a href="modules/quanlydonhang/xuly.php?id_donhang='.$row['id_donhang'].'&xoa_don_hang"> Huỷ</a>';
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