<?php
// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "nckh");

if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

// Truy vấn lấy dữ liệu từ bảng t_user (chỉ hiển thị 10 người dùng đầu tiên)
$queryUsers = "SELECT id, username, fullname, email, date, ngaydangky FROM t_user LIMIT 10";
$resultUsers = $conn->query($queryUsers);

// Truy vấn lấy dữ liệu từ bảng user_tests
$queryUserTests = "SELECT * FROM user_tests LIMIT 10";
$resultUserTests = $conn->query($queryUserTests);

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
            <li><a href="#">Quản lý người dùng</a></li>
            <li><a href="#">Quản lý điểm khảo sát</a></li>
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
            </tr>
        </thead>
        <tbody>
            <?php
            // Hiển thị dữ liệu từ kết quả truy vấn
            if ($resultUsers->num_rows > 0) {
                while ($row = $resultUsers->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['username']}</td>";
                    echo "<td>{$row['fullname']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['date']}</td>";
                    echo "<td>{$row['ngaydangky']}</td>";
                    echo "</tr>";
                }

                // Dòng "Xem tất cả người dùng..."
                echo "<tr class='view-all-row'>";
                echo "<td colspan='6'><a href='#' class='view-all-link'>Xem tất cả người dùng...</a></td>";
                echo "</tr>";
            } else {
                echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Bảng Quản Lý Điểm Khảo Sát Người Dùng</h3>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>Test Main</th>
                <th>Test 1</th>
                <th>Test 2</th>
                <th>Test 3</th>
                <th>Test 4</th>
                <th>Test TB</th>
                <th>Time Start</th>
                <th>Time Taken</th>
                <th>Next Test Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Hiển thị dữ liệu từ kết quả truy vấn
            if ($resultUserTests->num_rows > 0) {
                $stt = 1;
                while ($row = $resultUserTests->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$stt}</td>";
                    echo "<td>{$row['username']}</td>";
                    echo "<td>{$row['fullname']}</td>";
                    echo "<td>{$row['testmain']}</td>";
                    echo "<td>{$row['test1']}</td>";
                    echo "<td>{$row['test2']}</td>";
                    echo "<td>{$row['test3']}</td>";
                    echo "<td>{$row['test4']}</td>";
                    echo "<td>{$row['test_tb']}</td>";
                    echo "<td>{$row['time_start']}</td>";
                    echo "<td>{$row['time_taken']}</td>";
                    echo "<td>{$row['next_test_time']}</td>";
                    echo "</tr>";

                    $stt++;
                }

                // Dòng "Xem tất cả người dùng..."
                echo "<tr class='view-all-row'>";
                echo "<td colspan='12'><a href='#' class='view-all-link'>Xem tất cả người dùng...</a></td>";
                echo "</tr>";
            } else {
                echo "<tr><td colspan='12'>Không có dữ liệu</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>
