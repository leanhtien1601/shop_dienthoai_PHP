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
			<a href="themslider.php" style="text-decoration: none;">
				<h1>Thêm slider</h1>
			</a>
		</section>
		<section class="vip" style="height: auto;background: #fff" >
			
				<table cellpadding="0" cellspacing="0" style="height: auto;background: #fff">
					<tr style="background: #00dc82;height: 30px;color: #fff">
						<td>Mã TT</td>
						<td>Ảnh slider</td>
						<td >Link</td>
						<td>Trạng thái</td>
						<td><!-- Sửa --></td>
						<td><!-- Xóa --></td>
					</tr>
					<?php 
                    include 'db.php';
                    $sql="select * from slide";
                    $kq=$conn->query($sql);
                    foreach ($kq as $key => $row) {
                    	?>
                    	<tr class="abc">
                    		<td><?php echo $row['maslide']; ?></td>
                    		<td><img src="../images/<?php echo $row['anhdd']; ?>" alt=""></td>
                    		<td><?php echo $row['link']; ?></td>
                    		<td><?php echo $row['trangthai']; ?></td>
                    		<td><a href="suaslide.php?masua=<?php echo $row['maslide']; ?>"><input type="submit" value="Sửa"></a></td>
                    		<td><a href="xoaslide.php?maxoa=<?php echo $row['maslide']; ?>"><input type="submit" value="Xóa" onclick="return confirm('Bạn muốn xóa chứ !!!')"></a></td>
                    	</tr>
                    	<?php
                    }


					 ?>

				</table>
			
		</section>
	</article>
</body>
</html>