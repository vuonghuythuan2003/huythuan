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

// Kiểm tra xem user_id đã có trong bảng test2 hay chưa
$kiemTraQuery = "SELECT id_name FROM test4 WHERE id_name = '$userId'";
$kiemTraResult = $conn->query($kiemTraQuery);

if ($kiemTraResult->num_rows == 0) {
    // Nếu user_id chưa tồn tại trong bảng test2, thực hiện thêm mới
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Biến để lưu trữ các giá trị cho bảng test2
        $valuesTest2 = array();

        // Tổng điểm
        $totalScore = 0;

        // Thêm thông tin từ phiên vào mảng
        $valuesTest2['id_name'] = $userId;
        $valuesTest2['username'] = $username;
        $valuesTest2['fullname'] = $fullname;

        // Lấy và chèn từng câu trả lời của mỗi câu hỏi vào mảng
        for ($i = 1; $i <= 10; $i++) {
            $questionName = "mood" . $i;
            if (isset($_POST[$questionName])) {
                $answer = $_POST[$questionName];
                $columnName = "test" . $i;

                // Thêm điểm vào biến tổng điểm
                $totalScore += intval($answer);

                // Thêm giá trị vào mảng của bảng test2
                $valuesTest2[$columnName] = $answer;
            }
        }

        // Thêm cột tổng điểm vào mảng của bảng test2
        $valuesTest2['tongdiem'] = $totalScore;

        // Chèn giá trị vào bảng test2
        $sqlTest2 = "INSERT INTO test4 (" . implode(", ", array_keys($valuesTest2)) . ") VALUES ('" . implode("', '", $valuesTest2) . "')";

        if ($conn->query($sqlTest2) !== TRUE) {
            echo "Lỗi khi chèn dữ liệu vào CSDL (test3): " . $conn->error;
        } else {
            // Lấy dữ liệu từ bảng user_tests
            $sqlUserTests = "SELECT test1, test2, test3, test4 FROM user_tests WHERE id_name = '$userId'";
            $resultUserTests = $conn->query($sqlUserTests);

            if ($resultUserTests->num_rows > 0) {
                $rowUserTests = $resultUserTests->fetch_assoc();

                // Tính trung bình của các cột test1, test2, test3, test4 từ dữ liệu trong bảng user_tests
                $test1 = $rowUserTests['test1'];
                $test2 = $rowUserTests['test2'];
                $test3 = $rowUserTests['test3'];
                $test4 = $rowUserTests['test4'];
                $test_tb = ($test1 + $test2 + $test3 + $test4) / 2;
                echo " trung bình là : ($test1 + $test2 + $test3 + $test4) / 2 = $test_tb";

                // echo "($test1 + $test2 + $test3 + $test4)/2";

                // Cập nhật dữ liệu trong bảng user_tests
                $capNhatQuery = "UPDATE user_tests 
                    SET test4 = '$totalScore', 
                        test_tb = '$test_tb',
                        time_taken = NOW(), 
                        next_test_time = DATE_ADD(NOW(), INTERVAL 1 WEEK) 
                    WHERE id_name = '$userId'";
            } else {
                echo "Không tìm thấy dữ liệu trong bảng user_tests cho user_id này.";
            }

            if ($conn->query($capNhatQuery) !== TRUE) {
                echo "Lỗi khi cập nhật dữ liệu trong CSDL (user_tests): " . $conn->error;
            } else {
                // Hiển thị thông báo hoàn thành với CSS styling cho cả hai bảng
                echo '<div class="completion" style="background-color: #e6f7ff; padding: 10px; border: 1px solid #66b2ff; border-radius: 5px; margin-top: 20px;">';
                echo '<p style="font-weight: bold; color: #0077cc;">Chúc mừng! Bạn đã hoàn thành phần câu hỏi.</p>';
                echo '<p style="font-weight: bold; color: #0077cc;">Điểm của bạn là: <span id="userScoreDisplay" style="font-weight: bold; color: #0077cc;">' . $totalScore . '</span></p>';
                echo '<p style="font-weight: bold; color: #0077cc;">Đánh giá mức độ theo thang điểm Beck: ' . phanLoaiTramCam($totalScore) . '</p>';
                echo '<a href="test2_ls.php"> xem lại lịch sự</a>';
                echo '</div>';
            }
        }
    }
} else {
    // Nếu user_id đã tồn tại trong bảng test2, hiển thị thông báo
    echo "Đã tồn tại dữ liệu cho user_id này trong bảng test4.";
}

// Đóng kết nối CSDL
$conn->close();
