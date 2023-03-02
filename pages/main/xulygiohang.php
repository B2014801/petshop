<?php
    session_start();
    $mysqli = new mysqli("localhost","root","","petshop");
    if(isset($_SESSION['ktradangnhap'])){
        if(isset($_GET['id_sp_canthem'])){
        $user=$_SESSION['ktradangnhap'];
        $id_sanpham=$_GET['id_sp_canthem'] ?? '';
        
        $sql="  INSERT INTO tbl_giohang (id_taikhoan, id_sanpham)
                SELECT '$user', '$id_sanpham' FROM DUAL
                WHERE NOT EXISTS (SELECT id_taikhoan, id_sanpham FROM tbl_giohang 
                WHERE id_taikhoan = '$user' AND id_sanpham = '$id_sanpham')"; //kiem tra san pham chưa co trong gio hàng thì thêm vô
        mysqli_query($mysqli,$sql);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    if(isset($_GET['id_sp_canxoa'])){
        mysqli_query($mysqli, "DELETE FROM tbl_giohang where id_sanpham='".$_GET['id_sp_canxoa']."' ");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
  
// Retrieve the product ID and quantity from POST data
if(isset($_POST['id_sanpham'])&&isset($_POST['soluong'])){
echo '1';
} 
}
?>