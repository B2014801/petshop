<?php
  if(isset($_POST['orderby'])){
               
    $sort=$_POST['orderby'];
    if($sort=='ASC'){
      // so sánh giá sau khi giảm
      $sort="CAST(REPLACE(tbl_sanpham.giasp, '.', '') - (tbl_sanpham.giam_gia * REPLACE(tbl_sanpham.giasp, '.', '') / 100) AS UNSIGNED) ASC";
    }
    if($sort=='DESC'){
      $sort="CAST(REPLACE(tbl_sanpham.giasp, '.', '') - (tbl_sanpham.giam_gia * REPLACE(tbl_sanpham.giasp, '.', '') / 100) AS UNSIGNED) DESC";
    }
    if($sort=='new'){
      $sort='tbl_sanpham.id_sanpham DESC';
    }
    }
    else{
      $sort='tbl_sanpham.id_sanpham DESC';
    }
    $hieusp=$_GET['hieusanpham'];
    $sql="SELECT * from tbl_hieusanpham JOIN tbl_sanpham 
    ON tbl_hieusanpham.id_hieusanpham=tbl_sanpham.id_hieusanpham 
    WHERE tbl_hieusanpham.tenhieusp ='$hieusp' ORDER BY $sort ";
    $chon_tbl_hieusp=mysqli_query($mysqli,$sql);
    if(mysqli_num_rows($chon_tbl_hieusp)>0){
?>
<div class="row card-group mx-3 mt-2">
            <div class="text-center">
            <h3 class="text-uppercase"><?php echo $_GET['hieusanpham']?></h3>
            </div>
            <form action="" method="POST" id="formsapxepsanpham">
            <div class="float-right">
              <select class="p-1" name="orderby" id="sapxepsanpham">
                  <option <?php if(isset($_POST['orderby'])) {echo $_POST['orderby']=='new'? 'selected':'';} ?> value="new">Mới nhất</option>
                  <option <?php if(isset($_POST['orderby'])) {echo $_POST['orderby']=='ASC'? 'selected':'';} ?> value="ASC">Thứ tự theo giá: Tăng dần</option>
                  <option <?php if(isset($_POST['orderby'])) {echo $_POST['orderby']=='DESC'? 'selected':'';} ?> value="DESC">Thứ tự theo giá: Giảm dần</option>
              </select>
            </div>
            </form>
            <?php
              
                while($row=mysqli_fetch_array($chon_tbl_hieusp)){
                    
            ?>
            <div class="col-sm-4 col-md-3 col-lg-3 col-6 mb-3">
              <a href="index.php?sanpham=<?php echo $row['id_sanpham']; ?>" class="text-dark text-decoration-none">
              <div class="card position-relative">
              <?php echo $row['giam_gia']>0 ? 
              '<div class="selloff">
                <h6 class="text-center m-1">'.$row['giam_gia'].'%</h6>
              </div>': '' ?>
                <img width="310px" height="250px" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanhsp']; ?>"  class="card-img-top" alt="#">
                <div class="card-body text-center">
                  <p class="mb-1"><?php echo $row['tensp']?> mã <?php echo $row['masp']?></p>
                  <h5 class="card-title">
                    <?php
                    $gia = str_replace(".", "", $row['giasp']);
                    $gia=intval($gia);
                    $gia_sau_giam=$gia-($gia*intval($row['giam_gia']))/100;
                    $gia_sau_giam= number_format($gia_sau_giam,0,'','.');
                    echo $row['giam_gia']>0 ?  '<del style="opacity:0.5;margin-right: 6px;">'.$row['giasp'].' ₫ </del><bdi class="text-danger">'.$gia_sau_giam.' ₫</bdi>' : $row['giasp'].' ₫' 
                    ?>
                  </h5>
                </div>
              </div>
              </a>
            </div>
            <?php }}else{echo '<h6 class="text-center mt-3">"Sản phẩm hiện đang hết hàng"</h6>';} ?>
          </div>
<script>
  const selectElement = document.getElementById('sapxepsanpham');
  selectElement.addEventListener('change', (event) => {
    document.getElementById('formsapxepsanpham').submit();
  });
</script>