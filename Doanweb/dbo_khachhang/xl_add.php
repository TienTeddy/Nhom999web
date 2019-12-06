<?php
    session_start();
    $makh=$_POST['makh'];
    $user=$_POST['user'];
    $ten=$_POST['ten'];
    $loai=$_POST['loai']; if($loai=='admin') $loai=1; else $loai=0;
    $diachi=$_POST['diachi'];
    $dienthoai=$_POST['dienthoai'];
    $hinhanh=$_POST['hinhanh'];
    $pass=$_POST['pass'];
    $email=$_POST['email'];

    include_once("../DAO/DataProvider_PDO.php");

        $add= DataProvider_PDO::ExecuteQuery("INSERT INTO dbo_khachhang(MaKH,UserName,PassWord,Loai,HoTen,DiaChi,DienThoai,Email,Images) VALUES ('$makh','$user','$pass','$loai','$ten','$diachi','$dienthoai','$email','$hinhanh')") or die("Lỗi truy vấn đến bảng khách hàng");
        if($add){
            echo "<script>alert('Add thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
        else { echo "<script>alert('Add không thành công!')</script>";
            echo "<script>location.reload();</script>";
        }
?>