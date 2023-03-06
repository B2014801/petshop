<?php
    include('../../config/config.php');
    $trangthai=$_POST['trangthai'] ?? '';
        $id_donhang=$_GET['id_donhang'] ?? '';
    if(isset($_POST['suadonhang'])){
        $sql ="UPDATE tbl_donhang SET trangthai_donhang=$trangthai WHERE id_donhang=$id_donhang";
        mysqli_query($mysqli,$sql);
        header('location:../../index.php?action=quanlydonhang&query=hienthi');
    }
    else{
        $sql ="DELETE FROM tbl_donhang WHERE id_donhang=$id_donhang";
        $sql_chitietdonhang="DELETE FROM tbl_chitietdonhang WHERE id_donhang=$id_donhang";
        mysqli_query($mysqli,$sql);
        mysqli_query($mysqli,$sql_chitietdonhang);
        header('location:../../index.php?action=quanlydonhang&query=hienthi');
    }
?>