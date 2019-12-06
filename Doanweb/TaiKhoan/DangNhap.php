<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <style type="text/css">
    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }
    input[type=password], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }
    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
    .btn {
    display: inline-block;
    padding: 10px 18px;
    margin-bottom: 20px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    margin-left: 430px;
    margin-top: 20px;
    background: #4dff4d;
}
  #us {
      margin-left: 300px;
  }
  #us td input {
    margin-left: 20px;
  }
  </style>
</head>
<body>
<?php
    session_start();
    include_once("../DAO/DataProvider_PDO.php");
    if(isset($_SESSION['MaKH'])) {
      $ma=$_SESSION['MaKH'];
      $hoten=$_SESSION['HoTen'];
      $lienhe=$_SESSION['DienThoai'];
    }
    else {
      $hoten='';
      $lienhe='';
    }

    $gtri=$_GET['id']; //$gtri là mã của hãng đc lấy ở data
    
  if($gtri=="dangnhap"){ ?>
<strong><h3 style="text-align: center; font-size:50px">Đăng Nhập</h3></strong><br><br>
<div class="container" style="width: 70%;margin-bottom: 4%">
<form id="form_input123">
        <table id="us" style="margin-left: 20%">
              <tr>
                <td>Tên đăng nhập</td>
                <td>
                  <input class="form-control" type="text" placeholder="Enter Username" <?php if(isset($_COOKIE['user'])) echo 'value='.$_COOKIE['user']; ?> name="txtusername"  />
                </td>
              </tr>
          <tr>
              <td>Mật khẩu</td>
              <td>
                <input class="form-control" type="password" placeholder="Enter Password" <?php if(isset($_COOKIE['pass'])) echo 'value='.$_COOKIE['pass']; ?> name="txtpassword" />
              </td>
          </tr>
        </table>
  <div id="contentdn"></div>
  <button style="margin-left: 40%" class="btn" tyle='submit' id="dn">Đăng Nhập</button><br>
  <a style="margin-left: 24%;background-color: #1778d8" href="../login-with-facebook/index.php" class="btn btn-info">Đăng nhập Facebook</a>
  <a style="margin-left: 0%;background-color: #b70303" href="#" class="btn btn-danger">Đăng nhập Google</a>
</form></div>
  
<script type="text/javascript">
        $(document).ready(function()
        { 
            //khai báo biến submit form lấy đối tượng nút submit
            var submit = $("button[id='dn']");

            //khi nút submit được click
            submit.click(function()
            {
              //khai báo các biến dữ liệu gửi lên server
              var user = $("input[name='txtusername']").val(); //lấy giá trị trong input user
              var pass = $("input[name='txtpassword']").val();

              //Kiểm tra xem trường đã được nhập hay chưa
              if(user == '' || pass==''){
                alert('Vui lòng nhập đầy đủ thông tin!');
                return false;
              }
              
              //Lấy toàn bộ dữ liệu trong Form
              var datas = $('form#form_input123').serialize();
            
              //Sử dụng phương thức Ajax.
              $.ajax({
                    type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                    url : 'TaiKhoan/xl_Login.php', //gửi dữ liệu sang trang data.php
                    data : datas, //dữ liệu sẽ được gửi
                    success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                              { 
                                if(data == 'false') 
                                {
                                  alert('Không có người dùng');
                                }else{
                                  $('#contentdn').html(data); 

                                }
                              }
                    });
                    return false;
              });
          });
  </script>
<?php }
    else if($gtri=="dangky"){ ?>
<strong><h3 style="text-align: center; font-size:50px">Đăng Ký Thành Viên</h3></strong>
<div class="container" style="text-align: center;width: 80%">
<form id="form_input_dangky">
  <table>
    <tr>
      <td>Tài khoản: </td>
      <td>
        <input class="form-control" type="text" name="txttaikhoan_ky"  />
      </td>
    </tr>
    <tr>
      <td>Mật khẩu: </td>
      <td>
        <input class="form-control" type="password" name="txtmatkhau_ky" />
      </td>
    </tr>
    <tr>
      <td>Họ và tên: </td>
      <td>
        <input class="form-control" type="text" name="txtten_ky"/>
      </td>
    </tr>
    <tr>
      <td>Đại chỉ: </td>
      <td>
        <input class="form-control" type="text" name="txtdiachi_ky"/>
      </td>
    </tr>
    <tr>
      <td>Điện thoại: </td>
      <td>
        <input class="form-control" type="text" name="txtdienthoai_ky"/>
      </td>
    </tr>
    <tr>
      <td>Email: </td>
      <td>
        <input class="form-control" type="text" name="txtemail_ky"/>
      </td>
    </tr>
  </table>
  <div id="content_dangky"></div> <br>
  <button tyle='submit' id='dangky'>Đăng Ký</button>
</form>
</div>
<script type="text/javascript">
      $(document).ready(function()
      { 
          var submit = $("button[id='dangky']");

          submit.click(function()
          {
            var tk = $("input[name='txttaikhoan_ky']").val(); //lấy giá trị trong input user
            var mk = $("input[name='txtmatkhau_ky']").val();
            var ten = $("input[name='txtten_ky']").val();
            var dc = $("input[name='txtdiachi_ky']").val();
            var dt = $("input[name='txtdienthoai_ky']").val();
            var email = $("input[name='txtemail_ky']").val();

            //Kiểm tra xem trường đã được nhập hay chưa
            if(tk == ''||mk == ''||ten == ''||dc == ''||dt == ''||email == ''){
              alert('Vui lòng nhập đầy đủ thông tin người dùng!');
              return false;
            }
    
            //Lấy toàn bộ dữ liệu trong Form
            var data_dangky = $('form#form_input_dangky').serialize();
          
            //Sử dụng phương thức Ajax.
            $.ajax({
                  type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                  url : './TaiKhoan/xl_AddAccount.php', //gửi dữ liệu sang trang data.php
                  data : data_dangky, //dữ liệu sẽ được gửi
                  success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                            { 
                              if(data == 'false') 
                              {
                                alert('Không thể thêm tài khoản!');
                              }else{
                                $('#content_dangky').html(data); 
                              }
                            }
                  });
                  return false;
            });
        });
</script>
<?php }
  else if($gtri=="dangxuat"){ 
    session_destroy();
    
    echo "<script> window.location = 'Home.php'; </script>";
 } 
  else if($gtri=="doimatkhau"){ ?>
<strong><h3 style="text-align: center; font-size:50px">Đổi mật khẩu</h3></strong>
    <form id="form_input_doimatkhau">
      <table>  
        <tr>
          <td>Tài khoản:</td><td><input type="text" readonly="readonly"  value='<?php echo $_SESSION['HoTen']?>'/></td>
        </tr>
        <tr>
          <td>Mật khẩu cũ:</td><td><input type="password" name="txtpasswordold"/></td>
        </tr>
        <tr>
          <td>Mật khẩu mới:</td><td><input type="password" name="txtpasswordnew"/></td>
        </tr>
    </table>
      <br/>
      <div id="content_doimatkhau"></div>
      <button type="submit" id="doimatkhau">Đổi mật khẩu</button>
    </form>
    <script type="text/javascript">
      $(document).ready(function()
      { 
          var submit = $("button[id='doimatkhau']");

          submit.click(function()
          {
            var mkc = $("input[name='txtpasswordold']").val();
            var mkm = $("input[name='txtpasswordnew']").val();

            //Kiểm tra xem trường đã được nhập hay chưa
            if(mkc == ''||mkm == ''){
              alert('Vui lòng nhập đầy đủ thông tin!');
              return false;
            }
            //Lấy toàn bộ dữ liệu trong Form
            var data_dangky = $('form#form_input_doimatkhau').serialize();
          
            //Sử dụng phương thức Ajax.
            $.ajax({
                  type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                  url : './TaiKhoan/DoiMatKhau.php', //gửi dữ liệu sang trang data.php
                  data : data_dangky, //dữ liệu sẽ được gửi
                  success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                            { 
                              if(data == 'false') 
                              {
                                alert('Không thể đổi mật khẩu tài khoản!');
                              }else{
                                $('#content_doimatkhau').html(data); 
                              }
                            }
                  });
                  return false;
            });
        });
</script>
<?php }
    else if($gtri=="capnhat"){ 
      $ht=$_SESSION['HoTen'];
      $dc=$_SESSION['DiaChi'];
	    $dt=$_SESSION['DienThoai'];
      $email=$_SESSION['Email'];
    ?>
<strong><h3 style="text-align: center; font-size:50px">Cập Nhật Tài Khoản</h3></strong>
  <form id="form_input_capnhat">
  <table>
    <tr>
      <td>Họ và tên: </td>
      <td>
        <input type="text" name="hotencn"  value='<?php echo "$ht" ;?>' />
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
  </table>
  <div id="content_capnhat"><div>
<button tyle='submit' id='capnhat'>Cập Nhật</button>
</form>
    <script type="text/javascript">
      $(document).ready(function()
      { 
          var submit = $("button[id='capnhat']");

          submit.click(function()
          {
            var ten = $("input[name='hotencn']").val();
            var dc = $("input[name='diachicn']").val();
            var sdt = $("input[name='sdtcn']").val();
            var email = $("input[name='emailcn']").val();

            //Kiểm tra xem trường đã được nhập hay chưa
            if(ten == ''||dc == ''||sdt == ''||email == ''){
              alert('Vui lòng nhập đầy đủ thông tin!');
              return false;
            }
            //Lấy toàn bộ dữ liệu trong Form
            var data_capnhat = $('form#form_input_capnhat').serialize();
          
            //Sử dụng phương thức Ajax.
            $.ajax({
                  type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                  url : './TaiKhoan/xl_capnhat.php', //gửi dữ liệu sang trang data.php
                  data : data_capnhat, //dữ liệu sẽ được gửi
                  success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                            { 
                              if(data == 'false') 
                              {
                                alert('Không thể cập nhật tài khoản!');
                              }else{
                                $('#content_capnhat').html(data); 
                              }
                            }
                  });
                  return false;
            });
        });
</script>
   <?php }
 else if($gtri=="donhang" || $gtri=="giohang"){ ?>
  <strong><h3 style="text-align: center; font-size:50px">Đơn hàng</h3></strong>

  <?php 
    if(isset($_COOKIE['makvl'])) {
      $makvl=$_COOKIE['makvl'];
      include_once("../DAO/DataProvider_PDO.php");
      $a="";
      $tong=0;
      
      $makv1=DataProvider_PDO::ExecuteQuery("select *from dbo_addhdkvl where makvl='$makvl'");

      while ($v=$makv1->fetch()) { 
        $a=$v['masp'];
        $hdbill=DataProvider_PDO::ExecuteQuery("select * from dbo_sanpham where masp='$a'");
        $thoigian=DataProvider_PDO::ExecuteQuery("select thoigiandat from dbo_khachvanlai where mamay='$makvl'");
      while ($kk=$hdbill->fetch()) {
        while ($tt=$thoigian->fetch()) {
      ?>
      <div class='container' style="width:100%;padding: 3%">
            <div style="float: initial;border-radius: 1% 2% 1% 2%;width: 300px;height: 350px;display: inline-block;">
              <img src="./images/<?php echo $kk["Images"]?>.jpg" style='width: 296px;height: 347px' class="hinh" />
            </div>
            <div style="margin-left: 3%;float: initial;position: absolute;display: inline-block;">
              <h2>   <?php echo $kk['TenSP'] ?></h2>
              <br><br>
              <p>Hãng:  <?php echo $kk['MaHang'] ?></p>
              <p style="width: 70%">Thông tin:  <?php echo $kk['ThongTin'] ?><p>
              <p>Giá:  <?php echo number_format($kk["GiaPham"],0,',','.'); $tong+=$kk['GiaPham'] ?> VNĐ</p>
              <p>Thời gian đặt:  <?php echo $tt['thoigiandat'] ?></p>
              <a style='background-color: #ba0707' href='./dbo_addhdkvl/xuly.php?id=<?php echo $v['mahd'] ?>' id='huybill' class="btn btn-danger">Hủy</a>
            </div>

      </div>
    <?php } } } ?>
      <div style="float: right;margin-right: 1%"> 
        <input type="input" style="width: 170px;;float: right;" value="<?php echo number_format($tong,0,',','.');?>  VNĐ" readonly class="form-control" name="sumbill"><br>
        <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success">Đặt hàng</button>
      </div>
  <?php }
  else {
  ?>
  
  <form id="form_donhang">
  <?php
      $donhang=$gtri; // donhang
	    include_once("../DAO/DataProvider_PDO.php");
      $sum=0;
      if (isset($_SESSION['MaKH'])) {
      $makh=$_SESSION['MaKH'];
      $hoadon = DataProvider_PDO::ExecuteQuery("SELECT sp.MaSP,sp.TenSP,sp.GiaPham,sp.ThongTin,sp.Images,hd.NgayDat,hd.GioDat,hd.NoiGiao,hd.TinhTrang,hd.MaHD FROM dbo_chitiethd hd, dbo_sanpham sp WHERE hd.TinhTrang='Mới đặt' and hd.MaSP = sp.MaSP and hd.MaKH='$makh'") or die("Lỗi truy vấn đến bảng chi tiết hóa đơn");
      
      $i=0;
        while($hd = $hoadon->fetch()) { ?>
          <div style="margin-bottom:4%" class='<?php echo $hd['MaHD'] ?>'>
            <article >
              <!--Nội dung trang web-->
            <a href="#" class="hanghoa" style='background-color:#8e8989;text-algin:center' title="<?php echo $hd["ThongTin"]."  Giá: ".$hd["GiaPham"]."đ"; ?>">
              <img src="./images/<?php echo $hd["Images"]?>.jpg" class="hinh" />
              <div class="">
                <p class="special-price">
                  <span class="price"><?php echo $hd["GiaPham"] ?>&nbsp;₫</span>
                </p>
                <p class="old-price">
                  <span class="price">28.990.000&nbsp;₫</span>
                </p>
              </div>
              <img src="./images/icon-new.png" class="iconnew" />
              <div class="ten" style='font-size:17px'><?php echo $hd["TenSP"] ?></div>
            </a>
            </article>
            <div style="display:inline-block;margin-left:16%;margin-top:-21%; position: absolute;">
              <p>Mã sản phẩm: <?php echo $hd["MaSP"] ?></p>
              <p>Tên sản phẩm: <?php echo $hd["TenSP"] ?></p>
              <p>Giá sản phẩm: <?php echo $hd["GiaPham"] ?></p> <?php $sum+= $hd["GiaPham"];?>
              <p style='width:700px'>Thông tin sản phẩm: <?php echo $hd["ThongTin"] ?></p>
              <p>Ngày đặt: <?php echo $hd["NgayDat"] ?></p>
              <p>Giờ đặt: <?php echo $hd["GioDat"] ?></p>

              <p>Nơi giao: <?php echo $hd["NoiGiao"] ?></p>
              <p>Tình trạng: <?php echo $hd["TinhTrang"] ?></p>
              <button style='width:20%;background:redcolor:white' id='<?php echo $hd['MaHD']?>' class="huyhd">Hủy</button>
              
              <script type="text/javascript">
              $(function() {
              $(".huyhd").click(function() {
              var id = $(this).attr("id");
              var dataString = 'id='+ id ;
              <?php  ?>
              var parent = $(this).parent();

              $.ajax({
              type: "POST",
              url: "./HoaDon/hoadon.php",
              data: dataString,
              cache: false,

              success: function(){

              if(id % 10)
              {
              parent.fadeOut('slow', function() {$(this).remove(); $(".<?php echo $hd['MaHD']?>").remove();});
              }
              else
              {
              parent.slideUp('slow', function() {$(this).remove(); $(".<?php echo $hd['MaHD']?>").remove();});
              }
              }
              });

              return false;
              });
              });
              </script>
            </div>
        </div>
        
    <?php  } ?>
      <?php } ?>
        
  <?php
      echo "<p style='text-align: right'>Tổng: <input value='$sum'/> </p>";
      echo "<button tyle='submit' id='thanhtoan' style='margin-left:92%;margin-bottom:5%'>Thanh toán</button>"; ?>
  </form><?php } ?>
  <div id="content_donhang" style="margin-bottom:3%"></div>
  <script type="text/javascript">
      $(document).ready(function()
      { 
          var submit = $("button[id='thanhtoan']");

          submit.click(function()
          {
            var data_dangky = $('form#form_input_doimatkhau').serialize();
          
            //Sử dụng phương thức Ajax.
            $.ajax({
                  type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                  url : './HoaDon/xl_hoadon.php', //gửi dữ liệu sang trang data.php
                  data : data_dangky, //dữ liệu sẽ được gửi
                  success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                            { 
                              if(data == 'false') 
                              {
                                alert('Không thể thanh toán đơn hàng!');
                              }else{
                                $('#content_donhang').html(data); 
                              }
                            }
                  });
                  return false;
            });
        });
</script>
  <?php }
  else if($gtri=="damua"){ ?>
    <strong><h3 style="text-align: center; font-size:50px">Hàng đã mua</h3></strong>
    <div id="content_donhang"></div>
  <form method="post" action="./HoaDon/xl_hoadon.php">
  <?php
      $donhang=$gtri; // donhang
	    include_once("../DAO/DataProvider_PDO.php");
      $sum=0;
      if (isset($_SESSION['MaKH'])) {
      $makh=$_SESSION['MaKH'];
      $hoadon = DataProvider_PDO::ExecuteQuery("SELECT sp.MaSP,sp.TenSP,sp.GiaPham,sp.ThongTin,sp.Images,hd.NgayDat,hd.GioDat,hd.NoiGiao,hd.TinhTrang,hd.MaHD FROM dbo_chitiethd hd, dbo_sanpham sp WHERE hd.MaSP = sp.MaSP and hd.MaKH='$makh' and hd.TinhTrang='Đã thanh toán'") or die("Lỗi truy vấn đến bảng chi tiết hóa đơn");
      $i=0;
        while($hd = $hoadon->fetch()) { ?>
          <div style="border:2px solid blue;width:49%;display:inline-block" class='<?php echo $hd['MaHD'] ?>'>
            <article >
              <!--Nội dung trang web-->
            <a href="#" class="hanghoa" style='background-color:#8e8989;text-algin:center' title="<?php echo $hd["ThongTin"]."  Giá: ".$hd["GiaPham"]."đ"; ?>">
              <img src="./images/<?php echo $hd["Images"]?>.jpg" class="hinh" />
              <div class="">
                <p class="special-price">
                  <span class="price"><?php echo number_format($hd["GiaPham"],0,',','.'); ?>&nbsp;₫</span>
                </p>
                <p class="old-price">
                  <span class="price">28.990.000&nbsp;₫</span>
                </p>
              </div>
              <img src="./images/icon-new.png" class="iconnew" />
              <div class="ten" style='font-size:17px'><?php echo $hd["TenSP"] ?></div>
            </a>
            </article>
            <div style="margin-left:15%;margin-top:-21%; position: absolute;">
              <p>Mã sản phẩm: <?php echo $hd["MaSP"] ?></p>
              <p>Tên sản phẩm: <?php echo $hd["TenSP"] ?></p>
              <p>Giá sản phẩm: <?php echo $hd["GiaPham"] ?></p> <?php $sum+= $hd["GiaPham"];?>
              <p>Thông tin: <?php echo $hd["ThongTin"] ?></p>
              <p>Ngày đặt: <?php echo $hd["NgayDat"] ?></p>
              <p>Giờ đặt: <?php echo $hd["GioDat"] ?></p>

              <p>Nơi giao: <?php echo $hd["NoiGiao"] ?></p>
              <p>Tình trạng: <?php echo $hd["TinhTrang"] ?></p>
            </div>
        </div>
        
    <?php  } ?>
      <?php } ?>
        
  </form>
<?php }
    else if($gtri=="dangxuat"){ 
      session_destroy();
      echo "<script> window.location = 'Home.php'; </script>";
   } 
   else if($gtri=="gioithieu"){ ?>
        <h1 id="page-title" style='text-align:center'>Giới Thiệu Cửa Hàng</h1>
        <section id="project1">
        <img  id="about-image" src="images/cuahang.jpg" />
          <div id="project1">
          <!-- <h1>About our Bussiness</h1> -->
          <p class="about-p" >Thông tin liên lạc
                <br>
                Gọi mua hàng: <strong style="color: red"> 1800.2097</strong> (Miễn phí)
                <br>
                Khiếu nại, góp ý: 1800.2063 
                <br>
                Thời gian phục vụ: 8h - 22h
                <br>
                Email: <strong style="color: red"> cskh@Cuahangdidong.com.vn</strong>
                <br>
                Hệ thống cửa hàng bảo hành - sửa chữa
                <br>
                Tổng đài miễn phí: 1800.2064
          </p>

          </div>
        </section>
   <?php }
   else if($gtri=="gopy"){?>
  
<form style="padding-right: 15px;padding-top:10px;margin-right: auto;margin-left:auto;text-align:center" id='form_input_gopy'>
    <h1>Shop Di Động Hân Hạnh Phục Vụ Quý Khách</h1>
    <h2> Quý Khách Quan Tâm Về Vấn Đề: </h2>
    <select style='width:150px' name='select_gopy'>
        <option value='' selected='selected'>Chọn Chủ Đề</option>
        <option>Tư Vấn</option>
        <option>Khiếu nại-phản ánh</option>
        <option>Góp ý cải tiến</option>
    </select>
    <div style="border: 1px solid white;background-color:#cccccc">
      <br/><br/>
    <table>
      <tr>
        <td>Tiêu Đề:</td><td> <input style='width:200px' type="text" name="tieude" placeholder="Tiêu đề..."/></td>
      </tr>
      <tr>
        <td>Họ Tên:</td><td>   <input style='width:200px' type="text" name="hoten" placeholder="Họ tên..." value='<?php echo $hoten ?>' /></td>
      </tr>
      <tr>
        <td>Số Điện Thoại: </td><td> <input style='width:200px' type="text" name="dienthoai" placeholder="Hoặc Email..." value='<?php echo $lienhe ?>'/></td>
      </tr>
    </table>
    Nội Dung: <br />
    <textarea style='width:900px;margin-left:2%' rows="5" cols="50" name="noidung" placeholder="Nội dung từ 250 đến 500 từ..."></textarea>
    <br>
    <button  style='width:80px;text-align:center;margin-left:3%;margin-top:3%' id='btnGopy'>Gửi</button>
   </div>
</form>
<div id="content_gopy" style="margin-bottom:3%"></div>
  <script type="text/javascript">
      $(document).ready(function()
      { 
          var submit = $("button[id='btnGopy']");
          

          submit.click(function()
          {
          var select_gopy = $("select[name='select_gopy']").val();
          var tieude = $("input[name='tieude']").val();
          var hoten = $("input[name='hoten']").val();
          var dienthoai = $("input[name='dienthoai']").val();
          var noidung = $("textarea[name='noidung']").val();
            if(select_gopy==''||tieude==''||hoten==''||dienthoai==''||noidung==''){
              alert("Bạn chưa nhập đầy đủ thông tin!");
              return false;
            }
            var data_gopy = $('form#form_input_gopy').serialize();
          
            //Sử dụng phương thức Ajax.
            $.ajax({
                  type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                  url : './TaiKhoan/xl_gopy.php', //gửi dữ liệu sang trang data.php
                  data : data_gopy, //dữ liệu sẽ được gửi
                  success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                            { 
                              if(data == 'false') 
                              {
                                alert('Không thể Góp Ý!');
                              }else{
                                $('#content_gopy').html(data); 
                              }
                            }
                  });
                  return false;
            });
        });
</script>
  <?php }
  else if($gtri=="thongbao"){ ?>
    <h1 style='font-size:40px;text-align:center'>Thông Báo</h1>
    <h2>Chào bạn, <?php echo $hoten; ?></h2><br><br>
    <table style='margin-left:7%'>
      <tr>
        <td>Chúng tôi thông báo giải đáp thắc mắc của bạn!</td>
      </tr>
<?php
    $tl1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_hoidap where MaKh='$ma' and TraLoi!='0'") or die("Lỗi truy vấn đến bảng hoi dap");
    while($tl = $tl1->fetch()) { ?>
      <tr>
        <td>Câu hỏi</td>
      </tr>
      <tr>
        <td>Chủ đề: <?php echo $tl['ChuDe']; ?></td>
      </tr>
      <tr>
        <td>Nội dung: <?php echo $tl['NoiDung']; ?></td>
      </tr>
      <tr>
        <td>Trả lời: <?php echo $tl['TraLoi']; ?><hr></td>
      </tr>
      <?php  
      $tl11 = DataProvider_PDO::ExecuteQuery("UPDATE dbo_hoidap SET View=1 WHERE MaKH='$ma'") or die("Lỗi truy vấn đến bảng hoi dap");
      } ?>
    </table>
    
 <?php }
  else if($gtri=="lienhe"){?>
    <div>
    <h1>THÔNG TIN LIÊN HỆ KHÁC</h1><br><br>
      <p>Tổng đài tư vấn, hỗ trợ khách hàng (7h30 đến 22h): 1800.1060 hoặc 028.3622.1060</p>
      <p>Tổng đài khiếu nại: 1800.1062</p>
      <p>Email: <a style='color:red'>Tienle10998@gmail.com</a></p>
    </div>
  <?php }
  else if($gtri=="hoidap"){?>
<form id='form_input_hoidap' style="padding-right: 15px;padding-top:10px;margin-right: auto;margin-left:auto;text-align:center" id='form_input_hoidap'>
<h1>Shop Di Động Hân Hạnh Phục Vụ Quý Khách</h1>
    <h2> Chuyên mục hỏi đáp </h2>
    <select style='width:150px' name="select_hoidap">
        <option value='' selected='selected'>Chọn Chủ Đề</option>
        <option>Khôi phụ - reset</option>
        <option>Thủ thuật mẹo sử dụng</option>
        <option>ROOT android</option>
        <option>Lỗi IOS thường gặp</option>
        <option>Không thể đăng nhập tài khoản</option>
        <option>Lỗi Android thường gặp</option>
        <option>Cách tạo tài khoản</option>
    </select>
    <div style="border: 1px solid white;background-color:#cccccc">
      <br/><br/>
    <table>
      <tr>
        <td>Họ Tên:</td><td>   <input style='width:200px' type="text" name="hoten" placeholder="Họ tên..." value='<?php echo $hoten ?>'/></td>
      </tr>
      <tr>
        <td>Số Điện Thoại:</td><td>  <input style='width:200px' type="text" name="dienthoai" placeholder="Hoặc Email..." value='<?php echo $lienhe ?>'/></td>
      </tr>
   </table>
    Nội Dung: <br />
    <textarea style='width:900px;margin-left:2%' rows="5" cols="50" name="noidung" placeholder="Ban nhap phan noi dung tai day..."></textarea>
    <br>
    <button  style='width:80px;text-align:center;margin-left:3%;margin-top:3%' id='btnHoidap'>Gửi</button>
   </div>
</form>
<div id="content_hoidap" style="margin-bottom:3%"></div>
  <script type="text/javascript">
      $(document).ready(function()
      { 
          var submit = $("button[id='btnHoidap']");
          submit.click(function()
          {
          var select_hoidap = $("select[name='select_hoidap']").val();
          var hoten = $("input[name='hoten']").val();
          var dienthoai = $("input[name='dienthoai']").val();
          var noidung = $("textarea[name='noidung']").val();
            if(select_hoidap==''||hoten==''||dienthoai==''||noidung==''){
              alert("Bạn chưa nhập đầy đủ thông tin!");
              return false;
            }
            var data_gopy = $('form#form_input_hoidap').serialize();
          
            //Sử dụng phương thức Ajax.
            $.ajax({
                  type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                  url : './TaiKhoan/xl_hoidap.php', //gửi dữ liệu sang trang data.php
                  data : data_gopy, //dữ liệu sẽ được gửi
                  success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                            { 
                              if(data == 'false') 
                              {
                                alert('Không thể Hỏi Đáp!');
                              }else{
                                $('#content_hoidap').html(data); 
                              }
                            }
                  });
                  return false;
            });
        });
</script>
  <?php }
   else if($gtri=="duoi4trieu"){
    include_once("../DAO/DataProvider_PDO.php");
    $gia = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_sanpham WHERE GiaPham<=4000000") or die("Lỗi truy vấn đến bảng chi tiết hóa đơn");
    while($sp = $gia->fetch()) { ?>
      <form method="post" action="HoaDon/addhoadon.php">
        <!--Nội dung trang web-->
        <div class="hanghoa" style='background-color:#8e8989;text-algin:center' title="<?php echo $sp["ThongTin"]."  Giá: ".$sp["GiaPham"]."đ"; ?>">
            <img src="./images/<?php echo $sp["Images"]?>.jpg" class="hinh" />
            <div class="">
                <p class="special-price">
                    <span class="price"><?php echo number_format($sp["GiaPham"],0,',','.'); ?>&nbsp;₫</span>
                </p>
              <?php
                  if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000){ $sp['GiaPham']+=1000000;
                      echo "<p class='old-price'>
                      <span class='price'>".$sp['GiaPham']."&nbsp;₫</span>
                          </p>";
                  }
              ?>
            </div>
            <img src="./images/icon-new.png" class="iconnew" />
            <div class="ten" style='font-size:17px'><?php echo $sp["TenSP"] ?></div>
            <?php if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000){ ?>
                    <div style='border:1px solid gray;margin-top:20%;margin-left:-85%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                    <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                <?php } 
                    else { ?>
                        <div style='border:1px solid gray;margin-top:20%;margin-left:-62%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                        <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                <?php   } ?>            
        </div>
        <?php } ?>
    </form>
    
   <?php } 
   else if($gtri=="tu4-6trieu"){
    include_once("../DAO/DataProvider_PDO.php");
    $gia = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_sanpham WHERE GiaPham>=4000000 and GiaPham<6000000") or die("Lỗi truy vấn đến bảng chi tiết hóa đơn");
    while($sp = $gia->fetch()) { ?>
      <form method="post" action="HoaDon/addhoadon.php">
        <!--Nội dung trang web-->
        <div class="hanghoa" style='background-color:#8e8989;text-algin:center' title="<?php echo $sp["ThongTin"]."  Giá: ".$sp["GiaPham"]."đ"; ?>">
            <img src="./images/<?php echo $sp["Images"]?>.jpg" class="hinh" />
            <div class="">
                <p class="special-price">
                    <span class="price"><?php echo number_format($sp["GiaPham"],0,',','.'); ?>&nbsp;₫</span>
                </p>
                <?php
                  if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000){ $sp['GiaPham']+=1000000;
                      echo "<p class='old-price'>
                      <span class='price'>".$sp['GiaPham']."&nbsp;₫</span>
                          </p>";
                  }
              ?>
            </div>
            <img src="./images/icon-new.png" class="iconnew" />
            <div class="ten" style='font-size:17px'><?php echo $sp["TenSP"] ?></div>
            <?php if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000){ ?>
                    <div style='border:1px solid gray;margin-top:20%;margin-left:-85%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                    <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                <?php } 
                    else { ?>
                        <div style='border:1px solid gray;margin-top:20%;margin-left:-62%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                        <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                <?php   } ?>            
        </div>
        <?php } ?>
    </form>
<?php }
   else if($gtri=="tu6-8trieu"){
    include_once("../DAO/DataProvider_PDO.php");
    $gia = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_sanpham WHERE GiaPham>=6000000 and GiaPham<8000000") or die("Lỗi truy vấn đến bảng chi tiết hóa đơn");
    while($sp = $gia->fetch()) { ?>
      <form method="post" action="HoaDon/addhoadon.php">
        <!--Nội dung trang web-->
        <div class="hanghoa" style='background-color:#8e8989;text-algin:center' title="<?php echo $sp["ThongTin"]."  Giá: ".$sp["GiaPham"]."đ"; ?>">
            <img src="./images/<?php echo $sp["Images"]?>.jpg" class="hinh" />
            <div class="">
                <p class="special-price">
                    <span class="price"><?php echo number_format($sp["GiaPham"],0,',','.'); ?>&nbsp;₫</span>
                </p>
                <?php
                  if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000||$sp['GiaPham']>50000000&& $sp['GiaPham']<10000000){ $gia111=$sp['GiaPham']+1000000;
                      echo "<p class='old-price'>
                      <span class='price'>".$gia111."&nbsp;₫</span>
                          </p>";
                  }
              ?>
            </div>
            <img src="./images/icon-new.png" class="iconnew" />
            <div class="ten" style='font-size:17px'><?php echo $sp["TenSP"] ?></div>
            <?php if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000){ ?>
                    <div style='border:1px solid gray;margin-top:20%;margin-left:-85%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                    <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                <?php } 
                    else { ?>
                        <div style='border:1px solid gray;margin-top:20%;margin-left:-62%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                        <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                <?php   } ?>            
        </div>
        <?php } ?>
    </form>
<?php }
    else if($gtri=="tu8-10trieu"){
      include_once("../DAO/DataProvider_PDO.php");
      $gia = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_sanpham WHERE GiaPham>=8000000 and GiaPham<10000000") or die("Lỗi truy vấn đến bảng chi tiết hóa đơn");
      while($sp = $gia->fetch()) { ?>
        <form method="post" action="HoaDon/addhoadon.php">
          <!--Nội dung trang web-->
          <div class="hanghoa" style='background-color:#8e8989;text-algin:center' title="<?php echo $sp["ThongTin"]."  Giá: ".$sp["GiaPham"]."đ"; ?>">
              <img src="./images/<?php echo $sp["Images"]?>.jpg" class="hinh" />
              <div class="">
                  <p class="special-price">
                      <span class="price"><?php echo number_format($sp["GiaPham"],0,',','.'); ?>&nbsp;₫</span>
                  </p>
                  <?php
                  if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000){ $gia11=$sp['GiaPham']+1000000;
                      echo "<p class='old-price'>
                      <span class='price'>".$gia11."&nbsp;₫</span>
                          </p>";
                  }
              ?>
              </div>
              <img src="./images/icon-new.png" class="iconnew" />
              <div class="ten" style='font-size:17px'><?php echo $sp["TenSP"] ?></div>
              <?php if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000){ ?>
                    <div style='border:1px solid gray;margin-top:20%;margin-left:-85%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                    <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                <?php } 
                    else { ?>
                        <div style='border:1px solid gray;margin-top:20%;margin-left:-62%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                        <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                <?php   } ?>              
          </div>
          <?php } ?>
      </form>
<?php }
  else if($gtri=="tren10trieu"){
    include_once("../DAO/DataProvider_PDO.php");
    $gia = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_sanpham WHERE GiaPham>=10000000") or die("Lỗi truy vấn đến bảng chi tiết hóa đơn");
    while($sp = $gia->fetch()) { ?>
      <form method="post" action="HoaDon/addhoadon.php">
        <!--Nội dung trang web-->
        <div class="hanghoa" style='background-color:#8e8989;text-algin:center' title="<?php echo $sp["ThongTin"]."  Giá: ".$sp["GiaPham"]."đ"; ?>">
            <img src="./images/<?php echo $sp["Images"]?>.jpg" class="hinh" />
            <div class="">
                <p class="special-price">
                    <span class="price"><?php echo number_format($sp["GiaPham"],0,',','.'); ?>&nbsp;₫</span>
                </p>
                <?php
                  if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000){ $gia1=$sp['GiaPham']+1000000;
                      echo "<p class='old-price'>
                      <span class='price'>".$gia1."&nbsp;₫</span>
                          </p>";
                  }
              ?>
            </div>
            <img src="./images/icon-new.png" class="iconnew" />
            <div class="ten" style='font-size:17px'><?php echo $sp["TenSP"] ?></div>
            <?php if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000){ ?>
                    <div style='border:1px solid gray;margin-top:20%;margin-left:-85%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                    <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                <?php } 
                    else { ?>
                        <div style='border:1px solid gray;margin-top:20%;margin-left:-62%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                        <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                <?php   } ?>            
        </div>
        <?php } ?>
    </form>
<?php }
else {

    $MaHang=$gtri; //id là mã hãng

    
    $sp1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_sanpham where MaHang='$MaHang'") or die("Lỗi truy vấn đến bảng sản phẩm");?>
      <form method="post" action="HoaDon/addhoadon.php">
        <!--Nội dung trang web-->
        <?php while($sp = $sp1->fetch()) { ?>
        <div class="hanghoa" style='background-color:#8e8989;text-algin:center' title="<?php echo $sp["ThongTin"]."  Giá: ".$sp["GiaPham"]."đ"; ?>">
            <img src="./images/<?php echo $sp["Images"]?>.jpg" class="hinh" />
            <div class="">
                <p class="special-price">
                    <span class="price"><?php echo number_format($sp["GiaPham"],0,',','.'); ?>&nbsp;₫</span>
                </p>
                <?php
                  if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000){ $gia0=$sp['GiaPham']+1000000;
                      echo "<p class='old-price'>
                      <span class='price'>".$gia0."&nbsp;₫</span>
                          </p>";
                  }
              ?>
            </div>
            <img src="./images/icon-new.png" class="iconnew" />
            <div class="ten" style='font-size:17px'><?php echo $sp["TenSP"] ?></div>
            <?php if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000){ ?>
                    <div style='border:1px solid gray;margin-top:20%;margin-left:-85%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                    <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                <?php } 
                    else { ?>
                        <div style='border:1px solid gray;margin-top:20%;margin-left:-62%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                        <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                <?php   } ?>
            <script language="javascript">
                          // Lấy đối tượng
                          var gio = document.getElementById("datgiodh");
                          var mua = document.getElementById("muadh");
                          // Thêm sự kiện cho đối tượng
                          gio.onclick = function()
                          {
                              alert("Thêm vào giỏ hàng thành công!");
                          };
                          mua.onclick = function()
                          {
                              alert("Đơn hàng đã được thêm vào giỏ!");
                          };
                      </script>
        </div>
        <?php } ?>
    </form>
<?php }  ?> 


