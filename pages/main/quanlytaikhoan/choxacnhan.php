<div class="container">
    <hr>
    <h3 class="text-center text-uppercase">Chờ xác nhận</h3>
    <?php
        $user=$_SESSION['ktradangnhap'];
        $sql="SELECT * FROM  tbl_donhang b WHERE b.id_taikhoan='$user' and b.trangthai_donhang=0 ";
        $chon_donhang_choxacnhan=mysqli_query($mysqli,$sql);
        if(mysqli_num_rows($chon_donhang_choxacnhan)>0){
        while($row1=mysqli_fetch_array($chon_donhang_choxacnhan)){
    ?>
     <table class="table table-bordered table-responsive-sm shadow w-75 mx-auto" >
        <tbody>
            <tr>
                <td colspan="2"><p class="mb-0 text-success"><i class="fa-solid fa-check"></i> Đơn hàng đang được xác nhận</p> </td>
            </tr>
    <?php
        $sql="SELECT * FROM  tbl_donhang b JOIN tbl_chitietdonhang a ON a.id_donhang=b.id_donhang 
        JOIN tbl_sanpham c ON a.id_sanpham=c.id_sanpham WHERE b.id_donhang='$row1[id_donhang]' and b.trangthai_donhang=0 ";
        $chon_donhang=mysqli_query($mysqli,$sql);
        while($row=mysqli_fetch_array($chon_donhang)){
    ?>
    <tr>
        <td class="col-2">
            <img class="ml-2" width="130" height="100" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanhsp'] ?>" alt="">
        </td>
        <td>
        <span><?php echo $row['tensp']?> <b>x<?php echo $row['soluong_sanpham'] ?></b></span> 
        <p class="text-danger"><?php echo $row['gia_sp_lucmua'].' ₫'?></p> 
        <p class="mb-0">Thành tiền: <b  class="text-danger"> <?php echo $row['tam_tinh'].' ₫' ?></b></p>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="2" >
            <form method="POST">
                <input type="hidden" name="id_donhang" value="<?php echo $row1['id_donhang'] ?>">
            Tổng đơn : <span class="text-danger font-weight-bold"><?php echo $row1['tong_tien'].' ₫' ?></span>
            <button name="huy-don-hang" class="btn btn-danger float-right">Huỷ</button>
            </form>
        </td>
    </tr>
    </tbody>
    </table>
      <?php  
    }}else {echo '<p class="text-center mt-4">"Bạn chưa đặt đơn hàng nào gần đây"</p>';}
    ?>
</div>
