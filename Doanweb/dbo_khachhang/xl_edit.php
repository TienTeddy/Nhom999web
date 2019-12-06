<?php
    session_start();
    $makh=$_POST['makh'];
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $loai=$_POST['loai'];
    $ten=$_POST['ten'];
    $diachi=$_POST['diachi'];
    $dienthoai=$_POST['dienthoai'];
    $email=$_POST['email'];
    $hinhanh=$_POST['hinhanh'];

    include_once("../DAO/DataProvider_PDO.php");
    if(isset($_SESSION['kh'])) {
        $mm=$_SESSION['kh'];
        $capnhat= DataProvider_PDO::ExecuteQuery("UPDATE dbo_khachhang SET MaKH='$makh',UserName='$user',"."PassWord='$pass',Loai='$loai',HoTen='$ten',DiaChi='$diachi',DienThoai='$dienthoai',Email='$email',Images='$hinhanh' WHERE MaKH='$mm'") or die("Lỗi truy vấn đến bảng khách hàng");
        if($capnhat){
            echo "<script>alert('Update thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
        else { echo "<script>alert('Update không thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
    }
?>