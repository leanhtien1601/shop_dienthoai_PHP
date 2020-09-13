
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sản phẩm</title>
	<link rel="stylesheet" href="CSS/1.css">
	<link rel="stylesheet" href="CSS/3.css">
	<link rel="stylesheet" href="CSS/6.css">
</head>
<body>
	<article>
		<section class="menu">
		 <a href="trangchu.php"><img src="images/logo.png" width="250px" height="auto" alt=""></a>	
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
		<section class="content1">
			<section class="aa1" style="height: auto;">
				
				<?php
				include 'quantri/db.php';
                if (isset($_GET['madanhmuc'])) {
                	$madanhmuc=$_GET['madanhmuc'];
                	$sqlm="select * from danhmuc where madm=$madanhmuc";
                	$kqm=$conn->query($sqlm)->fetch();

                }
               ?>
                	<section class="a12">
					<h3><?php echo $kqm['tendm']; ?></h3>
				    </section>
              



                <?php 
               include 'quantri/db.php';
                $sql="select * from sanpham where madm=$madanhmuc ";
                $kq=$conn->query($sql);
                foreach ($kq as $key => $row) {
                	?>
                <section class="a13">
				<a href="chitiet.php?masanpham=<?php echo $row['masp']; ?>"><img src="images/<?php echo $row['anhdd']; ?>" width="180px" height="150px;" alt=""></a>
				<a href="chitiet.php?masanpham=<?php echo $row['masp']; ?>" style="text-decoration: none;color: #000"><h3><?php echo $row['tensp']; ?></h3></a>
		 		<p>Khuyến mại :<?php echo $row['khuyenmai']; ?></p>
		 		<p>Giá :<span style="color: red;"> <?php echo $row['gia'] ?></span> VND</p>
		 		
		 		<button><a href="chitiet.php?masanpham=<?php echo $row['masp']; ?>" style="text-decoration: none;color: #000">Đặt hàng</a></button>	
				</section>
                	<?php
                }

                ?>
				
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

         		
         	</ul> <br> 
         	<h2 style="color: #424546">Top view cao</h2>
         	<?php 
    include 'quantri/db.php';
    $sqls="select * from sanpham order by view desc limit 8 ";
    $kqs=$conn->query($sqls);
    foreach ($kqs as $key => $hii) {
        ?>
        <section class="viem">
         		<a href="chitiet.php?masanpham=<?php echo $value['masp']; ?>"><img src="images/<?php echo $hii['anhdd'] ?>" alt=""></a>
         		<a href="chitiet.php?masanpham=<?php echo $value['masp']; ?>" style="text-decoration: none;"><p><?php echo $hii['tensp'] ?></p></a>
         		<p>Giá : <span style="color: red;"><?php echo $hii['gia'] ?> </span>VND</p>
         		<button><a href="chitiet.php?masanpham=<?php echo $value['masp']; ?>">Đặt hàng</a></button>
        </section>
        <?php
        }
    ?>

         	
         	<!-- <section class="viem">
         		<a href="chitiet.php"><img src="images/4.jpg" alt=""></a>
         		<a href="" style="text-decoration: none;"><p>Samsung S8+</p></a>
         		<p>Giá : <span style="color: red;">4.500.000 VND</span></p>
         		<button><a href="chitiet.php">Đặt hàng</a></button>
         	</section>
         	<section class="viem">
         		<a href="chitiet.php"><img src="images/4.jpg" alt=""></a>
         		<a href="" style="text-decoration: none;"><p>Samsung S8+</p></a>
         		<p>Giá : <span style="color: red;">4.500.000 VND</span></p>
         		<button><a href="chitiet.php">Đặt hàng</a></button>
         	</section>
         	<section class="viem">
         		<a href="chitiet.php"><img src="images/4.jpg" alt=""></a>
         		<a href="" style="text-decoration: none;"><p>Samsung S8+</p></a>
         		<p>Giá : <span style="color: red;">4.500.000 VND</span></p>
         		<button><a href="chitiet.php">Đặt hàng</a></button>
         	</section> -->
			</section>
		</section>
		<section class="a03" style="clear: both;"><br>
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
             ?>
         </section> 
	</article>
</body>
</html>