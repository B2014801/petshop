<?php
include('../../config/config.php'); // goi file tương tac voi csdl
$tenloaisp=$_POST['tendanhmuc'];
    if(isset($_POST['themdanhmuc'])){
    $sql_them=("INSERT INTO tbl_danhmuc(tendanhmuc) VALUE('$tenloaisp')");
    mysqli_query($mysqli,$sql_them); //ket noi voi csdl
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=themdanhmuc');}
    if(isset($_POST['suadanhmuc'])){
        $sql_update="UPDATE tbl_danhmuc SET tendanhmuc='$tenloaisp' WHERE id_danhmuc='".$_GET['id_danhmuc']."' ";
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=themdanhmuc');
    }
    else{
        $id=$_GET['id_danhmuc'];
        $sql_xoa="DELETE FROM tbl_danhmuc WHERE id_danhmuc='$id'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=themdanhmuc');
    }
?>