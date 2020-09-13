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
	<link rel="stylesheet" href="CSS1/26.css">
  <link rel="stylesheet" href="CSS1/40.css">
  
	<title>Sửa sản phẩm</title>
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
    if (isset($_GET['masua'])) {
    	$masua=$_GET['masua'];
    	$sql="select * from sanpham where masp = $masua";
        $kq=$conn->query($sql)->fetch();
    }
?>
<form action="" method="post" enctype="multipart/form-data">
	<h1>- Sửa thông tin -</h1>
	<input type="hidden" name="masp" value="<?php echo $kq['masp']; ?>"> <br>
	Tên sản phẩm  <input type="text" class="a" name="tensp" value="<?php echo $kq['tensp']; ?>" > <br>
	Ảnh : <img src="../images/<?php echo $kq['anhdd']; ?>" class="b" style="width: 180px;height: auto" alt="" >  <br>
	<input type="file" name="anhdd" class="c" > <br>
	Khuyến mãi : <input type="number" class="e" name="khuyenmai" value="<?php echo $kq['khuyenmai']; ?>" min="0" > <br>
	Giá : <input type="number" class="f" name="gia" value="<?php echo $kq['gia']; ?>" min="0"  > <br>
	Chi tiết :  <br>
	<textarea name="chitietsp" id=""  class="m">
		<?php echo $kq['chitietsp']; ?>
	</textarea> <br>
	Ngày đăng : <input type="date" class="n" name="ngaydang" value="<?php echo $kq['ngaydang'] ?>"> <br>
	Tên danh mục <select name="type" id="" class="mn">
		<?php 
        $sqlm="select * from danhmuc";
        $kqm=$conn->query($sqlm);
        foreach ($kqm as $key => $value) {
        	?>
        	<option value="<?php echo $value['madm'];?>" 
            <?php if($value['madm']==$kq['madm']){
            	echo "selected";} ?>>
        		<?php echo $value['tendm']; ?>
        	</option>
        	<?php
        }
     ?>
	</select>  <br> <br>
     <input type="submit" value="Lưu thông tin" name="luu" class="nm">
</form>
  <?php 
   if (isset($_POST['luu'])) {
   	 $masp=$_POST['masp'];
   	 $tensp=$_POST['tensp'];
   	 $khuyenmai=$_POST['khuyenmai'];
   	 $gia=$_POST['gia'];
   	 $chitietsp=$_POST['chitietsp'];
   	 $ngaydang=$_POST['ngaydang'];
   	 $type=$_POST['type'];
   	 if (empty($_FILES['anhdd']['name'])) {
   	 	$sql="update sanpham set tensp='$tensp',khuyenmai='$khuyenmai',gia='$gia',chitietsp='$chitietsp',ngaydang='$ngaydang',madm='$type' where masp='$masua' ";

   	 } else{
   		$nameA = $_FILES['anhdd']['name'];
		$tmpA = $_FILES['anhdd']['tmp_name'];
		move_uploaded_file($tmpA, "../images/".$nameA);
		$sql="update sanpham set tensp='$tensp',khuyenmai='$khuyenmai',gia='$gia',chitietsp='$chitietsp',ngaydang='$ngaydang',madm='$type',anhdd='$nameA' where masp='$masua' ";
   	 } 
   	 $kq=$conn->prepare($sql);
   	 if ($kq->execute()) {
   	 	header("Location:index.php");
   	 } else {
   	 	echo "Lỗi";
   	 }
   }
   ?>
   </article>
</body>
</html>