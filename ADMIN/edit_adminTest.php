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

    // Truy vấn lấy thông tin của bài kiểm tra cần chỉnh sửa
    $sql = "SELECT * FROM user_tests WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lấy dữ liệu từ kết quả truy vấn
        $test = $result->fetch_assoc();
        $username = $test['username'];
        $fullname = $test['fullname'];
        $test1 = $test['test1'];
        $test2 = $test['test2'];
        $test3 = $test['test3'];
        $test4 = $test['test4'];
        $test_tb = $test['test_tb'];
    } else {
        // Nếu không tìm thấy bài kiểm tra, có thể thực hiện xử lý thông báo lỗi hoặc chuyển hướng
        echo "Không tìm thấy bài kiểm tra.";
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
    $new_test1 = isset($_POST['test1']) ? $_POST['test1'] : 0;
    $new_test2 = isset($_POST['test2']) ? $_POST['test2'] : 0;
    $new_test3 = isset($_POST['test3']) ? $_POST['test3'] : 0;
    $new_test4 = isset($_POST['test4']) ? $_POST['test4'] : 0;

    // Kiểm tra giá trị nhập vào
    if (!is_numeric($new_test1) || $new_test1 < 0 || $new_test1 > 31 ||
        !is_numeric($new_test2) || $new_test2 < 0 || $new_test2 > 31 ||
        !is_numeric($new_test3) || $new_test3 < 0 || $new_test3 > 31 ||
        !is_numeric($new_test4) || $new_test4 < 0 || $new_test4 > 31) {
        echo "Vui Lòng Kiểm Tra lại.";
    } else {
        // Cập nhật thông tin trong bảng user_tests
        $sql_update_test = "UPDATE user_tests SET username=?, fullname=?, test1=?, test2=?, test3=?, test4=? WHERE id=?";
        $stmt_update_test = $conn->prepare($sql_update_test);
        $stmt_update_test->bind_param("ssssssi", $new_username, $new_fullname, $new_test1, $new_test2, $new_test3, $new_test4, $id);
        $stmt_update_test->execute();

        // Đóng kết nối và chuyển hướng về trang quản lý người dùng
        $conn->close();
        header('Location: qly_admin.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin bài kiểm tra</title>
</head>

<body>
    <h2>Chỉnh sửa thông tin bài kiểm tra</h2>
    <h5> Giá trị của các trường test1, test2, test3, test4 phải là số tự nhiên từ 0 đến 31. <br>
    0 < test1, test2, test3, test4 < 30   </h5>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br>

        <label for="fullname">Fullname:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" required><br>

        <label for="test1">Test 1:</label>
        <input type="text" id="test1" name="test1" value="<?php echo $test1; ?>"><br>

        <label for="test2">Test 2:</label>
        <input type="text" id="test2" name="test2" value="<?php echo $test2; ?>"><br>

        <label for="test3">Test 3:</label>
        <input type="text" id="test3" name="test3" value="<?php echo $test3; ?>"><br>

        <label for="test4">Test 4:</label>
        <input type="text" id="test4" name="test4" value="<?php echo $test4; ?>"><br>

        <button type="submit">Lưu thay đổi</button>
    </form>
</body>

</html>
