
<?php 
session_start(); ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="CSS/1.css">
	<link rel="stylesheet" href="CSS/3.css">
	<link rel="stylesheet" href="CSS/6.css">
	<link rel="stylesheet" href="CSS/4.css">
</head>
<body>
	<article>
         <?php 
    include 'quantri/db.php';
    if (isset($_SESSION['user'])) {
        echo "Chào bạn :"." ".$_SESSION['user'];
        ?>    
        <br> <a href="huy.php" style="text-decoration: none;color: red;font-family: tahoma">Đăng xuất</a> 
    <?php
     } 
     ?> 
      <?php 
      include 'quantri/db.php';
      if (isset($_GET['masanpham'])) {
         $masanpham=$_GET['masanpham'];
         $sql="select * from sanpham where masp=$masanpham";
         $kq=$conn->query($sql)->fetch();

      }

       ?>
		<section class="menu">
            <?php 
            include 'quantri/db.php';
            $sqll="select * from setting";
            $kql=$conn->query($sqll);
            foreach ($kql as $key => $valuea) {
                ?>
            <img src="images/<?php echo $valuea['logo']; ?>" width="250px" height="74px" alt="">      
                <?php
            }

             ?>
     
     <br><br>
     <ul>
      <li class="a"><a href="trangchu.php">Trang chủ</a></li>
      <li><a href="taikhoan.php">Tài khoản</a></li>
      <li><a href="">Góp ý</a></li>
     </ul>
     <form action="">
            <input type="search" required="">
            <input type="submit" value="Tìm kiếm" style="background: red;border: none; color: #fff ;width: 70px;height: 23px;">
          </form>
    </section>
		<section class="banner12">
			<img src="images/<?php echo $kq['anhdd']; ?>" style="height: 450px;" alt="">
             <h1><?php echo $kq['tensp']; ?></h1>
             <h2>Giảm :<?php echo $kq['khuyenmai']; ?> VND</h2>
             <h2>Giá : <span style="color: red;"><?php echo $kq['gia']; ?> </span>VND</h2>
		</section>
		<section class="c01" style="height: auto;">
			<h2>Chi tiết :</h2>
			<p><?php echo $kq['chitietsp'] ?>
            <!-- Thiết kế mặt lưng độc đáo của Galaxy A50s với các hoa văn tạo hình khối 3D đổi màu gradient trong 4 phiên bản màu sắc khác nhau để người dùng tùy chọn, đó là màu Prism Crush Black, Prism Crush White, Prism Crush Green và Prism Crush Violet. Đây cũng chính là điểm cải tiến đầu tiên về thiết kế của Galaxy A50s so với 4 phiên bản màu của Galaxy A50 không được tạo khối 3D.  --></p>
			<p><!-- Samsung đã sử dụng con chip Exynos 9610, RAM tùy chọn 4GB hoặc 6GB, bộ nhớ trong 64GB hoặc 128GB và viên pin có dung lượng 4000mAh. Ngoài ra, Samsung Galaxy A50s còn được trang bị khe cắm thẻ nhớ microSD hỗ trợ tối đa 1TB, cổng USB-C với tính năng hỗ trợ sạc nhanh 15W giúp bạn rút ngắn thời gian sạc pin. Ngoài ra, Samsung Galaxy A50s vẫn được trang bị hệ điều hành Android 9.0 được cài đặt sẵn. --></p> <p><!-- Hoàng Hà Mobile tự hào là địa chỉ tin cậy bán điện thoại Samsung chính hãng, giá tốt trên khắp cả nước. Các sản phẩm điện thoại Samsung mua tại Hoàng Hà Mobile được cam kết chính hãng kèm theo chế độ bảo hành tin cậy, 1 đổi 1 trong thời gian 15 ngày. Hơn nữa, khi khách hàng mua điện thoại Samsung Galaxy A50s chính hãng tại cửa hàng sẽ được ưu đãi với giá bán thấp hơn từ 10% đến 20% so với giá bán A50s ngoài thị trường. --> </p><p>Ngày đăng : <?php echo $kq['ngaydang']; ?></p>
			<hr style="border: 1px dotted #D8DCDC;clear: both">
			<h2>Comment :</h2>
			<?php 
            include 'quantri/db.php';
            $sqhi="select * from binhluan where masp='$masanpham'";
            $kqhi=$conn->query($sqhi);
            foreach ($kqhi as $key => $vale) {
              ?>
            <p> <?php echo $vale['nd']; ?> <span style="margin-left: 150px;font-size: 10pt;font-weight: bold;"><?php echo $vale['user'] ?>: <?php echo $vale['ngaybl'] ?></span></p>  
              <?php
            }
             ?>
			
			
			<!-- <p>- Giá cả hợp lí <span style="margin-left: 150px;font-size: 10pt;font-weight: bold;">PT Dũng: 25/11/2018</span></p>
			<p>- Chất lượng tốt <span style="margin-left: 150px;font-size: 10pt;font-weight: bold;">PT Dũng: 25/11/2018</span></p>
			<p>- Dùng ổn <span style="margin-left: 150px;font-size: 10pt;font-weight: bold;">PT Dũng: 25/11/2018</span></p> -->
			<section style="background: #EFEAEA">
			<hr style="border: 1px dotted #D8DCDC"> <br>
			<form action="" method="post" enctype="multipart/form-data">
			<textarea name="nd" id="" cols="85" rows="2"></textarea>
			<input type="submit" name="luu" value="Gửi" style="width: 80px;height: 25px;margin-top: 10px;margin-left: 15px;">
            
      </form>
        <?php 
        include 'quantri/db.php';
        if (isset($_POST['luu'])) {
        $nd=$_POST['nd'];
        $ngaybl= date('d/m/y');
         
        $masp=$_GET['masanpham'];
        if (isset($_SESSION['user'])) {
          $user=$_SESSION['user'];
              $sqlhi="insert into binhluan values('','$nd','$ngaybl','$user','$masp')";
             $kqhi=$conn->exec($sqlhi);
            if ($kqhi==1) {
              echo "<meta http-equiv='refresh' content='0'>";
             } else{
              echo "Lỗi";
             }
          
          
          

             
        } else{
           
        echo "Bạn cần đăng nhập tài khoản";
        } 

        }
             ?>
		    </section>
		</section>
		<section class="aa2" style="height: auto;background: #b0ece0">
				 <h2 style="color: #424546">Danh mục</h2><br>
				  <ul>
               <?php 
                        
                        $sqll = "select * from danhmuc";
                        $kql = $conn->query($sqll);
                        foreach ($kql as $key => $value) {
                     ?><li><a href="danhmuc.php?madanhmuc=<?php echo $value['madm']; ?>"><?php echo $value['tendm']; ?></a></li>
                     <?php 
                  }
                  ?>

               
            </ul><br> 
         	<h2 style="color: #424546">Top view cao</h2>
         	<?php 
    include 'quantri/db.php';
    $sqls="select * from sanpham order by view desc limit 8 ";
    $kqs=$conn->query($sqls);
    foreach ($kqs as $key => $hii) {
        ?>
        <section class="viem">
            <a href="chitiet.php?masanpham=<?php echo $hii['masp']; ?>"><img src="images/<?php echo $hii['anhdd'] ?>" alt=""></a>
            <a href="chitiet.php?masanpham=<?php echo $hii['masp']; ?>" style="text-decoration: none;"><p><?php echo $hii['tensp'] ?></p></a>
            <p>Giá : <span style="color: red;"><?php echo $hii['gia'] ?> </span>VND</p>
            <button><a href="chitiet.php?masanpham=<?php echo $hii['masp']; ?>">Đặt hàng</a></button>
        </section>
        <?php
        }
    ?>
			</section> <br>
			<hr style="border: 1px dotted #D8DCDC">
			<section class="vl" style="clear: both;">
				<h2>Hàng liên quan</h2>
			</section>
            <section style="clear: both;height: auto;">
    <?php 
        include 'quantri/db.php';
        $sqq="select * from sanpham order by rand() limit 4 ";
        $kqq=$conn->query($sqq);
        foreach ($kqq as $key => $valu) {
         ?>
        <section class="viem1">
                <a href="chitiet.php?masanpham=<?php echo $valu['masp']; ?>"><img src="images/<?php echo $valu['anhdd'] ?>" alt=""></a> <br>
                <p><a href="chitiet.php?masanpham=<?php echo $valu['masp']; ?>"><?php echo $valu['tensp'] ?></a></p><br>
                <p>Giá : <span style="color: red;"><?php echo $valu['gia'] ?> VND</span></p> <br>
                <button><a href="chitiet.php?masanpham=<?php echo $valu['masp']; ?>">Đặt hàng</a></button>
            </section> 
         <?php 
        }


     ?>
			
         </section>
		<section class="a031" style="clear: both;"><br>
			<?php 
            $sqlvip="select * from setting";
            $kqvip=$conn->query($sqlvip);
            foreach ($kqvip as $key => $hihi) {
               ?>
          <p>Thông tin liên hệ:</p>
          <p>Văn phòng tại Việt Nam - Email: <?php echo $hihi['email']; ?></p>
          <p>Văn phòng đại diện: <?php echo $hihi['footer']; ?> </p>
               <?php
            }
             ?></section> 
      <?php 
      include 'quantri/db.php';
      $sqlh="update sanpham set view=view+1 where masp=$masanpham";
   
      $kqh=$conn->query($sqlh);
?>
	</article>
</body>
</html>