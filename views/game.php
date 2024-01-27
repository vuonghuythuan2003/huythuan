<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kho Game</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/nav.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="../JS/jquery-3.4.1.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
    <style>
        body { text-align : center;}

        .row {
            margin-bottom: 20px;
        }

        .content {
            width: 30%;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            float: center;
        }

        .content img {
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .center-block {
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        h1 {
    text-align: center;
    color: #3498db; /* Màu xanh dương, có thể thay đổi theo sở thích của bạn */
    font-size: 3em; /* Kích thước font chữ */
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Hiệu ứng text shadow */
    font-family: 'Arial', sans-serif; /* Font chữ, thay đổi nếu bạn muốn */
  }
    </style>
</head>

<body>
    <?php
        include "menu.html"
    ?>
    <br><br><br><br>
        <h1>Thế giới game giải căng thẳng </h1>
        <br><br><br>

            <div class="row justify-content-center text-center">
    <?php
    $games = array(
        array('title' => 'Game Kéo Búa Bao', 'content' => 'Bạn và máy sẽ chơi cùng nhau', 'image' => '../IMAGE/gamekeobuabao.jpg', 'link' => 'gamekeobuabao.php'),
        array('title' => 'Game Rắn Săn Mồi', 'content' => 'Game giải trí đơn giản cho bạn', 'image' => '../IMAGE/ransanmoi.png', 'link' => 'gameransanmoi.php'),
        array('title' => 'Game Đoán số', 'content' => 'Cùng đoán số bí mật', 'image' => '../IMAGE/gamedoanso.png', 'link' => 'gamedoanso.php'),
        array('title' => 'Game Phá Gạch', 'content' => 'Cùng nhau phá gạch', 'image' => '../IMAGE/gamephagach.jpg', 'link' => 'gamephagach.php'),
        array('title' => 'Game Nhặt Quà', 'content' => 'Cùng nhau bắt quà trên trời', 'image' => '../IMAGE/gamevattrentroi.jpg', 'link' => 'gamevattrentroi.php'),
        array('title' => 'Game XO', 'content' => 'Cùng nhau chơi XO', 'image' => '../IMAGE/XO.jpg', 'link' => 'gameXO.php'),
    );

    foreach ($games as $game) {
        echo '<div class="col-lg-4 col-sm-6 content">';
        echo '<img src="' . $game['image'] . '" alt="Ảnh trò chơi" class="img-fluid">';
        echo '<h2>' . $game['title'] . '</h2>';
        echo '<p>' . $game['content'] . '</p>';
        echo '<a href="' . $game['link'] . '">Chơi ngay</a>';
        echo '</div>';
    }
    ?>
</div>
<?php
    include "footer.html"
?>
    
</body>

</html>
