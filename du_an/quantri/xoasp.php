<?php 
    include 'db.php';
    if (isset($_GET['maxoa'])) {
    	$maxoa=$_GET['maxoa'];
    	$sql="delete from sanpham where masp=$maxoa";
    	$kq=$conn->prepare($sql);
     	if ($kq->execute()) {
     		header("Location:index.php");
     	} else{
     		echo "Lỗi";
     	}
    }

	 ?>
