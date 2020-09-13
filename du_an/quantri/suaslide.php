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
	<title>Sửa slide</title>
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
    	$sql="select * from slide where maslide= $masua";
    	$kq=$conn->query($sql)->fetch();
    }

     ?>	
     <form action="" method="post" enctype="multipart/form-data">
     	<h1>Sửa thông tin</h1>
     	<input type="hidden" name="maslide" value="<?php echo $kq['maslide']; ?>"> <br>
     	Ảnh <img src="../images/<?php echo $kq['anhdd']; ?>" class="b" style="width: 180px;height: auto" alt=""> <br>
     	<input type="file" class="c" name="anhdd" > <br>
     	Link : <input type="text" name="link" value="<?php echo $kq['link']; ?>" class="e" style="margin-left: 95px;"> <br>
     	Trạng thái
      <?php 
         if ($kq['trangthai']=='On') {
      ?>
        <input type="radio" name="trangthai" checked="" value="On" >ON
        <input type="radio" name="trangthai" value="Off">Off
      <?php 
         }elseif($kq['trangthai']=='Off'){
      ?> 
        <input type="radio" name="trangthai"  value="On" >ON
        <input type="radio" name="trangthai" checked=""  value="Off">Off
      <?php
         }
      ?>

       

      <br>
     	<input type="submit" name="luu" value="Lưu thông tin" class="nm">
     </form>
     <?php 
   if (isset($_POST['luu'])) {
   	$maslide=$_POST['maslide'];
   	$link=$_POST['link'];
   	$trangthai=$_POST['trangthai'];
   	if (empty($_FILES['anhdd']['name'])) {
   		$sql="update slide set link='$link',trangthai='$trangthai' where maslide='$masua' ";
   	} else{
   		$nameA = $_FILES['anhdd']['name'];
		$tmpA = $_FILES['anhdd']['tmp_name'];
		move_uploaded_file($tmpA, "../images/".$nameA);
		$sql="update slide set link='$link',anhdd='$nameA',trangthai='$trangthai' where maslide='$masua' ";

   	}
   	  $kq=$conn->prepare($sql);
    	if ($kq->execute()) {
   	 	header("Location:slider.php");
   	 } else {
   	 	// echo "Lỗi";
   	 	var_dump($kq);
   	 }
   }


      ?>
	</article>
</body>
</html>