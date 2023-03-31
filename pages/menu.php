<?php
  $sql_tbl_danhmuc="SELECT tendanhmuc FROM tbl_danhmuc";
  $chon_tbl_danhmuc=mysqli_query($mysqli, $sql_tbl_danhmuc);
  
 ?> 
<nav class="navbar navbar-expand-lg navbar-light  py-1 ">
            <div class="container-fluid position-relative p-0">
              <button class="navbar-toggler" type="button" data-pos="left" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <a href="index.php" class="mr-2 ">
                    <img  src="./img/trangchu/logo6.jpg" class="" alt="" width="130" height="70">
              </a>
            <div class="collapse navbar-collapse justify-content-between mr-3" >
            
              <ul class="navbar-nav ">
                <li class="nav-item dropdown ">
                  <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdownMenuLink" role="button"  aria-haspopup="true" aria-expanded="false">
                    Trang chủ
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php?quanly=gioithieu">Giới thiệu</a>
                    <a class="dropdown-item" href="index.php?quanly=tintuc">Tin tức</a>
                    <a class="dropdown-item" href="index.php?quanly=lienhe">Liên hệ</a>
                  </div>
                </li>
                <?php while($row=mysqli_fetch_array($chon_tbl_danhmuc)){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php?danhmuc=<?php echo $row['tendanhmuc'] ?>" id="navbarDropdownMenuLink" role="button"  aria-haspopup="true" aria-expanded="false">
                      <?php echo $row['tendanhmuc'] ?> 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php
                     $chon_tbl_hieusp=mysqli_query($mysqli,"SELECT tendanhmuc,tenhieusp FROM tbl_hieusanpham WHERE '".$row['tendanhmuc']."'=tbl_hieusanpham.tendanhmuc");
                     while($row_hieusp=mysqli_fetch_array($chon_tbl_hieusp)){
                    ?>
                      <a class="dropdown-item" href="index.php?danhmuc=<?php echo $row['tendanhmuc'] ?>&hieusanpham=<?php echo $row_hieusp['tenhieusp'] ?>"><?php echo $row_hieusp['tenhieusp']?></a>
                      <?php }}?>
                    </div>
                  </li>
              </ul>
              <form action="index.php?quanly=timkiem" class="form-inline my-2 my-lg-0 bg-white border-0 rounded p-1" method="GET">
                <div class="input-group">
                  <input class="border-0" type="search" placeholder="Tìm kiếm..." aria-label="Search" style="outline: none; width: 90%;" name="search_query">
                  <button type="submit" class="border-0 bg-white" type="submit"><i class="fa-solid fa-magnifying-glass" ></i></button>
                </div>
              </form>
            </div>
            
            <div class="d-inline text-white">
              <!-- // admin thi k hien thi gio hang -->
              <a href="index.php?quanly=giohang" class="text-white mr-3"><i class="fa-solid fa-cart-shopping "></i></a>
              <!-- xu lu nếu là tài khoản admin thì vào trang admincp còn không vào tài khoản cá nhân -->
              <?php if(isset($_SESSION['ktradangnhap'])||isset($_SESSION['tendangnhapadmin'])){ ?>
                <?php
                echo   
                '<a href="'.(isset($_SESSION['tendangnhapadmin']) ? 'admincp' : 'index.php?quanly=taikhoan').'">
                <i class="fa-solid fa-user mr-3 ml-2"></i></a>'; ?>
                <a class="text-decoration-none text-white" style="position: absolute; top:0;right:0;" data-toggle="modal" data-target="#modal-logout"><i class="fa-solid fa-arrow-right-from-bracket mr-3"></i>Thoát</a>
                  <div id="modal-logout" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content border">
                          <h4 class="text-center text-warning">Bạn có chắc muốn thoát không</h4>
                          <div class="display-inline mx-auto">
                            <a href="index.php?action=dangxuat" role="button" class="btn btn-danger mr-2" >Có</a> 
                            <a role="button" class="btn btn-danger"  data-dismiss="modal">Không</a>
                          </div>
                        </div>
                      </div>
                  </div>
                <?php }else{ ?>
              <a href="index.php?quanly=dangnhap" class="text-white text-decoration-none"><i class="fa-solid fa-user"></i>  |</a>
              <a href="index.php?quanly=dangky" class="text-white text-decoration-none"><i class="fa-solid fa-user-plus"></i></a>
                <?php }?>
            </div>
            </div>
          </nav>
          <?php  ?>

<?php
  $sql_tbl_danhmuc="SELECT tendanhmuc FROM tbl_danhmuc";
  $chon_tbl_danhmuc=mysqli_query($mysqli, $sql_tbl_danhmuc);
?> 

  <div class="collapse navbar-collapse navbar navbar-expand-lg bg-dark   py-1 " id="navbarNavDropdown">
      <ul class="navbar-nav ">
        <form action="index.php?quanly=timkiem" class="form-inline my-2 my-lg-0 bg-white border-0 rounded p-1" method="GET">
          <div class="input-group">
            <input class="border-0" type="search" placeholder="Tìm kiếm..." aria-label="Search" style="outline: none; width: 90%;" name="search_query">
            <button type="submit" class="border-0 bg-white" type="submit"><i class="fa-solid fa-magnifying-glass" ></i></button>
          </div>
        </form>
                <li class="nav-item dropdown">
                <a class="nav-link-collapse text-decoration-none"  href="index.php" >
                  Trang chủ
                </a>
                <i  class="fa-solid fa-chevron-down text-white float-right" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false"></i>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="index.php?quanly=gioithieu">Giới thiệu</a>
                  <a class="dropdown-item" href="index.php?quanly=tintuc">Tin tức</a>
                  <a class="dropdown-item" href="index.php?quanly=lienhe">Liên hệ</a>
                </div>
                </li>
                <?php while($row=mysqli_fetch_array($chon_tbl_danhmuc)){ ?>
                
                  <li class="nav-item dropdown">
                    <a class="nav-link-collapse text-decoration-none"  href="index.php?danhmuc=<?php echo $row['tendanhmuc'] ?>" >
                      <?php echo $row['tendanhmuc'] ?> 
                    </a>
                    <i  class="fa-solid fa-chevron-down text-white float-right" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php
                     $chon_tbl_hieusp=mysqli_query($mysqli,"SELECT tendanhmuc,tenhieusp FROM tbl_hieusanpham WHERE '".$row['tendanhmuc']."'=tbl_hieusanpham.tendanhmuc");
                     while($row_hieusp=mysqli_fetch_array($chon_tbl_hieusp)){
                    ?>
                      <a class="dropdown-item" href="index.php?danhmuc=<?php echo $row['tendanhmuc'] ?>&hieusanpham=<?php echo $row_hieusp['tenhieusp'] ?>"><?php echo $row_hieusp['tenhieusp']?></a>
                      <?php }}?>
                    </div>
                  </li>
              </ul>
  </div>
