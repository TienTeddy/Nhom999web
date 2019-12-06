<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body>
<?php
    session_start();
    $gtri=$_GET['id'];
   
    if($gtri=='dbo_hang'){
        include_once("../DAO/DataProvider_PDO.php"); $i=1;
        $h1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_hang") or die("Lỗi truy vấn đến bảng hãng");?>
        <h2 style='text-align:center'>Doanh mục Hãng</h2>
        <a href='#hang' class='link' id='add' style='font-size:18px;margin-left:95%'>Add</a>
        <table class="table table-hover">
            <tr style="align-text:center;color:white;background-color:#28a839">
                <td>STT</td>
                <td>Mã hãng</td>
                <td>Tên hãng</td>
                <td>Chỉnh sửa</td>
            </tr>
       <?php while($h = $h1->fetch()) { ?>
            <tr>
                <td><?php echo $i;?></td>
                <td name='mahang'><?php echo $h['MaHang']?></td>
                <td name='tenhang'><?php echo $h['TenHang']?></td>
                <td><a href='#hang' class='link' name='edit' id='<?php echo $h['MaHang']?>' style='font-size:18px'>Edit</a>
                    <a href='#hang' class='link' name='del' id='<?php echo $h['TenHang']?>' style='font-size:18px;color:red'>Delete</a></td>
                    
            </tr> 
       <?php $i++; } ?> 
        </table>
        <script>
    $(document).ready(function(){
        $("a.link").click(function(){
        id=this.getAttribute("id");
        $.ajax({
            type:"get",
            url:"../dbo_hang/xuly.php",
            data:"id="+id,
            async:false,
            success:function(kq){
                $("#content").html(kq);}
        })
        })
        
    })
</script>
    <?php } 
   else if($gtri=='dbo_sanpham'){
    include_once("../DAO/DataProvider_PDO.php"); $stt=1;
    $sp1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_sanpham") or die("Lỗi truy vấn đến bảng sanpham");?>
    <h2 style='text-align:center'>Doanh mục Sản Phẩm</h2>
    <a href='#sanpham' class='link' id='add' style='font-size:18px;margin-left:95%'>Add</a>
    <table class="table table-hover">
        <tr style="align-text:center;color:white;background-color:#28a839">
            <td>STT</td>
            <td>Mã</td>
            <td>Hãng</td>
            <td>Tên</td>
            <td>Giá </td>
            <td>Thông tin</td>
            <td>Hình ảnh</td>
            <td>Số lượng</td>
            <td>Chỉnh sửa</td>
        </tr>
   <?php while($sp = $sp1->fetch()) { ?>
        <tr>
            <td><?php echo $stt;?></td>
            <td><?php echo $sp['MaSP']?></td>
            <td><?php echo $sp['MaHang']?></td>
            <td><?php echo $sp['TenSP']?></td>
            <td><?php echo $sp['GiaPham']?></td>
            <td><?php echo $sp['ThongTin']?></td>
            <td><?php echo $sp['Images']?></td>
            <td><?php echo $sp['SoLuong']?></td>
            <td><a href='#sanpham' class='link' name='edit' id='<?php echo $sp['MaSP']?>' style='font-size:18px'>Edit</a>
                    <a href='#sanpham' class='link' name='del' id='<?php echo $sp['TenSP']?>' style='font-size:18px;color:red'>Delete</a></td>
        </tr>
   <?php $stt++;} ?>
    </table>
    <script>
    $(document).ready(function(){
        $("a.link").click(function(){
        id=this.getAttribute("id");
        $.ajax({
            type:"get",
            url:"../dbo_sanpham/xuly.php",
            data:"id="+id,
            async:false,
            success:function(kq){
                $("#content").html(kq);}
        })
        })
        
    })
</script>
<?php }
 else if($gtri=='dbo_khachhang'){
    include_once("../DAO/DataProvider_PDO.php"); $stt=1;
    $kh1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_khachhang") or die("Lỗi truy vấn đến bảng khách hàng");?>
    <h2 style='text-align:center'>Doanh mục Khách Hàng</h2>
    <a href='#khachhang' class='link' id='add' style='font-size:18px;margin-left:95%'>Add</a>
    <table class="table table-hover">
        <tr style="align-text:center;color:white;background-color:#28a839">
            <td>STT</td>
            <td>Mã khách hàng</td>
            <td>Tài khoản</td>
            <td>Mật khẩu</td>
            <td>Loại </td>
            <td>Họ và tên</td>
            <td>Địa chỉ</td>
            <td>Điện thoại</td>
            <td>Email</td>
            <td>Hình ảnh</td>
            <td>Chỉnh sửa</td>
        </tr>
   <?php while($k = $kh1->fetch()) { ?>
        <tr>
            <td><?php echo $stt;?></td>
            <td><?php echo $k['MaKH']?></td>
            <td><?php echo $k['UserName']?></td>
            <td><?php echo $k['PassWord']?></td>
            <td><?php echo $k['Loai']?></td>
            <td><?php echo $k['HoTen']?></td>
            <td><?php echo $k['DiaChi']?></td>
            <td><?php echo $k['DienThoai']?></td>
            <td><?php echo $k['Email']?></td>
            <td><?php echo $k['Images']?></td>
            <td><a href='#khachhang' class='link' name='edit' id='<?php echo $k['MaKH']?>' style='font-size:18px'>Edit</a>
                <a href='#khachhang' class='link' name='del' id='<?php echo $k['UserName']?>' style='font-size:18px;color:red'>Delete</a></td>
        </tr>
   <?php $stt++; } ?>
    </table>
    <script>
    $(document).ready(function(){
        $("a.link").click(function(){
        id=this.getAttribute("id");
        $.ajax({
            type:"get",
            url:"../dbo_khachhang/xuly.php",
            data:"id="+id,
            async:false,
            success:function(kq){
                $("#content").html(kq);}
        })
        })
        
    })
</script>
<?php }
 else if($gtri=='dbo_hoadon'){
    include_once("../DAO/DataProvider_PDO.php"); $stt=1;
    $hd1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_chitiethd") or die("Lỗi truy vấn đến bảng hóa đơn");?>
    <h2 style='text-align:center'>Doanh mục Hóa Đơn</h2>
    <a href='#khachhang' class='link' id='add' style='font-size:18px;margin-left:95%'>Add</a>
    <table class="table table-hover">
        <tr style="align-text:center;color:white;background-color:#28a839">
            <td>STT</td>
            <td>Mã hóa đơn</td>
            <td>Mã khách hàng</td>
            <td>Mã sản phẩm</td>
            <td>Ngày đặt</td>
            <td>Giờ đặt</td>
            <td>Nơi giao</td>
            <td>Tình trạng</td>
            <td>Chỉnh sửa</td>
        </tr>
   <?php while($hd = $hd1->fetch()) { ?>
        <tr>
            <td><?php echo $stt;?></td>
            <td><?php echo $hd['MaHD']?></td>
            <td><?php echo $hd['MaKH']?></td>
            <td><?php echo $hd['MaSP']?></td>
            <td><?php echo $hd['NgayDat']?></td>
            <td><?php echo $hd['GioDat']?></td>
            <td><?php echo $hd['NoiGiao']?></td>
            <td><?php echo $hd['TinhTrang']?></td>
            <td><a href='#hoadon' class='link' name='edit' id='<?php echo $hd['MaHD']?>' style='font-size:18px'>Edit</a>
                <a href='#hoadon' class='link' name='del' id='<?php echo $hd['GioDat']?>' style='font-size:18px;color:red'>Delete</a></td>
        </tr>
   <?php $stt++; } ?>
    </table>
    <script>
    $(document).ready(function(){
        $("a.link").click(function(){
        id=this.getAttribute("id");
        $.ajax({
            type:"get",
            url:"../dbo_hoadon/xuly.php",
            data:"id="+id,
            async:false,
            success:function(kq){
                $("#content").html(kq);}
        })
        })
        
    })
</script>
<?php }
 else if($gtri=='dbo_xacnhan'){
    include_once("../DAO/DataProvider_PDO.php"); $stt=1;
    $xn1 =DataProvider_PDO::ExecuteQuery("SELECT hd.MaHD,xn.HoTen,xn.DiaChi,xn.DienThoai,xn.Email,xn.HinhThuc,hd.MaSP,hd.NgayDat,hd.GioDat,xn.MaKH,xn.MaHD FROM dbo_chitiethd hd, dbo_xacnhan xn WHERE hd.MaKH = xn.MaKH and  hd.MaHD = xn.MaHD and hd.TinhTrang='Đã thanh toán'");?>
    <h2 style='text-align:center'>Danh sách khách hàng đã mua</h2>
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
<?php } 
    else if($gtri=="dbo_gopy"){
        include_once("../DAO/DataProvider_PDO.php"); $stt=1;
        $xn1 =DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_gopy");?>
        <h2 style='text-align:center'>Doanh mục góp ý</h2>
        <a href='#gopy' class='link' id='dell_all' style='font-size:18px;margin-left:90%'>Delete All</a>
        <table class="table table-hover">
            <tr style="align-text:center;color:white;background-color:#28a839">
                <td>STT</td>
                <td>Mã KH</td>
                <td>Tiêu đề</td>
                <td>Họ và tên</td>
                <td>Điện thoại</td>
                <td>Chủ đề</td>
                <td>Nội dung</td>
            </tr>
       <?php while($xnn = $xn1->fetch()) { ?>
            <tr>
                <td><?php echo $stt;?></td>
                <td><?php echo $xnn['MaKH']?></td>
                <td><?php echo $xnn['TieuDe']?></td>
                <td><?php echo $xnn['HoTen']?></td>
                <td><?php echo $xnn['DienThoai']?></td>
                <td><?php echo $xnn['ChuDe']?></td>
                <td><?php echo $xnn['NoiDung']?></td>
            </tr>
       <?php $stt++; } ?>
        </table>
        <script>
    $(document).ready(function(){
        $("a.link").click(function(){
        id=this.getAttribute("id");
        $.ajax({
            type:"get",
            url:"../dbo_gopy/xl_gopy.php",
            data:"id="+id,
            async:false,
            success:function(kq){
                $("#content").html(kq);}
        })
        })
        
    })
</script>
   <?php } 
   else if($gtri=="dbo_hoidap"){
    include_once("../DAO/DataProvider_PDO.php"); $stt=1; $stt1=1;
    $xn1 =DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_hoidap WHERE TraLoi!='0'");?>
    <h2 style='text-align:center'>Doanh mục hỏi đáp</h2><br><br>
    <h3>Đã trả lời:</h3>
    <a href='#hoidap' class='link' id='del_all' style='font-size:18px;margin-left:90%'>Delete All</a>
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
        <?php while($xnn = $xn1->fetch()) { ?>
        <tr>
            <td><?php echo $stt;?></td>
            <td><?php echo $xnn['MaKH']?></td>
            <td><?php echo $xnn['HoTen']?></td>
            <td><?php echo $xnn['DienThoai']?></td>
            <td><?php echo $xnn['ChuDe']?></td>
            <td><?php echo $xnn['NoiDung']?></td>
            <td><?php echo $xnn['TraLoi']?></td>
        </tr>
   <?php $stt++; } ?>
    </table><br>

    <h3>Chưa trả lời:</h3>
    <?php $xn2 =DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_hoidap WHERE TraLoi='0'");?>
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
        <?php while($xn = $xn2->fetch()) { ?>
        <tr>
            <td><?php echo $stt1;?></td>
            <td><?php echo $xn['MaKH']?></td>
            <td><?php echo $xn['HoTen']?></td>
            <td><?php echo $xn['DienThoai']?></td>
            <td><?php echo $xn['ChuDe']?></td>
            <td><?php echo $xn['NoiDung']?></td>
            <td><a href='#hoidap' class='link' id='<?php echo $xn['NoiDung']?>' style='font-size:18px;color:red'>Reply</a></td>
        </tr>
   <?php $stt1++; } ?>
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
   <?php } ?>
<div id="content" style="margin-bottom:5%"></div>
</body>
</html>