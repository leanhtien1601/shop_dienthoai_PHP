<?php 
    include 'db.php';
    if (isset($_GET['maxoa'])) {
    	$maxoa=$_GET['maxoa'];
        $sqq="select * from binhluan mabl='$maxoa'";
        $kqq=$conn->query($sqq);

    	$sql="delete from binhluan where mabl='$maxoa'";
    	$kq=$conn->prepare($sql);
        $kq->execute();
     	if ($kq->execute()) {
     		header("Location:chitiet.php?masp=".$kqq['masp']);
     	} else{
     		echo "Lỗi";
     	}
    }

	 ?>