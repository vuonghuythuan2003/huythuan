<?php
// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "nckh");

if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

// Truy vấn lấy dữ liệu từ bảng user_tests
$query = "SELECT * FROM user_tests";
$result = $conn->query($query);

// Đóng kết nối CSDL
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Tests Table</title>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
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
    <h2>User Tests Table</h2>
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
            if ($result->num_rows > 0) {
                $stt = 1;
                while ($row = $result->fetch_assoc()) {
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
