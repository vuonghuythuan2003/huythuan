<?php
session_start();
// Kiểm tra xem có nút đăng xuất được nhấn hay không
if (isset($_POST['logout_button'])) {
    // Hủy bỏ phiên đăng nhập và chuyển hướng về trang đăng nhập
    session_destroy();
    header('Location: ../ADMIN/login.php');
    exit();
}

// Kiểm tra đăng nhập
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 && $_SESSION['session_id'] == session_id()) {
    // Nếu người dùng đã đăng nhập, lấy thông tin từ phiên
    $loggedInFullname = $_SESSION['fullname'];
    $loggedInUsername = $_SESSION['username'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bài Test</title>
        <link rel="stylesheet" href="../CSS/index.css">
        <link rel="stylesheet" href="../CSS/nav.css">
        <link rel="stylesheet" href="../CSS/bootstrap.min.css">
        <script src="../JS/jquery-3.4.1.js"></script>
        <script src="../JS/popper.min.js"></script>
        <script src="../JS/bootstrap.bundle.min.js"></script>
    </head>


    <body>
        <form method="post" action="">
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
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Giải pháp</a></li>
                <li><a href="#">Bài Test</a>
                    <ul class="sub-menu">
                        <li><a href="../vd_test/ls_test.php">Bài Test Chính</a></li>
                        <li><a href="test1.php">Bài Test 1</a></li>
                        <li><a href="test2.php">Bài Test 2</a></li>
                        <li><a href="test3.php">Bài Test 3</a></li>
                        <li><a href="test4.php">Bài Test 4</a></li>
                    </ul>
                </li>

                <li style="float: right; margin-right: 0px;">
                    <input type="submit" name="logout_button" style="padding: 7px 17px; color: white; background-color: orange; border: solid white;" value="Đăng xuất">
                </li>
                <li style="float: right; margin-right: 10px;">
                    <p style="color: white; padding: 7px 5px;">Xin chào, <?php echo $loggedInFullname; ?> (<?php echo $loggedInUsername; ?>)</p>
                </li>
            </ul>
        </form>

        <!-- <center>

            <div class="container" style="margin-top: 10px"></div>
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
        </center> -->

        <div style="margin: 50px;">
            <h2 style="text-align: justify;">Bài test đánh giá mức độ trầm cảm BECK&nbsp;</h2>
            <p style="text-align: justify;">Bài test mức độ trầm cảm BECK là một trong những phương pháp nhằm đánh giá về cảm xúc và mức độ trầm cảm tương đối phổ biến, được sử dụng trong các bệnh viện, phòng khám chuyên sâu về sức khoẻ tinh thần hiện nay.</p>
            <p style="text-align: justify;"><strong>Bài test nhằm mục đính:</strong></p>
            <ul style="text-align: justify;">
                <li>Tự đánh giá tình trạng Sức khoẻ tinh thần cá nhân.</li>
                <li>Dự đoán về Sức khoẻ tinh thần và có kế hoạch thăm khám phù hợp.</li>
                <li>Tổng hợp thông tin để thuận tiện khi thăm khám với Bác sĩ/Chuyên gia</li>
            </ul>
            <p style="text-align: justify;"><strong>Lưu ý:</strong></p>
            <p style="text-align: justify;">Kết quả bài test này chỉ mang tính chất tham khảo, không có giá trị thay thế chẩn đoán y khoa bởi bác sĩ/chuyên gia có chuyên môn.</p>
            <p style="text-align: justify;"><strong>Nguyên tắc thực hiện bài test:</strong></p>
            <p style="text-align: justify;">Bài test bao gồm 21 đề mục, hãy đọc cẩn thận tất cả các câu và chọn ra một đáp án gần giống nhất với <strong>tình trạng mà bạn cảm thấy trong 1 tuần trở lại đây</strong>, kể cả hôm nay.</p>
            <p style="text-align: justify;"><strong>Nguồn tham khảo:</strong></p>
            <p style="text-align: justify;"><a href="http://nimh.gov.vn/thang-danh-gia-tram-cam-beck-bdi/">Viện Sức khỏe Tâm thần, Bệnh viện Bạch Mai</a></p>
        </div>
        <p style="background-color: aqua; color:blue"><a href="../views/testform.php">Bắt đầu</a>
        </p>

    </body>

    </html>

<?php
} else {
    // Nếu người dùng chưa đăng nhập, có thể thêm xử lý tương ứng ở đây
    echo "Xin chào khách!";
}
?>