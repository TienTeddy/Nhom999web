<?php
    
	session_start();
    include_once("../DAO/DataProvider_PDO.php");
        $tk=$_POST['txtusername'];
        $mk=$_POST['txtpassword'];

        $sql=DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_khachhang WHERE UserName='$tk' and PassWord='$mk'");
        $rs= $sql->fetch(PDO::FETCH_ASSOC); //lấy đưa ra 1 row
        $tkct=$rs['UserName'];
        $mkct=$rs['PassWord'];

        if($tk!=$tkct && $mk!=$mkct){ 
            echo "<script>alert('Sai tài khoản hoặc mật khẩu!')</script>" ;
            echo "Vui lòng nhập đúng tài khoản hoặc mật khẩu!";
        }
        else{

            setcookie('user',$tk, time()+ 3600*24*30*12, '/');
            setcookie('pass',$mk, time()+ 3600*24*30*12, '/');
            
            $makh=$rs['MaKH'];
            $images=$rs['Images'];
            $pl=$rs['Loai'];
            $name=$rs['HoTen'];
            $pass=$rs['PassWord'];
            $dc=$rs['DiaChi'];
            $dt=$rs['DienThoai'];
            $email=$rs['Email'];

            $_SESSION['Images']=$images;
            $_SESSION['UserName']=$tk;
            $_SESSION['MaKH']=$makh;
            $_SESSION['Loai']=$pl;
            $_SESSION['HoTen']=$name;
            $_SESSION['PassWord']=$pass;
            $_SESSION['DiaChi']=$dc;
            $_SESSION['DienThoai']=$dt;
            $_SESSION['Email']=$email;
            echo "<script>alert('Chào mừng đến với cửa hàng di động!')</script>" ;
			echo "<script> window.location = 'Home.php'; </script>";
        }
?>