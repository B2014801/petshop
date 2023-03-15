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
                    <div class="add-minus  d-flex mx-1 minus-and-plus">
                        <button class="minus-sp nosubmit  bg-light border border-light-subtle" id="minus-sp">-</button>
                        <input class="text-center bg-light border border-light-subtle" data-id="<?php echo $row['id_sanpham'] ?>" type="text" name="<?php echo $row['id_sanpham'] ?>" id="amount_<?php echo $row['id_sanpham'] ?>" size="2" value="<?php echo $row['soluong'] ?>" style="outline: none;">
                        <button class="plus-sp nosubmit bg-light border border-light-subtle" id="plus-sp">+</button>         
                    </div>
                </td>
                <td><span style="white-space: nowrap;"><?php echo number_format($tamtinh1sp, 0, ',', '.').' ₫' ?></span></td>
            </tr>
            
    <?php
            $donhang=array_merge($donhang,(array(array('id_sanpham'=>$row['id_sanpham'],'soluong'=>$row['soluong'],'gia'=>$row['giasp'],'tamtinh'=>number_format($tamtinh1sp, 0, ',', '.')))));// luu lai id cua cac san pham de dat hang
     }
            $_SESSION['tongtien-donhang']=number_format($tamtinh, 0, ',', '.');
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
        
        <a class="btn btn-danger w-100 mt-2" role="button" href="index.php?quanly=thanhtoan" type="submit">Thanh toán</a>
    </div>
    
    </div>
    <?php }else{echo '<h6 class="text-center mt-2">Giỏ hàng của bạn trống.</h6>';   }}else {echo '<h6 class="text-center mt-2">Giỏ hàng của bạn trống.</h6>';} ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>