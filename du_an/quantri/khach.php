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
	<title>Khách hàng</title>
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
		
		<section class="vip" >
			
				<table cellpadding="0" cellspacing="0" >
					<tr style="background: #00dc82;height: 30px;color: #fff">
						<td>Tên khách</td>
						
						<td>Ảnh đại diện</td>
						<td>Mật khẩu</td>
						<td>Quyền</td>
						<td><!-- Sửa --></td>
						<td><!-- Xóa --></td>
					</tr>
					<?php 
                    include 'db.php';
                    $sql="select * from taikhoan";
                    $kq=$conn->query($sql);
                    foreach ($kq as $key => $hi) {
                    	?>
                    <tr class="abc">
						<td><?php echo $hi['user']; ?></td>
						<td><img src="../images/<?php echo $hi['anhdd']; ?>" alt=""></td>
						<td><?php echo $hi['pass']; ?></td>
						<td><?php echo $hi['phanquyen']; ?></td>
						
						<td><a href="nangcap.php?masua=<?php echo $hi['user']; ?>"><input type="submit" value="Nâng cấp"></a></td>
						<td><a href="xoatk.php?maxoa=<?php echo $hi['user']; ?>"><input type="submit" value="Xóa" onclick="return confirm('Bạn muốn xóa chứ')"></a></td>
					</tr>
                    	<?php
                    }
					 ?>
					

				</table>
			
		</section>
	</article>
</body>
</html>