<?php
    session_start();
    $id=$_GET['id']; ?>
    <hr>   
<?php if($id=="add"){
        include_once("../DAO/DataProvider_PDO.php");
        $h1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_hang") or die("Lỗi truy vấn đến bảng hãng");?>
        <form id='form_input_add' enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Mã </td>
                    <td>Hãng </td>
                    <td>Tên </td>
                    <td>Giá </td>
                    <td>Thông tin </td>
                    <td>Hình ảnh </td>
                    <td>Số lượng </td>
                </tr>
                <tr>
                    <td><input name='ma' placeholder='Mã SP'/> </td>
                    <td><select name='hang'>
                        <?php while($h = $h1->fetch()) { ?>
                            <option name='hang1'><?php echo $h['MaHang'] ?></option><?php } ?>
                        </select></td>
                    <td><input name='ten' placeholder='Tên SP'/> </td>
                    <td><input name='gia' placeholder='Giá SP'/> </td>
                    <td><input name='thongtin' placeholder='Thông tin SP'/> </td>
                    <td><input name = "hinhanh" /></td>
                    <td><input name='soluong' placeholder='Số lượng SP'/> <button class='button' style='color:white;background-color:blue' type='submit' id='add'>Add</button></td>
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
            var ma = $("input[name='ma']").val();
            var hang = $("input[name='hang']").val();
            var ten = $("input[name='ten']").val();
            var gia = $("input[name='gia']").val();
            var thongtin = $("input[name='thongtin']").val();
            var hinhanh = $("input[name='hinhanh']").val();
            var soluong = $("input[name='soluong']").val();

            //Kiểm tra xem trường đã được nhập hay chưa
            if(ten == ''||gia == ''||ma == ''||hang == ''||thongtin == ''||hinhanh == ''||soluong == ''){
              alert('Vui lòng nhập đầy đủ thông tin!');
              return false;
            }
            //Lấy toàn bộ dữ liệu trong Form
            var data_capnhat = $('form#form_input_add').serialize();
          
            //Sử dụng phương thức Ajax.
            $.ajax({
                  type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                  url : '../dbo_sanpham/xl_add.php', //gửi dữ liệu sang trang data.php
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
$hg = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_hang") or die("Lỗi truy vấn đến bảng hãng");
$h11 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_sanpham") or die("Lỗi truy vấn đến bảng sản phẩm");
while($sp = $h11->fetch()){
    if($id==$sp['MaSP']){ $_SESSION['aa']=$id;?>
        <form id='form_input_update' enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Mã </td>
                    <td>Hãng </td>
                    <td>Tên </td>
                    <td>Giá </td>
                    <td>Thông tin </td>
                    <td>Hình ảnh </td>
                    <td>Số lượng </td>
                </tr>
                <tr>
                    <td><input name='masp' value='<?php echo $sp['MaSP']?>'/> </td>
                    <td><select name='hangsp'>
                        <?php while($g = $hg->fetch()) { ?>
                            <option <?php if($sp['MaHang']==$g['MaHang']) echo "selected='selected'"; ?>><?php echo $g['MaHang'] ?></option><?php } ?>
                        </select></td>
                    <td><input name='tensp' value='<?php echo $sp['TenSP']?>'/> </td>
                    <td><input name='giasp' value='<?php echo $sp['GiaPham']?>'/> </td>
                    <td><input name='thongtinsp' value='<?php echo $sp['ThongTin']?>'/> </td>
                    <td><input name = "hinhanhsp" value='<?php echo $sp['Images']?>'/></td>
                    <td><input name='soluongsp' value='<?php echo $sp['SoLuong']?>'/> <button class='button' style='color:white;background-color:blue' type='submit' id='update'>Update</button></td>
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
            var masp = $("input[name='masp']").val();
            var hangsp = $("input[name='hangsp']").val();
            var tensp = $("input[name='tensp']").val();
            var giasp = $("input[name='giasp']").val();
            var thongtinsp = $("input[name='thongtinsp']").val();
            var hinhanhsp = $("input[name='hinhanhsp']").val();
            var soluongsp = $("input[name='soluongsp']").val();

            //Kiểm tra xem trường đã được nhập hay chưa
            if(tensp == ''||giasp == ''||masp == ''||hangsp == ''||thongtinsp == ''||hinhanhsp == ''||soluongsp == ''){
              alert('Vui lòng nhập đầy đủ thông tin!');
              return false;
            }
        //Lấy toàn bộ dữ liệu trong Form
        var data_capnhat = $('form#form_input_update').serialize();
      
        //Sử dụng phương thức Ajax.
        $.ajax({
              type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
              url : '../dbo_sanpham/xl_edit.php', //gửi dữ liệu sang trang data.php
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
  else if($id==$sp['TenSP']){ // vì khóa FK_CT_SP nên xóa chitiethd trước
    $msp=$sp['MaSP'];
    $xoahd= DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_chitiethd WHERE MaSP='$msp'") or die("Lỗi truy vấn đến bảng chi tiết hóa đơn");
    $xoa= DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_sanpham WHERE TenSP='$id'") or die("Lỗi truy vấn đến bảng sản phẩ1m");
    if($xoa){
        echo "<script>alert('Delete thành công!')</script>"; echo "<script>location.reload();</script>";
    }
    else { echo "<script>alert('Delete không thành công!')</script>"; echo "<script>location.reload();</script>"; }
  }
}
?>