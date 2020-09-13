<?php 
    include 'db.php';
    if (isset($_GET['maxoa'])) {
    	$maxoa=$_GET['maxoa'];
    	$sql="delete from slide where maslide='$maxoa' ";
    	$kq=$conn->prepare($sql);
     	if ($kq->execute()) {
     		header("Location:slider.php");
     	} else{
     		echo "Lỗi";
     	}
    }

	 ?>