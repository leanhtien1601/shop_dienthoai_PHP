<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tài khoản</title>
	<link rel="stylesheet" href="CSS/1.css">
	<link rel="stylesheet" href="CSS/3.css">
	<link rel="stylesheet" href="CSS/6.css">
	<link rel="stylesheet" href="CSS/4.css">
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
		<section style="height: 700px;background-image: url(images/20.jpg);">

			<form action="" method="post" style="padding-left: 250px;padding-top: 150px;" enctype="multipart/form-data" >
				
				Tên tài khoản : <input type="text" required="" name="user" required="" class="n" style="border-radius: 10px;height: 30px;" > <br>
				Mật khẩu : <input type="password" name="pass" required="" class="m" style="border-radius: 10px;height: 30px;"> <br>Ảnh đại diện <input type="file" name="anhdd" style="padding-left: 55px;"> <br> <br>
				Gmail : <input type="email" required="" name="gmail" class="m" style="border-radius: 10px;height: 30px;margin-left: 87px"> <br>
				<input type="submit" value="Đăng kí" class="z" name="luu" style="width: 100px;">
			</form>
		</section>
		<?php 
        include 'quantri/db.php';
        if (isset($_POST['luu'])) {
        	$user=$_POST['user'];
        	$pass=sha1($_POST['pass']);
            $gmail=$_POST['gmail'];
            $nameA=$_FILES['anhdd']['name'];
            $tmpA=$_FILES['anhdd']['tmp_name'];
             $typeA = $_FILES['anhdd']['type'];
            if($typeA != "image/jpeg" && $typeA != "image/jpg" && $typeA != "image/png"){
					echo "Vui lòng chọn file jpeg/png/jpg";
				}else if($_FILES['images']['size'] > 2000000){
					echo "Vui lòng chọn ảnh nhỏ hơn 2MB";
				} else{
					move_uploaded_file($tmpA, "images/".$nameA);
					$sql="insert into taikhoan values('$user','$pass','','$nameA','$gmail')";
                    $kq=$conn->exec($sql);
                    if ($kq==1) {
            header("Location:taikhoan.php");
           
            } else{
            	echo "Lỗi";
            }
				}




           
        }

		 ?>
	</article>
</body>
</html>