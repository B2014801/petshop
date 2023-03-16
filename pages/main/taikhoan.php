<?php
    if(isset($_POST['capnhatthongtin'])){
        $hoten=$_POST['hoten'] ?? '';
        $email=$_POST['email'] ?? '';
        $matkhau=$_POST['matkhau'] ?? '';
        $diachi=$_POST['diachi'] ?? '';

        $hinhanh=$_FILES['hinhanh']['name'] ?? '';
        $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'] ?? '';
        move_uploaded_file($hinhanh_tmp, './pages/main/quanlytaikhoan/uploads/'.$hinhanh);

        if($hinhanh!=''){
        $sql2="SELECT hinhanh FROM tbl_taikhoan WHERE id_taikhoan='".$_SESSION['ktradangnhap']."'";
        $sql_taikhoan=mysqli_query($mysqli,$sql2);
        $row=mysqli_fetch_array($sql_taikhoan);

        if(!empty($row['hinhanh']) && file_exists('./pages/main/quanlytaikhoan/uploads/'.$row['hinhanh'])){
        unlink('./pages/main/quanlytaikhoan/uploads/'.$row['hinhanh']);
        }
        $sql="UPDATE tbl_taikhoan SET tenkhachhang='$hoten', email='$email',matkhau='$matkhau',diachi='$diachi',hinhanh='$hinhanh' WHERE id_taikhoan='".$_SESSION['ktradangnhap']."'";
        }
        else{
        $sql="UPDATE tbl_taikhoan SET tenkhachhang='$hoten', email='$email',matkhau='$matkhau',diachi='$diachi' WHERE id_taikhoan='".$_SESSION['ktradangnhap']."'";
        }
        echo "<script>alert('thanhcong');</script>";
        mysqli_query($mysqli,$sql);
    }
    if(isset($_POST['huy-don-hang'])){
        $id_donhang=$_POST['id_donhang'];
        echo  $id_donhang;
        $sql="UPDATE tbl_donhang SET trangthai_donhang=4 where id_donhang='$id_donhang'";
        mysqli_query($mysqli,$sql);
    }
    $sql="SELECT * FROM tbl_taikhoan where id_taikhoan='".$_SESSION['ktradangnhap']."'";
    $sth=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($sth);
?>
<div class="container my-2">
    <h3 class="text-center text-uppercase">Thông tin cá nhân</h3>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <!-- <div class="col-4 d-flex justify-content-center align-items-center"> -->
        <div class="col-md-4 col-sm-12 col-12 text-center">
            <img class="rounded-circle d-block mx-auto" width="280px" height="280px" src="./pages/main/quanlytaikhoan/uploads/<?php echo $row['hinhanh']!=""? $row['hinhanh']:'user.png';   ?>"  alt="">
            <label for="hinhanh" class="text-center bg-success text-white p-2 rounded mt-1">Tải ảnh lên</label>
            <input type="file" id="hinhanh" name="hinhanh" class="d-none" >
        </div>
        
        <div class="col-md-8 col-12 col-sm-12 mx-auto">
            
                <div class="form-group">
                    <label for="">Họ và tên</label>
                    <input type="text" class="form-control" value="<?php echo $row['tenkhachhang'] ?>" name="hoten" id="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" value="<?php echo  $row['email'] ?>" name="email" id="">
                </div>
                <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <div class="input-group border">
                            <input id="password-input-matkhau" value="<?php echo $row['matkhau']?>" name='matkhau' type="password" class="form-control border-0" placeholder="Nhập mật khẩu của bạn" >
                            <i onclick="ShowPassword(document.querySelector('#password-input-matkhau'))" class="fa-sharp fa-solid fa-eye border-0 bg-white px-2 my-auto"></i>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="">Địa chỉ nhận hàng</label>
                    <input type="text" class="form-control" value="<?php echo $row['diachi'] ?>" name="diachi" id="">
                </div>
                <div class="form-group">
                <button class="w-100 btn btn-success"  name="capnhatthongtin" type="submit">Cập nhật</button>
                </div>
            </form>
</div>
<div class="containter">
    <hr>
    <h3 class="text-center text-uppercase">Chờ xác nhận</h3>
    <?php
        $user=$_SESSION['ktradangnhap'];
        $sql="SELECT * FROM  tbl_donhang b WHERE b.id_taikhoan='$user' and b.trangthai_donhang=0 ";
        $chon_donhang_choxacnhan=mysqli_query($mysqli,$sql);
        if(mysqli_num_rows($chon_donhang_choxacnhan)>0){
        while($row1=mysqli_fetch_array($chon_donhang_choxacnhan)){
    ?>
     <table class="table table-bordered table-responsive-sm shadow" >
        <tbody>
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

<div class="containter">
    <hr>
    <h3 class="text-center text-uppercase">Đang giao hàng</h3>
    <?php
        $user=$_SESSION['ktradangnhap'];
        $sql="SELECT * FROM  tbl_donhang b WHERE b.id_taikhoan='$user' and b.trangthai_donhang=1";
        $chon_donhang_choxacnhan=mysqli_query($mysqli,$sql);
        if(mysqli_num_rows($chon_donhang_choxacnhan)>0){
        while($row1=mysqli_fetch_array($chon_donhang_choxacnhan)){
    ?>
     <table class="table table-bordered table-responsive-sm shadow" >
        <tbody>
    <?php
        $sql="SELECT * FROM  tbl_donhang b JOIN tbl_chitietdonhang a ON a.id_donhang=b.id_donhang 
        JOIN tbl_sanpham c ON a.id_sanpham=c.id_sanpham WHERE b.id_donhang='$row1[id_donhang]' and b.trangthai_donhang=1 ";
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
        <td colspan="2" >Tổng đơn : <span class="text-danger font-weight-bold"><?php echo $row1['tong_tien'].' ₫' ?></span></td>
    </tr>
    </tbody>
    </table>
      <?php  
    }}else {echo '<p class="text-center mt-4">"Bạn chưa đặt đơn hàng nào gần đây"</p>';}
    ?>
</div>
<div class="containter">
    <hr>
    <h3 class="text-center text-uppercase">Lịch sử mua hàng</h3>
    <?php
        $user=$_SESSION['ktradangnhap'];
        $sql="SELECT * FROM  tbl_donhang b WHERE b.id_taikhoan='$user' and b.trangthai_donhang=3";
        $chon_donhang_choxacnhan=mysqli_query($mysqli,$sql);
        if(mysqli_num_rows($chon_donhang_choxacnhan)>0){
        while($row1=mysqli_fetch_array($chon_donhang_choxacnhan)){
    ?>
     <table class="table table-bordered table-responsive-sm shadow" >
        <tbody>
    <?php
        $sql="SELECT * FROM  tbl_donhang b JOIN tbl_chitietdonhang a ON a.id_donhang=b.id_donhang 
        JOIN tbl_sanpham c ON a.id_sanpham=c.id_sanpham WHERE b.id_donhang='$row1[id_donhang]' and b.trangthai_donhang=3 ";
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
        <td colspan="2" >Tổng đơn : <span class="text-danger font-weight-bold"><?php echo $row1['tong_tien'].' ₫' ?></span></td>
    </tr>
    </tbody>
    </table>
      <?php  
    }}else {echo '<p class="text-center mt-4">"Bạn chưa đặt đơn hàng nào gần đây"</p>';}
    ?>
</div>
