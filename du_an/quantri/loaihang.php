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
	<title>Loại hàng</title>
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
			<a href="themdm.php"><h1>Thêm danh mục</h1></a>
		</section>

		
		<section class="vip" style="height: auto;background: #fff">
			
				<table cellpadding="0" cellspacing="0" style="height: auto;background: #fff">
					<tr style="background: #00dc82;height: 30px;color: #fff">
						<td>Mã hàng</td>
						<td>Tên danh mục</td>
						<td>Ảnh danh mục</td>
						<td><!-- Sửa --></td>
						<td><!-- Xóa --></td>
					</tr>
        <?php 
                include 'db.php';
                $sql="select * from danhmuc";
                $kq=$conn->query($sql);
                foreach ($kq as $key => $row) {
                  ?>
                  <tr class="abc">
                  	<td><?php echo $row['madm']; ?></td>
                  	<td><?php echo $row['tendm']; ?></td>
                  	<td><img src="../images/<?php echo $row['anhdd']; ?>" alt=""></td>
                  	<td><a href="suadm.php?masua=<?php echo $row['madm']; ?>"><input type="submit" value="Sửa"></a></td>
                  	<td><a href="xoadm.php?maxoa=<?php echo $row['madm']; ?>"><input type="submit" value="Xóa" onclick="return confirm('Bạn muốn xóa chứ !!!')"></a></td>

                  </tr>
                  <?php
                }


         ?>



                </table>
			
		</section>
	</article>
</body>
</html>