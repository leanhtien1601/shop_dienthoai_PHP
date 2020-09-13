<?php 
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đổi tài khoản</title>
	<link rel="stylesheet" href="CSS/1.css">
	<link rel="stylesheet" href="CSS/3.css">
	<link rel="stylesheet" href="CSS/6.css">
</head>
<body>
<article>
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
		 	<li class="a"><a href="">Trang chủ</a></li>
		 	<li><a href="taikhoan.php">Tài khoản</a></li>
		 	<li><a href="">Góp ý</a></li>
		 </ul>
		 <form action="">
         		<input type="search" required="">
         		<input type="submit" value="Tìm kiếm" style="background: red;border: none; color: #fff ;width: 70px;height: 23px;">
         	</form>
		</section>
		<section class="xinh" style="height: 700px;background: #fff;">
			<h1>Đổi mật khẩu</h1>
			<form action="" method="post" enctype="multipart/form-data">
			   <?php 
                    include 'quantri/db.php';
                    if (isset($_SESSION['user'])) {
                    echo "Chào bạn :"." ".$_SESSION['user'];
                    }  
                ?>	
                Nhập pass : <input type="password" name="pass"><br>
                Nhập lại pass : <input type="password" name="pas"> <br>
                <input type="submit" value="Lưu thông tin" name="luu">
			</form>
			    <?php  
            if (isset($_POST['luu'])) {
                $pass=sha1($_POST['pass']);    	
                $pas=sha1($_POST['pas']);         
                $sql = "select * from taikhoan where user = '$user' ";
                $kq=$conn->query($sql)->fetch();
                if ($kq['pass'] != $pas) {
                	echo "Bạn nhập không khớp mật khẩu";
                } else{
                    header("Location:taikhoan.php");
                }
                
                }  
			    ?>
		</section>
</article>	
</body>
</html>