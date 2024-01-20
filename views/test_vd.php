<?php
session_start();
// Kiểm tra xem có nút đăng xuất được nhấn hay không
if (isset($_POST['logout_button'])) {
    // Hủy bỏ phiên đăng nhập và chuyển hướng về trang đăng nhập
    session_destroy();
    header('Location: vd_dn.php');
    exit();
}

// Kiểm tra đăng nhập
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 && $_SESSION['session_id'] == session_id()) {
    // Nếu người dùng đã đăng nhập, lấy thông tin từ phiên
    $loggedInFullname = $_SESSION['fullname'];
    $loggedInUsername = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Survey Page</title>
    <!-- <script src="../JS/testform.js"></script> -->
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/nav.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="../JS/jquery-3.4.1.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }


        .form-container {
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            margin: 60px auto;
            margin-top: 50px;
            /* Cập nhật margin để canh giữa */
        }

        /* Thêm media query để điều chỉnh margin khi menu được ẩn */
        @media screen and (max-width: 768px) {
            .form-container {
                margin-top: 120px;
                /* Điều chỉnh margin khi menu ẩn đi */
            }

            .hmenu {
                margin-bottom: 60px;
                /* Thêm khoảng cách giữa menu và nội dung */
            }
        }

        .question {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="radio"] {
            margin-right: 5px;
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
    </style>
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
            <li><a href="#">Bài Test</a></li>

            <li style="float: right; margin-right: 0px;">
                <input type="submit" name="logout_button" style="padding: 7px 17px; color: white; background-color: orange; border: solid white;" value="Đăng xuất">
            </li>
            <li style="float: right; margin-right: 10px;">
                <p style="color: white; padding: 7px 5px;">Xin chào, <?php echo $loggedInFullname; ?> (<?php echo $loggedInUsername; ?>)</p>
            </li>
        </ul>
    </form>

    <div class="form-container">

        <div class="question question1">
            <label>1. Bạn cảm thấy thế nào về tâm trạng buồn của mình gần đây?</label> <br>
            <input type="radio" name="mood1" value="0" onclick="answerQuestion(this.value)"> Không cảm thấy buồn<br>
            <input type="radio" name="mood1" value="1" onclick="answerQuestion(this.value)"> Có lúc cảm thấy chán hoặc buồn<br>
            <input type="radio" name="mood1" value="2" onclick="answerQuestion(this.value)"> Luôn cảm thấy chán hoặc buồn và khó dừng lại<br>
            <input type="radio" name="mood1" value="2" onclick="answerQuestion(this.value)"> Luôn cảm thấy buồn và bất hạnh đến mức hoàn toàn đau khổ<br>
            <input type="radio" name="mood1" value="3" onclick="answerQuestion(this.value)"> Rất buồn hoặc rất bất hạnh và khổ sở đến mức không thể chịu được<br>
        </div>

        <div class="question question2" style="display: none;">
            <label>2. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
            <input type="radio" name="mood2" value="0" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không bi quan và nản lòng về tương lai.<br>
            <input type="radio" name="mood2" value="1" onclick="answerQuestion(this.value)"> Tôi cảm thấy nản lòng về tương lai hơn trước đây. <br>
            <input type="radio" name="mood2" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình chẳng có gì mong đợi ở tương lai cả.<br>
            <input type="radio" name="mood2" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy sẽ không bao giờ khắc phục được những điều phiền muộn của tôi.<br>
            <input type="radio" name="mood2" value="3" onclick="answerQuestion(this.value)"> Tôi cảm thấy tương lai tuyệt vọng và tình hình chỉ có thể tiếp tục xấu đi hoặc không thể cải thiện được.<br>
        </div>

        <div class="question question3" style="display: none;">
            <label>3. Bạn cảm thấy thế nào về bản thân và sự thất bại?</label> <br>
            <input type="radio" name="mood3" value="0" onclick="answerQuestion(this.value)"> Không cảm thấy như bị thất bại<br>
            <input type="radio" name="mood3" value="1" onclick="answerQuestion(this.value)"> Thấy mình thất bại nhiều hơn những người khác<br>
            <input type="radio" name="mood3" value="2" onclick="answerQuestion(this.value)"> Cảm thấy đã hoàn thành rất ít điều đáng giá hoặc có ý nghĩa<br>
            <input type="radio" name="mood3" value="2" onclick="answerQuestion(this.value)"> Nhìn lại cuộc đời, thấy mình đã có quá nhiều thất bại<br><input type="radio" name="mood3" value="3" onclick="answerQuestion(this.value)"> Cảm thấy mình là một người hoàn toàn thất bại<br>
            <input type="radio" name="mood3" value="3" onclick="answerQuestion(this.value)"> Tự cảm thấy hoàn toàn thất bại trong vai trò của mình (bố, mẹ, chồng, vợ…)<br>
        </div>

        <div class="question question4" style="display: none;">
            <label>4. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
            <input type="radio" name="mood4" value="0" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không bất mãn<br>
            <input type="radio" name="mood4" value="0" onclick="answerQuestion(this.value)"> Tôi còn thích thú với những điều mà trước đây tôi vẫn thường ưa thích<br>
            <input type="radio" name="mood4" value="1" onclick="answerQuestion(this.value)"> Tôi luôn luôn cảm thấy buồn<br>
            <input type="radio" name="mood4" value="1" onclick="answerQuestion(this.value)"> Tôi ít thấy thích những điều mà tôi vẫn thường ưa thích trước đây<br>
            <input type="radio" name="mood4" value="2" onclick="answerQuestion(this.value)"> Tôi không thõa mãn về bất kỳ cái gì nữa<br>
            <input type="radio" name="mood4" value="2" onclick="answerQuestion(this.value)"> Tôi rất ít thích thú về những điều trước đây tôi vẫn thường ưa thích<br>
            <input type="radio" name="mood4" value="3" onclick="answerQuestion(this.value)"> Tôi không còn chút thích thú nào nữa<br>
            <input type="radio" name="mood4" value="3" onclick="answerQuestion(this.value)"> Tôi không hài lòng với mọi cái<br>
        </div>

        <div class="question question5" style="display: none;">
            <label>5. Bạn cảm thấy thế nào về tội lỗi của mình?</label> <br>
            <input type="radio" name="mood5" value="0" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không cảm thấy có tội lỗi gì ghê gớm cả.<br>
            <input type="radio" name="mood5" value="1" onclick="answerQuestion(this.value)"> Phần nhiều những việc tôi đã làm tôi đều cảm thấy có tội.<br>
            <input type="radio" name="mood5" value="1" onclick="answerQuestion(this.value)"> Phần lớn thời gian tôi cảm thấy mình tồi hoặc không xứng đáng.<br>
            <input type="radio" name="mood5" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình hoàn toàn có tội.<br>
            <input type="radio" name="mood5" value="2" onclick="answerQuestion(this.value)"> Giờ đây tôi luôn cảm thấy trên thực tế mình tồi hoặc không xứng đáng.<br>
            <input type="radio" name="mood5" value="3" onclick="answerQuestion(this.value)"> Lúc nào tôi cũng cảm thấy mình có tội.<br>
            <input type="radio" name="mood5" value="3" onclick="answerQuestion(this.value)"> Tôi cảm thấy như là tôi rất tồi hoặc vô dụng.<br>
        </div>

        <div class="completion" style="display: none;">
            <p>Chúc mừng! Bạn đã hoàn thành phần câu hỏi.</p>
            <p>Điểm của bạn là: <span id="userScoreDisplay"></span></p>
        </div>

        <!-- Nút "Quay lại", "Tiếp tục" và "Hoàn thành" -->
        <button id="backButton" onclick="goBackToPreviousQuestion()" style="display: none;">Quay lại</button>
        <button id="nextButton" onclick="continueToNextQuestion()">Tiếp tục</button>
        <button id="completeButton" onclick="completeSurvey()" style="display: none;" name="test1">Hoàn thành</button>
    </div>

</body>

</html>

<!-- Đoạn mã JavaScript -->
<script>
    let currentQuestionIndex = 1;
    const totalQuestions = 5; // Cập nhật tổng số câu hỏi

    function answerQuestion(value) {
        // Các logic xử lý câu trả lời câu hỏi
    }

    function continueToNextQuestion() {
        const radioButtons = document.querySelectorAll(`.question${currentQuestionIndex} input[type="radio"]:checked`);
        if (radioButtons.length === 0) {
            alert('Vui lòng chọn một phương án trước khi tiếp tục.');
            return;
        }

        if (currentQuestionIndex === totalQuestions) {
            document.getElementById('completeButton').style.display = 'block';
            document.getElementById('nextButton').style.display = 'none';
        } else {
            document.querySelector(`.question${currentQuestionIndex}`).style.display = 'none';
            currentQuestionIndex++;
            document.querySelector(`.question${currentQuestionIndex}`).style.display = 'block';
            document.getElementById('backButton').style.display = 'block';
            // Hiển thị nút "Hoàn thành" khi ở câu hỏi cuối cùng
            if (currentQuestionIndex === totalQuestions) {
                document.getElementById('nextButton').style.display = 'none';
                document.getElementById('completeButton').style.display = 'block';
            }
        }
    }

    function goBackToPreviousQuestion() {
        if (currentQuestionIndex > 1) {
            document.querySelector(`.question${currentQuestionIndex}`).style.display = 'none';
            currentQuestionIndex--;
            document.querySelector(`.question${currentQuestionIndex}`).style.display = 'block';
            if (currentQuestionIndex === 1) {
                document.getElementById('backButton').style.display = 'none';
            }
            if (currentQuestionIndex < totalQuestions) {
                document.getElementById('nextButton').style.display = 'block';
                document.getElementById('completeButton').style.display = 'none';
            }
        }
    }

    function completeSurvey() {
        var totalScore = calculateTotalScore();
        document.getElementById('userScoreDisplay').innerText = totalScore;
        document.querySelector('.question').style.display = 'none';
        document.querySelector('.completion').style.display = 'block';
        // Hiển thị nút "Quay lại" và "Hoàn thành" khi hoàn thành khảo sát
        document.getElementById('backButton').style.display = 'block';
        document.getElementById('completeButton').style.display = 'block';
        sendScoreToServer(totalScore);
    }

    function calculateTotalScore() {
        var totalScore = 0;
        var radioButtons = document.querySelectorAll('input[type=radio]:checked');
        radioButtons.forEach(function(radioButton) {
            totalScore += parseInt(radioButton.value);
        });
        return totalScore;
    }

    function sendScoreToServer(score) {
        var form = document.createElement('form');
        form.method = 'post';
        form.action = 'process_survey.php'; // Cập nhật với đường dẫn chính xác đến tệp PHP của bạn
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'user_score';
        input.value = score;
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
</script>