<main class="container">
    <?php
        if(isset($_GET['action']) && isset($_GET['query'])){
            $tam=$_GET['action'];
            $query=$_GET['query'];
        }
        else{
            $tam="";
            $query="";
        }
        if($tam=="quanlydanhmucsanpham" && $query=='themdanhmuc'){
            include('modules/quanlydanhmucsp/them.php');
            include('modules/quanlydanhmucsp/lietke.php');
        }
        if($tam=="quanlydanhmucsanpham" && $query=='suadanhmuc'){
            include('modules/quanlydanhmucsp/sua.php');
        }
        if($tam=="quanlysanpham" && $query=='themsanpham'){
            include('modules/quanlysp/them.php');
            include('modules/quanlysp/lietke.php');
        }
        if($tam=="quanlysanpham" && $query=='suasanpham'){
            include('modules/quanlysp/sua.php');
        }
        if($tam=="quanlyhieusanpham" && $query=='themhieusanpham'){
            include('modules/quanlyhieusp/them.php');
            include('modules/quanlyhieusp/lietke.php');
        }
        if($tam=="quanlyhieusanpham" && $query=='suahieusanpham'){
            include('modules/quanlyhieusp/sua.php');
        }
        if($tam=="quanlydonhang"&&$query=='hienthi'){
            include('modules/quanlydonhang/lietke.php');
        }
        if($tam=="quanlydonhang"&&$query=='suadonhang'){
            include('modules/quanlydonhang/sua.php');
        }
        if($tam=="quanlytaikhoan"&&$query=='hienthi'){
            include('modules/quanlytaikhoan/lietke.php');
        }
        if($tam=="timkiem"&&$query=='hienthi'){
            include('modules/quanlytaikhoan/lietke.php');
        }
        if(isset($_GET['search_query'])){
            include('modules/quanlysp/timkiem.php');
        }
        // else{
        //     include('modules/dashboard.php');
        // }
    ?>
</main>