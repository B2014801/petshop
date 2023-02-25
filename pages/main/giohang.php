
<div class="row mx-md-5 mx-1 my-2">
        <div><h1 class="text-center">Giỏ Hàng <?php echo isset($_SESSION['dangnhap']) ? "Của ".$_SESSION['dangnhap'] :''; ?></h1></div>
        <?php if(isset($_SESSION['ktradangnhap'])){ 
             $sql="SELECT * FROM tbl_taikhoan a JOIN  tbl_giohang b ON 
             a.id_taikhoan=b.id_taikhoan JOIN tbl_sanpham c ON b.id_sanpham=c.id_sanpham" ;//lay san pham tu 3 table hien thi len gio hang
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
            while($row=mysqli_fetch_array($sql_query)){
            $gia=intval($row['giasp']);
            $tamtinh1sp= $gia*$row['soluong'];
            $tamtinh+=$tamtinh1sp;
        ?>
            <tr>
               <td><a href="pages/main/xulygiohang.php?id_sp_canxoa=<?php echo $row['id_sanpham']; ?>" class="text-dark text-decoration-none"><i class="fa-sharp fa-solid fa-xmark delete-purchase-icon" ></i> Xóa</a></td>
                <td>
                <img class="m-2" width="130" height="100" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanhsp'] ?>" alt="">
                </td>
                <td style="width: 400px;"><?php echo $row['tensp']?></td>
                <td><span><?php echo $row['giasp'].' ₫' ?></span></td>
                <td>
                    <div class="add-minus  d-flex mx-1">
                        <button class="minus-sp  bg-light border border-light-subtle" id="minus-sp">-</button>
                        <input class="text-center bg-light border border-light-subtle" type="text" name="amount" id="amount" size="2" value="<?php echo $row['soluong'] ?>" style="outline: none;">
                        <button class="plus-sp bg-light border border-light-subtle" id="plus-sp">+</button>         
                    </div>
                </td>
                <td><span style="white-space: nowrap;"><?php echo $tamtinh1sp.' ₫' ?></span></td>
            </tr>
    <?php }?>
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
                    <td class="text-right"><span ><?php echo $tamtinh.' ₫' ?></span></td>
                </tr>
                <tr>
                    <td>Tổng</td>
                    <td class="text-right"><span><?php echo $tamtinh.' ₫' ?></span></td>
                </tr>
            </tbody>
        </table>
        <div>
            <a class="btn btn-danger w-100 mt-2" role="button" href="<?php if(isset($_SESSION['dangnhap']) ){echo "dathang.php";} 
            else {echo "index.php?quanly=dangnhap";} ?>">Đặt hàng
            </a>
        </div>
    </div>
    </div>
    <?php }else{echo '<h6 class="text-center mt-2">Giỏ hàng của bạn trống.</h6>';   }}else {echo '<h6 class="text-center mt-2">Giỏ hàng của bạn trống.</h6>';} ?>
    <script>
        function quantitychange(){
    let amountElement = document.getElementById('amount');
    let amount = amountElement.value;
    amountElement.addEventListener("input", function(){
        amount = amountElement.value;
    })
    document.getElementById('plus-sp').addEventListener("click", function(){
        amount++; 
        amountElement.value=amount;
    })

    document.getElementById('minus-sp').addEventListener("click", function(){
        if(amount >1){
            amount--;
            amountElement.value=amount;
        }
    })
}
quantitychange();
    </script>