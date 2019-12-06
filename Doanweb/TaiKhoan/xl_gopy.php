<?php
    include_once("../DAO/DataProvider_PDO.php");
	session_start();
        $select_gopy=$_POST['select_gopy'];
        $tieude=$_POST['tieude'];
        $hoten=$_POST['hoten'];
        $dienthoai=$_POST['dienthoai'];
        $noidung=$_POST['noidung'];
    if(isset($_SESSION['MaKH'])){
        $makh=$_SESSION['MaKH'];
    }
    else{
        $makh='Khách vãn lai';
    }
        include_once("../DAO/DataProvider_PDO.php");
        $gopy =DataProvider_PDO::ExecuteQuery("INSERT INTO dbo_gopy(MaKH, TieuDe, HoTen, DienThoai, ChuDe, NoiDung) VALUES ('$makh','$tieude','$hoten','$dienthoai','$select_gopy','$noidung')") or die ("Lỗi truy vấn đến bảng góp ý");
        echo "<script> alert('Cảm ơn rất nhiều về sự góp ý của quý khách!'); </script>";
        echo "<script> window.location = 'Home.php'; </script>";
?>