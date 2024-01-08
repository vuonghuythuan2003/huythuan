<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/nav.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="../JS/jquery-3.4.1.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
    <style>
        .row {
            clear: both;
            margin-bottom: 20px;
        }

        .content {
            width: 30%;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            float: left;
        }

        .video-container,
        .content img {
            width: 100%;
            height: auto;
            max-width: 100%; 
            display: block; 
            margin: 0 auto; 
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
            <div class="rows" height="50px" width="100px">
                <div class="col-lg-8 col-sm-12 border">
                    <div id="slide_show" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../IMAGE/nav1.jpg" class="d-block w-100" alt="Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="../IMAGE/nav2.jpg" class="d-block w-100" alt="Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="../IMAGE/nav3.jpg" class="d-block w-100" alt="Image 3">
                            </div>
                            <div class="carousel-item">
                                <img src="../IMAGE/nav4.jpg" class="d-block w-100" alt="Image 4">
                            </div>
                            <div class="carousel-item">
                                <img src="../IMAGE/nav5.jpg" class="d-block w-100" alt="Image 5">
                            </div>
                            <div class="carousel-item">
                                <img src="../IMAGE/nav6.jpg" class="d-block w-100" alt="Image 6">
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
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#slide_show" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
   
    <?php
    
    $videos = array(
        array('title' => 'Vượt qua trầm cảm – Hành trình chữa lành ', 'url' => 'qyTrplpPETI'),
        array('title' => 'Đồng hành cùng con vượt qua trầm cảm', 'url' => 'NyFXvujE6ts'),
        array('title' => 'Xua tan áp lực – Đón Tết đủ đầy', 'url' => 'vuSuDvG2-sI'),
        array('title' => 'NHẠC THIỀN - TĨNH TÂM - AN NHIÊN TỰ TẠI.', 'url' => '5FCcXCchXDk'),
        array('title' => 'Âm nhạc sức khỏe trị liệu tinh tế ', 'url' => 'pAqSD_sIBkA'),
        array('title' => 'Âm nhạc trị liệu cho các mạch máu và máu', 'url' => 'jEuH22TeiKg'),
        array('title' => 'Podcast #37: ai cũng đi qua cơn giông của riêng mình', 'url' => 'deYD4raZssg'),
        array('title' => 'Cách vượt qua 03 nỗi sợ lớn nhất', 'url' => 'odjCDVBCepU'),
        array('title' => 'Cách để đối diện với tiêu cực và vượt qua nó', 'url' => 'bdK95yNhIP0'),
    );



    
    echo '<div class="row">';
    foreach ($videos as $video) {
        echo '<div class="content">';
        echo '<h2>' . $video['title'] . '</h2>';
        echo '<div class="video-container">';
        echo '<iframe width="100%" height="315" src="https://www.youtube.com/embed/' . $video['url'] . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    ?>
 </center>
</body>
</html>