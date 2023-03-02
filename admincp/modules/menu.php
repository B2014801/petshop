<?php
    session_start();
    if(isset($_GET['action'])&&$_GET['action']=='dangxuat'){
        unset($_SESSION['tendangnhapadmin']);
        header('location:../index.php');
    }
?>
<div class="container">
<h1 class="text-center">Welcome <?php echo isset($_SESSION['tendangnhapadmin']) ? $_SESSION['tendangnhapadmin'] :''; ?></a> To Admin Coltrol Panel</h1>
<ul class="navbar navbar-expand-lg navbar-light bg-light p-0 justify-content-between">
    <li><a class="text-dark text-decoration-none" href="index.php?action=quanlydanhmucsanpham&query=themdanhmuc">Quản lý danh mục sản phẩm</a></li>
    <li><a class="text-dark text-decoration-none" href="index.php?action=quanlyhieusanpham&query=themhieusanpham">Quản lý hiệu sản phẩm</a></li>
    <li><a class="text-dark text-decoration-none" href="index.php?action=quanlysanpham&query=themsanpham">Quản lý sản phẩm</a></li>
    <!-- <li><a class="text-dark text-decoration-none" href="index.php?action=quanlydanhmucbaiviet&query=themdanhmuc">Quản lý danh mục bài viết</a></li> -->
    <li><a class="text-dark text-decoration-none" href="index.php?action=dangxuat">Đăng xuất</a></li>
</ul>
</div>