<?php
    session_start();
    $idd=$_GET['id']; ?>
    <hr>   
<?php
    include_once("../DAO/DataProvider_PDO.php");
    $sp1= DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_xacnhan") or die("Lỗi truy vấn đến bảng xác nhận1");
    while($sp = $sp1->fetch()) {
    if($idd==$sp['MaHD']){ //xóa
      $xoa= DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_xacnhan WHERE MaHD='$idd'") or die("Lỗi truy vấn đến bảng xác nhận2");
          if($xoa){
              echo "<script>alert('Delete thành công!')</script>"; echo "<script>location.reload();</script>";
          }
          else { echo "<script>alert('Delete không thành công!')</script>"; echo "<script>location.reload();</script>"; }
        }
    }
?>