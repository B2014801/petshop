<?php
include('../../config/config.php'); // goi file tương tac voi csdl
$tensp=$_POST['tensp'] ?? '';
$masp=$_POST['masp'] ?? '';

$hinhanhsp=$_FILES['hinhanhsp']['name'] ?? '';
$hinhanh_tmp=$_FILES['hinhanhsp']['tmp_name'] ?? '';


$giasp=$_POST['giasp'] ?? '';
$soluongsp=$_POST['soluongsp'] ?? '';
$motasp=$_POST['motasp'] ?? '';
$tl_giamgia=$_POST['giam_gia'] ?? '';
$tinhtrangsp=$_POST['tinhtrangsp']?? '';
$id_hieusanpham=$_POST['hieusanpham']?? '';
// hinh anh



    if(isset($_POST['themsp'])){
        $hinhanhsp=time().'_'.$hinhanhsp;
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanhsp);
        $sql_them=("INSERT INTO tbl_sanpham(tensp,hinhanhsp,giasp,soluongsp,motasp,tinhtrangsp,id_hieusanpham,giam_gia) VALUE('$tensp','$hinhanhsp','$giasp','$soluongsp','$motasp','$tinhtrangsp','$id_hieusanpham','$tl_giamgia')");
        mysqli_query($mysqli,$sql_them); //ket noi voi csdl
        
        header('Location:../../index.php?action=quanlysanpham&query=themsanpham');
        exit();
    }
    if(isset($_POST['suasanpham'])){
        if(($hinhanhsp)!=''){
            $hinhanhsp=time().'_'.$hinhanhsp;
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanhsp);
            $sql_update="UPDATE tbl_sanpham SET tensp='$tensp',hinhanhsp='$hinhanhsp',giasp='$giasp',motasp='$motasp',soluongsp='$soluongsp',tinhtrangsp='$tinhtrangsp',giam_gia='$tl_giamgia',id_hieusanpham='$id_hieusanpham' WHERE id_sanpham='".$_GET['id_sanpham']."' ";
            $id=$_GET['id_sanpham'];
            $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham='$id'";
            $sql_sp=mysqli_query($mysqli,$sql);
            while($row=mysqli_fetch_array($sql_sp)){
            unlink('./uploads/'.$row['hinhanhsp']);
        }
        
        }
        else{
            $sql_update="UPDATE tbl_sanpham SET tensp='$tensp',giasp='$giasp',motasp='$motasp',soluongsp='$soluongsp',tinhtrangsp='$tinhtrangsp',giam_gia='$tl_giamgia',id_hieusanpham='$id_hieusanpham' WHERE id_sanpham='".$_GET['id_sanpham']."' ";
        
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