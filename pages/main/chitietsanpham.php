<?php
  
  //hien thi chi tiet sanpham
  $sql="SELECT * FROM tbl_sanpham where id_sanpham='".$_GET['sanpham']."'";
  $sql_sanpham=mysqli_query($mysqli,$sql);
  while($row = mysqli_fetch_array($sql_sanpham)){
    if(isset($_GET['them-thanhcong'])){
      echo '<div class="container ml-4"><h5 class="text-left my-2" style ="color:#37e32a;"><i class="fa-solid fa-check"></i>'.$row['tensp'].' đã được thêm vào giỏ hàng</h5></div>';
    }
?>
<section class="mx-5">
  <section>
    <div class="row mb-3">
      <div class="col-md-5 col-12">
        <div class="card text-center border-0">
          <div class="mt-2" style="text-align: left;">
              <img class="img-fluid" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanhsp']; ?>" alt="book1" style="width:500px;height: 400px;">
          </div>
          <div class="card-body">
          </div>
        </div>
      </div>
        <div class="col-md-7 col-12 pl-0 ">
            <div class="row">
        <form  action="pages/main/xulygiohang.php?id_sanpham=<?php echo $row['id_sanpham']; ?>" method="POST">
                <h2 class="text-uppercase"><?php  echo $row['tensp'] ?></h2>
            </div>
            <div class="row">
                <h2 class="text-danger text-uppercase"><?php echo  $row['giasp'].'₫' ?></h2>
            </div>
            <div class="mt-4">
                    <div class="d-flex">
                        <label class=" d-inline mt-2" for="">Số lượng:</label>
                        <div class="add-minus  d-flex mx-1 minus-and-plus">
                          <button type="text" class="minus-sp congtru  bg-light border border-light-subtle" id="minus-sp">-</button>
                          <input class="text-center bg-light border border-light-subtle" type="text" name="soluong" id="amount" data-id="<?php echo $row['id_sanpham']?>" size="2" value="1" style="outline: none;">
                          <button class="plus-sp congtru bg-light border border-light-subtle" id="plus-sp">+</button>         
                        </div>
                    </div>
                    <div class="mt-3">
                      <label for="" class="mb-0">Kho: <?php echo $row['soluongsp'] > 0 ? $row['soluongsp']: '<span class="text-danger font-weight-bold">Sản phẩm hiện đang hết hàng</span>'; ?></label>
                    </div>
                    <div class="mt-3"><p><b>Lưu ý</b>: Giá sản phẩm có thể thay đổi theo từng thời điểm. <span class="text-primary font-weight-bold">Kết Bạn Zalo</span> hoặc <span class="text-danger font-weight-bold">Gọi Hotline</span> để xem thêm hình ảnh/video chi tiết.</p></div>
                    <div class="d-flex mt-3">
                        <button class="btn btn-lg btn-primary text-white ml-0" type="submit" name="themvaogio">Thêm vào giỏ</button>
                    </div>
        </form>
            </div>
        </div>
    </div>
  </section>
      
  <section>
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Mô tả
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p><b><?php echo $row['tensp'].' </b>',$row['motasp'] ?></p>
            <p class="text-center"><b>Quyền lợi có được khi mua <?php echo $row['tensp']  ?> tại Pet Shop.</b></p>
            <ol>
              <li>Bảo hành thuần chủng trọn đời.</li>
              <li>Bảo hành bệnh truyền nhiễm nguy hiểm ở chó là Care và Parvo 7 ngày đầu về nhà mới. Ngoài ra, quý khách có thể mua thêm gói bảo hiểm sức khỏe 1 năm nếu có nhu cầu. (Thú cưng là động vật sống, nhạy cảm với môi trường sống, thức ăn… bởi vậy hãy chăm sóc theo hướng dẫn của PetHouse hướng dẫn nhé)</li>
              <li>Miễn phí vận chuyển toàn quốc</li>
              <li>Giảm giá 10% cho các lần mua thú cưng tiếp theo.</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            Đánh giá
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse " aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body mt-3">
            <h5 class="text-center">Nhận xét về <?php echo $row['tensp']  ?></h5>
            <?php }?>
            <!-- <div class="form-group">
              <label class="form-check-label" for=""><b>Nhận xét *</b></label>
              <textarea class="form-control" name="" id="" cols="30" rows="6"></textarea>
            </div>
           
            <div class="form-inline ">
                <div class="form-group col-sm-6 pl-md-0 pl-0  ">
                  <label for="form-check-label"><b>Tên</b></label>
                  <input type="text" class="form-control w-100 mt-1" placeholder="Nhập tên của bạn">
                </div>
                <div class="form-group col-sm-6 pr-md-0 pr-sm-0 pl-0 ">
                  <label for="form-check-label"><b>Email *</b></label>
                  <input type="text" class="form-control w-100 mt-1" placeholder="Nhập Email của bạn">
                </div>
                <div class="my-3">
                  <input type="checkbox">
                  <b>Lưu tên và email của tôi </b>       
                </div>
                <div class="col-12 pl-0">
                  <button class="btn btn-primary" type="submit">GỬI ĐI</button>
                </div>
            </div> -->
            <?php
              $id_sanpham=$_GET['sanpham'];
              $sql="SELECT * FROM tbl_binhluan a JOIN tbl_taikhoan b ON a.id_taikhoan=b.id_taikhoan  WHERE a.id_sanpham='$id_sanpham'";
              $binhluan=mysqli_query($mysqli,$sql);
              while($row=mysqli_fetch_array($binhluan)){
            ?>
            <div class="card-comment w-100">
              <div class="d-flex">
                  <div>
                      <img src="./pages/main/quanlytaikhoan/uploads/<?php echo $row['hinhanh']!=''? $row['hinhanh'] :'user.png' ?>" width="40" class="rounded-circle mt-2">
                  </div>
                  <div class="col-10">
                      <div class="comment-box">
                          <h6><?php echo $row['tenkhachhang'] ?></h6>
                          <div class="rating-other-user  d-inline-block w-100"> 
                              <?php for($i=0;$i<$row['so_sao'];$i++){ ?>
                                  <i class="fa-solid fa-star" style="color: #ff0000;"></i>
                              <?php }?>
                              <?php for($i=0;$i<5-$row['so_sao'];$i++){ ?>
                                  <i class="fa-sharp fa-regular fa-star" style="color: #ff0000;"></i>
                              <?php }?>
                          </div>
                          <p class="mb-0"><?php echo $row['ngay_binhluan'] ?></p>
                          <p class="mb-0"><?php echo $row['noidung'] ?></p>
                      </div>
                  </div>
              </div>
          </div>

          <?php }?>
            <form action="pages/main/binhluan.php?id_sanpham=<?php echo $_GET['sanpham'] ?>" method="POST" >
            <div class="card-comment">
              <div class="d-flex">
                <?php
                
                 ?>
                  <div>
                      <img src="./pages/main/quanlytaikhoan/uploads/<?php
                        // neu khong co hinh anh (khong dang nhap thi hien thi hinh anh mac dinh)
                        if (isset($_SESSION['ktradangnhap'])) {
                        $sql2="SELECT * FROM tbl_taikhoan where id_taikhoan='".$_SESSION['ktradangnhap']."'";
                        $sth=mysqli_query($mysqli,$sql2);
                        $row2=mysqli_fetch_array($sth);
                        echo $row2['hinhanh']!="" ? $row2['hinhanh']:'user.png';   }else echo 'user.png'?>" 
                        width="70" class="rounded-circle mt-2">
                  </div>
                  <div class="col-10">
                      <div class="comment-box ml-2">
                          <h4>Thêm bình luận</h4>
                          <div class="rating"> 
                              <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                              <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                              <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                              <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                              <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                          </div>
                          <div class="comment-area">
                              <textarea class="form-control" name="noidung" placeholder="Bạn cảm thấy sản phẩm này thế nào?" rows="3"></textarea>
                          </div>
                          <div class="comment-btns mt-2">
                              <!-- <div class="row"> -->
                                  <!-- <div class="col-6"> -->
                                      <div class="text-left">
                                      <button class="btn btn-success" name="thembinhluan" type="submit">GỬI</button>      
                                      </div>
                                  <!-- </div> -->
                              <!-- </div> -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          </form>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            Cảm nhận của khách hàng
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
        </div>
      </div>
    </div>
  </section>
</section>