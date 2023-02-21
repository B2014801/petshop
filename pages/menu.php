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
                    <img  src="./img/logo.png" class="" alt="" width="130" height="70">
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
                    <a class="dropdown-item" href="#">Liên hệ</a>
                  </div>
                </li>
                <?php while($row=mysqli_fetch_array($chon_tbl_danhmuc)){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"  aria-haspopup="true" aria-expanded="false">
                      <?php echo $row['tendanhmuc'] ?> 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php
                     $chon_tbl_hieusp=mysqli_query($mysqli,"SELECT tendanhmuc,tenhieusp FROM tbl_hieusanpham WHERE '".$row['tendanhmuc']."'=tbl_hieusanpham.tendanhmuc");
                     while($row_hieusp=mysqli_fetch_array($chon_tbl_hieusp)){
                    ?>
                      <a class="dropdown-item" href="#"><?php echo $row_hieusp['tenhieusp']?></a>
                      <?php }}?>
                    </div>
                  </li>
              </ul>
              <form class="form-inline my-2 my-lg-0 bg-white border-0 rounded p-1">
                <input class=" border-0" type="search" placeholder="Tìm kiếm..." aria-label="Search" style="outline: none;">
                <button class="border-0 bg-white" type="submit"><i class="fa-solid fa-magnifying-glass" ></i></button>
              </form>
            </div>
            <div class="d-inline text-white">
              <a href="index.php?quanly=giohang" class="text-white mr-3"><i class="fa-solid fa-cart-shopping "></i></a>
              <?php if(isset($_SESSION['dangnhap'])){ ?>
                <?php echo isset($_SESSION['dangnhap']) ? $_SESSION['dangnhap'] :''; ?>
                <a href="index.php?action=dangxuat" class="text-decoration-none text-white" style="position: absolute; top:0;right:0;"><i class="fa-solid fa-arrow-right-from-bracket mr-3"></i>Thoát</a>
                <?php }else{ ?>
              <a href="index.php?quanly=dangnhap" class="text-white text-decoration-none"><i class="fa-solid fa-user"></i>  |</a>
              <a href="index.php?quanly=dangky" class="text-white text-decoration-none"><i class="fa-solid fa-user-plus"></i></a>
                <?php }?>
            </div>
            </div>
          </nav>
            
          <div class="collapse navbar-collapse navbar navbar-expand-lg bg-dark   py-1 " id="navbarNavDropdown">
          
              
            <ul class="navbar-nav ">
               <form class="form-inline my-2 my-lg-0 bg-white border-0 rounded p-1">
                  <div class="input-group">
                    <input class="border-0" type="search" placeholder="Tìm kiếm..." aria-label="Search" style="outline: none; width: 90%;">
                    <button class="border-0 bg-white" type="submit"><i class="fa-solid fa-magnifying-glass" ></i></button>
                  </div>
                </form>
              <li class="nav-item dropdown">
                
                <a class="nav-link-collapse text-decoration-none"  href="index.php" >
                  Trang chủ
                </a>
                <i  class="fa-solid fa-chevron-down text-white float-right" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false"></i>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Giới thiệu</a>
                  <a class="dropdown-item" href="#">Tin tức</a>
                  <a class="dropdown-item" href="#">Liên hệ</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link-collapse text-decoration-none"  href="./trangchu.html" >
                  chó cảnh
                </a>
                <i  class="fa-solid fa-chevron-down text-white float-right" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false"></i>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">chó phốc sóc</a>
                    <a class="dropdown-item" href="#">chó poodle</a>
                    <a class="dropdown-item" href="#">chó chihuahua</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link-collapse text-decoration-none"  href="./trangchu.html" >
                    mèo cảnh
                  </a>
                  <i  class="fa-solid fa-chevron-down text-white float-right" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false"></i>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Mèo anh lông ngắn</a>
                    <a class="dropdown-item" href="#">mèo anh lông dài</a>
                    <a class="dropdown-item" href="#">mèo himalaya</a>
                  </div>
                </li>
              </ul>
          </div>
