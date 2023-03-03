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
    $sql="SELECT * FROM tbl_taikhoan where id_taikhoan='".$_SESSION['ktradangnhap']."'";
    $sth=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($sth);
?>
<div class="container my-2">
    <h3 class="text-center text-uppercase">Thông tin cá nhân</h3>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <!-- <div class="col-4 d-flex justify-content-center align-items-center"> -->
        <div class="col-4 text-center">
            <img class="rounded-circle d-block w-100" src="./pages/main/quanlytaikhoan/uploads/<?php echo $row['hinhanh']!=""? $row['hinhanh']:'user.png';   ?>"  alt="">
            <label for="hinhanh" class="text-center bg-success text-white p-2 rounded mt-1">Tải ảnh lên</label>
            <input type="file" id="hinhanh" name="hinhanh" class="d-none" >
        </div>
        
        <div class="col-8">
            
                <div class="form-group">
                    <label for="">Họ và tên</label>
                    <input type="text" class="form-control" value="<?php echo $row['tenkhachhang'] ?>" name="hoten" id="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" value="<?php echo  $row['email'] ?>" name="email" id="">
                </div>
                <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <div class="input-group border">
                            <input id="password-input-matkhau" value="<?php echo $row['matkhau']?>" name='matkhau' type="password" class="form-control border-0" placeholder="Nhập mật khẩu của bạn" >
                            <i onclick="ShowPassword(document.querySelector('#password-input-matkhau'))" class="fa-sharp fa-solid fa-eye border-0 bg-white px-2 my-auto"></i>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="">Địa chỉ nhận hàng</label>
                    <input type="text" class="form-control" value="<?php echo $row['diachi'] ?>" name="diachi" id="">
                </div>
                <div class="form-group">
                <button class="w-100 btn btn-success"  name="capnhatthongtin" type="submit">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>