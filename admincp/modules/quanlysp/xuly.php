<?php
include('../../config/config.php'); // goi file tương tac voi csdl
$tensp=$_POST['tensp'] ?? '';
$masp=$_POST['masp'] ?? '';

$hinhanhsp=$_FILES['hinhanhsp']['name'] ?? '';
$hinhanh_tmp=$_FILES['hinhanhsp']['tmp_name'] ?? '';
move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanhsp);

$giasp=$_POST['giasp'] ?? '';
$soluongsp=$_POST['soluongsp'] ?? '';
$motasp=$_POST['motasp'] ?? '';
$tinhtrangsp=$_POST['tinhtrangsp']?? '';
$id_hieusanpham=$_POST['hieusanpham']?? '';
// hinh anh



    if(isset($_POST['themsp'])){
    $sql_them=("INSERT INTO tbl_sanpham(tensp,masp,hinhanhsp,giasp,soluongsp,motasp,tinhtrangsp,id_hieusanpham) VALUE('$tensp','$masp','$hinhanhsp','$giasp','$soluongsp','$motasp','$tinhtrangsp','$id_hieusanpham')");
    mysqli_query($mysqli,$sql_them); //ket noi voi csdl
    
    header('Location:../../index.php?action=quanlysanpham&query=themsanpham');
    exit();
    }
    if(isset($_POST['suasanpham'])){
        if(($hinhanhsp)!=''){
            $sql_update="UPDATE tbl_sanpham SET tensp='$tensp',masp='$masp',hinhanhsp='$hinhanhsp',giasp='$giasp',motasp='$motasp',soluongsp='$soluongsp',tinhtrangsp='$tinhtrangsp',id_hieusanpham='$id_hieusanpham' WHERE id_sanpham='".$_GET['id_sanpham']."' ";
            $id=$_GET['id_sanpham'];
            $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham='$id'";
            $sql_sp=mysqli_query($mysqli,$sql);
            while($row=mysqli_fetch_array($sql_sp)){
            unlink('./uploads/'.$row['hinhanhsp']);
        }
        }
        else{
        $sql_update="UPDATE tbl_sanpham SET tensp='$tensp',masp='$masp',giasp='$giasp',motasp='$motasp',soluongsp='$soluongsp',tinhtrangsp='$tinhtrangsp',id_hieusanpham='$id_hieusanpham' WHERE id_sanpham='".$_GET['id_sanpham']."' ";
        }
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlysanpham&query=themsanpham');
        exit();
    }
    else{
        $id=$_GET['id_sanpham'];
        $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham='$id'";
        $sql_sp=mysqli_query($mysqli,$sql);
        while($row=mysqli_fetch_array($sql_sp)){
            unlink('./uploads/'.$row['hinhanhsp']);
        }

        $sql_xoa="DELETE FROM tbl_sanpham WHERE id_sanpham='$id'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlysanpham&query=themsanpham');
    }
?>