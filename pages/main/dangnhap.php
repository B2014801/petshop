<div  class="container w-50 border border-primary rounded my-3 p-0">
            <form action="" method="post">
                <h3 class="bg-success text-white p-2 text-organ text-center">Chào mừng bạn đến với shop thú cưng</h3>
                <div  class="m-3">
                <div class="form-group font-weight-bold ">
                    <label  for="">Email* </label>
                    <div>
                        <input id="password-input-email" name="email" type="email" value="<?php echo (isset($_COOKIE['email'])) ? $_COOKIE['email'] : "";?>" class="form-control" placeholder="Vui lòng nhập vào email của bạn">
                    </div>
                </div>
                <div class="form-group font-weight-bold " >
                    <label  for="">Mật khẩu*</label>
                    <div class="input-group border">
                        <input id="password-input-matkhau" name='matkhau' type="password" value="<?php echo (isset($_COOKIE['matkhau'])) ? $_COOKIE['matkhau'] : "";?>" class="form-control border-0" placeholder="Nhập mật khẩu của bạn" >
                        <i onclick="ShowPassword(document.querySelector('#password-input-matkhau'))" class="fa-sharp fa-solid fa-eye border-0 bg-white px-2 my-auto"></i>
                    </div>
                </div>
                <div class="form-group form-check ">
                    <input type="checkbox" name="nho-mat-khau" class="form-check-input">
                    <label for=""  class="form-check-label">Ghi nhớ tôi</label>
                </div>
                <div>
                    <button class="btn btn-info" name="dangnhap" type="submit">Đăng nhập</button>
                    <a class="btn btn-info" href="index.php?quanly=dangky" role="button" class="btn btn-info">Tạo tài khoản</a>
                </div>  
            </div>
            </form>
        </div>