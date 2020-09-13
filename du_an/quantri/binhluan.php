
<?php 
session_start();
include 'db.php';
// echo $_SESSION['user'];

if ($_SESSION['phanquyen']!='Ad') {
	 $_SESSION['user']=$user;
	header("Location:../trangchu.php");
} 

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bình luận</title>
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
			<h1>Bảng bình luận</h1>
		</section>
		<section class="anhtien">
			<table cellpadding="0" cellspacing="0" >
				<tr style="background: #00dc82;height: 30px;color: #fff"> 
					<td> STT</td>
					
					<td>Tên sản phẩm</td>
					<td>Số bình luận</td>
					
					<td>Chi tiết</td>
					
				</tr>
                <?php 
            include 'db.php';
            $sql="select * from sanpham";
            $kq=$conn->query($sql);
            foreach ($kq as $key => $value) {
            	$value_sp=$value['masp'];
            	$sql_bl="select masp, count(masp) as
            	count_sp from binhluan where masp='$value_sp' ";
            	$kq_bl=$conn->query($sql_bl)->fetch();
            	if ($value_sp == $kq_bl['masp']) {
            		?>
            		<tr class="abc">
            			<td><?php echo $key+1 ?></td>
            			<td><?php echo $value['tensp']; ?></td>
            			<td><?php echo $kq_bl['count_sp']; ?></td>
            			<td><a href="chitiet.php?masp=<?php echo $value_sp ?>"><input type="submit" value="Chi tiết"></a></td>
            		</tr>
            		<?php
            	}
            }

                 ?>



				
				
			</table>
		</section>
		
	</article>
</body>
</html>