<div class="container my-2">
    <hr>
    <h3 class="text-center text-uppercase">Thông tin cá nhân</h3>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <!-- <div class="col-4 d-flex justify-content-center align-items-center"> -->
        <div class="col-md-4 col-sm-12 col-12 text-center">
            <img class="rounded-circle d-block mx-auto" width="280px" height="280px" src="./pages/main/quanlytaikhoan/uploads/<?php echo $row['hinhanh']!=""? $row['hinhanh']:'user.png';   ?>"  alt="">
            <label for="hinhanh" class="text-center bg-success text-white p-2 rounded mt-1">Tải ảnh lên</label>
            <input type="file" id="hinhanh" name="hinhanh" class="d-none" >
        </div>
        
        <div class="col-md-8 col-12 col-sm-12 mx-auto">
            
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