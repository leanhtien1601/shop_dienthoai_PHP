<?php 

session_start();
include 'db.php';
// echo $_SESSION['user'];

if ($_SESSION['phanquyen']!='Ad') {
	 $_SESSION['user']=$user;
	header("Location:../trangchu.php");
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chi tiết bình luận</title>
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
		<?php 
				include 'db.php';
				if(isset($_GET['masp'])){
					$masp = $_GET['masp'];
					$sql_sp = "select * from sanpham where masp = '$masp'";
					$kq_sp = $conn->query($sql_sp)->fetch();
				}
			 ?>
		<section class="anhtien">
			<table cellpadding="0" cellspacing="0" >
			<tr style="background: #00dc82;height: 30px;color: #fff">
				
					<td>STT</td>
					<td>Tài khoản bình luận</td>
					<td>Ngày bình luận</td>
					<td>Nội dung bình luận</td>
					<td>Xóa</td>
			</tr>
			<?php 
					$sql = "select * from binhluan where masp = '$masp'";
					$kq = $conn->query($sql);
					foreach ($kq as $key => $row) {
				?>
				<tr class="abc">
				<td><?php echo $key+1; ?></td>
					<td><?php echo $row['user'] ?></td>
					<td><?php echo $row['ngaybl'] ?></td>
					<td><?php echo $row['nd'] ?></td>
					<td><a href="xoabinhluan.php?maxoa=<?php echo $row['mabl'] ?>" onclick="return confirm('Bạn có thực sự muốn xóa không ?')"><input type="submit" value="Xóa"></a></td>
			</tr>
				<?php
			}
			?>
			
		</table>
		</section>
	</article>
</body>
</html>