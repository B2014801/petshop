<?php

// session_start();
if(isset($_POST['dangky'])){
    $hoten=$_POST['hoten'];
    $email=$_POST['email'];
    $matkhau=($_POST['matkhau']);
    $diachi=$_POST['diachi'];

    $sql="INSERT INTO tbl_taikhoan(tenkhachhang,email,matkhau,diachi) value('$hoten','$email','$matkhau','$diachi')";
    $sql_dangky=mysqli_query($mysqli,$sql);

    if(isset($sql_dangky)){
        $_SESSION['dangnhap']=$hoten;
        echo "<script>alert('thành công');</script>";
        header("Location:index.php");
    }
}

    if(isset($_POST['dangnhap'])){
    $email=$_POST['email'];
    $password=$_POST['matkhau'];
    if(isset($_POST['nho-mat-khau'])&&$_POST['nho-mat-khau']){
    setcookie('email',$email,time()+(84000*7));
    setcookie('matkhau',$password,time()+(84000*7));
    }
    
    $sql="SELECT * FROM tbl_taikhoan where email='$email' and matkhau='$password'";
    $sql_mk=mysqli_query($mysqli,$sql);
    $count=mysqli_num_rows($sql_mk);
    if($count>0){
        header('Location:index.php');
        $row = mysqli_fetch_array($sql_mk);
        $_SESSION['dangnhap']= $row['tenkhachhang'];//de hien thi thong tin dang nhap
        $_SESSION['ktradangnhap']= $row['id_taikhoan']; // kiem tra co dang nhap thi them vao tbl_giohang
    }
    else{
        echo '<script> alert("Tài khoản hoặc mật khẩu không đúng.Làm ơn đăng nhập lại."); </script>';
    }
}
?>
<?php
if(isset($_GET['action'])&&$_GET['action']=='dangxuat'){
  echo "<script>alert('trung')</script>";
  unset($_SESSION['dangnhap']);
  header('Location:index.php');
  exit();
}
?>