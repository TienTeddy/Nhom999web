<?php
include_once("../DAO/DataProvider_PDO.php");
	if($_POST['id']){
		$mahd_huy=$_POST['id'];
		
		$hd = DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_chitiethd where MaHD='$mahd_huy'") or die("Lỗi truy vấn chi tiết hóa đơn");
		
	}
?>