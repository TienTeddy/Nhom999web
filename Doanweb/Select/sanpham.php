<?php
    $MaHang=$_GET['id']; //id là mã hãng

	include_once("../DAO/DataProvider_PDO.php");
    


$sp1 = DataProvider_PDO::ExecuteQuery("SELECT * FROM dbo_sanpham where MaHang='$MaHang'") or die("Lỗi truy vấn đến bảng sản phẩm");
while($sp = $sp1->fetch()) { ?>
    <article style="display:inline-block">
            <!--Nội dung trang web-->
					<a href="#" class="hanghoa" title="<?php echo $sp["ThongTin"]."  Giá: ".$sp["GiaPham"]."đ"; ?>">
						<img src="./images/<?php echo $sp["Images"]?>.jpg" class="hinh" />
						<div class="">
							<p class="special-price">
								<span class="price"><?php echo $sp["GiaPham"] ?>&nbsp;₫</span>
							</p>
							<?php
                                if($sp['GiaPham']>10000000&& $sp['GiaPham']<25000000||$sp['GiaPham']>50000000&& $sp['GiaPham']<10000000){ $sp['GiaPham']+=1000000;
                                    echo "<p class='old-price'>
                                    <span class='price'>".$sp['GiaPham']."&nbsp;₫</span>
                                        </p>";
                                }
                            ?>
						</div>
						<img src="./images/icon-new.png" class="iconnew" />
						<div class="ten"><?php echo $sp["TenSP"] ?></div>
						<button style="margin-top:10%;margin-left:2%;width:30%;background:red;color:white" id="mua">Mua</button>
                        <button style="margin-top:10%;margin-right:30%;width:30%;position: relative;background:green;color:white" id="themvaogio">Đặt giỏ</button>
					</a>
			<?php } ?>
    </article>