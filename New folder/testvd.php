<?php
session_start();

if (isset($_POST['logout_button'])) {
    // Hủy bỏ phiên đăng nhập và chuyển hướng về trang đăng nhập
    session_destroy();
    header('Location: ../New folder/login.php');
    exit();
}

// Hàm kiểm tra điểm của người dùng trong bảng user_tests
function kiemTraDiem($conn, $userId, $field)
{
    $kiemTraQuery = "SELECT $field FROM user_tests WHERE id_name = '$userId'";
    $kiemTraKetQua = $conn->query($kiemTraQuery);

    if ($kiemTraKetQua->num_rows > 0) {
        $row = $kiemTraKetQua->fetch_assoc();
        return $row[$field];
    } else {
        return null;
    }
}

// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "nckh");
if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

// Lấy thông tin từ phiên
$userId = $_SESSION['user_id'];

// Kiểm tra điểm của bài test chính
$testmainScore = kiemTraDiem($conn, $userId, 'testmain');

// Kiểm tra đăng nhập
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 && $_SESSION['session_id'] == session_id()) {
    // Nếu người dùng đã đăng nhập, lấy thông tin từ phiên
    $loggedInFullname = $_SESSION['fullname'];
    $loggedInUsername = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Test</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/nav.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="../JS/jquery-3.4.1.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
</head>

<body>
<form method="post" action="">
            <ul class="hmenu">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Tổng quan</a>
                    <ul class="sub-menu">
                        <li><a href="#">Nguyên nhân</a></li>
                        <li><a href="#">Đặc điểm</a></li>
                        <li><a href="#">Triệu chứng</a></li>
                        <li><a href="#">Đối tượng</a></li>
                    </ul>
                </li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Giải pháp</a></li>
                <li><a href="#">Bài Test</a>
                    <ul class="sub-menu">
                        <li><a href="testform.php">Bài Test Chính</a></li>
                        <li><a href="test1.php">Bài Test 1</a></li>
                        <li><a href="test2.php">Bài Test 2</a></li>
                        <li><a href="test3.php">Bài Test 3</a></li>
                        <li><a href="test4.php">Bài Test 3</a></li>
                    </ul>
                </li>

                <li style="float: right; margin-right: 0px;">
                    <input type="submit" name="logout_button" style="padding: 7px 17px; color: white; background-color: orange; border: solid white;" value="Đăng xuất">
                </li>
                <li style="float: right; margin-right: 10px;">
                    <p style="color: white; padding: 7px 5px;">Xin chào, <?php echo $loggedInFullname; ?> (<?php echo $loggedInUsername; ?>)</p>
                </li>
            </ul>
        </form>
</body>

</html>

<?php
} else {
    // Nếu người dùng chưa đăng nhập, có thể thêm xử lý tương ứng ở đây
    echo "Xin chào khách!";
}
?>
