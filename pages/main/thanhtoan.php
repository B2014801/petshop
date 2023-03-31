<?php
// cap nhat thong tin
if(isset($_POST['capnhatthongtin'])){
    $hoten=$_POST['hoten'] ?? '';
    $email=$_POST['email'] ?? '';
    $diachi=$_POST['diachi'] ?? '';
    $sodienthoai=$_POST['sodienthoai'] ?? '';

    $sql="UPDATE tbl_taikhoan SET hoten='$hoten', email='$email',diachi='$diachi',so_dien_thoai='$sodienthoai' WHERE id_taikhoan='".$_SESSION['ktradangnhap']."'";
    mysqli_query($mysqli,$sql);
}

    if(!isset($_SESSION['ktradangnhap'])){
        header('location:index.php?quanly=dangnhap');
    }
    else{
        $user=$_SESSION['ktradangnhap'];
        $sql="SELECT * FROM tbl_taikhoan WHERE id_taikhoan=$user";
        $chon_tbl_taikhoan=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_array($chon_tbl_taikhoan);
?>
    <div class="container row mx-auto mt-2">
        <div class="col-md-6 col-12 mb-2">
        <form action="" method="POST" onsubmit="return ValidateFromThanhToanThongTin()">
        <h3 class="col-12 pl-0">Thông tin thanh toán</h3>
        <div class="form-inline">
        <div class="form-group my-1 col-sm-6 pl-md-0 pl-0  ">
            <label for="form-check-label"><b>Tên</b></label>
            <input type="text" name="hoten" value="<?php echo $row['hoten'] ?>" class="form-control w-100 mt-1" placeholder="Nhập tên của bạn">
        </div>
        <div class="form-group my-1 col-sm-6 pr-md-0 pr-sm-0 pl-0 ">
            <label for="form-check-label"><b>Số điện thoại</b></label>
            <input type="text" id="sdt" name="sodienthoai" value="<?php echo $row['so_dien_thoai'] ?>" class="form-control w-100 mt-1" placeholder="Nhập Email của bạn">
        </div>
        </div>
        <div class="form-group my-1 col-sm-12 pr-md-0 pr-sm-0 pl-0 ">
            <label for="form-check-label"><b>Email</b></label>
            <input type="text" name="email" value="<?php echo $row['email'] ?>" class="form-control w-100 mt-1" placeholder="Nhập Email của bạn">
        </div>
        <div class="form-group my-1 col-sm-12 pr-md-0 pr-sm-0 pl-0 ">
            <label for="form-check-label"><b>Địa chỉ nhận hàng *</b></label>
            <input type="text" id="diachi" name="diachi" value="<?php echo $row['diachi'] ?>" class="form-control w-100 mt-1" placeholder="Nhập địa chỉ của bạn">
        </div>
        
        
    <div><button class="btn btn-danger mt-2" name="capnhatthongtin" type="submit">Cập nhật</button></div>
</form>
</div>
    

    <div class="col-md-6 col-12 mb-2 col" style="border: 2px solid blue;">
    <div  style="padding: 20px;">
        <h4 class="text-warning">
            <?php
            //thong bao loi khi so luong mua lon hon kho
                if(isset($_GET['thatbai'])){
                    echo "Vui lòng cập nhật lại số lượng mua";
                }
            ?>
        </h4>
        <h3 class="text-upercase">Đơn hàng của bạn</h3>
        <table class="table table-bordered">
            <tr>
                <th>Sản phẩm</th>
                <th>Tạm tính</th>
            </tr>
            <?php
                $tongtien=0;
             foreach($_SESSION['chitiet-donhang'] as $item){
                $sql="SELECT tensp,giasp FROM tbl_sanpham WHERE id_sanpham=$item[id_sanpham]";
                $sanpham=mysqli_query($mysqli,$sql);
                $row=mysqli_fetch_array($sanpham);
                $gia = $item['gia'];
                $gia=intval($gia);
                $tamtinh=intval($item['soluong']) * $gia;
                $tongtien+=$tamtinh;
             ?>
             <tr>
                <td><?php echo $row['tensp'] ?> x <b><?php echo $item['soluong']?></b></td>
                <td  class="text-right"><b><?php echo number_format($tamtinh,0,'','.').' ₫';  ?></b></td>
             </tr>
             <?php }?>
             <tr>
                <td>Tạm tính</td>
                <td class="text-right"><b ><?php echo  number_format($tongtien,0,'','.').'₫' ?></b></td>
            </tr>
             <tr>
                <td>Tổng</td>
                <td  class="text-right"><b><?php echo number_format($tongtien,0,'','.').'₫'  ?></b></td>
             </tr>
        </table>
        <div class="form-inline">
        <form action="pages/main/xulygiohang.php?action=dathang" method="POST" onsubmit="return ValidateFromThanhToanDonhang()">
        <div class="accordion form-group col-12 pl-md-0" id="accordionPayment">
            <div>
                <div class="form-group" id="headingOne">
                <input class="form-check-input" type="checkbox" id="checkboxOne" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapseOne">
                <label class="form-check-label" for="checkboxOne">Hình thức thanh toán</label>
                </div>

                <div id="collapsetwo" class="collapse p-3 bg-light" aria-labelledby="headingOne" data-parent="#accordionPayment">
                <div>
                    <div class="form-group" id="headingTwo">
                    <input class="form-check-input" value="khi nhận hàng" type="radio" name="paymentMethod" id="checkboxTwo">
                    <label class="form-check-label" for="checkboxTwo">Thanh toán khi nhận hàng</label>
                    </div>
                </div>
                <div>
                    <div class="form-group" id="headingThree">
                    <input class="form-check-input" value="trực tuyến" type="radio" name="paymentMethod" id="checkboxThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"> 
                    <label class="form-check-label" for="checkboxThree">Thanh toán online</label>
                    </div>
                    <div id="collapseThree" class="collapse p-3 bg-light">
                    <p>Thông tin tài khoản thụ hưởng của Pet shop. Sau khi chuyển khoản, xin vui lòng thông báo cho chúng tôi qua số điên thoại 0925 086 811 để được phục vụ nhanh nhất.</p>
                    <p>Ngân hàng: <b>Agribank</b></p>
                    <p>Số tài khoản: <b>076582640</b></p>
                    <p>Tên tài khoản: <b>NGUYỄN QUỐC TRUNG</b></p>
                    <div class="text-center">
                    <img  src="img/thanhtoan/qr.jpg" alt="">
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        <div>
            <button class="btn btn-danger mt-2" type="submit">Đặt hàng</button>
        </div>
        </form>
    </div>
    </div>
    </div>

<?php }?>
