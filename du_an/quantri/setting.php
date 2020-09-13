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
	<title>Setting</title>
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
			<h1>Bảng setting</h1>
		</section>
		<section class="vip">
			
				<table cellpadding="0" cellspacing="0" >
					<tr style="background: #00dc82;height: 30px;color: #fff">
						<td>Mã setting</td>
						<td>Logo</td>
						<td>Địa chỉ </td>
						<td>Email</td>
						<td><!-- Sửa --></td>
						
					</tr>
					<?php 
                    include 'db.php';
                    $sql="select * from setting";
                    $kq=$conn->query($sql);
                    foreach ($kq as $key => $row) {
                    ?>
                    <tr class="abc">
                    	<td><?php echo $row['id']; ?></td>
                    	<td><img src="../images/<?php echo $row['logo']; ?>" alt=""></td>
                    	<td><?php echo $row['footer']; ?></td>
                    	<td><?php echo $row['email']; ?></td>
                    	<td><a href="suasetting.php?masua=<?php echo $row['id']; ?>"><input type="submit" value="Sửa"></a></td>
                    </tr>
                    <?php
                    }


					 ?>
				</table>
			
		</section>
	</article>
</body>
</html>