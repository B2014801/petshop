<div class="row mx-md-5 mx-1 my-2">
        <div><h1 class="text-center">Giỏ Hàng <?php echo isset($_SESSION['dangnhap']) ? "Của ".$_SESSION['dangnhap'] :''; ?></h1></div>
        <div class="col-12 col-md-8 table-responsive-sm ">
      <table class=" giohang-hienthi my-3 " >
        <tr>
            <th class="col" colspan="3">Sản phẩm</th>
            <th class="col">giá</th>
            <th class="col">số lượng</th>
            <th class="col">tạm tính</th>
        </tr>
        <tbody>
            <tr>
               <td><a href="" class="text-dark text-decoration-none"><i class="fa-sharp fa-solid fa-xmark delete-purchase-icon" style=""></i> Xóa</a></td>
                <td>
                <img class="m-2" width="130" height="100" src="./img/trangchu/anh-cho-phoc-soc-12093-1247x960.jpg" alt="">
                </td>
                <td><span>Chó Phốc Sóc mini đen tuyền mã PS697<span></td>
                <td><span>11.000.000 ₫</span></td>
                <td>
                    <div class="add-minus  d-flex mx-1">
                        <button class="minus-sp  bg-light border border-light-subtle" id="minus-sp">-</button>
                        <input class="text-center bg-light border border-light-subtle" type="text" name="amount" id="amount" size="2" value="1" style="outline: none;">
                        <button class="plus-sp bg-light border border-light-subtle" id="plus-sp">+</button>         
                    </div>
                </td>
                <td><span style="white-space: nowrap;">11.000.000 ₫</span></td>
            </tr>
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
                    <td class="text-right"><span >11.000.000 ₫</span></td>
                </tr>
                <tr>
                    <td>Tổng</td>
                    <td class="text-right"><span>11.000.000 ₫</span></td>
                </tr>
            </tbody>
        </table>
        <div>
            <a class="btn btn-danger w-100 mt-2" role="button" href="<?php if(isset($_SESSION['dangky'])||isset($_SESSION['dangnhap']) ){echo "dathang.php";} 
            else {echo "index.php?quanly=dangnhap";} ?>">Đặt hàng
            </a>
        </div>
    </div>
    </div>