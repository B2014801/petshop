<?php
    if(isset($_SESSION['ktradangnhap'])){
    $user=$_SESSION['ktradangnhap'];
    // kiem tra xem khách hàng đã mua hàng hay chưa mới hiển thị gợi ý
    $sql="SELECT * FROM tbl_donhang WHERE id_taikhoan='$user'";
    $num=mysqli_num_rows(mysqli_query($mysqli,$sql));
    if($num>0){
?>
<div class="container">
<div class="row card-group mx-3 mt-2">
    <h3 class="text-center text-uppercase">Những sản phẩm bạn cũng có thể mua</h3>
    <?php
        if(isset($_SESSION['chitiet-donhang'])){
            foreach ($_SESSION['chitiet-donhang'] as $item){
                // chọn những san phẩm trong những danh mục có id sản phẩm nằm trong session
                $sql="SELECT * from tbl_hieusanpham JOIN tbl_sanpham ON tbl_hieusanpham.id_hieusanpham=tbl_sanpham.id_hieusanpham WHERE tbl_hieusanpham.tenhieusp = 
                (select tenhieusp FROM tbl_hieusanpham a JOIN tbl_sanpham b ON a.id_hieusanpham=b.id_hieusanpham WHERE  b.id_sanpham=$item[id_sanpham])";
                $goiy=mysqli_query($mysqli,$sql);
                while($row=mysqli_fetch_array($goiy)){?>
                    <div class="col-sm-4 col-md-3 col-lg-3 col-6 mb-3">
                    <a href="index.php?sanpham=<?php echo $row['id_sanpham']; ?>" class="text-dark text-decoration-none">
                    <div class="card position-relative">
                        <img width="310px" height="250px" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanhsp']; ?>"  class="card-img-top" alt="#">
                        <div class="card-body text-center">
                        <p class="mb-1"><?php echo $row['tensp']?> mã <?php echo $row['masp']?></p>
                        <h5 class="card-title"><?php echo $row['giasp'].' ₫' ?></h5>
                        </div>
                    </div>
                    </a>
                    </div>
            <?php
                }
            }
        }}else {
            echo '<h5 class="text-center my-3">Bạn phải mua hàng trước khi xem gợi ý</h5>'; 
        }}
    ?>
    </div>
</div>