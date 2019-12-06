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

    <style>
        .bnt-primary {
    color: white;
    background-color: #007bff;
    border-color: #007bff;
 }
 .bnt-primary:hover {
    color: white;
    background-color: blue;
    border-color: blue;
    .bnt {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
         border-radius: .25rem;
    transition: boder-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
 }
        #mySidenav a {
            position: absolute;
            left: -66px;
            transition: 0.3s;
            padding: 15px;
            width: 100px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            border-radius: 0 5px 5px 0;
        }

            #mySidenav a:hover {
                left: 0;
            }

        #about {
            top: 240px;
            background-color: #4CAF50;
        }

        #blog {
            top: 300px;
            background-color: #2196F3;
        }

        #projects {
            top: 360px;
            background-color: #f44336;
        }

        #contact {
            top: 420px;
            background-color: #555;
        }
        .container-fluid {
            padding-right: 15px;
            padding-left: 90px;
            margin-right: auto;
            margin-left: auto;
}
        .contact {
            display: block;
            width: 85%;
            font-size: 15px;
            line-height: 2.0;
            color: #495057;
            margin-left: 100px;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: boder-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        .contact label {
            margin-left: 20px;

        }
        .contact input {
            margin-left: 20px;
        }
        /*mess box*/
    </style>

</head>
<body style="background-color:aqua">
    <?php session_start();
    
    ?>
    <header style="background-color:cadetblue;text-align:center">
        <h1 id="test">CỬA HÀNG DI ĐỘNG</h1>
        <marquee direction="right"><p>Uy tín tạo niềm tin!</p></marquee>
    </header>
    <nav class="navbar navbar-inverse row">
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="">Trang chủ</a></li>
                <li><a href="">Giới thiệu</a></li>
                <li class="dropdown">
                <?php include_once("./DAO/DataProvider_PDO.php"); $i=1;
                    $h1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_hang") or die("Lỗi truy vấn đến bảng hãng"); $tang=0; ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style='margin-top:-23%'>Sản phẩm<span class="caret"></span></a>
                        <ul class="dropdown-menu"><?php while($h = $h1->fetch()) { ?>
                            <li><a href='#<?php echo $h['MaHang']?>' class="link" id='<?php echo $h['MaHang']?>'><?php echo $h['TenHang']?></a></li>
                        <?php } ?></ul>
                        
                </li>
                <li><a href="" id="selectHang">Liên hệ</a></li>
                <li><a href="">Góp ý</a></li>
                <li><a href="">Hỏi đáp</a></li>
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
                            if($loai=='1') { echo "style='display:block;border:1px solid green;color:white;background-color:#05851f'"; $a=1;}
                            else { echo "style='display:none'"; $a=2;}
                        }
                        else echo "style='display:none'";
                    ?>
                    >Admin</a></li>

                <li> <a href="" style="margin-left:400px;margin-top:-6%;bacground-color:red">
                <?php if(!empty($_SESSION['HoTen'])){
                    $name = $_SESSION['HoTen'];
                    $images= $_SESSION['Images'];
                     $a ="<img style='margin-left:115%;margin-top:0%;width:50px;height:40px' src='./images/".$images.".jpg' class='img-rounded' alt='Hình bo góc'>";
                    echo $a;
                     if($a=='1') {echo "<div style='color:white;'>Admin: $name</div>";}
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
        <a href="#" id="about">About</a>
        <a href="#" id="blog">Facebook</a>
        <a href="#" id="projects">Gmail</a>
        <a href="#" id="contact">Contact</a>
    </div>
    
    
    <div class="contact">
        <!-- contact -->
        <h1 id="page-title">Contact</h1>
    
        
    <form>
            <!-- start of contacr fomr -->
                <!-- blabel Name -->
                <label>Full Name</label>
                    <!-- input text -->
                    <input type="text" class="form-control1">
                    <br>
                    <!-- blabel Phone -->
                <label>Phone Number</label>
                    <!-- input text -->
                    <input type="text" class="form-control1">
                    <br>
                    <!-- blabel Email -->
                <label>Email address</label>
                    <!-- input text -->
                    <input type="text" class="form-control1">
                    <br>
                    <!-- blabel Message -->
                <label>Message</label>
                    <!-- input text -->
                        <textarea rows="10" cols="100"></textarea>
                        <br>
                        <!-- Submit button -->
                    <button type="submit" class="bnt btn-primary">Send Message</button>
            <!-- end of contacr fomr -->
    </form>
    <!-- end contact -->
    </div>
    


</body>
</html>

