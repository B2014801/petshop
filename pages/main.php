<main>
      <!-- quang cao -->
      <?php
      if(isset($_GET['quanly'])){
        $tam=$_GET['quanly'];
      }
      else{
        $tam='';
        include("main/index.php");
      }
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
      ?>
      
    </main>