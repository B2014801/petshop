<?php
    include('../../admincp/config/config.php');
    session_start();
    if(!isset($_SESSION['ktradangnhap'])&&!isset($_SESSION['tendangnhapadmin'])){
        echo "<meta http-equiv='refresh' content='0;url=../../index.php?quanly=dangnhap'>";
        echo "<script>alert('Bạn cần đăng nhập để bình luận.')</script>";
    }
    else{
    if(isset($_POST['thembinhluan'])){
        $id_sanpham=$_GET['id_sanpham'];
        $user=$_SESSION['ktradangnhap'];
        $noidung=$_POST['noidung'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngay=date("Y-m-d H:i:s");

        $so_sao=isset($_POST['rating']) ? $_POST['rating'] : 0;
        $sql="INSERT INTO tbl_binhluan(id_taikhoan,id_sanpham,so_sao,noidung,ngay_binhluan) values('$user','$id_sanpham','$so_sao','$noidung','$ngay')";
        mysqli_query($mysqli,$sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }}
    if(isset($_SESSION['tendangnhapadmin'])||isset($_SESSION['ktradangnhap'])){
        if(isset($_GET['action'])&&$_GET['action']=='xoabinhluan'){
            $id_binhluan=$_GET['id'];
            $sql="DELETE FROM tbl_binhluan WHERE id_binhluan='$id_binhluan'";
            mysqli_query($mysqli,$sql);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
?>