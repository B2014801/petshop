<?php
    $sql_lietke_sp='SELECT * FROM tbl_sanpham,tbl_hieusanpham where tbl_sanpham.id_hieusanpham=tbl_hieusanpham.id_hieusanpham';
    $query_lietke_sp=mysqli_query($mysqli,$sql_lietke_sp);
?>
<h6>Liệt kê sản phẩm</h6>
<table  class="table table-bordered text-center table-responsive" id="dataTable">
    <thead>
        <tr>
            <th><label class="form-check-label"  for="">ID</label></th>
            <th><label class="form-check-label"  for="">Tên sản phẩm</label></th>
            <th><label class="form-check-label"  for="">Hiệu sản phẩm</label></th>
            <th><label class="form-check-label"  for="">Hỉnh ảnh sản phẩm</label></th>
            <th><label class="form-check-label"  for="">Giá sản phẩm</label></th>
            <th><label class="form-check-label"  for="">Số lượng sản phẩm</label></th>
            <th><label class="form-check-label"  for="">Mô tả sản phẩm</label></th>
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
            <td class="p-0">
                <a href="modules/quanlysp/xuly.php?id_sanpham=<?php echo $row['id_sanpham']?>">Xoá|</a>
                <a href="index.php?action=quanlysanpham&query=suasanpham&id_sanpham=<?php echo $row['id_sanpham']?>">Sửa</a>
             </p>
            </td>
        </tr>
        <?php
             }
            ?> 
    </tbody>
        
</table>