<!--Model dat hang-->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLongTitle">Thông Tin Cá Nhân</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='form_input_modal'>
          Họ Tên:  <input type="input" class="form-control" name="hotenModal" placeholder="Họ và tên">
          Điện Thoại:  <input type="input" class="form-control" name="sdtModal" placeholder="Số điện thoại">
          Địa Chỉ:  <input type="input" class="form-control" name="diachiModal" placeholder="Địa chỉ">
          Email:  <input type="input" class="form-control" name="emailModal" placeholder="Email">
        </form>
      </div>
      <div class="modal-footer">
        <button id='muahang' type="button" class="btn btn-primary" data-dismiss="modal" >Mua Hàng</button>
      </div>
    </div>
  </div>
</div>
<div id='loadModal'></div>
<script type="text/javascript">
      $(document).ready(function()
      { 
          var mua = $("button[id='muahang']");
          mua.click(function()
          {
          var hoten = $("input[name='hotenModal']").val();
          var sdt = $("input[name='sdtModal']").val();
          var diachi = $("input[name='diachiModal']").val();
          var email = $("input[name='emailModal']").val();
          
            if(email==''||hoten==''||sdt==''||diachi==''){
              alert("Bạn chưa nhập đầy đủ thông tin!");
              return false;
            }
            var data_modal = $('form#form_input_modal').serialize();
          
            //Sử dụng phương thức Ajax.
            $.ajax({
                  type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                  url : './dbo_addhdkvl/addBill.php', //gửi dữ liệu sang trang data.php
                  data : data_modal, //dữ liệu sẽ được gửi
                  success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                            { 
                              if(data == 'false') 
                              {
                                alert('Không thể Hỏi Đáp!');
                              }else{
                                $('#loadModal').html(data); 
                              }
                            }
                  });
                  return false;
            });
        });
</script>
</body>
</html>
