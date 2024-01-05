<?php
$username = $_GET['username'];
$conn = new PDO("mysql:host=localhost; dbname=nckh; charset=utf8", "root");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM t_user  WHERE username = ?";
$st = $conn->prepare($sql);
$st->execute([$username]);
$count = $st->rowCount();
echo json_encode(['count'=>$count]);
?>