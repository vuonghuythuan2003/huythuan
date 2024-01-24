<?php
session_start();

// Hàm phân loại trạng thái trầm cảm
function phanLoaiTramCam($diem)
{
    if ($diem < 14) {
        return "Không biểu hiện trầm cảm";
    } elseif ($diem >= 14 && $diem <= 19) {
        return "Trầm cảm nhẹ";
    } elseif ($diem >= 20 && $diem <= 29) {
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

// Lấy thông tin từ phiên
$userId = $_SESSION['user_id'];
$username = $_SESSION['username'];
$fullname = $_SESSION['fullname'];

// Lấy điểm từ cuộc khảo sát
if (isset($_POST['user_score'])) {
    $userScore = intval($_POST['user_score']);
    $tramCamStatus = phanLoaiTramCam($userScore);

    // Cập nhật giá trị test2 trực tiếp
    $capNhatQuery = "UPDATE user_tests SET test3 = '$userScore ', time_taken = NOW(), next_test_time = DATE_ADD(NOW(), INTERVAL 1 WEEK) WHERE id_name = '$userId'";

    if ($conn->query($capNhatQuery) === TRUE) {
        // Display the completion message with CSS styling
        echo '<div class="completion" style="background-color: #e6f7ff; padding: 10px; border: 1px solid #66b2ff; border-radius: 5px; margin-top: 20px;">';
        echo '<p style="font-weight: bold; color: #0077cc;">Chúc mừng! Bạn đã hoàn thành phần câu hỏi.</p>';
        echo '<p style="font-weight: bold; color: #0077cc;">Điểm của bạn là: <span id="userScoreDisplay" style="font-weight: bold; color: #0077cc;">' . $userScore . '</span></p>';
        echo '<p style="font-weight: bold; color: #0077cc;">Đánh giá mức độ theo thang điểm Beck: ' . $tramCamStatus . '</p>';
        echo '</div>';
    } else {
        echo "Lỗi khi cập nhật dữ liệu trong CSDL: " . $conn->error;
    }
} else {
    // Xử lý trường hợp không có user_score.
    echo "Lỗi: Không nhận được điểm của người dùng.";
}

// Đóng kết nối CSDL
$conn->close();
