<?php
    session_start();
    include("config/config.php");
    if(isset($_POST['dangnhap'])){
    $username=$_POST['user-name'];
    $password=md5($_POST['password']);
    $sql="SELECT * FROM tbl_admin where username='$username' and password='$password'"; 
    $row=mysqli_query($mysqli,$sql);
    $count=mysqli_num_rows($row);
    if($count>0){
        $_SESSION['dangnhap']=$username;
        header('Location:index.php');
    }
   else{
    echo '<script> alert("Tài khoản hoặc mật khẩu không đúng.Làm ơn đăng nhập lại."); </script>';
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./font/fontawesome-free-6.1.2-web/fontawesome-free-6.1.2-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Trang chủ</title>
</head>

<body>
    <main >
        <div  class="container w-50 border border-primary rounded my-3 p-0">
            <form action="" method="POST">
                <h3 class="bg-success text-white p-2 text-organ text-center">Đăng nhập vào Admincp</h3>
                <div  class="m-3">
                <div class="form-group font-weight-bold ">
                    <label  for="">Tên</label>
                    <div >
                        <input name="user-name" class="form-control" placeholder="Vui lòng nhập vào tên của bạn">
                    </div>
                </div>
                <div class="form-group  mb-0">
                    <label class="font-weight-bold "  for="">Mật khẩu* </label>
                    <input type="password" id="password-input" name="password" class="form-control" placeholder="Nhập mật khẩu của bạn">
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="checkbox" onclick="ShowPassword()">
                        <label class="form-check-label " id="wrong-pass" for=""></label>
                        <label class="form-check-label " for="">Hiện mật khẩu</label>
                    </div>
                </div>
                <div class="form-group form-check ">
                    <input class="form-check-input" type="checkbox" >
                    <label for="" class="form-check-label">Ghi nhớ tôi</label>
                </div>
                <div>
                    <button class="btn btn-info" name="dangnhap" type="submit">Đăng nhập</button>
                </div>  
            </div>
            
            </form>
        </div>
    </main>
   
</body>
<script src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" 
        crossorigin="anonymous"></script>
</html>