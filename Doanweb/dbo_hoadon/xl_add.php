<?php
    session_start();
    $makh=$_POST['makh'];
    $mahd=$_POST['mahd'];
    $masp=$_POST['masp'];
    $ngaydat=$_POST['ngaydat'];
    $giodat=$_POST['giodat'];
    $noigiao=$_POST['noigiao'];
    $tinhtrang=$_POST['tinhtrang'];

    include_once("../DAO/DataProvider_PDO.php");

        $add= DataProvider_PDO::ExecuteQuery("INSERT INTO dbo_chitiethd(MaHD,MaKH,MaSP,NgayDat,GioDat,NoiGiao,TinhTrang) VALUES ('$mahd','$makh','$masp','$ngaydat','$giodat','$noigiao','$tinhtrang')") or die("Lỗi truy vấn đến bảng chi tiết hóa đơn");
        if($add){
            echo "<script>alert('Add thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
        else { echo "<script>alert('Add không thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
?>