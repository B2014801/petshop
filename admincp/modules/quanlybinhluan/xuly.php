<?php
    include('../../config/config.php');
    $id=$_GET['id_binhluan'];
    $sql="DELETE FROM tbl_binhluan where id_binhluan='$id'";
    mysqli_query($mysqli,$sql);
    header('Location:../../index.php?action=quanlybinhluan&query=hienthi');
?>