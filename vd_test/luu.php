<?php
// Kết nối đến CSDL (thay thế các thông tin kết nối của bạn)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nckh";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra xem có dữ liệu được gửi từ form chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị của radio button được chọn
    $moodValue = isset($_POST['mood1']) ? $_POST['mood1'] : '';

    $mood1 = $_POST["mood1"];
    $mood2 = $_POST["mood2"];
    $mood3 = $_POST["mood3"];
    $mood4 = $_POST["mood4"];
    $mood5 = $_POST["mood5"];
    $mood6 = $_POST["mood6"];
    $mood7 = $_POST["mood7"];
    $mood8 = $_POST["mood8"];
    $mood9 = $_POST["mood9"];
    $mood10 = $_POST["mood10"];

    // Insert data into 'test' table
    $sql = "INSERT INTO test (test1, test2, test3, test4, test5, test6, test7, test8, test9, test10)
            VALUES ('$mood1', '$mood2', '$mood3', '$mood4', '$mood5', '$mood6', '$mood7', '$mood8', '$mood9', '$mood10')";

    if ($conn->query($sql) === TRUE) {
        echo "Câu trả lời đã được lưu vào CSDL thành công.";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Đóng kết nối CSDL
$conn->close();
