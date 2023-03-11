<?php
    session_start();
    if(isset($_SESSION['dangnhap'])||isset($_SESSION['tendangnhapadmin'])){
    $mysqli = new mysqli("localhost","root","","petshop");
        //them san pham vao gio hang
        if(isset($_POST['themvaogio'])){
            if(!isset($_SESSION['ktradangnhap'])){
            header('Location : index.php?quanly=dangnhap');
            }
            if(isset($_SESSION['ktradangnhap'])){
            $user=$_SESSION['ktradangnhap'];
            $id_sanpham=$_GET['id_sanpham'] ?? '';
            $soluong=$_POST['soluong'];
            $sql="  INSERT INTO tbl_giohang (id_taikhoan, id_sanpham,soluong)
                    SELECT '$user', '$id_sanpham','$soluong' FROM DUAL
                    WHERE NOT EXISTS (SELECT id_taikhoan, id_sanpham FROM tbl_giohang 
                    WHERE id_taikhoan = '$user' AND id_sanpham = '$id_sanpham')"; //kiem tra san pham chưa co trong gio hàng thì thêm vô
            mysqli_query($mysqli,$sql);
            // hien thi thong bao them thanh cong can lay ten san pham
            $sql="SELECT tensp FROM tbl_sanpham where id_sanpham='$id_sanpham'";
            $sql_sanpham=mysqli_query($mysqli,$sql);
            $row = mysqli_fetch_array($sql_sanpham);
            header('Location:../../index.php?sanpham='.$id_sanpham.'&&them-thanhcong');
        }
        }
        
    if(isset($_SESSION['ktradangnhap'])){
    
    if(isset($_GET['id_sp_canxoa'])){
        mysqli_query($mysqli, "DELETE FROM tbl_giohang where id_sanpham='".$_GET['id_sp_canxoa']."' ");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    
    }
// xu ly don hang sử dụng session
if(isset($_GET['action'])&&$_GET['action']=='dathang'){
if(isset($_SESSION['tongtien-donhang'])&&isset($_SESSION['chitiet-donhang'])){
    $tongtien_dh=$_SESSION['tongtien-donhang'];
    $user=$_SESSION['ktradangnhap'];
    $hinhthuc=$_POST['paymentMethod'];
    $ngaydat= date('Y-m-d');
    $ngaygiao= date('Y-m-d', strtotime('+3 days'));;

    $capnhat_donhang="INSERT INTO tbl_donhang(tong_tien,id_taikhoan,trangthai_donhang,hinhthuc_thanhtoan,ngay_dathang,ngay_giao) VALUE ('$tongtien_dh','$user',0,'$hinhthuc','$ngaydat','$ngaygiao')";
    mysqli_query($mysqli,$capnhat_donhang);// thêm đơn hàng vào tbl đơn hàng
    $capnhat_chitiet_donhang;
    $max=mysqli_query($mysqli,"select max(id_donhang) from tbl_donhang");
	$row=mysqli_fetch_array($max);
    foreach ($_SESSION['chitiet-donhang'] as $item) {
        $capnhat_chitiet_donhang="INSERT INTO tbl_chitietdonhang(id_donhang,id_sanpham,soluong_sanpham) VALUE ('$row[0]','$item[id_sanpham]','$item[soluong]') ";
        mysqli_query($mysqli,$capnhat_chitiet_donhang);
    }
    // unset($_SESSION['tongtien-donhang']);
    // unset($_SESSION['chitiet-donhang']);
    // header('Location: ' . $_SERVER['HTTP_REFERER']);
    header('Location:../../index.php?goiysp');
}
}
if(isset($_POST['cap-nhat-gio-hang'])){
    $keys = array_keys($_POST);
    $user=$_SESSION['ktradangnhap'];
    // var_dump($_POST['ktra']);
    for ($i = 0; $i < count($keys)-1; $i++) {
        $key = $keys[$i];
        $value = $_POST[$key];
        // echo "Key: $key, Value: $value\n";
        $sql="UPDATE tbl_giohang SET soluong=$value WHERE id_sanpham=$key AND  id_taikhoan=$user";
        mysqli_query($mysqli,$sql);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
    }
else{
    header('Location:../../index.php?quanly=dangnhap');
}
?>