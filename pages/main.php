<main>
      <?php
      $tam=isset($_GET['quanly']) ? $_GET['quanly'] : "";
      if($tam=='dangky'){
        include("main/dangky.php");
      }
      if($tam=='dangnhap'){
        include('main/dangnhap.php');
      }
      if($tam=='giohang'){
        include('main/giohang.php');
      }
      if($tam=='tintuc'){
        include('main/tintuc.php');
      }
      if($tam=='taikhoan'){
        include('main/taikhoan.php');
      }
      if($tam=='gioithieu'){
        include('main/gioithieu.php');
      }
      if($tam=='lienhe'){
        include('main/lienhe.php');
      }
      if(isset($_GET['danhmuc'])&&!isset($_GET['hieusanpham'])){
        include('main/danhmuc.php');
      }
      if(isset($_GET['hieusanpham'])&&isset($_GET['danhmuc'])){
        include('main/sanpham.php');
      }
      if(isset($_GET['sanpham'])){
        include('main/chitietsanpham.php');
      }
      if(isset($_GET['search_query'])){
        include('main/timkiemsanpham.php');
      }
      if(isset($_GET['goiysp'])){
        include('main/goiysp.php');
      }
      // can sua
      if($tam==""&&!isset($_GET['danhmuc'])&&!isset($_GET['sanpham'])&&!isset($_GET['search_query'])&&!isset($_GET['goiysp'])){
        include('main/index.php');
      }
      ?>
    </main>