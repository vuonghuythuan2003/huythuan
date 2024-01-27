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
}

// Kiểm tra xem có giá trị ID được truyền từ trang quản lý người dùng không
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn lấy thông tin của người dùng cần chỉnh sửa
    $sql = "SELECT id, username, fullname, email, date, ngaydangky, idgroup FROM t_user WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lấy dữ liệu từ kết quả truy vấn
        $user = $result->fetch_assoc();
        $username = $user['username'];
        $fullname = $user['fullname'];
        $email = $user['email'];
        $idgroup = $user['idgroup'];
    } else {
        // Nếu không tìm thấy người dùng, có thể thực hiện xử lý thông báo lỗi hoặc chuyển hướng
        echo "Không tìm thấy người dùng.";
        exit();
    }
} else {
    // Nếu không có giá trị ID, có thể thực hiện xử lý thông báo lỗi hoặc chuyển hướng
    echo "Không có ID được truyền.";
    exit();
}

// Kiểm tra xem biểu mẫu có được gửi hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $new_username = $_POST['username'];
    $new_fullname = $_POST['fullname'];
    $new_email = $_POST['email'];
    $new_idgroup = $_POST['idgroup'];

    // Cập nhật thông tin trong bảng t_user
    $sql_update_user = "UPDATE t_user SET username=?, fullname=?, email=?, idgroup=? WHERE id=?";
    $stmt_update_user = $conn->prepare($sql_update_user);
    $stmt_update_user->bind_param("ssssi", $new_username, $new_fullname, $new_email, $new_idgroup, $id);
    $stmt_update_user->execute();

    // Cập nhật thông tin tương ứng trong bảng user_tests
    $sql_update_user_tests = "UPDATE user_tests SET username=?, fullname=? WHERE id_name=?";
    $stmt_update_user_tests = $conn->prepare($sql_update_user_tests);
    $stmt_update_user_tests->bind_param("ssi", $new_username, $new_fullname, $id);
    $stmt_update_user_tests->execute();

    // Đóng kết nối và chuyển hướng về trang quản lý người dùng
    $stmt_update_user->close();
    $stmt_update_user_tests->close();
    $conn->close();
    header('Location: qly_admin.php');
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin người dùng</title>
</head>

<body>
    <h2>Chỉnh sửa thông tin người dùng</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br>

        <label for="fullname">Fullname:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br>

        <label for="idgroup">ID Group:</label>
        <input type="text" id="idgroup" name="idgroup" value="<?php echo $idgroup; ?>" required><br>

        <button type="submit">Lưu thay đổi</button>
    </form>
</body>

</html>