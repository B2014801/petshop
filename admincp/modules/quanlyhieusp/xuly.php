<?php
include('../../config/config.php'); // goi file tương tac voi csdl
$tenhieusanpham=$_POST['tenhieusanpham'];
$tendanhmuc=$_POST['tendanhmuc'];
    if(isset($_POST['themhieusanpham'])){
    $sql_them=("INSERT INTO tbl_hieusanpham(tenhieusp,tendanhmuc) VALUE('$tenhieusanpham','$tendanhmuc')");
    mysqli_query($mysqli,$sql_them); //ket noi voi csdl
    header('Location:../../index.php?action=quanlyhieusanpham&query=themhieusanpham');}
    if(isset($_POST['suahieusanpham'])){
        $sql_update="UPDATE tbl_hieusanpham SET tenhieusp='$tenhieusanpham',tendanhmuc='$tendanhmuc' WHERE id_hieusanpham='".$_GET['id_hieusanpham']."' ";
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlyhieusanpham&query=themhieusanpham');
    }
    else{
        $id=$_GET['id_hieusanpham'];
        $sql_xoa="DELETE FROM tbl_hieusanpham WHERE id_hieusanpham='$id'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlyhieusanpham&query=themhieusanpham');
    }
?>