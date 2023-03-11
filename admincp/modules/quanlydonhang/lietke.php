<?php
    $sql_lietke_donhang='SELECT * FROM tbl_donhang ';
    $query_lietke_donhang=mysqli_query($mysqli,$sql_lietke_donhang);
?>
<h6>Liệt kê hiệu đơn hàng</h6>
<table  class="table table-bordered">
        <tr>
            <th><label class="form-check-label mr-2"  for="">ID</label></th>
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
            <td><?php echo $row['id_donhang'] ?></td>
            <td><?php echo $row['ngay_dathang'] ?></td>
            <td><?php echo $row['ngay_giao'] ?></td>
            <td><?php echo $row['tong_tien'] ?></td>
            <td><?php echo $row['trangthai_donhang']==0 ? 'Chưa duyệt' : 'Đã duyệt'; ?></td>
            <td>
                <a href="modules/quanlydonhang/xuly.php?id_donhang=<?php echo $row['id_donhang']?>">Xoá</a> | 
                <a href="index.php?action=quanlydonhang&query=suadonhang&id_donhang=<?php echo $row['id_donhang']?>">Sửa</a>
            </td>
        </tr>
        <?php
             }
            ?> 
</table>