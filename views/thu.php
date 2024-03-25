<?php
// Bắt đầu phiên
session_start();

// Kiểm tra đăng nhập
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 && $_SESSION['session_id'] == session_id()) {
    // Nếu người dùng đã đăng nhập, lấy thông tin từ phiên
    $loggedInFullname = $_SESSION['fullname'];
    $loggedInUsername = $_SESSION['username'];

    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli("localhost", "root", "", "nckh");
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    
    // Lấy id_name từ phiên
    $id_name = $_SESSION['id_name']; 

    // Kiểm tra dữ liệu trong các bảng test1, test2, test3, test4
    $test_tables = array("test1", "test2", "test3", "test4");
    $test_available = false; // Biến để kiểm tra xem có bài test nào có dữ liệu không
    foreach ($test_tables as $table) {
        // Truy vấn SQL để kiểm tra dữ liệu theo id_name trong từng bảng
        $sql = "SELECT COUNT(*) AS count FROM $table WHERE id_name = '$id_name'";
        $result = $conn->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            if ($row['count'] > 0) {
                // Nếu có dữ liệu trong bảng, đặt biến $test_available thành true và in ra tên của bảng
                $test_available = true;
                echo "<p>Có dữ liệu trong bảng $table</p>";
            } else {
                echo "<p>Không có dữ liệu trong bảng $table</p>";
            }
        } else {
            echo "Lỗi truy vấn: " . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Test</title>
    <link rel="stylesheet" href="../CSS/trangchu.css">
    <style>
        form:hover {
            background-color: rgba(0, 128, 0, 0.5);
            /* Màu xanh với độ trong suốt 0.5 */
        }

        /* CSS cho dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
            text-decoration: none;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <a href="" class="logo">
                <img src="../IMAGE/logo.png" alt="">
            </a>
            <nav id="menu">
                <a href="trangchu.html" class="menu-item">Trang chủ</a>
                <a href="#" class="menu-item">Tổng quan</a>
                <a href="news.php" class="menu-item">Tin tức mới nhất</a>
                <a href="#" class="menu-item">Giải pháp</a>
                <a href="game.php" class="menu-item">Game vui</a>
                <!-- Sử dụng class dropdown cho phần "Các bài test" -->
                <div class="dropdown">
                    <a style="text-decoration: none;">Các bài test</a>
                    <!-- Đặt dropdown-content bên trong phần tử có class dropdown -->
                    <div class="dropdown-content">
                        <?php if ($test_available) { ?>
                            <a href="test1.php">Test 1</a>
                            <a href="test2.php">Test 2</a>
                            <a href="test3.php">Test 3</a>
                            <a href="test4.php">Test 4</a>
                        <?php } else { ?>
                            <p>Không có dữ liệu bài test</p>
                        <?php } ?>
                    </div>
                </div>
            </nav>

            <!-- Hiển thị thông tin người dùng nếu đã đăng nhập -->
            <div class="user-info" style="float: right; margin-right: 10px; padding: 10px; color: black;">
                <?php
                if (!empty($loggedInUsername)) {
                    echo "Xin chào " . '"' . $loggedInUsername . '"';
                }
                ?>
            </div>

            <!-- Nếu đã đăng nhập, hiển thị nút đăng xuất -->
            <form method="post" style="float: right; margin-right: 10px;  color: black;">
                <input style="padding: 10px; background-color: rgba(0, 0, 0, 0);" type="submit" name="logout_button" value="Đăng xuất">
            </form>
        </div>

        <!-- Phần còn lại của trang bạn -->

    </div>
    </div>

</body>

</html>

<?php
} else {
    // Nếu người dùng chưa đăng nhập, có thể thêm xử lý tương ứng ở đây
    echo "Xin chào khách!";
}
?>
