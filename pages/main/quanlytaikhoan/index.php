<?php
    if(isset($_POST['capnhatthongtin'])){
        $hoten=$_POST['hoten'] ?? '';
        $email=$_POST['email'] ?? '';
        $matkhau=$_POST['matkhau'] ?? '';
        $diachi=$_POST['diachi'] ?? '';

        $hinhanh=$_FILES['hinhanh']['name'] ?? '';
        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'] ?? '';
        move_uploaded_file($hinhanh_tmp, './pages/main/quanlytaikhoan/uploads/'.$hinhanh);

        if($hinhanh!=''){
        $sql2="SELECT hinhanh FROM tbl_taikhoan WHERE id_taikhoan='".$_SESSION['ktradangnhap']."'";
        $sql_taikhoan=mysqli_query($mysqli,$sql2);
        $row=mysqli_fetch_array($sql_taikhoan);

        if(!empty($row['hinhanh']) && file_exists('./pages/main/quanlytaikhoan/uploads/'.$row['hinhanh'])){
        unlink('./pages/main/quanlytaikhoan/uploads/'.$row['hinhanh']);
        }
        $sql="UPDATE tbl_taikhoan SET tenkhachhang='$hoten', email='$email',matkhau='$matkhau',diachi='$diachi',hinhanh='$hinhanh' WHERE id_taikhoan='".$_SESSION['ktradangnhap']."'";
        }
        else{
        $sql="UPDATE tbl_taikhoan SET tenkhachhang='$hoten', email='$email',matkhau='$matkhau',diachi='$diachi' WHERE id_taikhoan='".$_SESSION['ktradangnhap']."'";
        }
        echo "<script>alert('thanhcong');</script>";
        mysqli_query($mysqli,$sql);
    }
    if(isset($_POST['huy-don-hang'])){
        $id_donhang=$_POST['id_donhang'];
        echo  $id_donhang;
        $sql="UPDATE tbl_donhang SET trangthai_donhang=4 where id_donhang='$id_donhang'";
        mysqli_query($mysqli,$sql);
    }
    $sql="SELECT * FROM tbl_taikhoan where id_taikhoan='".$_SESSION['ktradangnhap']."'";
    $sth=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($sth);
?>

<div class="container mt-3">
    <ul class="taikhoan-nav navbar navbar-expand-lg navbar-light bg-light p-0 mx-auto" >
        <li class="col text-center"><a class="text-dark" href="index.php?quanly=taikhoan&query=taikhoan" >TÀI KHOẢN</a></li >
        <li class="col text-center"><a class="text-dark" href="index.php?quanly=taikhoan&query=tatca" >TẤT CẢ</a></li >
        <li class="col text-center"><a class="text-dark" href="index.php?quanly=taikhoan&query=choxacnhan" >CHỜ XÁC NHẬN</a></li >
        <li class="col text-center"><a class="text-dark" href="index.php?quanly=taikhoan&query=danggiao">ĐANG GIAO HÀNG</a></li >
        <li class="col text-center"><a class="text-dark" href="index.php?quanly=taikhoan&query=hoanthanh">LỊCH SỬ MUA HÀNG</a></li >
    </ul>
</div>

