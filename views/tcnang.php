<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7 giải pháp cho người bị bệnh trầm cảm nặng</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/nav.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .hmenu {
            background-color: #333;
            overflow: hidden;
            padding: 10px;
        }

        .hmenu a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .hmenu a:hover {
            background-color: #ddd;
            color: black;
        }

        .hmenu li {
            float: left;
            list-style-type: none;
            position: relative;
        }

        .hmenu ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #f9f9f9;
            padding: 10px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .hmenu li:hover ul {
            display: block;
        }

        h1, h2, h3, p {
            margin: 0;
            padding: 0;
        }

        img {
            width: 100%;
            height: auto;
            max-width: 800px;
            display: block;
            margin: 20px auto;
        }

        .article {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        .article-content {
            flex: 1;
        }
    </style>
    <script src="../JS/jquery-3.4.1.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
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

    <?php
    
    $articleContent = "
    <div class='article'>
        <div class='article-content'>
            <h1>7 giải pháp cho người bị bệnh trầm cảm nặng</h1><br>
            <h2><i>Trầm cảm nặng là giai đoạn khá nguy hiểm, người bệnh có nhiều triệu chứng tiêu cực, thậm chí còn nghĩ đến cái chết. Để điều trị bệnh đòi hỏi một quá trình kiên trì và bền bỉ của người bệnh và bạn cũng đừng quên áp dụng 7 giải pháp dưới đây để bệnh được cải thiện tốt nhất nhé.</i></h2><br>
            <h3>Thuốc chống trầm cảm</h3><br>
            <p>
                Thuốc chống trầm cảm cho phép điều trị các triệu chứng trầm cảm nhẹ hay nặng tùy vào thành phần hóa học của từng loại thuốc. Thuốc làm tăng các chất kích thích hoạt động thần kinh trong não, trong khi đó một số khác làm kéo dài hoạt động của những chất này. Điều trị bằng thuốc chống trầm cảm giúp giảm 50 – 65% triệu chứng bệnh nhưng lại có thể gây nghiện. Hơn nữa, cũng cần lưu ý đến tác dụng phụ của thuốc chống trầm cảm, vì thế cần tuân thủ tuyệt đối theo hướng dẫn của bác sĩ.
            </p>
            <h3>Liệu pháp ánh sáng</h3><br>
            <p>
                Thiếu ánh sáng cũng có thể là nguyên nhân dẫn đến bệnh trầm cảm, đặc biệt là phụ nữ. Thông thường vào mùa thu và mùa đông, thời tiết ảm đạm, mốt số chị em dễ mắc bệnh trầm cảm theo mùa. Loại trầm cảm này được gọi là trầm cảm theo mùa. Nguyên nhân gây bệnh là do sự sụt giảm chất dẫn truyền (gồm serotoin, noradrenalin, dopamin) do thiếu ánh sáng. Khi mắc bệnh trầm cảm theo mùa, người bệnh thường thích ăn đồ ngọt, ngủ nhiều và mất đi hứng thú trong công việc cũng như cuộc sống. Để phòng và điều trị căn bệnh này, nên sử dùng đèn điện có ánh sáng mạnh trong suốt mùa thu và đông. Ánh sáng này sẽ thúc đẩy hoạt động của tuyến yên và tuyền tùng.
            </p>
        </div>
    </div>
    <div class='article'>
        <div class='article-content'>
            <h3>Biện pháp Sophrologie</h3><br>
            <p>
                Đây là biện pháp quy tụ các biện pháp thư giãn, cho phép người bệnh tập trung cao độ. Biện pháp này giúp thúc đẩy việc truyền tín hiệu giữa các nơron thần kinh, vì thế giúp người bệnh vượt qua được trầm cảm nhẹ.
            </p>
            <h3>Các biện pháp tâm lý</h3><br>
            <p>
                Liệu pháp tâm lý nhận thức và thể hiện cho phép người bệnh chế ngự tâm trạng, sự lo lắng và giải quyết các vấn đề về tâm lý. Một đợt điều trị bệnh trầm cảm bằng phương pháp tâm lý thường kéo dài trong 12 - 20 buổi. Mục đích của phương pháp này là nhằm giảm, thậm chí làm biến mất những triệu chứng của bệnh trầm cảm, giúp người bệnh tự nhận thức về bản thân.
            </p>
            <h3>Sử dụng thực phẩm chống stress</h3><br>
            <p>
                Tất nhiên không một nhà khoa học nào khẳng định có một loại hay một nhóm thực phẩm nào giúp con người chống lại căn bệnh trầm cảm. Tuy nhiên không ai phủ nhận được rằng chế độ dinh dưỡng cân bằng sẽ giúp chúng ta có một trạng thái tinh thần tốt. Không những thế, chất omega-3 có trong các loại cá nhiều mỡ (cá ngừ, cá hồi...) góp phần chăm sóc các tế bào thần kinh. Một vài nghiên cứu đã chỉ ra rằng chất này mang lại hiệu quả nhất định trong phòng và điều trị bệnh trầm cảm. Bên cạnh đó, canxi, magie cũng rất tốt cho hệ thần kinh. Chúng kích thích quá trình truyền tín hiệu, hỗ trợ điều trị căn bệnh trầm cảm.
            </p>
        </div>
    </div>
    <div class='article'>
        <div class='article-content'>
            <h3>Kiểm soát giấc ngủ</h3><br>
            <p>
                Ngủ không ngon, thường tỉnh giấc vào giữa đêm, ngủ quá nhiều, đặc biệt là bị mất ngủ (chiếm 80% trường hợp bị trầm cảm) thường là những triệu chứng của bệnh trầm cảm. Để đẩy lùi bệnh trầm cảm bạn hãy ngủ đúng giờ. Tránh các đồ uống kích thích (chè, rượu, cà phê...) sau bữa tối. Tránh xem vô tuyến hay làm việc trên giường ngủ.
            </p>
            <h3>Vận động thân thể</h3><br>
            <p>
                Vận động hàng ngày dù ít hay nhiều cũng giúp giảm thiểu sự buồn phiền, giúp bạn chống lại stress, tăng chất lượng giấc ngủ. Khi cơ thể vận động, các chất dẫn truyền endorphin và dopamin được giải phóng, giúp cơ thể hưng phấn. Hãy đi bộ, tập yoga, hay chọn bất kỳ một môn thể thao mà bạn yêu thích và phù hợp với sức của bạn.
            </p>
        </div>
    </div>
    <br>
    ";

    echo $articleContent;
    ?>
</body>

</html>