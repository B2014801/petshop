<?php
    if(isset($_SESSION['ktradangnhap'])){
    $user=$_SESSION['ktradangnhap'];
    // kiem tra xem khách hàng đã mua hàng hay chưa mới hiển thị gợi ý
    $sql="SELECT * FROM tbl_donhang WHERE id_taikhoan='$user'";
    $num=mysqli_num_rows(mysqli_query($mysqli,$sql));
    if($num>0){
?>
<div class="row card-group mx-3 mt-2">
<div class="row card-group mx-3 mt-2">
    <h3 class="text-center text-uppercase">Những sản phẩm bạn cũng có thể mua</h3>
    <?php
            // cong lai tat ca các danh muc cua don hang da mua
            $hieusp=array();
            foreach ($_SESSION['chitiet-donhang'] as $item){
                $sql="SELECT b.tenhieusp ,a.id_sanpham from tbl_sanpham a JOIN tbl_hieusanpham  b on a.id_hieusanpham=b.id_hieusanpham WHERE a.id_sanpham='$item[id_sanpham]'";
                $tenhieusp1=mysqli_query($mysqli,$sql);
                $row=mysqli_fetch_array($tenhieusp1);
                // array_push($hieusp,$row['tenhieusp']);
                $hieusp=array_merge($hieusp,array(array('id_sanpham'=>$row['id_sanpham'],'hieusp'=>$row['tenhieusp'])));
            }
            // $hieusp=implode(', ', $hieusp);
            // hien thi ra
            foreach ($hieusp as $item){
                // chọn những san phẩm trong những danh mục năm trong $hieusp
                $sql="SELECT * FROM tbl_sanpham a JOIN tbl_hieusanpham b on a.id_hieusanpham=b.id_hieusanpham WHERE b.tenhieusp='$item[hieusp]' and a.id_sanpham!='$item[id_sanpham]' LIMIT 8";
                $goiy=mysqli_query($mysqli,$sql);
                while($row=mysqli_fetch_array($goiy)){?>
                    <div class="col-sm-4 col-md-3 col-lg-3 col-6 mb-3">
                    <a href="index.php?sanpham=<?php echo $row['id_sanpham']; ?>" class="text-dark text-decoration-none">
                    <div class="card position-relative">
                        <img width="310px" height="250px" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanhsp']; ?>"  class="card-img-top" alt="#">
                        <div class="card-body text-center">
                        <p class="mb-1"><?php echo $row['tensp']?></p>
                        <h5 class="card-title"><?php echo $row['giasp'].' ₫' ?></h5>
                        </div>
                    </div>
                    </a>
                    </div>
            <?php
                }
            }
        }}
       
    ?>
    </div>
</div>