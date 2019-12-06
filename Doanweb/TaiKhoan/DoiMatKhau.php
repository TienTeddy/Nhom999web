<?php
	  include_once("../DAO/DataProvider_PDO.php");
      session_start();
      
      $passwordold=$_POST['txtpasswordold'];
	    $passwordnew=$_POST['txtpasswordnew'];

	    $l=$_SESSION['UserName'];
      $ll=$_SESSION['PassWord'];
      
	  	if($passwordold!=$ll){ 
				echo "<script>alert('Vui lòng nhập đúng mật khẩu!')</script>" ;
				echo "Vui lòng nhập đúng mật khẩu!";
			}
	  else {
			if($passwordold==$passwordnew){
				echo "Mật khẩu cũ phải khác mật khẩu mới!" ;
			}
			else{
				$dk= DataProvider_PDO::ExecuteQuery("UPDATE dbo_khachhang SET PassWord='$passwordnew' WHERE UserName='$l'") or die("Không thể thay đổi password");
				if($dk){
					echo "<script>alert('Đổi mật khẩu thành công!')</script>" ;
					echo "<script> window.location = 'Home.php'; </script>";
				}
			}
	  }
      
      
?>