<?php
    session_start();
    $idd=$_GET['id']; ?>
    <hr>   
<?php if($idd=="add"){
        include_once("../DAO/DataProvider_PDO.php");
        $h1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_khachhang") or die("Lỗi truy vấn đến bảng hãng");?>
        <form id='form_input_add' enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Mã KH</td>
                    <td>Tài khoản</td>
                    <td>Mật khẩu</td>
                    <td>Loại </td>
                    <td>Họ Tên</td>
                </tr>
                <tr>
                    <td><input name='makh' placeholder='Mã KH'/> </td>
                    <td><input name='user' placeholder='Tài khoản'/> </td>
                    <td><input name='pass' placeholder='Mật khẩu'/> </td>
                    <td><input name='loai' placeholder='Loại admin/user'/></td>
                    <td><input name='ten' placeholder='Họ tên'/> </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>Điện thoại</td>
                    <td>Email</td>
                    <td>Hình ảnh</td>
                    <tr></td>
                </tr>
                <tr>
                    <td><input name='diachi' placeholder='Địa chỉ'/> </td>
                    <td><input name='dienthoai' placeholder='Điện thoại'/> </td>
                    <td><input name='email' placeholder='Email'/> </td>
                    <td><input name='hinhanh' placeholder='Hình ảnh'/> </td>
                    <td><button style='color:white;background-color:blue' type='submit' id='add'>Add</button></td>
                </tr>
            </table>
        </form>
        <div id='content_add'><div>
        <script type="text/javascript">
            $(document).ready(function()
            { 
            var submit = $("button[id='add']");

          submit.click(function()
          {
            var ma = $("input[name='makh']").val();
            var user = $("input[name='user']").val();
            var pass = $("input[name='pass']").val();
            var loai = $("input[name='loai']").val();
            var ten = $("input[name='ten']").val();
            var diachi = $("input[name='diachi']").val();
            var dienthoai = $("input[name='dienthoai']").val();
            var email = $("input[name='email']").val();
            var hinhanh = $("input[name='hinhanh']").val();

            //Kiểm tra xem trường đã được nhập hay chưa
            if(ten == ''||ma == ''||user == ''||pass == ''||loai == ''||hinhanh == ''||email == ''||dienthoai == ''||diachi == ''){
              alert('Vui lòng nhập đầy đủ thông tin!');
              return false;
            }
            //Lấy toàn bộ dữ liệu trong Form
            var data_capnhat = $('form#form_input_add').serialize();
          
            //Sử dụng phương thức Ajax.
            $.ajax({
                  type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                  url : '../dbo_khachhang/xl_add.php', //gửi dữ liệu sang trang data.php
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

include_once("../DAO/DataProvider_PDO.php");
$h13 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_khachhang") or die("Lỗi truy vấn đến bảng khách hàng");
while($sp = $h13->fetch()){
    if($idd==$sp['MaKH']) { $_SESSION['kh']=$idd;?>
        <form id='form_input_update' enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Mã KH</td>
                    <td>Tài khoản</td>
                    <td>Mật khẩu</td>
                    <td>Loại </td>
                    <td>Họ Tên</td>
                </tr>
                <tr>
                    <td><input name='makh' placeholder='Mã KH' value='<?php echo $sp['MaKH']?>'/> </td>
                    <td><input name='user' placeholder='Tài khoản' value='<?php echo $sp['UserName']?>'/> </td>
                    <td><input name='pass' placeholder='Mật khẩu' value='<?php echo $sp['PassWord']?>'/> </td>
                    <td><input name='loai' placeholder='Loại admin/user' <?php if( $sp['Loai']=1 ) $s='admin'; else $s='user'; ?> value='<?php echo $s?>'/> </td>
                    <td><input name='ten' placeholder='Họ tên' value='<?php echo $sp['HoTen']?>'/> </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>Điện thoại</td>
                    <td>Email</td>
                    <td>Hình ảnh</td>
                </tr>
                <tr>
                    <td><input name = "diachi" placeholder='Địa chỉ' value='<?php echo $sp['DiaChi']?>'/></td>
                    <td><input name='dienthoai' placeholder='Điện thoại' value='<?php echo $sp['DienThoai']?>'/> </td>
                    <td><input name = "email" placeholder='Email' value='<?php echo $sp['Email']?>'/></td>
                    <td><input name='hinhanh' placeholder='Hình ảnh' value='<?php echo $sp['Images']?>'/></td>
                    <td> <button class='button' style='color:white;background-color:blue' type='submit' id='update'>Update</button></td>
                </tr>
            </table>
        </form> 
          <?php  echo "<div id='content_update'><div>";?>
        <script type="text/javascript">
        $(document).ready(function()
        { 
        var submit = $("button[id='update']");

        submit.click(function()
          {
            var ma = $("input[name='makh']").val();
            var user = $("input[name='user']").val();
            var pass = $("input[name='pass']").val();
            var loai = $("input[name='loai']").val();
            var ten = $("input[name='ten']").val();
            var diachi = $("input[name='diachi']").val();
            var dienthoai = $("input[name='dienthoai']").val();
            var email = $("input[name='email']").val();
            var hinhanh = $("input[name='hinhanh']").val();

            //Kiểm tra xem trường đã được nhập hay chưa
            if(ten == ''||ma == ''||user == ''||pass == ''||loai == ''||hinhanh == ''||email == ''||dienthoai == ''||diachi == ''){
              alert('Vui lòng nhập đầy đủ thông tin!');
              return false;
            }
        //Lấy toàn bộ dữ liệu trong Form
        var data_capnhat = $('form#form_input_update').serialize();
        //Sử dụng phương thức Ajax.
        $.ajax({
              type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
              url : '../dbo_khachhang/xl_edit.php', //gửi dữ liệu sang trang data.php
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
  else if($idd==$sp['UserName']){ //xóa
    $mkh=$sp['MaKH'];
    $xoa_xacnhan= DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_xacnhan WHERE MaKH='$mkh'");
    $xoa_chitiethd= DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_chitiethd WHERE MaKH='$mkh'");
    $xoa= DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_khachhang WHERE UserName='$idd'") or die("Lỗi truy vấn đến bảng khách hàng");
    if($xoa){
        echo "<script>alert('Delete thành công!')</script>"; echo "<script>location.reload();</script>";
    }
    else { echo "<script>alert('Delete không thành công!')</script>"; }
  }
}
?>