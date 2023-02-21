<?php
    if(isset($_POST['dangnhap'])){
    $email=$_POST['email'];
    $password=$_POST['matkhau'];

    $sql="SELECT * FROM tbl_dangky where email='$email' and matkhau='$password'";
    $sql_mk=mysqli_query($mysqli,$sql);
    $count=mysqli_num_rows($sql_mk);
    if($count>0){
        header('Location:index.php');
        $_SESSION['dangnhap']=mysqli_fetch_array($sql_mk)['tenkhachhang'];
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