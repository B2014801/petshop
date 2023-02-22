<?php
include('../../config/config.php'); // goi file tương tac voi csdl
$tenhieusanpham=$_POST['tenhieusanpham'];

$anhhieusanpham=$_FILES['anhhieusanpham']['name'] ?? '';
$hinhanh_tmp=$_FILES['anhhieusanpham']['tmp_name'] ?? '';
move_uploaded_file($hinhanh_tmp,'uploads/'.$anhhieusanpham);

$tendanhmuc=$_POST['tendanhmuc'];
    if(isset($_POST['themhieusanpham'])){
    $sql_them=("INSERT INTO tbl_hieusanpham(tenhieusp,tendanhmuc,anhhieusanpham) VALUE('$tenhieusanpham','$tendanhmuc','$anhhieusanpham')");
    mysqli_query($mysqli,$sql_them); //ket noi voi csdl
    header('Location:../../index.php?action=quanlyhieusanpham&query=themhieusanpham');}
    if(isset($_POST['suahieusanpham'])){
        if($anhhieusanpham!=""){
        $sql_update="UPDATE tbl_hieusanpham SET tenhieusp='$tenhieusanpham',tendanhmuc='$tendanhmuc',anhhieusanpham='$anhhieusanpham' WHERE id_hieusanpham='".$_GET['id_hieusanpham']."' ";
        $id=$_GET['id_hieusanpham'];
        $sql="SELECT * FROM tbl_hieusanpham WHERE id_hieusanpham='$id'";
        $sql_hieusp=mysqli_query($mysqli,$sql);
        while($row=mysqli_fetch_array($sql_hieusp)){
        unlink('./uploads/'.$row['anhhieusanpham']);
        }
        }
        else{
        $sql_update="UPDATE tbl_hieusanpham SET tenhieusp='$tenhieusanpham',tendanhmuc='$tendanhmuc' WHERE id_hieusanpham='".$_GET['id_hieusanpham']."' ";
        }
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlyhieusanpham&query=themhieusanpham');
    }
    else{
        $id=$_GET['id_hieusanpham'];
        $sql="SELECT * FROM tbl_hieusanpham WHERE id_hieusanpham='$id'";
        $sql_hieusp=mysqli_query($mysqli,$sql);
        while($row=mysqli_fetch_array($sql_hieusp)){
        unlink('./uploads/'.$row['anhhieusanpham']);
        }

        $sql_xoa="DELETE FROM tbl_hieusanpham WHERE id_hieusanpham='$id'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlyhieusanpham&query=themhieusanpham');
    }
?>