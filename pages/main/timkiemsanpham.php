<div class="row card-group mx-3 mt-2">
            <div class="text-center">
            <h3 class="text-uppercase">KẾT QUẢ TÌM KIẾM CHO "<?php echo $_GET['search_query']?>"</h3>
            </div>
            <?php
                $sql="SELECT * from tbl_sanpham WHERE tensp LIKE '%".$_GET['search_query']."%'";
                $chon_tbl_sp=mysqli_query($mysqli,$sql);
                if(mysqli_num_rows($chon_tbl_sp)>0){
                while($row=mysqli_fetch_array($chon_tbl_sp)){
                    
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
            
            <?php }}else{echo '<h6 class="text-center mt-3">Không tìm thấy sản phẩm phù hợp với yêu cầu của bạn</h6>';} ?>
          </div>