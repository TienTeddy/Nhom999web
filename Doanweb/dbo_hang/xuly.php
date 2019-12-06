<?php
    session_start();
    $id=$_GET['id'];
    if($id=="add"){
      echo "<form id='form_input_add'>
                <table>
                    <tr>
                        <td>Mã Hãng:</td><td>Tên Hãng</td>
                    <tr>
                    <tr>
                        <td><input name='mahangadd' /></td><td><input name='tenhangadd' /> <button tyle='submit' id='add'>Add</button></td>
                    </tr>
                </table>
                </form>";
                echo "<div id='content_add'><div>";?>
            <script type="text/javascript">
            $(document).ready(function()
            { 
            var submit = $("button[id='add']");

          submit.click(function()
          {
            var mh = $("input[name='mahangadd']").val();
            var th = $("input[name='tenhangadd']").val();

            //Kiểm tra xem trường đã được nhập hay chưa
            if(mh == ''||th == ''){
              alert('Vui lòng nhập đầy đủ thông tin!');
              return false;
            }
            //Lấy toàn bộ dữ liệu trong Form
            var data_capnhat = $('form#form_input_add').serialize();
          
            //Sử dụng phương thức Ajax.
            $.ajax({
                  type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                  url : '../dbo_hang/xl_add.php', //gửi dữ liệu sang trang data.php
                  data : data_capnhat, //dữ liệu sẽ được gửi
                  success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                            { 
                              if(data == 'false') 
                              {
                                alert('Không thể cập nhật tài khoản!');
                              }else{
                                $('#content_add').html(data); 
                              }
                            }
                  });
                  return false;
            });
        });
</script>
    <?php }
    include_once("../DAO/DataProvider_PDO.php"); $i=1;
    $h1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_hang") or die("Lỗi truy vấn đến bảng hãng");
    while($h = $h1->fetch()){
        if($id==$h['MaHang']){ $_SESSION['mm']=$id;
            echo "<form id='form_input_update'>
                    <table>
                        <tr>
                            <td>Mã Hãng:</td><td>Tên Hãng</td>
                        <tr>
                        <tr>
                            <td><input name='mahangcn' value='".$h['MaHang']."'/></td><td><input name='tenhangcn' value='".$h['TenHang']."'/> <button tyle='submit' id='update'>Update</button></td>
                        </tr>
                    </table>

                </form>";
                echo "<div id='content_update'><div>";?>
            <script type="text/javascript">
            $(document).ready(function()
            { 
            var submit = $("button[id='update']");

          submit.click(function()
          {
            var mh = $("input[name='mahangcn']").val();
            var th = $("input[name='tenhangcn']").val();

            //Kiểm tra xem trường đã được nhập hay chưa
            if(mh == ''||th == ''){
              alert('Vui lòng nhập đầy đủ thông tin!');
              return false;
            }
            //Lấy toàn bộ dữ liệu trong Form
            var data_capnhat = $('form#form_input_update').serialize();
          
            //Sử dụng phương thức Ajax.
            $.ajax({
                  type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                  url : '../dbo_hang/xl_edit.php', //gửi dữ liệu sang trang data.php
                  data : data_capnhat, //dữ liệu sẽ được gửi
                  success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                            { 
                              if(data == 'false') 
                              {
                                alert('Không thể cập nhật tài khoản!');
                              }else{
                                $('#content_update').html(data); 
                              }
                            }
                  });
                  return false;
            });
        });
</script>

<?php        }
      else if($id==$h['TenHang']){ //xóa
        $x=$h['MaHang'];
        $xoa_chitiethd=DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_sanpham WHERE MaHang='$x'");
        while($xoa_ne = $xoa_chitiethd->fetch()){
          $msp=$xoa_ne['MaSP'];
          $xoa_ne= DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_chitiethd WHERE MaSP='$msp'");
        }
        $xoa_sp= DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_sanpham WHERE MaHang='$x'") or die("Lỗi truy vấn đến bảng sản phẩm");
        $xoa= DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_hang WHERE TenHang='$id'") or die("Lỗi truy vấn đến bảng hãng");
        if($xoa){
            echo "<script>alert('Delete thành công!')</script>"; echo "<script>location.reload();</script>";
        }
        else { echo "<script>alert('Delete không thành công!')</script>"; echo "<script>location.reload();</script>"; }
      }
    


    }
?>