<main>
      <!-- quang cao -->
      <?php
      // if(isset($_GET['quanly'])){
      //   $tam=$_GET['quanly'];
      // }
      // else{
      //   $tam='';
      // }
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
      if($tam=='chitietsp'){
        include('main/chitietsanpham.php');
      }
      // $tam2= isset($_GET['sanpham']) ? $_GET['sanpham'] : "";
      if(isset($_GET['sanpham'])){
        include('main/sanpham.php');
      }
      if($tam==""&&!isset($_GET['sanpham'])){
        include('main/index.php');
      }
      ?>
    </main>