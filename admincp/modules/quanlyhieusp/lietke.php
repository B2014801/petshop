<?php
    $sql_lietke_hieusp='SELECT * FROM tbl_hieusanpham ';
    $query_lietke_hieusp=mysqli_query($mysqli,$sql_lietke_hieusp);
?>
<h6>Liệt kê hiệu sản phẩm</h6>
<table  class="table table-bordered">
        <tr>
            <th><label class="form-check-label mr-2"  for="">ID</label></th>
            <th><label class="form-check-label mr-2"  for="">Tên hiệu sản phẩm</label></th>
            <th><label class="form-check-label mr-2"  for="">Danh mục</label></th>
            <th><label class="form-check-label mr-2"  for="">Quản lý</label></th>
        </tr>
        <tr>
            <?php
             $i=0;
             while($row=mysqli_fetch_array($query_lietke_hieusp)){
                $i++;
             
            ?>
        </tr>
        <tr>
            <td><?php echo $row['id_hieusanpham'] ?></td>
            <td><?php echo $row['tenhieusp'] ?></td>
            <td><?php echo $row['tendanhmuc'] ?></td>
            <td>
                <a href="modules/quanlyhieusp/xuly.php?id_hieusanpham=<?php echo $row['id_hieusanpham']?>">Xoá</a> | 
                <a href="index.php?action=quanlyhieusanpham&query=suahieusanpham&id_hieusanpham=<?php echo $row['id_hieusanpham']?>">Sửa</a>
            </td>
        </tr>
        <?php
             }
            ?> 
</table>