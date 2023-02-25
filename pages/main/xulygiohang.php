<?php
    session_start();
    $mysqli = new mysqli("localhost","root","","petshop");
    if(isset($_SESSION['ktradangnhap'])){
        if(isset($_GET['id_sp_canthem'])){
        $user=$_SESSION['ktradangnhap'];
        $id_sanpham=$_GET['id_sp_canthem'] ?? '';

        $sql="INSERT INTO tbl_giohang(id_taikhoan,id_sanpham) VALUE('$user','$id_sanpham') ";
        mysqli_query($mysqli,$sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    if(isset($_GET['id_sp_canxoa'])){
        mysqli_query($mysqli, "DELETE FROM tbl_giohang where id_sanpham='".$_GET['id_sp_canxoa']."' ");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
    
?>