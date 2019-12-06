<?php
        include_once("../DAO/DataProvider_PDO.php");
        session_start();

        $username=$_POST['txttaikhoan_ky'];
        $password=$_POST['txtmatkhau_ky'];
        $name=$_POST['txtten_ky'];
        $diachi=$_POST['txtdiachi_ky'];
        $sdt=$_POST['txtdienthoai_ky'];
        $email=$_POST['txtemail_ky'];

        if($username=="" || $password=="" || $name==""|| $diachi=="" || $sdt=="" || $email==""){
            echo "<script>alert('Vui lòng nhập đúng thông tin!')</script>" ;
            echo "Vui lòng nhập đầy đủ thông tin!";
        }

        else{ 
        $ma="M"."$username";
        $dk= DataProvider_PDO::ExecuteQuery("INSERT INTO dbo_khachhang(MaKH,UserName,PassWord,HoTen,DiaChi,DienThoai,Email) VALUES ('$ma','$username','$password','$name','$diachi','$sdt','$email')") or die("Không thể Thêm khách hàng");
            if($dk){
                echo "<script>alert('Đăng ký thành công!')</script>" ;
                echo "<script> window.location = 'Home.php'; </script>";
            }
        }
?>