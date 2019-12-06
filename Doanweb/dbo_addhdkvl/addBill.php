<?php
    session_start();
    $makvl='';

    if(isset($_COOKIE['makvl'])) {
        $makvl=$_COOKIE['makvl'];
    }

    $hoten=$_POST['hotenModal'];
    $sdt=$_POST['sdtModal'];
    $diachi=$_POST['diachiModal'];
    $email=$_POST['emailModal'];



    include_once("../DAO/DataProvider_PDO.php");

    $mahd= DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_addhdkvl where makvl='$makvl'");
    while($hd = $mahd->fetch()) {
            //lấy mã hd
        $d=$hd['mahd'];

        $add= DataProvider_PDO::ExecuteQuery("INSERT INTO dbo_xacnhankvl(makvl,mahd,hoten,diachi,sdt,email,hinhthuc) VALUES ('$makvl','$d','$hoten','$diachi','$sdt','$email',N'Nhận hàng')") or die("Lỗi truy vấn đến bảng chi tiết hóa đơn");
    }

    if($add){
        $de1= DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_addhdkvl WHERE makvl='$makvl'");
        $de= DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_khachvanlai WHERE mamay='$makvl'");

        setcookie('makvl','', time()-3000, '/');

       echo "<script>location.reload();</script>";
    }

?>