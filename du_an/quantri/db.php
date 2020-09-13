<?php
try {
    $conn = new PDO(
        "mysql:host=localhost;dbname=du_an;
	charset=utf8",
        "root",
        ""
    );
} catch (PDOException $e) {
    echo "Lỗi";
}
?>
