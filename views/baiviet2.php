<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bác sĩ tâm lý chữa trầm cảm</title>
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

        .form-container {
            flex: 1;
            padding-left: 20px;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
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

    <img src="../IMAGE/topchuyengia.jpg" alt="Ảnh chữa lành">

    <?php
    
    $articleContent = "
    
       <div class='article'>
            <div class='article-content'>
                <h1> Bác sĩ tâm lý chữa trầm cảm – Top 4 chuyên gia uy tín</h1><br>
                <p>
                    Nếu bạn hay người thân đang phải đối mặt với chứng trầm cảm, hãy tham khảo ngay 4 Bác sĩ tâm lý chữa trầm cảm uy tín tại AiHealth sau đây nhé.
                </p>
                <h2>Căn bệnh trầm cảm nguy hiểm như thế nào?</h2><br>
                <p>
                    Trầm cảm là một căn bệnh tâm lý có thể gây hủy hoại cuộc sống của một người, thậm chí một gia đình. Người bệnh trầm cảm nếu không được quan tâm và trị liệu kịp thời có thể dẫn đến những hành động tự hại, hoặc gây hại cho người khác.
                </p>
            
    <p>
        Trầm cảm là một căn bệnh tâm lý có thể gây hủy hoại cuộc sống của một người, thậm chí một gia đình. Người bệnh trầm cảm nếu không được quan tâm và trị liệu kịp thời có thể dẫn đến những hành động tự hại, hoặc gây hại cho người khác.<br>

        Hiện nay, bệnh trầm cảm có thể được điều trị hiệu quả với 2 phương pháp phổ biến nhất: tìm bác sĩ tâm lý chữa trầm cảm để trị liệu tâm lý hoặc sử dụng thuốc. Những trường hợp nặng, trầm cảm lâu năm thường cần kết hợp cả trị liệu tâm lý và dùng thuốc mới có hiệu quả.<br>

        AiHealth xin lưu ý rằng những thuốc dành cho người bệnh trầm cảm cần được bác sĩ kê đơn và theo dõi trong suốt quá trình uống để đảm bảo không gây ra tác dụng phụ quá mức hoặc được điều chỉnh phù hợp theo sự thay đổi tâm lý của người bệnh.<br>

<h2>Top 4 Bác sĩ tâm lý chữa trầm cảm uy tín</h2><br>
<h3>Bác sĩ – Nhà trị liệu tâm lý Nguyễn Khắc Liêm</h3><br>

Bác sĩ Nguyễn Khắc Liêm là một trong những nhà trị liệu tâm lý được khách hàng lựa chọn nhiều nhất trên ứng dụng chăm sóc sức khỏe AiHealth trong lĩnh vực chữa trị trầm cảm. Với 33 năm kinh nghiệm trong y khoa, nhà trị liệu đã thành công tham vấn và trị liệu cho bệnh nhân mắc các vấn đề tâm lý như trầm cảm, rối loạn lo âu, áp lực công việc và tâm lý trẻ em.<br>

Bác sĩ, nhà trị liệu Nguyễn Khắc Liêm luôn đặt lợi ích và sức khỏe của bệnh nhân lên hàng đầu, trò chuyện thân thiện, thấu hiểu sẻ chia và luôn biết cách áp dụng các phương pháp trị liệu phù hợp với từng bệnh nhân để đạt được kết quả trị liệu tốt nhất<br>

<h3>Bác sĩ – Nhà trị liệu Mai Thị Thương</h3><br>
Nếu bạn đang tìm một bác sĩ tâm lý chữa trầm cảm uy tín, có thể vừa trị liệu tâm lý vừa kê đơn thuốc cho bệnh nhân thì Bác sĩ Mai Thị Thương sẽ là một lựa chọn đúng đắn. Bác sĩ, nhà trị liệu Mai Thị Thương là bác sĩ chuyên khoa Tâm Thần hành nghề từ năm 2009 và bắt đầu tư vấn tâm lý từ năm 2017.<br>

Bác sĩ đã có nhiều năm kinh nghiệm tham vấn tâm lý cho phụ nữ trầm cảm sau sinh, những người bị rối loạn lo âu, đối tượng sau cai nghiện gặp trầm cảm và rối loạn cảm xúc.<br>

Bác sĩ Mai Thị Thương có trình độ chuyên môn cao, thường dành rất nhiều thời gian nghiên cứu các phương pháp trị liệu phù hợp cho từng tình trạng tâm lý và đã giúp rất nhiều người bệnh trầm cảm trở lại cuộc sống bình thường<br>
<h3>Bác sĩ Chuyên khoa Tâm thần Lê Thị Hảo</h3><br>
Bác sĩ Lê Thị Hảo hiện là bác sĩ chuyên khoa 1 tại Bệnh Viện Tâm Thần Hà Nội với hơn 8 năm kinh nghiệm tư vấn cho nhiều trường hợp trầm cảm. Bác sĩ Hảo đã áp dụng thành công các phương pháp điều trị tâm lý mới nhất, phù hợp nhất để giúp người bệnh nhận thức đúng những vấn đề tâm lý đang gặp phải và từ từ giải quyết chúng. Bác sĩ Hảo luôn tận tâm và chu đáo trong việc chăm sóc người bệnh, đồng thời đưa ra các giải pháp tốt nhất cho từng trường hợp<br>
<h3>Bác sĩ Đa khoa – Thạc sỹ Hà Thị Cẩm Hương</h3><br>
Hoạt động từ năm 2017, Bác sĩ Hà Thị Cẩm Hương là Bác Sĩ Nội Tổng Quát Và Tâm Lý Tâm Thần tại Bệnh viện Thủ Đức. Áp dụng những phương pháp chuyên môn kết hợp với trò chuyện gợi mở, thấu hiểu và nắm bắt được những ‘điểm mù” trong tâm lý người bệnh, bác sĩ Hương đã tham vấn thành công cho nhiều ca bệnh trầm cảm, để bệnh nhân tìm lại được niềm tin vào cuộc sống tươi đẹp.<br></p>


</div>
<div class='form-container'>
<!-- Form điền thông tin -->
<form action='#' method='post'>
    <label for='ten'>Tên:</label>
    <input type='text' id='ten' name='ten'><br>

    <label for='email'>Email:</label>
    <input type='email' id='email' name='email'><br>

    <input type='submit' value='Gửi'>
</form>
</div>
</div>
";

echo $articleContent;
?>
</body>

</html>
