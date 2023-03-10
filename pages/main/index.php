<section >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="./img/trangchu/anh1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./img/trangchu/anh2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./img/trangchu/anh3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </section>
      <hr>
      <section class="mx-3">
        <div> 
          <h3 class="text-center">THÚ CƯNG ĐANG BÁN</h3>
        </div>
        <div class="row card-group mx-3 mt-2">
            <div class="text-center">
            </div>
            <?php
                $sql="SELECT * from tbl_sanpham ORDER BY RAND() LIMIT 8 ";
                $chon_tbl_sp=mysqli_query($mysqli,$sql);
                while(($row=mysqli_fetch_array($chon_tbl_sp))){
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
            <?php } ?>
          </div>
      </section> 
      <HR></HR>
      <section class="mx-3">
      <div> 
          <h3 class="text-center">THÚ CƯNG MỚI NHẤT</h3>
        </div>
        <div class="row card-group mx-3 mt-2">
            <div class="text-center">
            </div>
            <?php
                $sql="SELECT * from tbl_sanpham ORDER BY id_sanpham DESC LIMIT 8 ";
                $chon_tbl_sp=mysqli_query($mysqli,$sql);
                while(($row=mysqli_fetch_array($chon_tbl_sp))){
                    
            ?>
            <div class="col-sm-4 col-md-3 col-lg-3 col-6 mb-3">
              <a href="index.php?sanpham=<?php echo $row['id_sanpham']; ?>" class="text-dark text-decoration-none">
              <div class="card position-relative">
              <div class="selloff">
                <h6 class="text-center m-1">-2%</h6>
              </div>
                <img width="310px" height="250px" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanhsp']; ?>"  class="card-img-top" alt="#">
                <div class="card-body text-center">
                  <p class="mb-1"><?php echo $row['tensp']?> mã <?php echo $row['masp']?></p>
                  <h5 class="card-title"><del style="opacity:0.5;margin-right: 6px;">12.000.000 ₫ </del><bdi class="text-danger"><?php echo $row['giasp'].' ₫' ?></bdi></h5>
                </div>
              </div>
              </a>
            </div>
            <?php } ?>
          </div>
          <hr>