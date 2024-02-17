<?php
// Bắt đầu phiên
session_start();

// Thông tin kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nckh";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Biến để lưu giá trị đã chọn từ lịch sử
$selectedValue = "";
$test1Value = "";
$test2Value = "";
$test3Value = "";
$test4Value = "";
$test5Value = "";
$test6Value = "";
$test7Value = "";
$test8Value = "";
$test9Value = "";
$test10Value = "";

// Khởi tạo biến $loggedInUserId để tránh lỗi "Undefined variable"
$loggedInUserId = "";

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 && $_SESSION['session_id'] == session_id()) {
    // Nếu người dùng đã đăng nhập, lấy thông tin từ phiên
    $loggedInUserId = $_SESSION['user_id'];
    $loggedInFullname = $_SESSION['fullname'];
    $loggedInUsername = $_SESSION['username'];

    // Thực hiện truy vấn để lấy giá trị từ CSDL dựa trên id_name
    // $id_name = $_SESSION['id_name'];
    $sql = "SELECT * FROM test2 WHERE id_name = '$loggedInUserId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lấy giá trị từ kết quả truy vấn
        $row = $result->fetch_assoc();
        $test1Value = $row["test1"];
        $test2Value = $row["test2"];
        $test3Value = $row["test3"];
        $test4Value = $row["test4"];
        $test5Value = $row["test5"];
        $test6Value = $row["test6"];
        $test7Value = $row["test7"];
        $test8Value = $row["test8"];
        $test9Value = $row["test9"];
        $test10Value = $row["test10"];
        $thoiGianLam = $row["thoi_gian_lam"];
        // Lấy thời gian làm từ CSDL
        // Tương tự, bạn có thể lấy giá trị cho các cột khác
    }
}

// Kiểm tra xem có dữ liệu từ form POST không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["mood1"])) {
        $selectedValue = $_POST["mood1"];
    }
}

?>



<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khảo sát</title>
    <!-- <link rel="stylesheet" href="trangchu.css"> -->

</head>
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        /* Để đảm bảo menu nằm trên cùng */
        align-items: center;
    }

    #header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #4caf50;
        /* Màu nền của menu */
        padding: 10px;
        width: 100%;
        color: #fff;
        /* Màu chữ của menu */
    }

    #menu {
        display: flex;
    }

    .menu-item {
        margin: 0 15px;
        text-decoration: none;
        color: #fff;
        /* Màu chữ của menu */
    }

    .user-info,
    form {
        color: black;
    }

    .form-container {
        background-color: #fff;
        padding: 50px;
        width: 600px;
    }

    /* Thêm phần CSS mới cho câu hỏi */
    .question {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="radio"] {
        margin-right: 5px;
        pointer-events: none;
    }

    button {
        margin-top: 20px;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        width: calc(33.33% - 5px);
    }

    button:hover {
        background-color: #45a049;
    }

    .completion {
        margin-top: 20px;
    }

    #userScoreDisplay {
        font-weight: bold;
        color: #1e90ff;
    }

    .form-container label,
    .form-container input,
    .form-container button {
        margin-bottom: 10px;
        line-height: 1.5;
    }

    .time-taken {
        margin-top: 20px;
        font-weight: bold;
    }
</style>

