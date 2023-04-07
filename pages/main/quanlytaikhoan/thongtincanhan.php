<div class="container my-2">
    <hr>
    <h3 class="text-center text-uppercase">Thông tin cá nhân</h3>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <!-- <div class="col-4 d-flex justify-content-center align-items-center"> -->
        <div class="col-md-4 col-sm-12 col-12 text-center">
            <img class="rounded-circle d-block mx-auto" width="200px" height="200px" src="./pages/main/quanlytaikhoan/uploads/<?php echo $row['hinhanh']!=""? $row['hinhanh']:'user.png';   ?>"  alt="">
            <label for="hinhanh" class="text-center bg-success text-white p-2 rounded mt-1">Tải ảnh lên</label>
            <input type="file" id="hinhanh" name="hinhanh" class="d-none" >
        </div>
        
        <div class="col-md-8 col-12 col-sm-12 mx-auto">
            
                <div class="form-group">
                    <label for="">Họ và tên</label>
                    <input type="text" class="form-control" value="<?php echo $row['hoten'] ?>" name="hoten" id="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" value="<?php echo  $row['email'] ?>" name="email" id="">
                </div>
                
                <div class="form-group">
                    <label for="">Địa chỉ nhận hàng</label>
                    <input type="text" class="form-control" value="<?php echo $row['diachi'] ?>" name="diachi" id="">
                </div>
                <div class="form-group form-inline">
                <button class="col-5 btn btn-success"  name="capnhatthongtin" type="submit">Cập nhật</button>
                </form>
                <a class="col-5 w-50 btn btn-success ml-auto"  name="doimatkhau" data-toggle="modal" data-target="#modal-doimk" >Đổi mật khẩu</a>
                    <div id="modal-doimk" class="modal fade " tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content border p-3">
                                <form action=""  method="POST" onsubmit="return ValidateDoimk()">
                                    <div class="mb-2 form-group">
                                        <label for="" class="">Mật khẩu mới: </label>
                                        <div class="input-group border w-100">
                                            <input id="password-input-doimatkhau" name='matkhau-moi' type="password" class="form-control border-0" >
                                            <i onclick="ShowPassword(document.querySelector('#password-input-doimatkhau'))" class="fa-sharp fa-solid fa-eye border-0 bg-white px-2 my-auto"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="">Lập lại mật khẩu: </label>
                                        <div class="input-group border w-100">
                                            <input id="password-input-doimatkhau-laplai"  name='matkhau-moi-laplai' type="password" class="form-control border-0" >
                                            <i onclick="ShowPassword(document.querySelector('#password-input-doimatkhau-laplai'))" class="fa-sharp fa-solid fa-eye border-0 bg-white px-2 my-auto"></i>
                                        </div>
                                    </div>
                            <div class="display-inline mx-auto text-center mt-2">
                                <button class="btn btn-danger mr-2" name="doi-matkhau" type="submit">Gửi</button> 
                                <a role="button" class="btn btn-danger"  data-dismiss="modal">Huỷ</a>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            
</div>