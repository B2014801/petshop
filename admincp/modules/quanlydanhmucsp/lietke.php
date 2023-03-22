<?php
    $sql_lietke_danhmucsp='SELECT * FROM tbl_danhmuc ';
    $query_lietke_danhmucsp=mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<h6>Liệt kê danh mục sản phẩm</h6>
<table  class="table table-bordered" id="dataTable">
    <thead>
        <tr>
            <th><label class="form-check-label mr-2"  for="">ID</label></th>
            <th><label class="form-check-label mr-2"  for="">Tên danh mục</label></th>
            <th><label class="form-check-label mr-2"  for="">Quản lý</label></th>
        </tr>
    </thead>
    <tbody>
                <?php
                $i=0;
                while($row=mysqli_fetch_array($query_lietke_danhmucsp)){
                    $i++;
                
                ?>
        <tr>
            <td><?php echo $row['id_danhmuc'] ?></td>
            <td><?php echo $row['tendanhmuc'] ?></td>
            <td>
                <a href="modules/quanlydanhmucsp/xuly.php?id_danhmuc=<?php echo $row['id_danhmuc']?>">Xoá</a> | 
                <a href="index.php?action=quanlydanhmucsanpham&query=suadanhmuc&id_danhmuc=<?php echo $row['id_danhmuc']?>">Sửa</a>
            </td>
        </tr>
        <?php
             }
            ?> 
    </tbody>
        
</table>