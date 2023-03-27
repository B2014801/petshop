<?php

// xu ly dang xuat
if(isset($_GET['action'])&&$_GET['action']=='dangxuat'){
    // unset($_SESSION['dangnhap']);
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
    
    
    $sql_check="SELECT email FROM tbl_taikhoan WHERE email='$email'";
    if(mysqli_num_rows(mysqli_query($mysqli,$sql_check))>0){
        echo "<script>alert('email đã tồn tại');</script>";
    }
    else{
    $sql="INSERT INTO tbl_taikhoan(hoten,email,matkhau) value('$hoten','$email','$matkhau')";
    $sql_dangky=mysqli_query($mysqli,$sql);
    
    if(isset($sql_dangky)){
        // khi dang ky thi cho khách hàng đăng nhập luôn, lưu ý là mỗi khách hàng có email khác nhau
        $sql="SELECT hoten,id_taikhoan FROM tbl_taikhoan where email='$email'";
        $sql_mk=mysqli_query($mysqli,$sql);
        $count=mysqli_num_rows($sql_mk);
        if($count>0){
        
        $row = mysqli_fetch_array($sql_mk);
        // $_SESSION['dangnhap']= $row['hoten'];//de hien thi thong tin dang nhap
        $_SESSION['ktradangnhap']= $row['id_taikhoan']; // kiem tra co dang nhap thi them vao tbl_giohang
        header("Location:index.php");
    }
        
    }}
}
// xu ly dang nhap
    if(isset($_POST['dangnhap'])){
    $email=$_POST['email'];
    $password=$_POST['matkhau'];
    if(isset($_POST['nho-mat-khau'])&&$_POST['nho-mat-khau']){
    setcookie('email',$email,time()+(84000*7));
    setcookie('matkhau',$password,time()+(84000*7));
    }
    $sql="SELECT hoten,id_taikhoan,vaitro FROM tbl_taikhoan where email='$email' and matkhau='$password'";
    $sql_taikhoan=mysqli_query($mysqli,$sql);
    $count=mysqli_num_rows($sql_taikhoan);
    if($count>0){
        $row=mysqli_fetch_array($sql_taikhoan);
        $_SESSION['ktradangnhap']=$row['id_taikhoan'];
        if($row['vaitro']=='admin'){
            $_SESSION['tendangnhapadmin']=$row['hoten'];
        }
        else{
            $_SESSION['ktradangnhap']= $row['id_taikhoan'];//de hien thi thong tin dang nhap
    }
    header('Location:index.php');
    }
    
    if(!isset($_SESSION['dangnhap'])){
        echo '<script> alert("Tài khoản hoặc mật khẩu không đúng.Làm ơn đăng nhập lại."); </script>';
    }
}

?>