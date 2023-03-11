
<div  class="container col-md-6 col-10 border border-primary rounded my-3 p-0">
            <form action="" enctype="application/x-www-form-urlencoded" onsubmit='return ValidateDangKy();' method="POST" >
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
                            <input type="email" id="email" name="email" class="form-control" placeholder="Vui lòng nhập vào email của bạn">
                        </div>
                    </div>
                    <div class="form-group font-weight-bold ">
                        <label   for="">Mật khẩu* </label>
                        <div class="input-group border">
                            <input id="password-dangky" name='matkhau' type="password" class="form-control border-0" placeholder="Nhập mật khẩu của bạn" >
                            <i onclick="ShowPassword(document.querySelector('#password-dangky'))" class="fa-sharp fa-solid fa-eye border-0 bg-white px-2 my-auto"></i>
                        </div>
                    </div>
                    <div class="form-group font-weight-bold ">
                        <label   for="">Lặp lại mật khẩu* </label>
                        <div class="input-group border">
                            <input id="password-dangky-laplai" name='matkhau' type="password" class="form-control border-0" placeholder="Nhập mật khẩu của bạn" >
                            <i onclick="ShowPassword(document.querySelector('#password-dangky-laplai'))" class="fa-sharp fa-solid fa-eye border-0 bg-white px-2 my-auto"></i>
                        </div>
                    </div>
                    <!-- <div class="form-group font-weight-bold ">
                        <label   for="">Địa chỉ nhận hàng* </label>
                        <div>
                            <input name="diachi"  type="text" class="form-control password-input" placeholder="Nhập địa chỉ của bạn">
                        </div>
                    </div> -->
                    <!-- <div class="form-group font-weight-bold ">
                        <label   for="">Địa chỉ nhận hàng* </label>
                        <div>
                            <input name="diachi"  type="text" class="form-control password-input" placeholder="Nhập địa chỉ của bạn">
                        </div>
                    </div> -->
                    <div>
                        <button class="btn btn-info" name="dangky" type="submit">Đăng ký</button>
                    </div>  
                </div>
            </form>
        </div>
       