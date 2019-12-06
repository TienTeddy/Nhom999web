<?php
	session_start();
        $noidung=$_POST['traloi'];
    if(isset($_SESSION['mmm'])){
        $cautraloi=$_SESSION['mmm'];
    }
    include_once("../DAO/DataProvider_PDO.php");
    $tl =DataProvider_PDO::ExecuteQuery("UPDATE dbo_hoidap SET TraLoi='$noidung' WHERE NoiDung='$cautraloi'") or die ("Lỗi truy vấn đến bảng hỏi đáp");
    echo "<script> alert('Trả lời thành công!'); </script>";
    echo "<script>location.reload();</script>";
?>