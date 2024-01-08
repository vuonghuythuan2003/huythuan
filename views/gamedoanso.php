<?php
session_start();

$secretNumber = isset($_SESSION['secretNumber']) ? $_SESSION['secretNumber'] : rand(1, 100);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userGuess = isset($_POST['guess']) ? (int)$_POST['guess'] : 0;

    if ($userGuess > $secretNumber) {
        $message = 'Quá lớn, hãy thử lại!';
    } elseif ($userGuess < $secretNumber) {
        $message = 'Quá nhỏ, hãy thử lại!';
    } else {
        $message = 'Chính xác! Bạn đã đoán đúng số ' . $secretNumber;
        session_destroy(); // Reset trò chơi sau khi đoán đúng
    }
} else {
    $message = 'Chào mừng đến với trò chơi Đoán số!';
    $_SESSION['secretNumber'] = $secretNumber;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the Number Game</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/nav.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="../JS/jquery-3.4.1.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 50px auto;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>

<body>
<ul class="hmenu">
        <li><a href="#">Trang chủ</a></li>
        <li><a href="#">Tổng quan</a>
            <ul class="sub-menu">
                <li><a href="#">Nguyên nhân</a></li>
                <li><a href="#">Đặc điểm</a></li>
                <li><a href="#">Triệu chứng</a></li>
                <li><a href="#">Đối tượng</a></li>
            </ul>
        </li>
        <li><a href="lienhe.php">Liên hệ</a></li>

        <li><a href="#">Giải pháp</a>
        <ul class="sub-menu">
                <li><a href="baiviet.php">Bài viết</a></li>
                <li><a href="video.php">Video</a></li>
                <li><a href="game.php">Game</a></li>
            </ul>
        </li>
        <li><a href="#">Bài Test</a></li>

        <li style="float: right; margin-right: 0px;">
        <button id="submit" style="padding: 10px 20px; color: white; background-color: orange; border: solid white;">
            <a href="#" style="text-decoration: none; color: #ffffff;">Đăng xuất</a>
        </button>
    </li> 
</ul>
<center>
    <div class="container">
        <h1>Trò chơi Đoán số</h1>
        <p><?php echo $message; ?></p>
        <form method="post">
            <label for="guess">Nhập số của bạn (từ 1 đến 100): </label>
            <input type="number" id="guess" name="guess" min="1" max="100" required>
            <button type="submit">Đoán</button>
        </form>
    </div>
</body>

</html>
