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
    $articles = array(
        array('title' => '4 Phương pháp chữa lành tổn thương tâm lý', 'content' => 'Bạn có đang cảm thấy đau buồn, lo âu, trầm cảm? Hãy thử 4 phương pháp chữa lành tổn thương tâm lý sau đây nhé', 'image' => '../IMAGE/4pchualanh.png', 'link' => 'baiviet1.php'),
        array('title' => 'Bác sĩ tâm lý chữa trầm cảm - Top 4 chuyên gia uy tín', 'content' => 'Nếu bạn hay người thân đang phải đối mặt với chứng trầm cảm, hãy tham khảo ngay 4 Bác sĩ tâm lý chữa trầm cảm uy tín tại AiHealth sau đây nhé', 'image' => '../IMAGE/topchuyengia.jpg', 'link' => 'baiviet2.php'),
        array('title' => '5 Cách dễ ngủ do bác sĩ đề xuất', 'content' => 'Hàng đêm bạn mất rất nhiều thời gian để đi vào giấc ngủ? Hãy xem ngay 5 cách dễ ngủ do bác sĩ đề xuất để cải thiện ngay tình trạng này', 'image' => '../IMAGE/5meodengu.jpg', 'link' => 'baiviet3.php'),
    );

    echo '<div class="row">';
    foreach ($articles as $article) {
        echo '<div class="content">';
        echo '<img src="' . $article['image'] . '" alt="Ảnh bài viết">';
        echo '<h2>' . $article['title'] . '</h2>';
        echo '<p>' . $article['content'] . '</p>';
        echo '<a href="' . $article['link'] . '">Xem thêm</a>';
        echo '</div>';
    }
    echo '</div>';

    ?>
 </center>
</body>
</html>