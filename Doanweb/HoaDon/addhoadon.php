<?php
    include_once("../DAO/DataProvider_PDO.php");
    session_start();


    $masp=$_GET['masp_datgio'];

    $ngaydat=date('d-m-Y');
    $giodat=date('H:i:s');
    $giay=date('s');
    $phut=date('i');

    if (!isset($_SESSION['MaKH'])) { 
        $thoigiandat=$ngaydat.' '.$giodat;

        if(!isset($_COOKIE['makvl'])){

        $add_khachhang= DataProvider_PDO::ExecuteQuery("INSERT INTO dbo_khachvanlai(thoigiandat) VALUES ('$thoigiandat')") or die("Không thể Thêm khách hàng");

        $select= DataProvider_PDO::ExecuteQuery("SELECT *FROM dbo_khachvanlai ORDER BY mamay DESC LIMIT 1");
        $max1=0;
        while($mm = $select->fetch()) { $max1=$mm['mamay']; }

        setcookie('makvl',$max1, time()+ 3000, '/');

        $add_billkvl= DataProvider_PDO::ExecuteQuery("INSERT INTO dbo_addhdkvl(masp,makvl) VALUES ('$masp','$max1')") or die("Không thể Thêm bill khách hàng vãn lai");

        header("location: ../Home.php?");
        }
        else{
            $l=$_COOKIE['makvl'];

            $add_billkvl= DataProvider_PDO::ExecuteQuery("INSERT INTO dbo_addhdkvl(masp,makvl) VALUES ('$masp','$l')") or die("Không thể Thêm bill khách hàng vãn lai");
            header("location: ../Home.php?");
        }
        
    }
    else {
        $mahd= $makh.$giay.$phut;
        $makh=$_SESSION['MaKH'];
        $diachi=$_SESSION['DiaChi'];
        $noigiao=$diachi;

        // nơi giao là địa chỉ của khác hàng
        $tinhtrang="Mới Đặt";
        
        $add_hoadon= DataProvider_PDO::ExecuteQuery("INSERT INTO dbo_chitiethd (MaHD,MaKH,MaSP,NgayDat,GioDat,NoiGiao,TinhTrang) VALUES ('$mahd','$makh','$masp','$ngaydat','$giodat','$noigiao','$tinhtrang')") or die("Không thể thêm hóa đơn");
        if($add_hoadon){
              header("location: ../Home.php?");
        }
    }
    
?>