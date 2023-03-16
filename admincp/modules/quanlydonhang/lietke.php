<?php
    $sql_lietke_donhang='SELECT * FROM tbl_donhang WHERE hien_thi=0';
    $query_lietke_donhang=mysqli_query($mysqli,$sql_lietke_donhang);
?>
<h6>Liệt kê hiệu đơn hàng</h6>
<table  class="table table-bordered">
        <tr>
            <th><label class="form-check-label mr-2"  for="">ID-KH</label></th>
            <th><label class="form-check-label mr-2"  for="">Ngày đặt hàng</label></th>
            <th><label class="form-check-label mr-2"  for="">Ngày giao hàng</label></th>
            <th><label class="form-check-label mr-2"  for="">Tổng tiền</label></th>
            <th><label class="form-check-label mr-2"  for="">Trạng thái</label></th>
            <th><label class="form-check-label mr-2"  for="">Quản lý</label></th>
        </tr>
        <tr>
            <?php
             $i=0;
             while($row=mysqli_fetch_array($query_lietke_donhang)){
                $i++;
            ?>
        </tr>
        <tr>
            <td><?php echo $row['id_taikhoan'] ?></td>
            <td><?php echo $row['ngay_dathang'] ?></td>
            <td><?php echo $row['ngay_giao'] ?></td>
            <td><?php echo $row['tong_tien'] ?></td>
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
</table>