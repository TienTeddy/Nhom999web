<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cửa hàng di động</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="./xuLy-javascript.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/layout.css" />
    <link rel="stylesheet" href="css/HangHoa.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body style='background-color:#00003f'>
    <div>
    <?php session_start();
    
    ?>
    <div class="slideshow-container">
    <header style=" position: absolute; height:200px ;text-align:center;margin-left:23%;margin-top:2%">
        <h1 id="test" style='color:red;display:inline-block;font-size:75px'>C</h1>
        <h1 id="test" style='color:yellow;display:inline-block;font-size:75px'>Ử</h1>
        <h1 id="test" style='color:#7fff00;display:inline-block;font-size:75px'>A&nbsp;</h1>
        <h1 id="test" style='color:#0000bf;display:inline-block;font-size:75px'>H</h1>
        <h1 id="test" style='color:#ea0473;display:inline-block;font-size:75px'>À</h1>
        <h1 id="test" style='color:#00bfbf;display:inline-block;font-size:75px'>N</h1>
        <h1 id="test" style='color:#e5cb04;display:inline-block;font-size:75px'>G&nbsp;</h1>
        <h1 id="test" style='color:red;display:inline-block;font-size:75px'>D</h1>
        <h1 id="test" style='color:green;display:inline-block;font-size:75px'>I&nbsp;</h1>
        <h1 id="test" style='color:#00ff00;display:inline-block;font-size:75px'>Đ</h1>
        <h1 id="test" style='color:#00ffff;display:inline-block;font-size:75px'>Ộ</h1>
        <h1 id="test" style='color:#ff0000;display:inline-block;font-size:75px'>N</h1>
        <h1 id="test" style='color:#0000bf;display:inline-block;font-size:75px'>G</h1>


        <h1 style='color:#cccccc'>Uy tín tạo niềm tin!</h1><br>
        <marquee scrollamount='3' direction="right" ><p style='color:white'>SamSung GaLaXy Note 9 giảm sốc còn 19tr500,   Iphone X-Max giảm sốc còn 20tr500!</p></marquee>
    </header>
  <div class="mySlides1">
    <img src="./images/background_slideshow4.jpg" style="height:250px;width:100%">
  </div>


