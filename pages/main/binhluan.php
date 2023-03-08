<?php
    include('../../admincp/config/config.php');
    session_start();
    if(!isset($_SESSION['ktradangnhap'])){
        echo "<meta http-equiv='refresh' content='0;url=../../index.php?quanly=dangnhap'>";
        echo "<script>alert('Bạn cần đăng nhập để bình luận.')</script>";
    }
    else{
    if(isset($_POST['thembinhluan'])){
        $id_sanpham=$_GET['id_sanpham'];
        $user=$_SESSION['ktradangnhap'];
        $noidung=$_POST['noidung'];

        $so_sao=isset($_POST['rating']) ? $_POST['rating'] : 0;
        $sql="INSERT INTO tbl_binhluan(id_taikhoan,id_sanpham,so_sao,noidung) values('$user','$id_sanpham','$so_sao','$noidung')";
        mysqli_query($mysqli,$sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }}
?>