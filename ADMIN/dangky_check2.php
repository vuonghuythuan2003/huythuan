<?php
$email = $_GET['email'];
$conn = new PDO("mysql:host=localhost; dbname=nckh; charset=utf8", "root");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM t_user  WHERE email = ?";
$st = $conn->prepare($sql);
$st->execute([$email]);
$count = $st->rowCount();
echo json_encode(['count'=>$count]);
?>