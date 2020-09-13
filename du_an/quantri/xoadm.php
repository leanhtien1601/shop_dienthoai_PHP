<?php 
    include 'db.php';
    if (isset($_GET['maxoa'])) {
    	$maxoa=$_GET['maxoa'];
    	$sql="delete from danhmuc where madm='$maxoa' ";
    	$kq=$conn->prepare($sql);
     	if ($kq->execute()) {
     		header("Location:loaihang.php");
     	} else{
     		echo "Lỗi";
     	}
    }

	 ?>