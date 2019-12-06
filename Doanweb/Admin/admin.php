<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
</head>
<body>
  <?php
  session_start();
     if (isset($_SESSION['MaKH'])) {
      $m=$_SESSION['MaKH'];
        include_once("../DAO/DataProvider_PDO.php");
        $ok= DataProvider_PDO::ExecuteQuery("select * FROM dbo_khachhang WHERE MaKH='$m' and Loai=1 ") or die("Lỗi truy vấn đến bảng khach hang");
        if($ok){
     }
     ?>
<strong><h3 style="text-align: center; font-size:50px">Quản Lý Admin</h3></strong><hr>
<a href='../Home.php' style='margin-left:1.5%'>Trang chủ</a>
<div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Chọn bảng
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item link" id="dbo_hang" href="#hang">Bảng hãng</a>
      <a class="dropdown-item link" id="dbo_sanpham" href="#sanpham">Bảng sản phẩm</a>
      <a class="dropdown-item link" id="dbo_khachhang" href="#khachhang">Bảng khách hàng</a>
      <a class="dropdown-item link" id="dbo_hoadon" href="#hoadon">Bảng hóa đơn</a>
      <a class="dropdown-item link" id="dbo_xacnhan" href="#xacnhan">Bảng xác nhận mua</a>
      <a class="dropdown-item link" id="dbo_gopy" href="#gopy">Bảng góp ý</a>
      <a class="dropdown-item link" id="dbo_hoidap" href="#hoidap">Bảng hỏi đáp</a>
    </div>
  </div>
  <br>
  <script>
    $(document).ready(function(){
        $("a.link").click(function(){
        id=this.getAttribute("id");
        $.ajax({
            type:"get",
            url:"xl_admin.php",
            data:"id="+id,
            async:false,
            success:function(kq){
                $("#displayShow").html(kq);}
        })
        })
        
    })
</script>
<div id='displayShow'>
<form id='form_input'>
    <table>
      <tr>
        <td>Select:  month
            <select name='select_month'>
              <option selected='selected'>---</option>
              <?php for($i=1;$i<=12;$i++){
              echo "<option>".$i."</option>";
              }?>
            </select>
        </td>
        <td><button id='search'>Search</button></td>
      </tr>
    </table>
</form>
<script type="text/javascript">
        $(document).ready(function()
        { 
        var submit = $("button[id='search']");

        submit.click(function()
          {
            var select_month = $("input[name='select_month']").val();

            //Kiểm tra xem trường đã được nhập hay chưa
            if(select_month == ''){
              alert('Vui lòng nhập đầy đủ thông tin!');
              return false;
            }
        //Lấy toàn bộ dữ liệu trong Form
        var data_capnhat = $('form#form_input').serialize();
      
        //Sử dụng phương thức Ajax.
        $.ajax({
              type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
              url : '../Admin/search.php', //gửi dữ liệu sang trang data.php
              data : data_capnhat, //dữ liệu sẽ được gửi
              success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                        { 
                          if(data == 'false') 
                          {
                            alert('Không thể Search!');
                          }else{
                            $('#content').html(data); 
                          }
                        }
              });
              return false;
        });
    });
</script>
<div id="content" style="margin-bottom:3%">
<h2 style='text-align:center'>Danh sách khách hàng đã mua</h2>
<?php include_once("../DAO/DataProvider_PDO.php"); $stt=1;
    $xn1 =DataProvider_PDO::ExecuteQuery("SELECT hd.MaHD,xn.HoTen,xn.DiaChi,xn.DienThoai,xn.Email,xn.HinhThuc,hd.MaSP,hd.NgayDat,hd.GioDat,xn.MaKH,xn.MaHD FROM dbo_chitiethd hd, dbo_xacnhan xn WHERE hd.MaKH = xn.MaKH and  hd.MaHD = xn.MaHD and hd.TinhTrang='Đã thanh toán'");?>
    <table class="table table-hover">
        <tr style="align-text:center;color:white;background-color:#28a839">
            <td>STT</td>
            <td>Họ và tên</td>
            <td>Địa chỉ</td>
            <td>Điện thoại</td>
            <td>Email</td>
            <td>Hình thức</td>
            <td>Mã KH</td>
            <td>Mã sản phẩm</td>
            <td>Mã hóa đơn</td>
            <td>Ngày đặt</td>
            <td>Chỉnh sửa</td>
        </tr>
   <?php while($xnn = $xn1->fetch()) { ?>
        <tr>
            <td><?php echo $stt;?></td>
            <td><?php echo $xnn['HoTen']?></td>
            <td><?php echo $xnn['DiaChi']?></td>
            <td><?php echo $xnn['DienThoai']?></td>
            <td><?php echo $xnn['Email']?></td>
            <td><?php echo $xnn['HinhThuc']?></td>
            <td><?php echo $xnn['MaKH']?></td>
            <td><?php echo $xnn['MaSP']?></td>
            <td><?php echo $xnn['MaHD']?></td>
            <td><?php echo $xnn['NgayDat']."-".$xnn['GioDat']?></td>
            <td><a href='#xacnhan' class='link' name='del' id='<?php echo $xnn['MaHD']?>' style='font-size:18px;color:red'>Delete</a></td>
        </tr>
   <?php $stt++; } ?>
    </table>
    <script>
    $(document).ready(function(){
        $("a.link").click(function(){
        id=this.getAttribute("id");
        $.ajax({
            type:"get",
            url:"../dbo_xacnhan/xuly.php",
            data:"id="+id,
            async:false,
            success:function(kq){
                $("#content").html(kq);}
        })
        })
        
    })
</script>
<h3>Hỏi đáp:</h3>
    <?php $xn2 =DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_hoidap WHERE TraLoi='0'"); $ok=0;
      while($m = $xn2->fetch()){ $ok++; }
      if($ok>0){?>
        <?php $xn21 =DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_hoidap WHERE TraLoi='0'"); $stt1=1; ?>
    <table class="table table-hover">
        <tr style="align-text:center;color:white;background-color:#28a839">
            <td>STT</td>
            <td>Mã KH</td>
            <td>Họ và tên</td>
            <td>Điện thoại</td>
            <td>Chủ đề</td>
            <td>Nội dung</td>
            <td>Trả lời</td>
        </tr>
        <?php while($xn = $xn21->fetch()) { ?>
        <tr>
            <td><?php echo $stt1;?></td>
            <td><?php echo $xn['MaKH']?></td>
            <td><?php echo $xn['HoTen']?></td>
            <td><?php echo $xn['DienThoai']?></td>
            <td><?php echo $xn['ChuDe']?></td>
            <td><?php echo $xn['NoiDung']?></td>
            <td><a href='#hoidap' class='link' id='<?php echo $xn['NoiDung']?>' style='font-size:18px;color:red'>Reply</a></td>
        </tr>
   <?php $stt1++; }}
   else echo "Không có câu hỏi nào."; ?>
    </table><br>
    <script>
    $(document).ready(function(){
        $("a.link").click(function(){
        id=this.getAttribute("id");
        $.ajax({
            type:"get",
            url:"../dbo_hoidap/xl_hoidap.php",
            data:"id="+id,
            async:false,
            success:function(kq){
                $("#content").html(kq);}
        })
        })
        
    })
</script>
</div>
</div>
<?php } 
    else {
      echo "<div class='alert alert-danger' role='alert'>Bạn không có quyền truy cập admin!</div>";
      echo "<a href='../' class='btn btn-info'>Quay lại</a>";
    }
?>
</body>
</html>