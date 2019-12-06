<?php
    session_start();
    $mahang1=$_POST['mahangadd'];
    $tenhang1=$_POST['tenhangadd'];
    include_once("../DAO/DataProvider_PDO.php");

        $add= DataProvider_PDO::ExecuteQuery("INSERT INTO dbo_hang(MaHang,TenHang) VALUES ('$mahang1','$tenhang1')") or die("Lỗi truy vấn đến bảng hãng");
        if($add){
            echo "<script>alert('Add thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
        else { echo "<script>alert('Add không thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
?>