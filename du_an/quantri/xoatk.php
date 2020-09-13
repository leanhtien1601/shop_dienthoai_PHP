<?php 
    include 'db.php';
    if (isset($_GET['maxoa'])) {
        $maxoa=$_GET['maxoa'];
        $sql="delete from taikhoan where user='$maxoa' ";
        $kq=$conn->prepare($sql);
        if ($kq->execute()) {
            header("Location:khach.php");
        } else{
            var_dump($kq);
        }
    }

     ?>

