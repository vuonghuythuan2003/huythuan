<?php
session_start();

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
                <!-- Các menu khác ở đây -->
                <li><a href="#">Bài Test</a>
                    <ul class="sub-menu">
                        <li><a href="testform.php">Bài Test Chính</a></li>
                        <?php
                        // Kiểm tra điểm trước khi hiển thị các bài test phụ
                        $test1Score = kiemTraDiem($conn, $userId, 'testmain');
                        if ($test1Score !== null && $test1Score >= 0) {
                            echo '<li><a href="test1.php">Bài Test 1</a></li>';
                        } else {
                            echo '<li><span style="color: red;">Vui lòng làm bài test chính trước</span></li>';
                        }

                        $test2Score = kiemTraDiem($conn, $userId, 'test1');
                        if ($test2Score !== null && $test2Score >= 0) {
                            echo '<li><a href="test2.php">Bài Test 2</a></li>';
                        } else {
                            echo '<li><span style="color: red;">Vui lòng làm bài test 1 trước</span></li>';
                        }

                        $test3Score = kiemTraDiem($conn, $userId, 'test2');
                        if ($test3Score !== null && $test3Score >= 0) {
                            echo '<li><a href="test3.php">Bài Test 3</a></li>';
                        } else {
                            echo '<li><span style="color: red;">Vui lòng làm bài test 2 trước</span></li>';
                        }

                        $test4Score = kiemTraDiem($conn, $userId, 'test3');
                        if ($test4Score !== null && $test4Score >= 0) {
                            echo '<li><a href="test4.php">Bài Test 4</a></li>';
                        } else {
                            echo '<li><span style="color: red;">Vui lòng làm bài test 3 trước</span></li>';
                        }
                        ?>
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