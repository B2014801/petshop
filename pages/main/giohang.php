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
                    <form id="form-id">
                    <div class="add-minus  d-flex mx-1">
                        <button class="minus-sp nosubmit  bg-light border border-light-subtle" id="minus-sp">-</button>
                        <input class="text-center bg-light border border-light-subtle" data-id="<?php echo $row['id_sanpham'] ?>" type="text" name="amount" id="amount_<?php echo $row['id_sanpham'] ?>" size="2" value="<?php echo $row['soluong'] ?>" style="outline: none;">
                        <button class="plus-sp nosubmit bg-light border border-light-subtle" id="plus-sp">+</button>         
                    </div>
                </td>
                <td><span style="white-space: nowrap;"><?php echo $tamtinh1sp.' ₫' ?></span></td>
            </tr>
            
    <?php }?>
    <tr><td colspan="6"><button id="submit-btn" type="submit" class="btn btn-primary my-1">cập nhật giỏ hàng</button></td> </tr>
                    </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
<script>
    var id, quantity;
    $(document).ready(function() {
  // Attach the click event to a parent element
  $(".giohang-hienthi").on("click", ".minus-sp, .plus-sp", function(event) {
    event.preventDefault();
    var id = $(this).siblings("input").data("id");
    var quantity = parseInt($(this).siblings("input").val());
    if ($(this).hasClass("minus-sp")) {
      if (quantity > 1) {
        quantity--;
      }
    } else if ($(this).hasClass("plus-sp")) {
      quantity++;
    }
  $(this).siblings("input").val(quantity);
  });

  // Attach the submit event to the form
    $("#form-id").on("submit", function(event) {
    event.preventDefault();
    // Get all input values from the form
    // var formData = $(this).serialize();
    // Send AJAX request to update quantities
    updateQuantities(id,quantity);
  });

  function updateQuantities(id,quantity) {
    // alert(quantity);
    $.ajax({
       
      url: "pages/main/xulygiohang.php",
      type: "POST",
      data: {
                id_sanpham: id,
                soluong: quantity
            },
      success: function(response) {
        // alert('thanhcong');
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  }
});

</script>