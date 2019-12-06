<?php
    session_start();
    $ma=$_POST['ma'];
    $hang=$_POST['hang'];
    $ten=$_POST['ten'];
    $gia=$_POST['gia'];
    $thongtin=$_POST['thongtin'];
    $soluong=$_POST['soluong'];
    $hinhanh=$_POST['hinhanh'];

    include_once("../DAO/DataProvider_PDO.php");

        $add= DataProvider_PDO::ExecuteQuery("INSERT INTO dbo_sanpham(MaSP,MaHang,TenSP,GiaPham,ThongTin,Images,SoLuong) VALUES ('$ma','$hang','$ten','$gia','$thongtin','$hinhanh','$soluong')") or die("Lỗi truy vấn đến bảng sản phẩm");
        if($add){
            echo "<script>alert('Add thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
        else { echo "<script>alert('Add không thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
?>