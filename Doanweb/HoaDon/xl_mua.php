<?php
    include_once("../DAO/DataProvider_PDO.php");
    session_start();
    if (isset($_SESSION['MaKH'])) {

    $makh=$_SESSION['MaKH'];

    $name=$_POST['hotencn'];
    $dc=$_POST['diachicn'];
    $sdt=$_POST['sdtcn'];
    $email=$_POST['emailcn'];
    $ht=$_POST['gender'];

    $hd2 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_chitiethd WHERE TinhTrang='Mới Đặt' and MaKH='$makh'") or die("Lỗi truy vấn chi tiết hóa đơn ");
    while($hd = $hd2->fetch()) {
        $mahd=$hd['MaHD'];
        $mua= DataProvider_PDO::ExecuteQuery("INSERT INTO dbo_xacnhan(MaHD,MaKH,HoTen,DiaChi,DienThoai,Email,HinhThuc) VALUES ('$mahd','$makh','$name','$dc','$sdt','$email','$ht')");
    }
    $hd1 = DataProvider_PDO::ExecuteQuery("UPDATE dbo_chitiethd SET TinhTrang='Đã thanh toán' WHERE MaKH='$makh'") or die("Lỗi truy vấn chi tiết hóa đơn ");
    if($mua){
            echo "<script>alert('Mua hàng thành công!');</script>" ;
            echo "<script> window.location = 'Home.php'; </script>";
        }
}
?>