<?php

// xu ly dang xuat
if(isset($_GET['action'])&&$_GET['action']=='dangxuat'){
    unset($_SESSION['dangnhap']);
    unset($_SESSION['ktradangnhap']);
    unset($_SESSION['tendangnhapadmin']);
    header('Location:index.php');
    exit();
  }
// xu ly dang ky
if(isset($_POST['dangky'])){
    $hoten=$_POST['hoten'];
    $email=$_POST['email'];
    $matkhau=($_POST['matkhau']);
    $diachi=$_POST['diachi'];

    $sql="INSERT INTO tbl_taikhoan(tenkhachhang,email,matkhau,diachi) value('$hoten','$email','$matkhau','$diachi')";
    $sql_dangky=mysqli_query($mysqli,$sql);

    if(isset($sql_dangky)){
        // khi dang ky thi cho khách hàng đăng nhập luôn, lưu ý là mỗi khách hàng có email khác nhau
        $sql="SELECT tenkhachhang,id_taikhoan FROM tbl_taikhoan where email='$email'";
        $sql_mk=mysqli_query($mysqli,$sql);
        $count=mysqli_num_rows($sql_mk);
        if($count>0){
        
        $row = mysqli_fetch_array($sql_mk);
        $_SESSION['dangnhap']= $row['tenkhachhang'];//de hien thi thong tin dang nhap
        $_SESSION['ktradangnhap']= $row['id_taikhoan']; // kiem tra co dang nhap thi them vao tbl_giohang
    }
        echo "<script>alert('thành công');</script>";
        header("Location:index.php");
    }
}
// xu ly dang nhap
    if(isset($_POST['dangnhap'])){
    $email=$_POST['email'];
    $password=$_POST['matkhau'];
    if(isset($_POST['nho-mat-khau'])&&$_POST['nho-mat-khau']){
    setcookie('email',$email,time()+(84000*7));
    setcookie('matkhau',$password,time()+(84000*7));
    }
    if(substr($email,0,5)=='admin'){
        $sql="SELECT ten_admin FROM tbl_admin where email='$email' and matkhau='$password'"; 
        $sql_admin=mysqli_query($mysqli,$sql);
        $count=mysqli_num_rows($sql_admin);
        if($count>0){
            header('Location:index.php');
            $row = mysqli_fetch_array($sql_admin);
            $_SESSION['tendangnhapadmin']=$row['ten_admin'];
            // $_SESSION['ktradangnhap']=$row['id_taikhoan'];
    }
    }
    else{
    $sql="SELECT tenkhachhang,id_taikhoan FROM tbl_taikhoan where email='$email' and matkhau='$password'";
    $sql_mk=mysqli_query($mysqli,$sql);
    $count=mysqli_num_rows($sql_mk);
    if($count>0){
        header('Location:index.php');
        $row = mysqli_fetch_array($sql_mk);
        $_SESSION['dangnhap']= $row['tenkhachhang'];//de hien thi thong tin dang nhap
        $_SESSION['ktradangnhap']= $row['id_taikhoan']; // kiem tra co dang nhap thi them vao tbl_giohang
    }
    }
    if(!isset($_SESSION['dangnhap'])){
        echo '<script> alert("Tài khoản hoặc mật khẩu không đúng.Làm ơn đăng nhập lại."); </script>';
    }
}
?>