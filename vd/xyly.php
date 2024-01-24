<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị id và name từ dữ liệu gửi đi
    $selectedId = isset($_POST["selectedId"]) ? $_POST["selectedId"] : null;
    $selectedName = isset($_POST["selectedName"]) ? $_POST["selectedName"] : null;

    // Kiểm tra nếu cả hai giá trị đều tồn tại
    if ($selectedId !== null && $selectedName !== null) {
        // Kết nối đến cơ sở dữ liệu (sử dụng các thông số kết nối thực tế)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nckh";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
        }

        // Thực hiện truy vấn để thêm dữ liệu vào cột "test1" trong bảng cơ sở dữ liệu
        $sql = "INSERT INTO test (test1) VALUES ('$selectedId - $selectedName')";

        if ($conn->query($sql) === TRUE) {
            echo "Dữ liệu đã được thêm thành công.";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        // Đóng kết nối
        $conn->close();
    } else {
        echo "Lỗi: Dữ liệu không hợp lệ.1234";
    }
} else {
    echo "Lỗi: Phương thức không hợp lệ.";
}
?>
