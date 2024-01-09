<<!DOCTYPE html>
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
        <div class="container" style="margin-top: 10px"></div>
        <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12 border">
                    <div id="slide_show" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="../IMAGE/nav1.jpg" class="d-block w-100" alt="Ảnh 1">
    </div>
    <div class="carousel-item">
        <img src="../IMAGE/nav2.jpg" class="d-block w-100" alt="Ảnh 2">
    </div>
    <div class="carousel-item">
        <img src="../IMAGE/nav3.jpg" class="d-block w-100" alt="Ảnh 3">
    </div>
    <div class="carousel-item">
        <img src="../IMAGE/nav4.jpg" class="d-block w-100" alt="Ảnh 4">
    </div>
    <div class="carousel-item">
        <img src="../IMAGE/nav5.jpg" class="d-block w-100" alt="Ảnh 5">
    </div>
    <div class="carousel-item">
        <img src="../IMAGE/nav6.jpg" class="d-block w-100" alt="Ảnh 6">
    </div>
</div>
<ul class="carousel-indicators">
    <li data-target="#slide_show" data-slide-to="0" class="active"></li>
    <li data-target="#slide_show" data-slide-to="1"></li>
    <li data-target="#slide_show" data-slide-to="2"></li>
    <li data-target="#slide_show" data-slide-to="3"></li>
    <li data-target="#slide_show" data-slide-to="4"></li>
    <li data-target="#slide_show" data-slide-to="5"></li>
</ul>
<a class="carousel-control-prev" href="#slide_show" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Trước</span>
</a>
<a class="carousel-control-next" href="#slide_show" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Tiếp theo</span>
</a>

                    </div>
                </div>
            </div>

            <div class="row text-center">
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
    </center>
</body>

</html>
