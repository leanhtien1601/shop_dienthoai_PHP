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
	<title>Sửa danh mục</title>
	<link rel="stylesheet" href="CSS1/26.css">
  <link rel="stylesheet" href="CSS1/40.css">
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
    	$sql="select * from danhmuc where madm = $masua";
        $kq=$conn->query($sql)->fetch();
    }
   ?>
   <form action="" method="post" enctype="multipart/form-data">
   	<h1>Sửa thông tin</h1>
   	<input type="hidden" value="<?php echo $kq['madm']; ?>"> <br>
   	Tên danh mục <input type="text" class="a"  name="tendm" value="<?php echo $kq['tendm']; ?>"> <br>
   	Ảnh <img src="../images/<?php echo $kq['anhdd']; ?>" style="width: 180px;height: auto"alt="" class="b" > <br>
   	<input type="file" class="c" name="anhdd" > <br>
   	<input type="submit" value="Lưu thông tin" name="luu" class="nm">
   </form>
   <?php 
    if (isset($_POST['luu'])) {
    	$madm=$_POST['madm'];
    	$tendm=$_POST['tendm'];
    	if (empty($_FILES['anhdd']['name'])) {
    		$sql="update danhmuc set tendm='$tendm' where madm='$masua' ";

    	} else{
    	$nameA = $_FILES['anhdd']['name'];
		$tmpA = $_FILES['anhdd']['tmp_name'];
		move_uploaded_file($tmpA, "../images/".$nameA);
		$sql="update danhmuc set tendm='$tendm',anhdd='$nameA' where madm='$masua' ";
    	} $kq=$conn->prepare($sql);
    	if ($kq->execute()) {
   	 	header("Location:loaihang.php");
   	 } else {
   	 	echo "Lỗi";
   	 }
    }


    ?></article>
</body>
</html>