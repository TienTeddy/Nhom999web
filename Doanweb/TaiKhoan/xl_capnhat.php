<?php
	include_once("../DAO/DataProvider_PDO.php");
	session_start();

	$name=$_SESSION['UserName'];

	$hoten=$_POST['hotencn'];
	$diachi=$_POST['diachicn'];
	$sdt=$_POST['sdtcn'];
	$email=$_POST['emailcn'];

	$capnhat= DataProvider_PDO::ExecuteQuery("UPDATE dbo_khachhang SET HoTen='$hoten' , DiaChi='$diachi' , DienThoai='$sdt' , Email='$email' WHERE UserName='$name'") or die("Không thể Cập nhật do lỗi truy vấn");

	$sql=DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_khachhang WHERE HoTen='$hoten'");

	if($capnhat){
	echo "<script>alert('Cập nhật thành công!')</script>" ;
	$rs= $sql->fetch(PDO::FETCH_ASSOC); //lấy đưa ra 1 row

	$tk=$rs['UserName'];
	$pass=$rs['PassWord'];
	$makh=$rs['MaKH'];
	$pl=$rs['Loai'];
	$name1=$rs['HoTen'];
	$dc=$rs['DiaChi'];
	$dt=$rs['DienThoai'];
	$email=$rs['Email'];

	$_SESSION['UserName']=$tk;
	$_SESSION['MaKH']=$makh;
	$_SESSION['Loai']=$pl;
	$_SESSION['HoTen']=$name1;
	$_SESSION['PassWord']=$pass;
	$_SESSION['DiaChi']=$dc;
	$_SESSION['DienThoai']=$dt;
	$_SESSION['Email']=$email;
	echo "<script> window.location = 'Home.php'; </script>";
	}
      
      
?>
