<?php
    session_start();
    $ma=$_POST['masp'];
    $hang=$_POST['hangsp'];
    $ten=$_POST['tensp'];
    $gia=$_POST['giasp'];
    $thongtin=$_POST['thongtinsp'];
    $hinhanh=$_POST['hinhanhsp'];
    $soluong=$_POST['soluongsp'];

    include_once("../DAO/DataProvider_PDO.php");
    if(isset($_SESSION['aa'])) {
        $mm=$_SESSION['aa'];
        $capnhat= DataProvider_PDO::ExecuteQuery("UPDATE dbo_sanpham SET MaSP='$ma',MaHang='$hang',TenSP='$ten',GiaPham='$gia',ThongTin='$thongtin',Images='$hinhanh',SoLuong='$soluong' WHERE MaSP='$mm'") or die("Lỗi truy vấn đến bảng hãng");
        if($capnhat){
            echo "<script>alert('Update thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
        else { echo "<script>alert('Update không thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
    }
?>