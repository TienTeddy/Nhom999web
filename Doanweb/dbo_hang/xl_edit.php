<?php
    session_start();
    $mahang1=$_POST['mahangcn'];
    $tenhang1=$_POST['tenhangcn'];
    include_once("../DAO/DataProvider_PDO.php");
    if(isset($_SESSION['mm'])) {
        $mm=$_SESSION['mm'];
        $capnhat= DataProvider_PDO::ExecuteQuery("UPDATE dbo_hang SET MaHang='$mahang1',TenHang='$tenhang1' WHERE MaHang='$mm'") or die("Lỗi truy vấn đến bảng hãng");
        if($capnhat){
            echo "<script>alert('Update thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
        else { echo "<script>alert('Update không thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
    }
?>