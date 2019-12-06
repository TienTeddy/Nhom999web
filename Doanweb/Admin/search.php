<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    $search_month=$_POST['select_month'];

    if($search_month=='---') echo "<script>alert('Vui lòng nhập tháng tìm kiếm!'); location.reload();</script>";
    else{
        if($search_month<10) {$search_month="0".$search_month;}
?>
<?php include_once("../DAO/DataProvider_PDO.php"); $stt=1; ?> 
        <h2 style='text-align: center'>Danh sách xác nhận hàng của Tháng <?php echo $search_month;?></h2>
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
    <?php
     $nn=DataProvider_PDO::ExecuteQuery("SELECT MaHD,SUBSTRING(NgayDat, 4, 2) FROM dbo_chitiethd");
     while($x = $nn->fetch()) {
        $gtri=$x['SUBSTRING(NgayDat, 4, 2)'];
        if($gtri==$search_month){
            $mahd=$x['MaHD'];
            $xn1 =DataProvider_PDO::ExecuteQuery("SELECT hd.MaHD,xn.HoTen,xn.DiaChi,xn.DienThoai,xn.Email,xn.HinhThuc,hd.MaSP,hd.NgayDat,hd.GioDat,xn.MaKH,xn.MaHD FROM dbo_chitiethd hd, dbo_xacnhan xn WHERE hd.MaHD='$mahd' and hd.MaKH = xn.MaKH and  hd.MaHD = xn.MaHD and hd.TinhTrang='Đã thanh toán'");
                while($xnn = $xn1->fetch()) { ?>
                <tr>
                    <td><?php echo $stt;?></td>
                    <td><?php echo $xnn['HoTen'];?></td>
                    <td><?php echo $xnn['DiaChi'];?></td>
                    <td><?php echo $xnn['DienThoai'];?></td>
                    <td><?php echo $xnn['Email'];?></td>
                    <td><?php echo $xnn['HinhThuc'];?></td>
                    <td><?php echo $xnn['MaKH'];?></td>
                    <td><?php echo $xnn['MaSP'];?></td>
                    <td><?php echo $xnn['MaHD'];?></td>
                    <td><?php echo $xnn['NgayDat']."-".$xnn['GioDat'];?></td>
                    <td><a href='#xacnhan' class='link' name='del' id='<?php echo $xnn['MaHD'];?>' style='font-size:18px;color:red'>Delete</a></td>
                </tr>
                <?php $stt++; } ?>
               
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
     }?>
    </table>
<?php }?>
</body>
</html>