</div>
    <nav class="navbar navbar-inverse row">
        <div class="navbar-collapse collapse" style='margin-left:3%'>
            <ul class="nav navbar-nav">
                <li><a href="">Trang chủ</a></li>
                <li><a href="#gioithieu" class='link' id='gioithieu'>Giới thiệu</a></li>
                <li class="dropdown">
                <?php include_once("./DAO/DataProvider_PDO.php"); $i=1;
                    $h1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_hang") or die("Lỗi truy vấn đến bảng hãng"); $tang=0; ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style='margin-top:-23%'>Sản phẩm<span class="caret"></span></a>
						<ul class="dropdown-menu"><?php while($h = $h1->fetch()) { ?>
							<li><a href='#<?php echo $h['MaHang']?>' class="link" id='<?php echo $h['MaHang']?>'><?php echo $h['TenHang']?></a></li>
						<?php } ?></ul>
                        
                </li>
                <li><a href="#Liên_Hệ" class='link' id="lienhe">Liên hệ</a></li>
                <li><a href="#Góp_Ý"  class='link' id="gopy">Góp ý</a></li>
                <li><a href="#Hỏi_Đáp" class='link' id='hoidap'>Hỏi đáp</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tài khoản <span class="caret"></span></a>
                       <ul class="dropdown-menu">
					   <?php if (!isset($_SESSION['MaKH'])) { 
							 echo "<li><a href='#dangnhap' class='link' id='dangnhap'>Đăng nhập</a></li>";
							 echo "<li class='divider'></li>";
							 echo "<li><a href='#dangky' class='link' id='dangky'>Đăng ký thành viên</a></li>";;
						}
						   else { 
                            echo "<li><a href='#dangky' class='link' id='dangky'>Đăng ký thành viên</a></li>";
                            echo "<li class='divider'></li>";
                            echo "<li><a href='#doimatkhau' class='link' id='doimatkhau'>Đổi mật khẩu</a></li>";
                            echo "<li><a href='#capnhat' class='link' id='capnhat'>Cập nhật hồ sơ</a></li>";
                            echo "<li class='divider'></li>";
                            echo "<li><a href='#donhang' class='link' id='donhang'>Đơn hàng</a></li>";
                            echo "<li><a href='#damua' class='link' id='damua'>Hàng đã mua</a></li>";
							echo "<li class='divider'></li>";
							echo "<li><a href='#dangxuat' class='link' id='dangxuat'>Đăng xuất</a></li>";
						} ?>
                        </ul>
               </li>
			  <li><a href="./Admin/admin.php"
					<?php
						if (isset($_SESSION['Loai'])) {
							$loai = $_SESSION['Loai'];
							if($loai=='1') { echo "style='display:block;border:1px solid green;color:white;background-color:#05851f'"; $admin=1;}
							else { echo "style='display:none'"; $admin=2;}
						}
						else echo "style='display:none'";
					?>
					>Admin</a></li>

				<li> <a href="" style="margin-left:400px;margin-top:-6%;bacground-color:red">
                <?php if(!empty($_SESSION['HoTen'])){
                    $name = $_SESSION['HoTen'];
                    if(isset($_SESSION['Images'])){
                    $images= $_SESSION['Images'];
                     $a ="<img style='margin-left:115%;margin-top:0%;width:50px;height:40px' src='./images/".$images.".jpg' class='img-rounded' alt='Hình bo góc'>";
                    echo $a;
                    }
                    if($admin=='1') {echo "<div style='color:white;'>Admin: $name</div>";}
					else echo "<div style='color:white'>Người dùng: $name</div>";
					}
                ?>
                </a>
                </li>
              
            </ul>
        </div>
    </nav>
    <!--MessBox-->
    <div id="mySidenav">
        <a href="https://www.facebook.com/huynhngoc00"  id="blog"><img src="images/messenger1.svg" style='width:50px;margin-left:69%'/></a>
        <a href="https://www.google.com/gmail/" target="_blank" id="projects"><img src="images/gmail.png" style='width:50px;margin-left:69%'/></a>
        <a href="#" class="contact" id="myBtn"><img src="images/call.png" style='width:50px;margin-left:69%'/></a>
    </div>
    <!--Product-->
    <div id="sanpham" style="float:left;width:73%;height:auto;border:1px solid aqua;margin-left:6%;background-color:#00c9c9;margin-top:2%">
    <form method="post" action="HoaDon/addhoadon.php">
        <div class="container-fluid">
		<?php
		include_once("./DAO/DataProvider_PDO.php");
		$sp1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_sanpham") or die("Lỗi truy vấn đến bảng sản phẩm");
		while($sp = $sp1->fetch()) { ?>
            <!--Nội dung trang web-->
                    <div class="hanghoa" style='background-color:#8e8989' title="<?php echo $sp["ThongTin"]."  Giá: ".$sp["GiaPham"]."đ"; ?>">
                        <img src="./images/<?php echo $sp["Images"]?>.jpg" class="hinh" />
                        <div class="">
                            <p class="special-price" >
                                <span class="price"><?php echo number_format($sp["GiaPham"],0,',','.'); ?>&nbsp;₫</span>
                            </p>
                            <?php
                                if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000){ $gia=$sp['GiaPham']+1000000;
                                    echo "<p class='old-price'>
                                    <span class='price'>".$gia."&nbsp;₫</span>
                                        </p>";
                                }
                            ?>
                        </div>
                        <img  <?php if ($sp['GiaPham']<24000000) echo "style='display:none'"?> src="./images/icon-new.png" style='width:25%;' class="iconnew" />
                        <div class="ten" style='font-size:17px'><?php echo $sp["TenSP"] ?></div>
                        <?php if (!isset($_SESSION['MaKH'])) {?> <br>
                            <div>
                                <?php echo "<a id='muadh' class='btn btn-success' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?>
                            </div>
                            <div style='display:none;border:1px solid gray;margin-top:20%;margin-left:-82%;width:30%;position: absolute;background:red;color:white'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                            <div style='display:none;border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;position: relative;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                        <?php }
                            else{
                                if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000){ ?>
                                <div style='border:1px solid gray;margin-top:20%;margin-left:-85%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                                <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                            <?php } 
                                else { ?>
                                    <div style='border:1px solid gray;margin-top:20%;margin-left:-62%;width:30%;position: absolute;background:red;color:white;display:inline-block'><?php echo "<a id='muadh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Mua</a>";?></div>
                                    <div style='border:1px solid gray;margin-top:20%;margin-left:45%;width:30%;background:green;color:white'><?php echo "<a id='datgiodh' style='color:white' href='./HoaDon/addhoadon.php?masp_datgio=".$sp['MaSP']."'>Đặt giỏ</a>";?></div>
                            <?php   }
                            }
                        ?>

                        
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
        </div>
    </form>
    </div>
    
<script>
    $(document).ready(function(){
        $("a.link").click(function(){
        id=this.getAttribute("id");
        $.ajax({
            type:"get",
            url:"./TaiKhoan/DangNhap.php",
            data:"id="+id,
            async:false,
            success:function(kq){
                $("#sanpham").html(kq);}
        })
        })
        
    })
</script>
<?php
$dem=0; $dem_thongbao=0; $tontai=0;
    include_once("DAO/DataProvider_PDO.php");

    if (isset($_SESSION['MaKH'])) {
        $makh=$_SESSION['MaKH'];
        $tontai=1;

        $hd=DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_chitiethd WHERE MaKH='$makh' and TinhTrang='Mới đặt'");
        while($h = $hd->fetch()) { $dem++;}
        $hoidap_tl=DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_hoidap WHERE MaKH='$makh' and TraLoi!='0' and View!='1'");
        while($h1 = $hoidap_tl->fetch()) { $dem_thongbao++;}
    }
    else {

        if(isset($_COOKIE['makvl'])) {
            $mack= $_COOKIE['makvl'];
            $ck=DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_addhdkvl WHERE makvl='$mack'");
            while($c = $ck->fetch()) { $dem++; }
        }
    }
?>
<div >
<a href="#giohang" class="link" id="giohang">
<img src="./images/giohang.png" style="width:5%;margin-left:5%"/>
<span class="badge" style="margin-left:-4%;margin-top:-0.5%;background-color:#c40101" id="spanthemvaogio"><?php echo $dem ?></span>
</a>
<a href="#thongbao" class="link" id="thongbao" <?php if($tontai!=1) echo "style='display:none'"; else echo "style='position: absolute;'" ?>>
<img src="./images/thongbao.png" style="width:26%;margin-left:34%;margin-top:1%;"/>
<span class="badge" style="margin-left:-16%;margin-top:-5%;background-color:#c40101" id="thongbao_noti"><?php echo $dem_thongbao ?></span>
</a>
</div>
    <aside style="margin-right:0%;">
        <!--Nhà cung cấp-->
        <div class="panel panel-default" style="float:right;width:20%;text-align:center">
            <div class="panel-heading">
                <i class="fa fa-home"></i>
                <strong>Nhà cung cấp</strong>
            </div>
            <div class="list-group">
                <a href="#iphone" class="link list-group-item" id="iphone"><img id="img" src="images/icon-apple.svg" style="width:33px;height:33px;margin-left:-65px;margin-top:-6px;position:absolute" />iPhone</a>
                <a href="#" class="link list-group-item" id="nokia"><img id='img' src="images/icon-nokia.svg" style="width:33px;height:33px;margin-left:-65px;margin-top:-6px;position:absolute" />Nokia</a>
                <a href="#" class="link list-group-item" id="samsung"><img id='img' src="images/icon-samsung.svg" style="width:45px;height:54px;margin-left:-65px;margin-top:-16px;position:absolute" />Samsung</a>
                <a href="#" class="link list-group-item" id="xiaomi"><img id='img' src="images/icon-xiaomi.svg" style="width:30px;height:30px;margin-left:-65px;margin-top:-6px;position:absolute" />Xiaomi</a>
                <a href="#" class="link list-group-item" id="huawei"><img id='img' src="images/icon-huawei.svg" style="width:30px;height:30px;margin-left:-65px;margin-top:-6px;position:absolute" />Huawei</a>
                <a href="#" class="link list-group-item" id="sony"><img id='img' src="images/icon-sony.svg" style="width:33px;height:33px;margin-left:-65px;margin-top:-6px;position:absolute" />Sony</a>
            </div><!--class="list-group-item"-->
            <!--/Nhà cung cấp-->
            <!--Gia Bán-->
            <div class="panel-heading">
                <i class="fa fa-search"></i>
                <strong>Giá bán</strong>
            </div>
            <div class="list-group">
                <a href='#gia' id='duoi4trieu' class="link list-group-item">Dưới 4 triệu</a>
                <a href='#gia' id='tu4-6trieu' class="link list-group-item">4-6 triệu</a>
                <a href='#gia' id='tu6-8trieu' class="link list-group-item">6-8 triệu</a>
                <a href='#gia' id='tu8-10trieu' class="link list-group-item">8-10 triệu</a>
                <a href='#gia' id='tren10trieu' class="link list-group-item">Trên 10 triệu</a>
            </div>
        </div>
        <!--/Giá bán-->
    </aside>
</div><br>
<div style="display: inline;" >
        <div style='float:center;display:inline-block;margin-left:10%'>
            <br>
            <a>Chính sách bảo hành</a><br>
            <a>Chính sách đổi trả</a><br>
            <a>Giao hàng & Thanh toán</a><br>
            <a>Giới thiệu công ty (mwg.vn)</a><br>
            <a>Tuyển dụng</a><br>
            <a>Gửi góp ý, khiếu nại</a><br>
        </div>
        <div style='float:center;display:inline-block;margin-left:10%'>
        <br>
            Gọi mua hàng 1800.1060 (7:30 - 22:00)
            <br>
            Gọi khiếu nại   1800.1062 (8:00 - 21:30)
            <br>
            Gọi bảo hành   1800.1064 (8:00 - 21:00)
            <br>
            Hỗ trợ kỹ thuật 1800.1763 (7:30 - 22:00)
        </div>
        <div id="design" style="width:300px;height:60px;border:1px solid white; margin-top:18px;margin-right:8px;display:inline-block">
            <p>Design Nhóm 999</p>
            <p>Email: TienLe10998@gmail.com</p>
        </div>
</div>
</body>
</html>

