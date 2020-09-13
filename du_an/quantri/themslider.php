<?php 
session_start();
include 'db.php';
// echo $_SESSION['user'];
echo  $_SESSION['phanquyen'];
if ($_SESSION['phanquyen']!='Ad') {
	 $_SESSION['user']=$user;
	header("Location:../trangchu.php");
} 

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lí slider</title>
	<link rel="stylesheet" href="CSS1/30.css">
</head>
<body>
	<article>
		<section class="logo">
			<h1>Quản trị website</h1>
		</section>
		<section class="menu">
			<ul>
				<li><a href="loaihang.php">Danh mục</a></li>
				<li><a href="index.php">Sản phẩm</a></li>
				<li><a href="binhluan.php">Bình luận</a></li>
				<li><a href="khach.php">Tài khoản</a></li>
				<li><a href="slider.php">Slide</a></li>
				<li><a href="setting.php">Setting</a></li>
			</ul>
		</section>
		<section class="sanpham">
			
				<h1> Slider</h1>
			
		</section>
		<section class="ai">
			<form action="" method="post" enctype="multipart/form-data">
				Ảnh slider : <input type="file" class="z" name="anhdd"> <br>
				Link : <input type="text" class="x" required="" name="link"> <br>
				Trạng thái: <input type="radio" name="trangthai" style="margin-left: 50px;" value="On" checked=""> On 
				  <input type="radio" name="trangthai" style="margin-left: 50px;" value="Off" checked="" > Off <br>
				<input type="submit" value="Thêm" class="n" name="luu">
			</form>
			<?php 
            include 'db.php';
            if (isset($_POST['luu'])) {
            	$nameA=$_FILES['anhdd']['name'];
    	        $tmpA=$_FILES['anhdd']['tmp_name'];
    	        $link=$_POST['link'];
    	        $trangthai=$_POST['trangthai'];
    	        $typeA = $_FILES['anhdd']['type'];
    	        if($typeA != "image/jpeg" && $typeA != "image/jpg" && $typeA != "image/png"){
					echo "Vui lòng chọn file jpeg/png/jpg";
				}else if($_FILES['images']['size'] > 2000000){
					echo "Vui lòng chọn ảnh nhỏ hơn 2MB";
				} else{
					move_uploaded_file($tmpA, "../images/".$nameA);
					$sql="insert into slide values('','$nameA','$link','$trangthai')";; 
    	        $kq=$conn->exec($sql);

    	        if($kq==1){
    	        	header("Location:slider.php");
    	        } else{
    	        	echo "Lỗi";
    	        }
				}
            }


			 ?>
		</section>
		
	</article>
</body>
</html>