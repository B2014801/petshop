<div class="row mx-md-5 mx-1 my-2">
        <div><h1 class="text-center">Giỏ Hàng <?php echo isset($_SESSION['dangnhap']) ? "Của ".$_SESSION['dangnhap'] :''; ?></h1></div>
        <?php if(isset($_SESSION['ktradangnhap'])){ 
            $user=$_SESSION['ktradangnhap'];
             $sql="SELECT * FROM tbl_taikhoan a JOIN  tbl_giohang b ON 
             a.id_taikhoan=b.id_taikhoan JOIN tbl_sanpham c ON b.id_sanpham=c.id_sanpham WHERE a.id_taikhoan=$user" ;//lay san pham tu 3 table hien thi len gio hang
             $sql_query=mysqli_query($mysqli,$sql);
             if(mysqli_num_rows($sql_query)>0){
        ?>
        <div class="col-12 col-md-8 table-responsive-sm ">
      <table class=" giohang-hienthi my-3 " >
        <tr>
            <th class="col" colspan="3">Sản phẩm</th>
            <th class="col">giá</th>
            <th class="col">số lượng</th>
            <th class="col">tạm tính</th>
        </tr>
        <tbody>
        <?php
            $tamtinh=0;
            $donhang=array();
            while($row=mysqli_fetch_array($sql_query)){
            $gia = str_replace(".", "", $row['giasp']);
            $gia=intval($gia);
            $soluong=intval($row['soluong']);
            $tamtinh1sp= $gia*$soluong;
            $tamtinh+=$tamtinh1sp;
            
            // $donhang=array_merge($donhang,(array('id_sanpham'=>(array('id_sanpham'=>$row['id_sanpham'])))));// luu lai id cua cac san pham de dat hang
        ?>
            <tr>
               <td><a href="pages/main/xulygiohang.php?id_sp_canxoa=<?php echo $row['id_sanpham']; ?>" class="text-dark text-decoration-none"><i class="fa-sharp fa-solid fa-xmark delete-purchase-icon" ></i> Xóa</a></td>
                <td>
                <img class="m-2" width="130" height="100" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanhsp'] ?>" alt="">
                </td>
                <td style="width: 400px;"><?php echo $row['tensp']?></td>
                <td><span><?php echo $row['giasp'].' ₫' ?></span></td>
                <td>
                    <form id="form-id" action="pages/main/xulygiohang.php" method="POST" enctype="application/x-www-form-urlencoded">
                    <div class="add-minus  d-flex mx-1">
                        <button class="minus-sp nosubmit  bg-light border border-light-subtle" id="minus-sp">-</button>
                        <input class="text-center bg-light border border-light-subtle" data-id="<?php echo $row['id_sanpham'] ?>" type="text" name="<?php echo $row['id_sanpham'] ?>" id="amount_<?php echo $row['id_sanpham'] ?>" size="2" value="<?php echo $row['soluong'] ?>" style="outline: none;">
                        <button class="plus-sp nosubmit bg-light border border-light-subtle" id="plus-sp">+</button>         
                    </div>
                </td>
                <td><span style="white-space: nowrap;"><?php echo number_format($tamtinh1sp, 0, ',', '.').' ₫' ?></span></td>
            </tr>
            
    <?php
            $donhang=array_merge($donhang,(array(array('id_sanpham'=>$row['id_sanpham'],'soluong'=>$row['soluong']))));// luu lai id cua cac san pham de dat hang
     }
            $_SESSION['tongtien-donhang']=$tamtinh;
            $_SESSION['chitiet-donhang']=$donhang;
            // print_r($_SESSION['chitiet-donhang']);
    ?>
    <tr><td colspan="6"><button id="submit-btn" type="submit" name="cap-nhat-gio-hang" class="btn btn-primary my-1">cập nhật giỏ hàng</button></td> </tr>
                    
        </tbody>
      </table>

    </div>
    <div class="col mt-3">
        <table class="giohang-conggiohang mb-3">
            
                <tr class=>
                    <th colspan="2" class="width-100 text-center">CỘNG GIỎ HÀNG</th>
                </tr>
                
        </table>
        <table class="giohang-conggiohang">
            <tbody>
                <tr>
                    <td>Tạm tính</td>
                    <td class="text-right"><span ><?php echo number_format($tamtinh, 0, ',', '.').' ₫' ?></span></td>
                </tr>
                <tr>
                    <td>Tổng</td>
                    <td class="text-right"><span name="tongtien"><?php echo number_format($tamtinh, 0, ',', '.').' ₫' ?></span></td>
                </tr>
            </tbody>
        </table>
        <div>
            </form>
        </div>
        <form action="pages/main/xulygiohang.php?action=dathang" method="POST" class="mt-2">
            <div class="form-inline ">
                <div class="form-group my-1 col-sm-6 pl-md-0 pl-0  ">
                    <label for="form-check-label"><b>Tên</b></label>
                    <input type="text" name="hoten" class="form-control w-100 mt-1" placeholder="Nhập tên của bạn">
                </div>
                <div class="form-group my-1 col-sm-6 pr-md-0 pr-sm-0 pl-0 ">
                    <label for="form-check-label"><b>Số điện thoại</b></label>
                    <input type="text" class="form-control w-100 mt-1" placeholder="Nhập Email của bạn">
                </div>
                <div class="form-group my-1 col-sm-12 pr-md-0 pr-sm-0 pl-0 ">
                    <label for="form-check-label"><b>Email</b></label>
                    <input type="text" class="form-control w-100 mt-1" placeholder="Nhập Email của bạn">
                </div>
                <div class="form-group my-1 col-sm-12 pr-md-0 pr-sm-0 pl-0 ">
                    <label for="form-check-label"><b>Địa chỉ nhận hàng *</b></label>
                    <input type="text" class="form-control w-100 mt-1" placeholder="Nhập Email của bạn">
                </div>
               
                <div class="accordion" id="accordionPayment">
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
        <button class="btn btn-danger w-100 mt-2" type="submit">Đặt hàng</button>
        </form>
    </div>
    </div>
    <?php }else{echo '<h6 class="text-center mt-2">Giỏ hàng của bạn trống.</h6>';   }}else {echo '<h6 class="text-center mt-2">Giỏ hàng của bạn trống.</h6>';} ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    <script>
    var id, quantity;
    $(document).ready(function() {
        // Attach the click event to a parent element
        $(".giohang-hienthi").on("click", ".minus-sp, .plus-sp", function(event) {
            event.preventDefault();
            id = $(this).siblings("input").data("id");
            quantity = parseInt($(this).siblings("input").val());
            if ($(this).hasClass("minus-sp")) {
                if (quantity > 1) {
                    quantity--;
                }
            } else if ($(this).hasClass("plus-sp")) {
                quantity++;
            }
           
            $(this).siblings("input").val(quantity);
        });
    });
</script>
