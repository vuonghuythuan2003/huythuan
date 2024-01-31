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

    // Lấy giá trị từ form và chèn vào các cột tương ứng
    for ($i = 1; $i <= 10; $i++) {
        $columnName = "test" . $i;
        $dataIdKey = "data-id" . $i;

        // Kiểm tra xem key có tồn tại trong POST không
        if (isset($_POST[$dataIdKey])) {
            $dataIdValue = $_POST[$dataIdKey];

            // Chuẩn bị câu lệnh SQL để chèn dữ liệu
            $sql = "INSERT INTO test ($columnName) VALUES ('$dataIdValue')";

            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
                break; // Nếu có lỗi, thoát vòng lặp
            }
        }
    }

    echo "Dữ liệu đã được chèn thành công.";

    // Đóng kết nối
    $conn->close();
}
?>
