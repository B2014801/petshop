<?php
    $sql="SELECT * FROM tbl_taikhoan";
    $chon_tbl_taikhoan=mysqli_query($mysqli,$sql);
?>
<h6>Liệt kê tài khoản</h6>
<table class="table table-bordered" id="dataTable">
    <thead>
    <tr>
        <th>ID</th>
        <th>Tên khách hàng</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Quản lý</th>
    </tr>
    </thead>
    <tbody>
    <?php while($row=mysqli_fetch_array($chon_tbl_taikhoan)){ ?>
    <tr>
        <td><?php echo $row['id_taikhoan']?></td>
        <td><?php echo $row['hoten']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['so_dien_thoai']?></td>
        <td><?php echo $row['diachi']?></td>
        <td><a href="modules/quanlytaikhoan/xuly.php?id_taikhoan=<?php echo $row['id_taikhoan']?>">Xoá</a></td>
    </tr>
    <?php }?>
    </tbody>
</table>
