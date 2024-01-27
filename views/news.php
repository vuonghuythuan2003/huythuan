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
    <?php
        include "menu.html";
        include "banner.html";
    ?>

   
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
 <?php
    include "footer.html";
 ?>
</body>
</html>