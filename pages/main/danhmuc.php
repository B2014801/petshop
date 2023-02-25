<div class="row card-group mx-3 mt-2">
            <div class="text-center">
            <h3 class="text-uppercase"><?php echo $_GET['danhmuc']?></h3>
            </div>
            <?php
                $sql="SELECT * from tbl_hieusanpham where tendanhmuc='".$_GET['danhmuc']."' ";
                $chon_tbl_hieusp=mysqli_query($mysqli,$sql);
                while($row=mysqli_fetch_array($chon_tbl_hieusp)){
            ?>
            <div class="col-sm-4 col-md-3 col-lg-3 col-6 mb-3">
              <a href="index.php?danhmuc=<?php echo $row['tendanhmuc'] ?>&hieusanpham=<?php echo $row['tenhieusp'] ?>" class="text-dark text-decoration-none">
              <div class="card position-relative">
                <img width="310px" height="250px" src="admincp/modules/quanlyhieusp/uploads/<?php echo $row['anhhieusanpham']; ?>"  class="card-img-top" alt="#">
             
                <div class="card-body text-center">
                  <h5 class="card-title"><?php echo $row['tenhieusp'] ?></h5>
                </div>
              </div>
              </a>
            </div>
            <?php } ?>
          </div>