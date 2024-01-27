<?php
session_start();

// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "nckh");

if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

// Kiểm tra xem có nút đăng xuất được nhấn hay không
if (isset($_POST['logout_button'])) {
    // Hủy bỏ phiên đăng nhập và chuyển hướng về trang đăng nhập
    session_destroy();
    header('Location: login.php');
    exit();
}

// Kiểm tra đăng nhập
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 && $_SESSION['session_id'] == session_id()) {
    // Nếu người dùng đã đăng nhập, lấy thông tin từ phiên
    $loggedInFullname = $_SESSION['fullname'];
    $loggedInUsername = $_SESSION['username'];

    // Truy vấn lấy dữ liệu từ bảng t_user (chỉ hiển thị 10 người dùng đầu tiên)
    $queryUsers = "SELECT id, username, fullname, email, date, ngaydangky, idgroup FROM t_user ";
    $resultUsers = $conn->query($queryUsers);

    // Đóng kết nối CSDL
    $conn->close();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản lý người dùng và điểm khảo sát</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            nav {
                margin-top: 10px;
                background-color: #f2f2f2;
                padding: 15px;
                display: flex;
                justify-content: left;
            }

            nav ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                display: flex;
                align-items: center;
                /* Căn giữa dọc */
            }

            nav li {
                margin-left: 30px;
                margin-right: 50px;
                position: relative;
                display: flex;
                align-items: center;
                /* Căn giữa dọc */
            }

            nav a {
                margin-top: 10px;
                text-decoration: none;
                color: #333;
                font-weight: bold;
                font-size: 16px;
            }

            nav a:hover {
                color: #0077cc;
            }

            nav li::after {
                content: "";
                position: absolute;
                top: -20%;
                right: -30px;
                height: 140%;
                border-right: 1px solid #333;
            }

            nav li:last-child::after {
                display: none;
            }

            nav .user-info {
                margin-left: auto;
                display: flex;
                align-items: center;
                /* Căn giữa dọc */
            }

            nav li:last-child {
                margin-top: 5px;
            }

            .user-info p {
                color: black;
                margin: 0;
            }

            .logout-button {
                padding: 7px 17px;
                color: white;
                background-color: orange;
                border: solid white;
                cursor: pointer;
                margin-left: 20px;
            }


            h3 {
                margin-top: 5%;
            }

            table {
                font-family: Arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                border: 1px solid black;
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #6699FF;
            }

            .view-all-row {
                text-align: center;
            }

            .view-all-link {
                font-weight: bold;
                color: #0077cc;
                text-decoration: none;
            }
        </style>
    </head>

    <body>
        <form method="post">
            <nav>
                <ul>
                    <li><a href="qly_admin.php">Trang quản lý ADMIN</a></li>
                    <li><a href="qly_user.php">Quản lý người dùng</a></li>
                    <li><a href="qly_DiemTest.php">Quản lý điểm khảo sát</a></li>
                    <li style="float: right; " class="user-info">
                        <p>Xin chào, <?php echo $loggedInFullname; ?> (<?php echo $loggedInUsername; ?>)</p>
                    </li>
                    <li style="float: right; margin-right: 0px;">
                        <input type="submit" name="logout_button" class="logout-button" value="Đăng xuất">
                    </li>

                </ul>
            </nav>
        </form>
        <h3> Bảng Quản Lý Người Dùng</h3>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Ngày Đăng Ký</th>
                    <th>Phân Quyền</th>
                    <th>Chỉnh sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Hiển thị dữ liệu từ kết quả truy vấn
                if ($resultUsers->num_rows > 0) {
                    $i = 1;
                    while ($row = $resultUsers->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['username']}</td>";
                        echo "<td>{$row['fullname']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['date']}</td>";
                        echo "<td>{$row['ngaydangky']}</td>";
                        echo "<td>{$row['idgroup']}</td>";
                        echo "<td><a href='edit_user.php?id={$row['id']}'>Chỉnh sửa</a></td>";
                        echo "<td><a href='delete_user.php?id={$row['id']}'>Xóa</a></td>";
                        echo "</tr>";
                    }

                } else {
                    echo "<tr><td colspan='9'>Không có dữ liệu</td></tr>";
                }
                ?>
            </tbody>
        </table>

    </body>

    </html>
<?php
} else {
    // Nếu người dùng chưa đăng nhập, có thể thêm xử lý tương ứng ở đây
    echo "Xin chào khách!";
}
?>