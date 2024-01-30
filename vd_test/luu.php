<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kết nối đến cơ sở dữ liệu (hãy điều chỉnh thông tin kết nối của bạn)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nckh";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Lấy giá trị từ form
    $dataId1 = $_POST["data-id1"];
    $dataId2 = $_POST["data-id2"];
    $dataId3 = $_POST["data-id3"];
    $dataId4 = $_POST["data-id4"];
    $dataId5 = $_POST["data-id5"];
    $dataId6 = $_POST["data-id6"];
    $dataId7 = $_POST["data-id7"];
    $dataId8 = $_POST["data-id8"];
    $dataId9 = $_POST["data-id9"];
    $dataId10 = $_POST["data-id10"];

    // Chuẩn bị câu lệnh SQL để chèn dữ liệu
    $sql = "INSERT INTO test (test1, test2, test3, test4, test5, test6, test7, test8, test9, test10)
            VALUES ('$dataId1', '$dataId2', '$dataId3', '$dataId4', '$dataId5', '$dataId6', '$dataId7', '$dataId8', '$dataId9', '$dataId10')";

    if ($conn->query($sql) === TRUE) {
        echo "Dữ liệu đã được chèn thành công.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>
