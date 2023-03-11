<?php
    $sql="SELECT * FROM tbl_taikhoan";
    $chon_tbl_taikhoan=mysqli_query($mysqli,$sql);
?>
<h6>Liệt kê hiệu tài khoản</h6>
<table class="table table-bordered">
    <tr>
        <td>ID</td>
        <td>Tên khách hàng</td>
        <td>Email</td>
        <td>Số điện thoại</td>
        <td>Quản lý</td>
    </tr>
    <?php while($row=mysqli_fetch_array($chon_tbl_taikhoan)){ ?>
    <tr>
        <td><?php echo $row['id_taikhoan']?></td>
        <td><?php echo $row['tenkhachhang']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['so_dien_thoai']?></td>
        <td><a href="modules/quanlytaikhoan/xuly.php?id_taikhoan=<?php echo $row['id_taikhoan']?>">Xoá</a></td>
    </tr>
    <?php }?>
</table>
