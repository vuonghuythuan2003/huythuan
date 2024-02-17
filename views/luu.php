<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kết nối đến cơ sở dữ liệu (hãy điều chỉnh thông tin kết nối của bạn)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nckh";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Khởi tạo mảng để lưu trữ dữ liệu cột và giá trị tương ứng
    $data = array();

    // Lấy giá trị từ form và chèn vào mảng $data
    foreach ($_POST as $key => $value) {
        // Kiểm tra nếu tên cột bắt đầu bằng "mood"
        if (substr($key, 0, 4) === "mood") {
            // Lấy số câu hỏi từ tên cột
            $questionNumber = substr($key, 4);

            // Thêm vào mảng $data với key là tên cột và value là giá trị
            $data["test" . $questionNumber] = $value;
        }
    }

    // Chuẩn bị câu lệnh SQL để chèn dữ liệu
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $sql = "INSERT INTO test ($columns) VALUES ($values)";

    // Thực hiện câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        echo "Dữ liệu đã được chèn thành công.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>
