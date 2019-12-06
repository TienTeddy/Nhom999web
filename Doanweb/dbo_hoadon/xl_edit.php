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
    if(isset($_SESSION['hd'])) {
        $mm=$_SESSION['hd'];
        $capnhat= DataProvider_PDO::ExecuteQuery("UPDATE dbo_chitiethd SET MaHD='$mahd',MaKH='$makh',MaSP='$masp',NgayDat='$ngaydat',GioDat='$giodat',NoiGiao='$noigiao',TinhTrang='$tinhtrang' WHERE MaHD='$mm'") or die("Lỗi truy vấn đến bảng chi tiết hóa đơn");
        if($capnhat){
            echo "<script>alert('Update thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
        else { echo "<script>alert('Update không thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
    }
?>