<?php
session_start();
// Kiểm tra xem có nút đăng xuất được nhấn hay không
if (isset($_POST['logout_button'])) {
    // Hủy bỏ phiên đăng nhập và chuyển hướng về trang đăng nhập
    session_destroy();
    header('Location: vd_dn.php');
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
                <li><a href="#">Bài Test</a></li>

                <li style="float: right; margin-right: 0px;">
                    <input type="submit" name="logout_button" style="padding: 7px 17px; color: white; background-color: orange; border: solid white;" value="Đăng xuất">
                </li>
                <li style="float: right; margin-right: 10px;">
                    <p style="color: white; padding: 7px 5px;">Xin chào, <?php echo $loggedInFullname; ?> (<?php echo $loggedInUsername; ?>)</p>
                </li>
            </ul>
        </form>


    </body>

    </html>

<?php
} else {
    // Nếu người dùng chưa đăng nhập, có thể thêm xử lý tương ứng ở đây
    echo "Xin chào khách!";
}
?>

<?php

// Hàm phân loại trạng thái trầm cảm
function classifyDepression($score)
{
    if ($score < 14) {
        return "Không biểu hiện trầm cảm";
    } elseif ($score >= 14 && $score <= 19) {
        return "Trầm cảm nhẹ";
    } elseif ($score >= 20 && $score <= 29) {
        return "Trầm cảm vừa";
    } else {
        return "Trầm cảm nặng";
    }
}

// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "nckh");
if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

// Lấy các thông tin từ phiên
$userId = $_SESSION['user_id'];
$username = $_SESSION['username'];
$fullname = $_SESSION['fullname'];

// Lấy điểm của người dùng từ cuộc khảo sát
if (isset($_POST['user_score'])) {
    $userScore = intval($_POST['user_score']);
    $depressionStatus = classifyDepression($userScore);

    // Kiểm tra xem bản ghi đã tồn tại hay chưa
    $checkQuery = "SELECT id_name FROM user_tests WHERE id_name = '$userId'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Nếu bản ghi đã tồn tại, bạn có thể cập nhật nó thay vì chèn mới.
        $updateQuery = "UPDATE user_tests SET testmain = '$userScore - $depressionStatus', time_taken = NOW(), next_test_time = DATE_ADD(NOW(), INTERVAL 1 WEEK) WHERE id_name = '$userId'";
        if ($conn->query($updateQuery) === TRUE) {
            echo "Dữ liệu đã được cập nhật thành công trong CSDL. Điểm và loại trầm cảm: $userScore - $depressionStatus <br>";
        } else {
            echo "Lỗi khi cập nhật dữ liệu trong CSDL: " . $conn->error;
        }
    } else {
        // Nếu bản ghi chưa tồn tại, bạn có thể chèn mới.
        $insertQuery = "INSERT INTO user_tests (id_name, username, fullname,testmain, test1, test2, test3, test4,test_tb, time_taken, next_test_time) 
                        VALUES ('$userId', '$username', '$fullname', '$userScore - $depressionStatus', '0', '0', '0', '0', '0', NOW(), DATE_ADD(NOW(), INTERVAL 1 WEEK))";

        if ($conn->query($insertQuery) === TRUE) {
            // Display the completion message with CSS styling
            echo '<div class="completion" style="background-color: #e6f7ff; padding: 10px; border: 1px solid #66b2ff; border-radius: 5px; margin-top: 20px;">';
            echo '<p style="font-weight: bold; color: #0077cc;">Chúc mừng! Bạn đã hoàn thành phần câu hỏi.</p>';
            echo '<p style="font-weight: bold; color: #0077cc;">Điểm của bạn là: <span id="userScoreDisplay" style="font-weight: bold; color: #0077cc;">' . $userScore . '</span></p>';
            echo '<p style="font-weight: bold; color: #0077cc;">Đánh giá mức độ theo thang điểm Beck: ' . $depressionStatus . '</p>';
            echo '</div>';
        } else {
            echo "Lỗi khi thêm dữ liệu vào CSDL: " . $conn->error;
        }
    }
} else {
    // Xử lý trường hợp không có user_score.
    echo "Lỗi: Không nhận được điểm của người dùng.";
}

// Đóng kết nối CSDL
$conn->close();
?>