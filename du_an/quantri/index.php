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
	<title>Quản trị website</title>
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
			<a href="themsp.php" ><h1>Thêm sản phẩm</h1></a>
		</section>
		
		
		
		<section class="anhtien" style="height: auto;background: #fff">
			<table cellpadding="0" cellspacing="0" >
				<tr style="background: #00dc82;height: 30px;color: #fff">
					
					<td>Mã sp</td>
                    <td>Tên sản phẩm</td>
					<td>Ảnh sp</td>

					<td>Khuyến mãi</td>

					<td>Giá</td>
					
					<td>Ngày đăng</td>


					<td>Tên danh mục</td>

					<td>View</td>

					<td><!-- Sửa --></td>
					<td><!-- Xóa --></td>
				</tr>
				<?php 
              include 'db.php';
              $sql="select * from sanpham";
              $kq=$conn->query($sql);
              foreach ($kq as $key => $row) {
              	?>
              	<tr class="abc">
              		
              		<td><?php echo $row['masp']; ?></td>
              		<td><?php echo $row['tensp']; ?></td>
              		<td><img src="../images/<?php echo $row['anhdd']; ?>" alt=""></td>
              		<td><?php echo $row['khuyenmai']; ?></td>
              		<td><?php echo $row['gia']; ?></td>
              		<td><?php echo $row['ngaydang']; ?></td>
              		<td><?php 
              $sqlm="select * from danhmuc";
              $kqm=$conn->query($sqlm);
              foreach ($kqm as $key => $value) {
              	?>
              <option value="<?php echo $value['madm']; ?>">
              	<?php if($row['madm'] == $value['madm']){ echo $value['tendm'];} ?>
              </option>
              
           <?php
               }

              		 ?></td>
              		<td><?php echo $row['view']; ?></td>
              		<td><a href="suasp.php?masua=<?php echo $row['masp']; ?>"><input type="submit" value="Sửa"></a></td>
              		<td><a href="xoasp.php?maxoa=<?php echo $row['masp']; ?>"><input type="submit" value="Xóa" onclick="return confirm('Bạn muốn xóa chứ')"></a></td>
              	</tr>
              	<?php 
              }


				 ?>
			</table>
		</section>
		
	</article>
</body>
</html>