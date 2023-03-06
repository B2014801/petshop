<div class="row card-group mx-3 mt-2">
            <div class="text-center">
            <h3 class="text-uppercase"><?php echo $_GET['hieusanpham']?></h3>
            </div>
            <?php
                $sql="SELECT * from tbl_hieusanpham JOIN tbl_sanpham ON tbl_hieusanpham.id_hieusanpham=tbl_sanpham.id_hieusanpham WHERE tbl_hieusanpham.tenhieusp = '".$_GET['hieusanpham']."'";
                $chon_tbl_hieusp=mysqli_query($mysqli,$sql);
                if(mysqli_num_rows($chon_tbl_hieusp)>0){
                while($row=mysqli_fetch_array($chon_tbl_hieusp)){
                    
            ?>
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
            <?php }}else{echo '<h6 class="text-center mt-3">"Sản phẩm hiện đang hết hàng"</h6>';} ?>
          </div>