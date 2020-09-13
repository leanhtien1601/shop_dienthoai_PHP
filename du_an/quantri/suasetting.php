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
	<title>Sửa</title>
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
    	$sql="select * from setting";
    	$kq=$conn->query($sql)->fetch();
    }
	 ?>
	 <form action="" method="POST" enctype="multipart/form-data">
	 	<h1>Sửa thông tin</h1>
	 	<input type="hidden" name="id" value="<?php echo $kq['id']; ?>"> <br>
	 	Ảnh : <img src="../images/<?php echo $kq['logo']; ?>" alt="" class="b" style="width: 180px;height: auto" alt=""> <br>
	 	<input type="file" name="logo" class="c" > <br>
	 	Địa chỉ : <br>
	 	<textarea name="footer" class="n" cols="30" style="height: 70px;margin-left: 160px;">
	 		<?php echo $kq['footer']; ?></textarea>

	 	 <br>
	 	Email  <input type="text" class="f" value="<?php echo $kq['email']; ?>" name="email"  > <br>
	 	<input type="submit" name="luu" value="Lưu thông tin" class="nm">
	 </form>	
     <?php 
    if (isset($_POST['luu'])) {
    	$id=$_POST['id'];
    	$footer=$_POST['footer'];
    	$email=$_POST['email'];
    	if (empty($_FILES['logo']['name'])) {
    		$sql="update setting set footer='$footer',email='$email'
    		where id='$masua' ";
    	} else {
    	$nameA = $_FILES['logo']['name'];
		$tmpA = $_FILES['logo']['tmp_name'];
		move_uploaded_file($tmpA, "../images/".$nameA);
		$sql="update setting set footer='$footer',logo='$nameA',email='$email' where id='$masua' ";
    	}
      $kq=$conn->prepare($sql);
   	 if ($kq->execute()) {
   	 	header("Location:setting.php");
   	 } else {
   	 	echo "Lỗi";
   	 }
    }




      ?>
	</article>
	
</body>
</html>