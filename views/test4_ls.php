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
    $sql = "SELECT * FROM test4 WHERE id_name = '$loggedInUserId'";
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
        </div>

        <!-- Câu hỏi 2 -->
        <div class="question question2">
            <label>2. Bạn cảm thấy như bạn đang mất ngủ hoặc có thói quen thức dậy vào ban đêm không?</label> <br>
            <input type="radio" name="mood2" value="0" <?php if ($selectedValue == "0" || $test2Value == "0") echo "checked"; ?>> Không, tôi ngủ đủ giấc và không có vấn đề gì.<br>
            <input type="radio" name="mood2" value="1" <?php if ($selectedValue == "1" || $test2Value == "1") echo "checked"; ?>> Có, nhưng không thường xuyên.<br>
            <input type="radio" name="mood2" value="2" <?php if ($selectedValue == "2" || $test2Value == "2") echo "checked"; ?>> Thức dậy thường xuyên trong đêm, làm ảnh hưởng đến giấc ngủ của tôi.<br>
            <input type="radio" name="mood2" value="3" <?php if ($selectedValue == "3" || $test2Value == "3") echo "checked"; ?>> Tôi gặp vấn đề nghiêm trọng về giấc ngủ.<br>
        </div>

        <!-- Câu hỏi 3 -->
        <div class="question question3">
            <label>3. Bạn cảm thấy mệt mỏi và thiếu năng lượng ra sao?</label> <br>
            <input type="radio" name="mood3" value="0" <?php if ($selectedValue == "0" || $test3Value == "0") echo "checked"; ?>> Tôi cảm thấy năng động và không mệt mỏi.<br>
            <input type="radio" name="mood3" value="1" <?php if ($selectedValue == "1" || $test3Value == "1") echo "checked"; ?>> Đôi khi tôi cảm thấy mệt mỏi, nhưng không phải lúc nào cũng.<br>
            <input type="radio" name="mood3" value="2" <?php if ($selectedValue == "2" || $test3Value == "2") echo "checked"; ?>> Tôi thường xuyên cảm thấy mệt mỏi và thiếu năng lượng.<br>
            <input type="radio" name="mood3" value="3" <?php if ($selectedValue == "3" || $test3Value == "3") echo "checked"; ?>> Tôi luôn luôn cảm thấy mệt mỏi và không có năng lượng.<br>
        </div>

        <!-- Câu hỏi 4 -->
        <div class="question question4">
            <label>4. Bạn có khó chịu hay căng thẳng không?</label> <br>
            <input type="radio" name="mood4" value="0" <?php if ($selectedValue == "0" || $test4Value == "0") echo "checked"; ?>> Không, tôi không cảm thấy căng thẳng.<br>
            <input type="radio" name="mood4" value="1" <?php if ($selectedValue == "1" || $test4Value == "1") echo "checked"; ?>> Có, nhưng không phải lúc nào cũng.<br>
            <input type="radio" name="mood4" value="2" <?php if ($selectedValue == "2" || $test4Value == "2") echo "checked"; ?>> Tôi thường xuyên cảm thấy căng thẳng.<br>
            <input type="radio" name="mood4" value="3" <?php if ($selectedValue == "3" || $test4Value == "3") echo "checked"; ?>> Tôi luôn luôn cảm thấy căng thẳng và khó chịu.<br>
        </div>

        <!-- Câu hỏi 5 -->
        <div class="question question5">
            <label>5. Bạn có vấn đề về tâm trạng và cảm xúc không ổn định không?</label> <br>
            <input type="radio" name="mood5" value="0" <?php if ($selectedValue == "0" || $test5Value == "0") echo "checked"; ?>> Tâm trạng của tôi ổn định và không có vấn đề gì.<br>
            <input type="radio" name="mood5" value="1" <?php if ($selectedValue == "1" || $test5Value == "1") echo "checked"; ?>> Đôi khi tôi có những biến động nhỏ về tâm trạng.<br>
            <input type="radio" name="mood5" value="2" <?php if ($selectedValue == "2" || $test5Value == "2") echo "checked"; ?>> Tôi thường xuyên có cảm xúc không ổn định.<br>
            <input type="radio" name="mood5" value="3" <?php if ($selectedValue == "3" || $test5Value == "3") echo "checked"; ?>> Tâm trạng của tôi luôn biến động và khó kiểm soát.<br>
        </div>

        <!-- Câu hỏi 6 -->
        <div class="question question6">
            <label>6. Bạn có khả năng tập trung và tư duy bình thường không?</label> <br>
            <input type="radio" name="mood6" value="0" <?php if ($selectedValue == "0" || $test6Value == "0") echo "checked"; ?>> Tôi có khả năng tập trung và tư duy tốt.<br>
            <input type="radio" name="mood6" value="1" <?php if ($selectedValue == "1" || $test6Value == "1") echo "checked"; ?>> Đôi khi tôi gặp khó khăn trong việc tập trung và tư duy.<br>
            <input type="radio" name="mood6" value="2" <?php if ($selectedValue == "2" || $test6Value == "2") echo "checked"; ?>> Tôi thường xuyên gặp vấn đề về tập trung và tư duy.<br>
            <input type="radio" name="mood6" value="3" <?php if ($selectedValue == "3" || $test6Value == "3") echo "checked"; ?>> Tôi không thể tập trung và tư duy được.<br>
        </div>

        <!-- Câu hỏi 7 -->
        <div class="question question7">
            <label>7. Bạn có cảm thấy buồn bã, tuyệt vọng hoặc không hạnh phúc không?</label> <br>
            <input type="radio" name="mood7" value="0" <?php if ($selectedValue == "0" || $test7Value == "0") echo "checked"; ?>> Tôi không có cảm giác buồn bã và hạnh phúc.<br>
            <input type="radio" name="mood7" value="1" <?php if ($selectedValue == "1" || $test7Value == "1") echo "checked"; ?>> Đôi khi tôi cảm thấy buồn bã, nhưng không phải lúc nào cũng.<br>
            <input type="radio" name="mood7" value="2" <?php if ($selectedValue == "2" || $test7Value == "2") echo "checked"; ?>> Tôi thường xuyên cảm thấy buồn bã và không hạnh phúc.<br>
            <input type="radio" name="mood7" value="3" <?php if ($selectedValue == "3" || $test7Value == "3") echo "checked"; ?>> Tôi luôn luôn cảm thấy tuyệt vọng và không hạnh phúc.<br>
        </div>

        <!-- Câu hỏi 8 -->
        <div class="question question8">
            <label>8. Bạn có vấn đề về ăn uống, cảm giác thèm ăn hoặc mất khẩu phần ăn không?</label> <br>
            <input type="radio" name="mood8" value="0" <?php if ($selectedValue == "0" || $test8Value == "0") echo "checked"; ?>> Tôi ăn uống bình thường và không có vấn đề gì.<br>
            <input type="radio" name="mood8" value="1" <?php if ($selectedValue == "1" || $test8Value == "1") echo "checked"; ?>> Đôi khi tôi có cảm giác thèm ăn hoặc không muốn ăn.<br>
            <input type="radio" name="mood8" value="2" <?php if ($selectedValue == "2" || $test8Value == "2") echo "checked"; ?>> Tôi thường xuyên có vấn đề về ăn uống.<br>
            <input type="radio" name="mood8" value="3" <?php if ($selectedValue == "3" || $test8Value == "3") echo "checked"; ?>> Tôi gặp vấn đề nghiêm trọng về ăn uống.<br>
        </div>

        <!-- Câu hỏi 9 -->
        <div class="question question9">
            <label>9. Bạn cảm thấy có vấn đề với việc quyết định, tự quản lý hay thậm chí tự tử không?</label> <br>
            <input type="radio" name="mood9" value="0" <?php if ($selectedValue == "0" || $test9Value == "0") echo "checked"; ?>> Tôi có khả năng quyết định và tự quản lý tốt.<br>
            <input type="radio" name="mood9" value="1" <?php if ($selectedValue == "1" || $test9Value == "1") echo "checked"; ?>> Đôi khi tôi gặp khó khăn trong việc quyết định và tự quản lý.<br>
            <input type="radio" name="mood9" value="2" <?php if ($selectedValue == "2" || $test9Value == "2") echo "checked"; ?>> Tôi thường xuyên gặp vấn đề với quyết định và tự quản lý.<br>
            <input type="radio" name="mood9" value="3" <?php if ($selectedValue == "3" || $test9Value == "3") echo "checked"; ?>> Tôi cảm thấy không thể quyết định được và tự quản lý cuộc sống.<br>
        </div>

        <!-- Câu hỏi 10 -->
        <div class="question question10">
            <label>10. Bạn cảm thấy mất niềm tin vào bản thân và tương lai không?</label> <br>
            <input type="radio" name="mood10" value="0" <?php if ($selectedValue == "0" || $test10Value == "0") echo "checked"; ?>> Tôi cảm thấy tự tin và tin tưởng vào tương lai.<br>
            <input type="radio" name="mood10" value="1" <?php if ($selectedValue == "1" || $test10Value == "1") echo "checked"; ?>> Đôi khi tôi mất niềm tin, nhưng không phải lúc nào cũng.<br>
            <input type="radio" name="mood10" value="2" <?php if ($selectedValue == "2" || $test10Value == "2") echo "checked"; ?>> Tôi thường xuyên cảm thấy mất niềm tin vào bản thân và tương lai.<br>
            <input type="radio" name="mood10" value="3" <?php if ($selectedValue == "3" || $test10Value == "3") echo "checked"; ?>> Tôi hoàn toàn mất niềm tin vào bản thân và tương lai.<br>
        </div>



</body>

</html>