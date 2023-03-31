<?php
    $sql="SELECT * FROM tbl_taikhoan a 
    JOIN tbl_binhluan b on a.id_taikhoan=b.id_taikhoan 
    Join tbl_sanpham c on  b.id_sanpham=c.id_sanpham";
    $chon_tbl_binhluan=mysqli_query($mysqli,$sql);
?>
<h6>Liệt kê bình luận</h6>
<table class="table table-bordered" id="dataTable">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên khách hàng</th>
        <th>Tên sản phẩm</th>
        <th>Nội dung</th>
        <th>Số sao</th>
        <th>Thời gian</th>
        <th>Quản lý</th>
    </tr>
    </thead>
    <tbody>
       
    <?php  $i=1; while($row=mysqli_fetch_array($chon_tbl_binhluan)){ ?>
    <tr>
        <td><?php echo $i; $i++;?></td>
        <td><?php echo $row['hoten']?></td>
        <td><?php echo $row['tensp']?></td>
        <td><?php echo $row['noidung']?></td>
        <td><?php echo $row['so_sao']?></td>
        <td><?php echo $row['ngay_binhluan']?></td>
        <td><a href="modules/quanlybinhluan/xuly.php?id_binhluan=<?php echo $row['id_binhluan']?>">Xoá</a></td>
    </tr>
    <?php }?>
    </tbody>
</table>
