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

// Kiểm tra xem user_id đã có trong bảng test4 hay chưa
$kiemTraQuery = "SELECT id_name FROM test4 WHERE id_name = '$userId'";
$kiemTraResult = $conn->query($kiemTraQuery);

if ($kiemTraResult->num_rows == 0) {
    // Nếu user_id chưa tồn tại trong bảng test4, kiểm tra các bảng test1, test2, test3
    $testTables = array("test1", "test2", "test3");
    $testNames = array("test1" => "test1.php", "test2" => "test2.php", "test3" => "test3.php");
    $missingTests = array();

    foreach ($testTables as $testTable) {
        $kiemTraQuery = "SELECT id_name FROM $testTable WHERE id_name = '$userId'";
        $kiemTraResult = $conn->query($kiemTraQuery);

        if ($kiemTraResult->num_rows == 0) {
            // Nếu user_id chưa tồn tại trong bảng $testTable, thêm tên bảng vào danh sách bài test chưa làm
            $missingTests[] = $testNames[$testTable];
        }
    }

    if (!empty($missingTests)) {
        // Nếu có bài test chưa làm, hiển thị thông báo cảnh báo và liên kết tới trang làm bài test đó
        echo '<div class="warning" style="background-color: #fff3cd; padding: 10px; border: 1px solid #ffeeba; border-radius: 5px; margin-top: 20px;">';
        echo '<p style="font-weight: bold; color: #856404;">Cảnh báo! Bạn chưa hoàn thành các bài test sau:</p>';
        echo '<ul>';
        foreach ($missingTests as $missingTest) {
            echo '<li><a href="' . $missingTest . '">Bài test ' . substr($missingTest, 0, -4) . '</a></li>';
        }
        echo '</ul>';
        echo '</div>';
    } else {
        // Nếu đã hoàn thành tất cả các bài test, tiếp tục thực hiện các bước như trong code gốc
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Biến để lưu trữ các giá trị cho bảng test4
            $valuesTest4 = array();

            // Tổng điểm
            $totalScore = 0;

            // Thêm thông tin từ phiên vào mảng
            $valuesTest4['id_name'] = $userId;
            $valuesTest4['username'] = $username;
            $valuesTest4['fullname'] = $fullname;

            // Lấy dữ liệu từ bảng user_tests
            $sqlUserTests = "SELECT test1, test2, test3 FROM user_tests WHERE id_name = '$userId'";
            $resultUserTests = $conn->query($sqlUserTests);

            if ($resultUserTests->num_rows > 0) {
                $rowUserTests = $resultUserTests->fetch_assoc();

                // Lấy và chèn từng câu trả lời của mỗi câu hỏi vào mảng
                for ($i = 1; $i <= 10; $i++) {
                    $questionName = "mood" . $i;
                    if (isset($_POST[$questionName])) {
                        $answer = $_POST[$questionName];
                        $columnName = "test" . $i;

                        // Thêm điểm vào biến tổng điểm
                        $totalScore += intval($answer);

                        // Thêm giá trị vào mảng của bảng test4
                        $valuesTest4[$columnName] = $answer;
                    }
                }

                // Thêm cột tổng điểm vào mảng của bảng test4
                $valuesTest4['tongdiem'] = $totalScore;

                // Chèn giá trị vào bảng test4
                $sqlTest4 = "INSERT INTO test4 (" . implode(", ", array_keys($valuesTest4)) . ") VALUES ('" . implode("', '", $valuesTest4) . "')";

                if ($conn->query($sqlTest4) !== TRUE) {
                    echo "Lỗi khi chèn dữ liệu vào CSDL (test4): " . $conn->error;
                } else {
                    // Tính trung bình của các cột test1, test2, test3, test4 từ dữ liệu trong bảng user_tests
                    $test_tb = ($rowUserTests['test1'] + $rowUserTests['test2'] + $rowUserTests['test3'] + $totalScore) / 2;

                    // Cập nhật dữ liệu trong bảng user_tests
                    $capNhatQuery = "UPDATE user_tests 
                        SET test4 = '$totalScore', 
                            test_tb = '$test_tb',
                            time_taken = NOW(), 
                            next_test_time = NOW(), 
                            thoi_gian_ket_thuc = NOW()
                        WHERE id_name = '$userId'";

                    if ($conn->query($capNhatQuery) !== TRUE) {
                        echo "Lỗi khi cập nhật dữ liệu trong CSDL (user_tests): " . $conn->error;
                    } else {
                        // Hiển thị thông báo hoàn thành với CSS styling cho cả hai bảng
                        echo '<div class="completion" style="background-color: #e6f7ff; padding: 10px; border: 1px solid #66b2ff; border-radius: 5px; margin-top: 20px;">';
                        echo '<p style="font-weight: bold; color: #0077cc;">Chúc mừng! Bạn đã hoàn thành phần câu hỏi.</p>';
                        echo '<p style="font-weight: bold; color: #0077cc;">Điểm của bạn là: <span id="userScoreDisplay" style="font-weight: bold; color: #0077cc;">' . $totalScore . '</span></p>';
                        echo '<p style="font-weight: bold; color: #0077cc;">Đánh giá mức độ theo thang điểm Beck: ' . phanLoaiTramCam($totalScore) . '</p>';
                        echo '<a href="test2_ls.php">Xem lại lịch sự</a>';
                        echo '</div>';
                    }
                }
            } else {
                echo "Không tìm thấy dữ liệu trong bảng user_tests cho user_id này.";
            }
        }
    }
} else {
    // Nếu user_id đã tồn tại trong bảng test4, hiển thị thông báo
    echo "Đã tồn tại dữ liệu cho user_id này trong bảng test4.";
}

// Đóng kết nối CSDL
$conn->close();
?>
