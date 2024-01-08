<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kéo Búa Bao Game</title>
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
        }
        #result {
            font-size: 1.5em;
            margin-top: 20px;
        }
        button {
            margin: 5px;
            padding: 10px;
            font-size: 16px;
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

<hr>
<hr>
    <h1>Kéo Búa Bao Game</h1>

    <div>
        <button onclick="playGame('búa')">Búa</button>
        <button onclick="playGame('bao')">Bao</button>
        <button onclick="playGame('kéo')">Kéo</button>
    </div>

    <div id="result"></div>

    <script>
        function playGame(playerChoice) {
            var choices = ['búa', 'bao', 'kéo'];
            var computerChoice = choices[Math.floor(Math.random() * 3)];

            var result = determineWinner(playerChoice, computerChoice);

            document.getElementById('result').innerHTML = 'Bạn chọn ' + playerChoice + ', Máy chọn ' + computerChoice + '. ' + result;
        }

        function determineWinner(player, computer) {
            if (player === computer) {
                return "Hòa!";
            } else if ((player === 'búa' && computer === 'kéo') ||
                       (player === 'bao' && computer === 'búa') ||
                       (player === 'kéo' && computer === 'bao')) {
                return 'Bạn đã thắng!';
            } else {
                return 'Máy thắng!';
            }
        }
    </script>
<center>
</body>
</html>
