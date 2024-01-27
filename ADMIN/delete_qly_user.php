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

        // Thực hiện truy vấn xóa trong bảng user_tests trước
        $sql_user_tests = "DELETE FROM user_tests WHERE id_name='$id'";
        mysqli_query($conn, $sql_user_tests);

        // Tiếp theo, thực hiện truy vấn xóa trong bảng t_user
        $sql_user = "DELETE FROM t_user WHERE id='$id'";
        mysqli_query($conn, $sql_user);

        // Chuyển hướng về trang quản lý tài khoản sau khi xóa
        header('Location: qly_admin.php');
    }

    // Đóng kết nối
    $conn->close();
?>
