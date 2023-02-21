<?php
    // session_start();
    if(isset($_POST['dangky'])){
        $hoten=$_POST['hoten'];
        $email=$_POST['email'];
        $matkhau=($_POST['matkhau']);
        $diachi=$_POST['diachi'];

        $sql="INSERT INTO tbl_dangky(tenkhachhang,email,matkhau,diachi) value('$hoten','$email','$matkhau','$diachi')";
        $sql_dangky=mysqli_query($mysqli,$sql);

        if(isset($sql_dangky)){
            $_SESSION['dangky']=$hoten;
            echo "<script>alert('thành công');</script>";
            header("Location:../index.php");
        }
    }
?>
<div  class="container col-md-6 col-10 border border-primary rounded my-3 p-0">
            <form action="" enctype="application/x-www-form-urlencoded" onsubmit='return checkdk();' method="POST" >
                <h3 class="bg-success text-white p-2 text-organ text-center">Tạo tài khoản</h3>
                <div  class="m-3">
                    
                    <div class="form-group font-weight-bold ">
                        <label  for="">Họ tên* </label>
                        <div >
                            <input type="text" id="hoten" name="hoten" class="form-control" placeholder="Họ tên">
                        </div>
                    </div>
                    <div class="form-group font-weight-bold ">
                        <label  for="">Email* </label>
                        <div >
                            <input type="email" name="email" class="form-control" placeholder="Vui lòng nhập vào email của bạn">
                        </div>
                    </div>
                    <div class="form-group font-weight-bold ">
                        <label   for="">Mật khẩu* </label>
                        <div>
                            <input id="password-input" name="matkhau" type="password" class="form-control" placeholder="Tối thiểu 6 ký tự bao gồm cả chữ và số">
                        </div>
                    </div>
                    <div class="form-group font-weight-bold ">
                        <label   for="">Lặp lại mật khẩu* </label>
                        <div>
                            <input  type="password" class="form-control password-input" placeholder="Tối thiểu 6 ký tự bao gồm cả chữ và số">
                        </div>
                    </div>
                    <div class="form-group font-weight-bold ">
                    <input class="mt-2 mr-2" type="checkbox" onclick="ShowPassword()">Hiện mật khẩu
                    </div>
                    <div class="form-group font-weight-bold ">
                        <label   for="">Địa chỉ nhận hàng* </label>
                        <div>
                            <input name="diachi"  type="text" class="form-control password-input" placeholder="Nhập địa chỉ của bạn">
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-info" name="dangky" type="submit">Đăng ký</button>
                    </div>  
                </div>
            </form>
        </div>
       