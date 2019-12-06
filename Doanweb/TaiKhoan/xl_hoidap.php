<?php
    include_once("../DAO/DataProvider_PDO.php");
	session_start();
        $select_hoidap=$_POST['select_hoidap'];
        $hoten=$_POST['hoten'];
        $dienthoai=$_POST['dienthoai'];
        $noidung=$_POST['noidung'];
        $traloi=0;
    if(isset($_SESSION['MaKH'])){
        $makh=$_SESSION['MaKH'];
    }
    else{
        $makh='Khách vãn lai';
    }
        include_once("../DAO/DataProvider_PDO.php");
        $gopy =DataProvider_PDO::ExecuteQuery("INSERT INTO dbo_hoidap(MaKH, HoTen, DienThoai, ChuDe, NoiDung,TraLoi) VALUES ('$makh','$hoten','$dienthoai','$select_hoidap','$noidung','$traloi')") or die ("Lỗi truy vấn đến bảng hỏi đáp");
        echo "<script> alert('Chúng tôi sẽ sớm giải đáp thắc mắc cho quý khách!'); </script>";
        echo "<script> window.location = 'Home.php'; </script>";
?>