<?php
    include_once("../DAO/DataProvider_PDO.php");
    session_start();

    if(isset($_SESSION['MaKH'])){
        $name=$_SESSION['HoTen'];
        $dc=$_SESSION['DiaChi'];
        $dt=$_SESSION['DienThoai'];
        $email=$_SESSION['Email'];   
    ?>
    <form id="form_input_xldonhang">
        <table>
            <h1>Xác Nhận Thanh Toán</h1>
            <tr>
            <td>Họ và tên: </td>
            <td>
                <input type="text" name="hotencn"  value='<?php echo "$name" ;?>' />
            </td>
            </tr>
            <tr>
            <td>Địa chỉ: </td>
            <td>
                <input type="text" name="diachicn" value='<?php echo "$dc" ;?>'/>
            </td>
            </tr>
            <tr>
            <td>Số điện thoại: </td>
            <td>
                <input type="text" name="sdtcn" value='<?php echo "$dt" ;?>'/>
            </td>
            </tr>
            <tr>
            <td>Email: </td>
            <td>
                <input type="text" name="emailcn" value='<?php echo "$email" ;?>'/>
            </td>
            </tr>
            <tr>
                <td>Hình thức thanh toán:</td>
                <td>
                    Thẻ<input type="radio" value='Thẻ' name="gender"/>
                    Nhận hàng<input type="radio" checked="checked" value='Nhận hàng' name="gender"/>
                </td>
            </tr>
            <tr><td><button id="xacnhan">xác nhận</button></td></tr>
        </table>
        <div id="content_donhang1"></div>
    </form>
    <script type="text/javascript">
      $(document).ready(function()
      { 
          var submit = $("button[id='xacnhan']");

          submit.click(function()
          {
            var ten = $("input[name='hotencn']").val();
            var dc = $("input[name='diachicn']").val();
            var sdt = $("input[name='sdtcn']").val();
            var email = $("input[name='emailcn']").val();
            var checkbox = document.getElementsByName("gender");

            //Kiểm tra xem trường đã được nhập hay chưa
            if(ten == ''||dc == ''||sdt == ''||email == ''){
              alert('Vui lòng nhập đầy đủ thông tin!');
              return false;
            }
            //Lấy toàn bộ dữ liệu trong Form
            var data_donhang = $('form#form_input_xldonhang').serialize();
          
            //Sử dụng phương thức Ajax.
            $.ajax({
                  type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                  url : './HoaDon/xl_mua.php', //gửi dữ liệu sang trang data.php
                  data : data_donhang, //dữ liệu sẽ được gửi
                  success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                            { 
                              if(data == 'false') 
                              {
                                alert('Không thể cập nhật tài khoản!');
                              }else{
                                $('#content_donhang1').html(data); 
                              }
                            }
                  });
                  return false;
            });
        });
</script>
   <?php }
?>