<?php
    include('../../config/config.php');
    $trangthai=$_GET['tt'] ?? '';
    $id_donhang=$_GET['id_donhang'] ?? '';
    if(isset($_GET['id_donhang'])&&isset($_GET['tt'])){
        $sql ="UPDATE tbl_donhang SET trangthai_donhang=$trangthai WHERE id_donhang=$id_donhang";
        mysqli_query($mysqli,$sql);
        header('location:../../index.php?action=quanlydonhang&query=hienthi');
    }
    if(isset($_GET['id_donhang'])&&isset($_GET['an_don_hang'])){
        $madon=$_GET['id_donhang'];
        $sql="UPDATE tbl_donhang SET hien_thi=1 WHERE id_donhang=$madon";
        mysqli_query($mysqli,$sql);
        header('location:../../index.php?action=quanlydonhang&query=hienthi');
    }
    // else{
    //     $sql ="DELETE FROM tbl_donhang WHERE id_donhang=$id_donhang";
    //     $sql_chitietdonhang="DELETE FROM tbl_chitietdonhang WHERE id_donhang=$id_donhang";
    //     mysqli_query($mysqli,$sql);
    //     mysqli_query($mysqli,$sql_chitietdonhang);
    //     header('location:../../index.php?action=quanlydonhang&query=hienthi');
    // }
?>