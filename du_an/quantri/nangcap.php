<?php 
session_start();
include 'db.php';
// echo $_SESSION['user'];
echo  $_SESSION['phanquyen'];
if ($_SESSION['phanquyen']!='Ad') {
	 $_SESSION['user']=$user;
	header("Location:../trangchu.php");
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tài khoản</title>
	<link rel="stylesheet" href="CSS1/30.css">
	<link rel="stylesheet" href="CSS1/10.css">
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
			<h1>Admin trang</h1>
		</section>
		<?php 
        include 'db.php';
        if (isset($_GET['masua'])) {
    	$masua=$_GET['masua'];
    	$sql="select * from taikhoan where user = $masua";
        $kq=$conn->query($sql);
    }

		 ?>
		 <form action="" enctype="multipart/form-data" method="post">
		 	<input type="hidden" name="user" value="<?php echo $kq['user']; ?>"> <br>
		 Phân cấp 	
		  
        <input type="radio" name="trangthai" checked="" value="Ad" >Lên Admin
        <input type="radio" name="trangthai" value="Không"> Thành viên
        <br><br>
        <input type="submit" name="luu" value="Lưu thông tin" >
		 
		 </form>
		 <?php 
        if (isset($_POST['luu'])) {
        	$user=$_POST['user'];
        	$trangthai=$_POST['trangthai'];
        	$sql="update taikhoan set phanquyen='$trangthai' where user='$masua' ";
        	 $kq=$conn->prepare($sql);
        	 if ($kq->execute()) {
   	 	     header("Location:khach.php");
   	        } else {
   	 	// echo "Lỗi";
   	 	     var_dump($kq);
   	   }
        }


		  ?>
</article>	
</body>
</html>