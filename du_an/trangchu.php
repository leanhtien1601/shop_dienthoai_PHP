<?php 
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/1.css">
	<link rel="stylesheet" href="CSS/3.css">
	<link rel="stylesheet" href="CSS/6.css">
	<title>Trang chủ</title>
	<script type="text/javascript">
		var mangAnh=[];
        <?php 
         include 'quantri/db.php';
            $sql="select * from slide where trangthai='On' ";
            $qk=$conn->query($sql);
            foreach ($qk as $key => $value) {
                ?>
            mangAnh[<?php echo $key ?>]="images/<?php echo $value['anhdd']; ?>";    
                <?php
            }
            
         ?>
		
		// mangAnh[1]="images/2.jpg";
		// mangAnh[2]="images/3.jpg";
		// mangAnh[3]="images/4.jpg";
		// mangAnh[4]="images/5.jpg";
		
		var i=0;
        var bc=0;
       window.onload=function auto(){
      	i++;
     	document.getElementById("abc").src=mangAnh[i];
     	if(i==mangAnh.length-1){
     		i=-1;
     	} ;  bc=setTimeout(auto,3000);
          
     	 }
     	 function nextAnh(){
            i++;
          document.getElementById("abc").src=mangAnh[i];
          if(i==mangAnh.length-1){
            i=-1;
          }
        }
        function backAnh(){
            i--;
            if(i==-1){
                i=mangAnh.length-1;
            }
             document.getElementById("abc").src=mangAnh[i];
        }
 
	</script>
</head>
<body>
	<article style="height: auto;">
        <?php 
    include 'quantri/db.php';
    if (isset($_SESSION['user'])) {
        echo "Chào bạn :"." ".$_SESSION['user'];
        ?>    
        <br> <a href="huy.php" style="text-decoration: none;color: red;font-family: tahoma">Đăng xuất</a> 
    <?php
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
         		<input type="search" required="" name="key">
         		<input type="submit" value="Tìm kiếm" style="background: red;border: none; color: #fff ;width: 70px;height: 23px;">
         	</form>
		</section>
		<br>
		<section class="banner">
			<section class="left" style="width: 980px;height: auto;margin-left: 15px;">
			
        <a href=""><img id="abc" 
             src="images/1.jpg" width="950px" height="600px" alt=""></a><br>
             <input type="button" class="at" value="<" onclick="backAnh()" style="width: 50px;height: 25px;background: #12E8FB;border: none">
             <input type="button" class="ta" value=">" onclick="nextAnh()" style="width: 50px;height: 25px;background: #12E8FB;border: none;margin-left: 850px;">
       
			</section>
			
           
		</section> <br> <br>
         <section class="vip1">
         	<h1>Danh mục</h1>
         </section>
          <section class="bao" style="height: auto;margin-bottom: 50px;">
         <?php 
        include 'quantri/db.php';
        $sql="select * from danhmuc "; 
        $kq=$conn->query($sql);
        foreach ($kq as $key => $row) {
           ?>
        <section class="vip" style="width: 170px;height: 200px;background:#ededed;;">
            <a href="danhmuc.php?madanhmuc=<?php echo $row['madm']; ?>" >
                <img src="images/<?php echo $row['anhdd'];  ?>" alt="" width="140px" height="150px"></a>
            <a href="danhmuc.php?madanhmuc=<?php echo $row['madm']; ?>"><?php echo $row['tendm']; ?></a>
        </section>
           <?php
        }

          ?>
         </section>

     <br> <br>
		 <hr style="width: 300px;border: 3px solid #07D29B;margin-top: 20px;margin-left: 345px;clear: both;">
		 <section class="thik" style="margin-top: 50px;clear: both;">
		 	<h1>Top view cao</h1>
            <?php 
    include 'quantri/db.php';
    $sqls="select * from sanpham order by view desc limit 8 ";
    $kqs=$conn->query($sqls);
    foreach ($kqs as $key => $hii) {
        ?>
        <section class="viem1">
                <a href="chitiet.php?masanpham=<?php echo $hii['masp']; ?>"><img src="images/<?php echo $hii['anhdd'] ?>" alt=""></a> <br>
                <p><a href="chitiet.php?masanpham=<?php echo $hii['masp']; ?>"><?php echo $hii['tensp'] ?></a></p><br>
                <p>Giá : <span style="color: red;"><?php echo number_format($hii['gia']) ?> </span>VND</p> <br>
                <button><a href="chitiet.php?masanpham=<?php echo $hii['masp']; ?>">Đặt hàng</a></button>
        </section>
        <?php
    }
             ?>
         	<br>
         	<h1 style="margin-top: 290px;clear: both;">Sản phẩm mới nhất</h1>
            <section class="bao1" style="height: auto;">
            <?php 
           
            $sqlm="select * from sanpham order by ngaydang desc limit 8 ";
            $kqm =$conn->query($sqlm);

            foreach ($kqm as $key => $value) {
                ?>
                <section class="viem1">
                <a href="chitiet.php?masanpham=<?php echo $value['masp']; ?>"><img src="images/<?php echo $value['anhdd']; ?>" alt=""></a> <br>
                <p><a href="chitiet.php?masanpham=<?php echo $value['masp']; ?>"><?php echo $value['tensp']; ?></a></p> <br>
                <p>Giá : <span style="color: red;"><?php echo number_format($value['gia']); ?> VND</span></p> <br>
                <button><a href="chitiet.php?masanpham=<?php echo $value['masp']; ?>">Đặt hàng</a></button>
            </section>
                <?php
            }

             ?>  
         	</section>
         	
		 </section>

		<footer style="margin-top: 340px;clear: both;"><br>
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
			
			
		</footer>
	</article>
</body>
</html>