<?php
    $sql_lietke_danhmucsp='SELECT * FROM tbl_sanpham,tbl_danhmuc where tbl_danhmuc.id_danhmuc=tbl_sanpham.id_danhmuc';
    $query_lietke_danhmucsp=mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<h6>Liệt kê sản phẩm</h6>
<table  class="table table-bordered text-center">
        <tr>
            <th><label class="form-check-label mr-2"  for="">ID</label></th>
            <th><label class="form-check-label mr-2"  for="">Tên sản phẩm</label></th>
            <th><label class="form-check-label mr-2"  for="">Mã sản phẩm</label></th>
            <th><label class="form-check-label mr-2"  for="">Danh mục</label></th>
            <th><label class="form-check-label mr-2"  for="">Hỉnh ảnh sản phẩm</label></th>
            <th><label class="form-check-label mr-2"  for="">Giá sản phẩm</label></th>
            <th><label class="form-check-label mr-2"  for="">Số lượng sản phẩm</label></th>
            <th><label class="form-check-label mr-2"  for="">Mô tả sản phẩm</label></th>
            <th><label class="form-check-label mr-2"  for="">Tình trạng sản phẩm</label></th>
            <th><label class="form-check-label mr-2"  for="">Quản lý</label></th>
        </tr>
        <tr>
            <?php
             $i=0;
             while($row=mysqli_fetch_array($query_lietke_danhmucsp)){
                $i++;
             
            ?>
        </tr>
        <tr>
            <td><?php echo $row['id_sanpham'] ?></td>
            <td><?php echo $row['tensp'] ?></td>
            <td><?php echo $row['masp'] ?></td>
            <td><?php echo $row['tendanhmuc'] ?></td>
            <td class="text-center"><img src="modules/quanlysp/uploads/<?php echo $row['hinhanhsp']?>"  alt="" width="100px" height="60px"></td>
            <td><?php echo $row['giasp'] ?></td>
            <td><?php echo $row['soluongsp'] ?></td>
            <td><?php echo $row['motasp'] ?></td>
            <td><?php
             if($row['tinhtrangsp']==1)
                echo 'Kích hoạt';
            else
                echo 'Ẩn';
            ?></td>
            <td class="p-0">
                <a href="modules/quanlysp/xuly.php?id_sanpham=<?php echo $row['id_sanpham']?>">Xoá</a> | 
                <a href="index.php?action=quanlysanpham&query=suasanpham&id_sanpham=<?php echo $row['id_sanpham']?>">Sửa</a>
              
            </td>
        </tr>
        <?php
             }
            ?> 
</table>