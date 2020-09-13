<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tài khoản</title>
	<link rel="stylesheet" href="CSS/1.css">
	<link rel="stylesheet" href="CSS/3.css">
	<link rel="stylesheet" href="CSS/6.css">
	<link rel="stylesheet" href="CSS/4.css">
	<style>

		body{
			font-family: tahoma;
		}
		.aye a:hover{
			color: #fff;
			
		}
	</style>
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
		<section style="height: 700px;background-image: url(images/20.jpg);background-repeat: no-repeat;">
		<section class="aye" style="padding-top: 150px;">
			<h1 style="color: red">Thông tin tài khoản</h1>
			<form action="" method="post"  >
				
				Tên tài khoản : <input type="text" name="user" required="" class="n" style="border-radius: 10px;height: 35px;"> <br>
				Mật khẩu : <input type="password" name="pass" required="" class="m" style="border-radius: 10px;height: 35px;"> <br>
				<input type="submit" value="Đăng nhập" class="z" name="luu">
			</form>
			<a href="themtaikhoan.php" style="margin-left: 300px;">Đăng kí thành viên</a>
			<a href="">Đổi mật khẩu</a>
		
			
		</section></section>
		<?php 
        include 'quantri/db.php';
        if (isset($_POST['luu'])) {
        	$user=$_POST['user'];
        	$pass=sha1($_POST['pass']);
        	$sql = "select * from taikhoan where user = '$user'";
        	$kq=$conn->query($sql)->fetch();
        	if ($kq['user']!= $user) {
        		echo "Bạn nhập sai tên ";
        	} elseif($kq['pass'] != $pass){
        	
        		echo "Bạn nhập sai mật khẩu";
        	} elseif($kq['phanquyen']=='Ad'){
        		$_SESSION['user'] = $kq['user'];
        		$_SESSION['phanquyen'] = $kq['phanquyen'];
        		header("Location:quantri/khach.php");
        	} else{
        		$_SESSION['user'] = $user;
        		header("Location:trangchu.php");
        	}
        }


		 ?>
	</article>
</body>
</html>


 				