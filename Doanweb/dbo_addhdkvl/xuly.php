<?php
 session_start();
    $id=$_GET['id']; 

    include_once("../DAO/DataProvider_PDO.php");
    $xoa= DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_addhdkvl WHERE mahd='$id'") or die("Lỗi truy vấn đến bảng hóa đơn");
        if($xoa){
            echo "<script>alert('Delete thành công!')</script>";
            header("location: ../Home.php?");
        }
        else { echo "<script>alert('Delete không thành công!')</script>"; echo "<script>location.reload();</script>"; }
?>