<?php
// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "nckh");

if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

// Truy vấn lấy dữ liệu từ bảng t_user (chỉ hiển thị 10 người dùng đầu tiên)
$query = "SELECT id, username, fullname, email, date, ngaydangky FROM t_user ";
$result = $conn->query($query);

// Đóng kết nối CSDL
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thông tin người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #f2f2f2;
            padding: 20px;
            display: flex;
            justify-content: left;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav li {
            margin-left: 30px;
            margin-right: 50px;
            position: relative;
        }

        nav a {
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
            /* Khoảng cách của đường gạch từ mục */
            height: 140%;
            /* Chiều cao của đường gạch */
            border-right: 1px solid #333;
            /* Màu và kiểu đường gạch */
        }

        nav li:last-child::after {
            display: none;
            /* Ẩn đường gạch cho mục cuối cùng */
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
    <nav>
        <ul>
            <li><a href="qly_admin.php">Trang quản lý ADMIN</a></li>
            <li><a href="qly_user.php">Quản lý người dùng</a></li>
            <li><a href="qly_DiemTest.php">Quản lý điểm khảo sát</a></li>
        </ul>
    </nav>
    <h3> Bảng Quản Lý Người Dùng</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Date</th>
                <th>Ngày Đăng Ký</th>
                <th>Chỉnh sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Hiển thị dữ liệu từ kết quả truy vấn
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['username']}</td>";
                    echo "<td>{$row['fullname']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['date']}</td>";
                    echo "<td>{$row['ngaydangky']}</td>";
                    echo "<td><a href='#' class='edit-link'>Chỉnh sửa</a></td>";
                    echo "<td><a href='#' class='delete-link'>Xóa</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>