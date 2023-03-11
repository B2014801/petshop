<?php
    include('../../config/config.php');
    if(isset($_GET['id_taikhoan'])){
        $sql="SELECT hinhanh FROM tbl_taikhoan WHERE id_taikhoan='".$_GET['id_taikhoan']."'";
        $chon_tbl_taikhoan=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_array($chon_tbl_taikhoan);
        if($row['hinhanh']!=''){
            unlink('../../../pages/main/quanlytaikhoan/uploads/'.$row['hinhanh'].'');
        }
        $sql2="DELETE  FROM tbl_taikhoan WHERE id_taikhoan='".$_GET['id_taikhoan']."'";
        mysqli_query($mysqli,$sql2);
        header('Location:../../index.php?action=quanlytaikhoan&query=hienthi');
    }
?>