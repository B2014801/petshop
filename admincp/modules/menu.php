<?php
    session_start();
          // dang xuat
          if(isset($_GET['action'])&&$_GET['action']=='dangxuat'){
            unset($_SESSION['tendangnhapadmin']);
            unset($_SESSION['ktradangnhap']);
            header('location:../index.php');
        }
?>
<div class="container mt-2">
    <a href="../index.php" class="py-2"><i class="fa-solid fa-arrow-left"></i> Về trang chủ</a>
</div>
<div class="mx-5 mt-2 text-center">
<h1 class="text-center mb-4" style="border-bottom: 2px solid rgb(28, 156, 165);display: inline-block;text-align: center;">Chào Mừng </a> Quản Trị Viên <?php echo isset($_SESSION['tendangnhapadmin']) ? $_SESSION['tendangnhapadmin'] :''; ?></h1>
<ul class="navbar navbar-expand-lg navbar-light bg-light p-0 justify-content-between">
    <li><a class="text-decoration-none" href="index.php?action=quanlydanhmucsanpham&query=themdanhmuc">Quản lý danh mục sản phẩm</a></li>
    <li><a class="text-decoration-none" href="index.php?action=quanlyhieusanpham&query=themhieusanpham">Quản lý loại sản phẩm</a></li>
    <li><a class="text-decoration-none" href="index.php?action=quanlysanpham&query=themsanpham">Quản lý sản phẩm</a></li>
    <!-- <li><a class="text-decoration-none" href="index.php?action=quanlykho&query=hienthi">Quản lý kho</a></li> -->
    <li><a class="text-decoration-none" href="index.php?action=quanlydonhang&query=hienthi">Quản lý đơn hàng</a></li>
    <li><a class="text-decoration-none" href="index.php?action=quanlytaikhoan&query=hienthi">Quản lý tài khoản</a></li>
    <li><a class="text-decoration-none" href="index.php?action=quanlybinhluan&query=hienthi">Quản lý bình luận</a></li>
    <li><a class="text-decoration-none" href="index.php?action=quanlydoanhthu&query=hienthi">Doanh thu</a></li>
    <!-- <li><a class="text-dark text-decoration-none" href="index.php?action=quanlydanhmucbaiviet&query=themdanhmuc">Quản lý danh mục bài viết</a></li> -->
    <li><a class="text-decoration-none" href="index.php?action=dangxuat">Đăng xuất</a></li>
</ul>
</div>