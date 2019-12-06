<?php
    session_start();
    $idd=$_GET['id']; ?>
    <hr>   
<?php if($idd=="add"){
        include_once("../DAO/DataProvider_PDO.php");
        $h1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_chitiethd") or die("Lỗi truy vấn đến bảng hóa đơn");?>
        <form id='form_input_add' enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Mã HD</td>
                    <td>Mã KH</td>
                    <td>Mã SP</td>
                    <td>Ngày đặt </td>
                    
                </tr>
                <tr> <?php  $kh1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_khachhang") or die("Lỗi truy vấn đến bảng khách hành");
                            $sp1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_sanpham") or die("Lỗi truy vấn đến bảng săn phẩm");?>
                    <td><input name='mahd' placeholder='Mã hóa đơn'/> </td>
                    <td><select name='makh'>
                        <?php while($kh = $kh1->fetch()) { ?>
                            <option><?php echo $kh['MaKH'] ?></option><?php } ?>
                        </select></td>
                    <td><select name='masp'>
                        <?php while($sp = $sp1->fetch()) { ?>
                            <option ><?php echo $sp['MaSP'] ?></option><?php } ?>
                        </select></td>
                    <td><input name='ngaydat' placeholder='Ngày đặt'/></td>
                </tr>
                <tr>
                    <td>Giờ đặt</td>
                    <td>Nơi giao </td>
                    <td>Tình trạng</td>
                    <tr></td>
                </tr>
                <tr>
                    <td><input name='giodat' placeholder='Giờ đặt'/> </td>
                    <td><input name='noigiao' placeholder='Nơi giao'/> </td>
                    <td><input name='tinhtrang' placeholder='Tình trạng'/> </td>
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
            var mahd = $("input[name='mahd']").val();
            var makh = $("input[name='makh']").val();
            var masp = $("input[name='masp']").val();
            var ngaydat = $("input[name='ngaydat']").val();
            var giodat = $("input[name='giodat']").val();
            var noigiao = $("input[name='noigiao']").val();
            var tinhtrang = $("input[name='tinhtrang']").val();

            //Kiểm tra xem trường đã được nhập hay chưa
            if(mahd == ''||masp == ''||makh == ''||ngaydat == ''||giodat == ''||noigiao == ''||tinhtrang == ''){
              alert('Vui lòng nhập đầy đủ thông tin!');
              return false;
            }
            //Lấy toàn bộ dữ liệu trong Form
            var data_capnhat = $('form#form_input_add').serialize();
          
            //Sử dụng phương thức Ajax.
            $.ajax({
                  type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                  url : '../dbo_hoadon/xl_add.php', //gửi dữ liệu sang trang data.php
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
$h13 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_chitiethd") or die("Lỗi truy vấn đến bảng hóa đơn");
while($sp = $h13->fetch()){
    if($idd==$sp['MaHD']) { $_SESSION['hd']=$idd;?>
        <form id='form_input_update' enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Mã HD</td>
                    <td>Mã KH</td>
                    <td>Mã SP</td>
                    <td>Ngày đặt </td>
                </tr>
                <tr><?php $kh1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_khachhang") or die("Lỗi truy vấn đến bảng khách hành");
                          $tt = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_chitiethd") or die("Lỗi truy vấn đến bảng khách hành");
                          $sp1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_sanpham") or die("Lỗi truy vấn đến bảng săn phẩm");?>
                    <td><input name='mahd' placeholder='Mã hóa đơn' value='<?php echo $sp['MaHD'] ?>'/> </td>
                    <td><select name='makh'>
                        <?php while($kh = $kh1->fetch()) { ?>
                            <option <?php if($sp['MaKH']==$kh['MaKH']) echo "selected='selected'"; ?>><?php echo $kh['MaKH'] ?></option><?php } ?>
                        </select></td>
                    <td><select name='masp'>
                        <?php while($sp2 = $sp1->fetch()) { ?>
                            <option <?php if($sp['MaSP']==$sp2['MaSP']) echo "selected='selected'"; ?> ><?php echo $sp2['MaSP'] ?></option><?php } ?>
                        </select></td>
                    <td><input name='ngaydat' placeholder='Ngày đặt' value='<?php echo $sp['NgayDat'] ?>'/></td>
                </tr>
                <tr>
                    <td>Giờ đặt</td>
                    <td>Nơi giao </td>
                    <td>Tình trạng</td>
                    <tr></td>
                </tr>
                <tr>
                    <td><input name='giodat' placeholder='Giờ đặt' value='<?php echo $sp['GioDat'] ?>'/> </td>
                    <td><input name='noigiao' placeholder='Nơi giao' value='<?php echo $sp['NoiGiao'] ?>'/> </td>
                    <td><select name='tinhtrang'> <?php $status=$sp['TinhTrang']?>
                            <option <?php if($status=="Mới đặt") echo "selected='selected'"; ?>>Mới đặt</option>
                            <option <?php if($status=="Đã thanh toán") echo "selected='selected'"; ?>>Đã thanh toán</option>
                            <option <?php if($status=="Đã giao hàng") echo "selected='selected'"; ?>>Đã giao hàng</option>
                        </select></td>
                    <td><button style='color:white;background-color:blue' type='submit' id='update'>Update</button></td>
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
            var makh = $("input[name='makh']").val();
            var mahd = $("input[name='mahd']").val();
            var masp = $("input[name='masp']").val();
            var ngaydat = $("input[name='ngaydat']").val();
            var giodat = $("input[name='giodat']").val();
            var noigiao = $("input[name='noigiao']").val();
            var tinhtrang = $("input[name='tinhtrang']").val();

            //Kiểm tra xem trường đã được nhập hay chưa
            if(makh == ''||mahd == ''||masp == ''||ngaydat == ''||giodat == ''||noigiao == ''||tinhtrang == ''){
              alert('Vui lòng nhập đầy đủ thông tin!');
              return false;
            }
        //Lấy toàn bộ dữ liệu trong Form
        var data_capnhat = $('form#form_input_update').serialize();
        //Sử dụng phương thức Ajax.
        $.ajax({
              type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
              url : '../dbo_hoadon/xl_edit.php', //gửi dữ liệu sang trang data.php
              data : data_capnhat, //dữ liệu sẽ được gửi
              success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                        { 
                          if(data == 'false') 
                          {
                            alert('Không thể cập nhật hóa đơn!');
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
  else if($idd==$sp['GioDat']){ //xóa
    $maa=$sp['MaHD'];
    $xoa= DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_chitiethd WHERE MaHD='$maa'") or die("Lỗi truy vấn đến bảng hóa đơn");
        if($xoa){
            echo "<script>alert('Delete thành công!')</script>"; echo "<script>location.reload();</script>";
        }
        else { echo "<script>alert('Delete không thành công!')</script>"; echo "<script>location.reload();</script>"; }
      }
}
?>