<body>
    <div id="header">
        <a href="" class="logo">
            <img src="../IMAGE/logo.png" alt="">
        </a>
        <nav id="menu">
            <a href="menu.php" class="menu-item">Trang chủ</a>
            <a href="#" class="menu-item">Tổng quan</a>
            <a href="news.php" class="menu-item">Tin tức mới nhất</a>
            <a href="#" class="menu-item">Giải pháp</a>
            <a href="game.php" class="menu-item">Game vui</a>
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

    <!-- Hiển thị thời gian làm từ CSDL -->
    <div class="time-taken">
        <?php if (!empty($thoiGianLam)) echo "Thời gian làm bài: " . $thoiGianLam; ?>
    </div>


    <div class="form-container">

        <!-- Câu hỏi 1 -->
        <div class="question question1">
            <label>1. Bạn có cảm thấy mất hứng thú hoặc không có niềm vui trong những hoạt động mà bạn thường thích không?</label> <br>
            <input type="radio" name="mood1" value="0" <?php if ($selectedValue == "0" || $test1Value == "0") echo "checked"; ?>> Tôi vẫn thích và có niềm vui như trước.<br>
            <input type="radio" name="mood1" value="1" <?php if ($selectedValue == "1" || $test1Value == "1") echo "checked"; ?>> Đôi khi mất hứng thú hoặc niềm vui<br>
            <input type="radio" name="mood1" value="2" <?php if ($selectedValue == "2" || $test1Value == "2") echo "checked"; ?>> Có, và đây là một vấn đề lớn.<br>
            <input type="radio" name="mood1" value="3" <?php if ($selectedValue == "3" || $test1Value == "3") echo "checked"; ?>> Hoàn toàn mất hứng thú và niềm vui.<br>
            <p>Giá trị test1: <?php echo $test1Value; ?></p>
        </div>

        <!-- Câu hỏi 2 -->
        <div class="question question2">
            <label>2. Bạn có cảm giác mệt mỏi và thiếu năng lượng nhiều hơn bình thường không?</label> <br>
            <input type="radio" name="mood2" value="0" <?php if ($selectedValue == "0" || $test2Value == "0") echo "checked"; ?>> Tôi vẫn có đủ năng lượng như bình thường.<br>
            <input type="radio" name="mood2" value="1" <?php if ($selectedValue == "1" || $test2Value == "1") echo "checked"; ?>> Có đôi khi, nhưng chưa là vấn đề lớn. <br>
            <input type="radio" name="mood2" value="2" <?php if ($selectedValue == "2" || $test2Value == "2") echo "checked"; ?>> Có, và thường xuyên mệt mỏi.<br>
            <input type="radio" name="mood2" value="3" <?php if ($selectedValue == "3" || $test2Value == "3") echo "checked"; ?>> Rất mệt mỏi và thiếu năng lượng.<br>
            <p>Giá trị test2: <?php echo $test2Value; ?></p>
        </div>

        <!-- Câu hỏi 3 -->
        <div class="question question3">
            <label>3. Bạn có khó chịu và căng thẳng không rõ nguyên nhân không?</label> <br>
            <input type="radio" name="mood3" value="0" <?php if ($selectedValue == "0" || $test3Value == "0") echo "checked"; ?>> Không, tôi cảm thấy khá bình thường.<br>
            <input type="radio" name="mood3" value="1" <?php if ($selectedValue == "1" || $test3Value == "1") echo "checked"; ?>> Có đôi khi, nhưng có thể xác định nguyên nhân.<br>
            <input type="radio" name="mood3" value="2" <?php if ($selectedValue == "2" || $test3Value == "2") echo "checked"; ?>> Có, và thường xuyên cảm thấy căng thẳng mà không biết tại sao.<br>
            <input type="radio" name="mood3" value="3" <?php if ($selectedValue == "3" || $test3Value == "3") echo "checked"; ?>> Cảm thấy mình là một người hoàn toàn thất bại<br>
            <input type="radio" name="mood3" value="3" <?php if ($selectedValue == "3" || $test3Value == "3") echo "checked"; ?>> Luôn luôn cảm thấy khó chịu và căng thẳng.<br>
            <p>Giá trị test3: <?php echo $test3Value; ?></p>
        </div>

        <!-- Câu hỏi 4 -->
        <div class="question question4">
            <label>4. Bạn có thấy khó khăn trong việc tập trung và quyết định không được tốt như trước không?</label> <br>
            <input type="radio" name="mood4" value="0" <?php if ($selectedValue == "0" || $test4Value == "0") echo "checked"; ?>> Tôi vẫn có thể tập trung và ra quyết định tốt.<br>
            <input type="radio" name="mood4" value="1" <?php if ($selectedValue == "1" || $test4Value == "1") echo "checked"; ?>> Đôi khi khó khăn, nhưng chưa là vấn đề lớn.<br>
            <input type="radio" name="mood4" value="2" <?php if ($selectedValue == "2" || $test4Value == "2") echo "checked"; ?>> Có, và thường xuyên gặp khó khăn trong việc tập trung và quyết định.<br>
            <input type="radio" name="mood4" value="3" <?php if ($selectedValue == "3" || $test4Value == "3") echo "checked"; ?>> Không thể tập trung và quyết định gì cả.<br>
            <p>Giá trị test4: <?php echo $test4Value; ?></p>
        </div>

        <!-- Câu hỏi 5 -->
        <div class="question question5">
            <label>5. Bạn có thường xuyên cảm thấy buồn chán và không có ý nghĩa trong cuộc sống không?</label> <br>
            <input type="radio" name="mood5" value="0" <?php if ($selectedValue == "0" || $test5Value == "0") echo "checked"; ?>> Tôi vẫn cảm thấy cuộc sống có ý nghĩa.<br>
            <input type="radio" name="mood5" value="1" <?php if ($selectedValue == "1" || $test5Value == "1") echo "checked"; ?>> Có đôi khi, nhưng tìm thấy ý nghĩa ở những điều khác.<br>
            <input type="radio" name="mood5" value="2" <?php if ($selectedValue == "2" || $test5Value == "2") echo "checked"; ?>> Có, và thường xuyên cảm thấy buồn chán và không có ý nghĩa.<br>
            <input type="radio" name="mood5" value="3" <?php if ($selectedValue == "3" || $test5Value == "3") echo "checked"; ?>> Cuộc sống hoàn toàn không có ý nghĩa.<br>
            <p>Giá trị test5: <?php echo $test5Value; ?></p>
        </div>

        <!-- Câu hỏi 6 -->
        <div class="question question6">
            <label>6. Bạn có thấy khó khăn trong việc thể hiện cảm xúc của mình không?</label> <br>
            <input type="radio" name="mood6" value="0" <?php if ($selectedValue == "0" || $test6Value == "0") echo "checked"; ?>> Tôi có thể thể hiện cảm xúc của mình một cách tự nhiên.<br>
            <input type="radio" name="mood6" value="1" <?php if ($selectedValue == "1" || $test6Value == "1") echo "checked"; ?>> Đôi khi khó khăn, nhưng chưa là vấn đề lớn.<br>
            <input type="radio" name="mood6" value="2" <?php if ($selectedValue == "2" || $test6Value == "2") echo "checked"; ?>> Có, và thường xuyên gặp khó khăn khi thể hiện cảm xúc.<br>
            <input type="radio" name="mood6" value="3" <?php if ($selectedValue == "3" || $test6Value == "3") echo "checked"; ?>> Rất khó khăn và thường xuyên giữ cảm xúc cho riêng mình.<br>
            <p>Giá trị test6: <?php echo $test6Value; ?></p>
        </div>

        <!-- Câu hỏi 7 -->
        <div class="question question7">
            <label>7. Bạn có cảm thấy giả dối hoặc không có giá trị không?</label> <br>
            <input type="radio" name="mood7" value="0" <?php if ($selectedValue == "0" || $test7Value == "0") echo "checked"; ?>> Tôi cảm thấy tự tin về giá trị cá nhân của mình.<br>
            <input type="radio" name="mood7" value="1" <?php if ($selectedValue == "1" || $test7Value == "1") echo "checked"; ?>> Đôi khi, nhưng chưa là vấn đề lớn.<br>
            <input type="radio" name="mood7" value="2" <?php if ($selectedValue == "2" || $test7Value == "2") echo "checked"; ?>> Có, và thường xuyên cảm thấy giả dối hoặc không có giá trị.<br>
            <input type="radio" name="mood7" value="3" <?php if ($selectedValue == "3" || $test7Value == "3") echo "checked"; ?>> Tôi cảm thấy rất giả dối và không có giá trị.<br>
            <p>Giá trị test7: <?php echo $test7Value; ?></p>
        </div>

        <!-- Câu hỏi 8 -->
        <div class="question question8">
            <label>8. Bạn có cảm thấy khó khăn trong việc xác định mục tiêu và đặt ra những mục tiêu trong cuộc sống không?</label> <br>
            <input type="radio" name="mood8" value="0" <?php if ($selectedValue == "0" || $test8Value == "0") echo "checked"; ?>> Tôi có thể xác định mục tiêu và đặt ra kế hoạch để đạt được chúng.<br>
            <input type="radio" name="mood8" value="1" <?php if ($selectedValue == "1" || $test8Value == "1") echo "checked"; ?>> Có đôi khi, nhưng chưa là vấn đề lớn.<br>
            <input type="radio" name="mood8" value="2" <?php if ($selectedValue == "2" || $test8Value == "2") echo "checked"; ?>> Có, và thường xuyên cảm thấy khó khăn trong việc xác định và đạt được mục tiêu.<br>
            <input type="radio" name="mood8" value="3" <?php if ($selectedValue == "3" || $test8Value == "3") echo "checked"; ?>> Tôi không thể xác định mục tiêu và không có kế hoạch cho tương lai.<br>
            <p>Giá trị test8: <?php echo $test8Value; ?></p>
        </div>

        <!-- Câu hỏi 9 -->
        <div class="question question9">
            <label>9. Bạn có thấy giữa bạn và mọi người xung quanh có một khoảng cách không?</label> <br>
            <input type="radio" name="mood9" value="0" <?php if ($selectedValue == "0" || $test9Value == "0") echo "checked"; ?>> Tôi cảm thấy gần gũi và kết nối với mọi người xung quanh.<br>
            <input type="radio" name="mood9" value="1" <?php if ($selectedValue == "1" || $test9Value == "1") echo "checked"; ?>> Đôi khi cảm thấy có khoảng cách, nhưng không là vấn đề lớn.<br>
            <input type="radio" name="mood9" value="2" <?php if ($selectedValue == "2" || $test9Value == "2") echo "checked"; ?>> Có, và thường xuyên cảm thấy một khoảng cách lớn với mọi người.<br>
            <input type="radio" name="mood9" value="3" <?php if ($selectedValue == "3" || $test9Value == "3") echo "checked"; ?>> Tôi cảm thấy rất cô độc và không kết nối với ai.<br>
            <p>Giá trị test9: <?php echo $test9Value; ?></p>
        </div>

        <!-- Câu hỏi 10 -->
        <div class="question question10">
            <label>10. Bạn có thấy giả dối và không thể hiểu được người khác không?</label> <br>
            <input type="radio" name="mood10" value="0" <?php if ($selectedValue == "0" || $test10Value == "0") echo "checked"; ?>> Tôi có thể hiểu và tương tác với người khác một cách tự tin.<br>
            <input type="radio" name="mood10" value="1" <?php if ($selectedValue == "1" || $test10Value == "1") echo "checked"; ?>> Đôi khi có khó khăn, nhưng chưa là vấn đề lớn.<br>
            <input type="radio" name="mood10" value="2" <?php if ($selectedValue == "2" || $test10Value == "2") echo "checked"; ?>> Có, và thường xuyên cảm thấy khó khăn trong việc hiểu và tương tác với người khác.<br>
            <input type="radio" name="mood10" value="3" <?php if ($selectedValue == "3" || $test10Value == "3") echo "checked"; ?>> Tôi hoàn toàn không thể hiểu và tương tác với người khác.<br>
            <p>Giá trị test10: <?php echo $test10Value; ?></p>
        </div>



</body>

</html>