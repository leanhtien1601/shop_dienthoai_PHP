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
	<title>Thêm sản phẩm</title>
	<link rel="stylesheet" href="CSS1/30.css">
	<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
	
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
			<h1>Thêm sản phẩm</h1>
		</section>
		<section class="themsp" style="padding-left: 150px;height: auto;background: #fff">
			<form action="" method="post" enctype="multipart/form-data">
				<br>
				Tên sản phẩm : <input type="text" class="a" name="tensp" required="" > <br>
				Ảnh sản phẩm : <input type="file" class="b" name="anhdd" > <br>
				Giá : <input type="number" class="c" name="gia" min="0" required=""> <br>
				Khuyến mại : <input type="number" class="d" name="khuyenmai" min="0" required="" > <br>
				
				Ngày đăng : <input type="date" class="f" name="ngaydang"> <br>
				
				Mã loại  
                <select name="type"  style="margin-left: 88px;">
			<?php 
            include 'db.php';
            $sqldm="select * from danhmuc";
            $kqdm=$conn->query($sqldm);
            foreach ($kqdm as $key => $value) {
            	?>
            	<option value="<?php echo $value['madm']; ?>">
            		<?php echo $value['tendm']; ?>
            	</option>
            	<?php
            }
			 ?>
		</select>
            <br> <br>
				Chi tiết : <br><textarea name="chitietsp" id="editor" class="e" style="width: 590px;margin-top: 20px;height: 170px;" ></textarea>  <br>
				<input type="submit" value="Thêm sản phẩm" class="n" name="luu">
			</form>
			<?php 
            include 'db.php';
            if (isset($_POST['luu'])) {
            	$tensp=$_POST['tensp']; 
            	$gia=$_POST['gia'];
                $khuyenmai=$_POST['khuyenmai'];
                $ngaydang=$_POST['ngaydang'];
                $type=$_POST['type'];
                $chitietsp=$_POST['chitietsp'];
                $nameA=$_FILES['anhdd']['name'];
                $tmpA=$_FILES['anhdd']['tmp_name'];
                $typeA = $_FILES['anhdd']['type'];
                if($typeA != "image/jpeg" && $typeA != "image/jpg" && $typeA != "image/png"){
					echo "Vui lòng chọn file jpeg/png/jpg";
				}else if($_FILES['images']['size'] > 2000000){
					echo "Vui lòng chọn ảnh nhỏ hơn 2MB";
				} else{
					move_uploaded_file($tmpA, "../images/".$nameA);
                $sql="insert into sanpham values('','$nameA','$khuyenmai','$gia','$chitietsp','$ngaydang','$type','','$tensp')"; 
                $kq=$conn->exec($sql);
                if ($kq==1) {
                	header("Location:index.php");
                } else {
                	echo "Lỗi";
                }

				}
            }
			 ?>
		</section>
		
	</article>
</body>
</html>