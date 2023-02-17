<div  class="container w-50 border border-primary rounded my-3 p-0">
            <form action="" enctype="application/x-www-form-urlencoded" onsubmit='return checkdk();' >
                <h3 class="bg-success text-white p-2 text-organ text-center">Tạo tài khoản</h3>
                <div  class="m-3">
                    
                    <div class="form-group font-weight-bold ">
                        <label  for="">Họ tên* </label>
                        <div >
                            <input type="text" class="form-control" placeholder="Họ tên">
                        </div>
                    </div>
                    <div class="form-group font-weight-bold ">
                        <label  for="">Email* </label>
                        <div >
                            <input type="email" class="form-control" placeholder="Vui lòng nhập vào email của bạn">
                        </div>
                    </div>
                    <div class="form-group font-weight-bold ">
                        <label   for="">Mật khẩu* </label>
                        <div id="password">
                            <input id="password-input" type="password" class="form-control" placeholder="Tối thiểu 6 ký tự bao gồm cả chữ và số">
                            <input class="mt-2 mr-2" type="checkbox" onclick="ShowPassword()">Hiện mật khẩu
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-info" type="submit">Đăng ký</button>
                    </div>  
                </div>
            </form>
        </div>