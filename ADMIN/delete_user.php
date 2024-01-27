<?php 
    // Kết nối
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nckh";  // Tên cơ sở dữ liệu

    // Tạo kết nối đến cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // Nhận giá trị ID từ tham số GET
        $id = $_GET['id'];

        // In giá trị ID ra màn hình
        echo "ID của tài khoản cần xóa là: $id";

        // Thực hiện truy vấn xóa
        $sql_user = "DELETE FROM t_user WHERE id='$id'";
        mysqli_query($conn, $sql_user);

        // Chuyển hướng về trang quản lý tài khoản sau khi xóa
        header('Location: qly_user.php');
        echo "ID của tài khoản đã xóa là: $id";
    }

    // Đóng kết nối
    $conn->close();
?>
