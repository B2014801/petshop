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
        // else{
        //     include('modules/dashboard.php');
        // }
    ?>
</main>