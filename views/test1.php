<?php
// Bắt đầu phiên
session_start();

// Kiểm tra đăng nhập
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 && $_SESSION['session_id'] == session_id()) {
    // Nếu người dùng đã đăng nhập, lấy thông tin từ phiên
    $loggedInUserId = $_SESSION['user_id'];
    $loggedInFullname = $_SESSION['fullname'];
    $loggedInUsername = $_SESSION['username'];

    // Hiển thị user_id
    echo "User ID: " . $loggedInUserId;

    // Xử lý đăng xuất khi nhấn nút "Đăng xuất"
    if (isset($_POST['logout_button'])) {
        // Hủy toàn bộ phiên đăng nhập
        session_unset();
        session_destroy();

        // Chuyển hướng đến trang đăng nhập
        header("Location: login.php");
        exit();
    }

    // Kết nối CSDL
    $conn = new mysqli("localhost", "root", "", "nckh");
    if ($conn->connect_error) {
        die("Kết nối CSDL thất bại: " . $conn->connect_error);
    }

    // Kiểm tra xem user_id đã có trong bảng test1 hay chưa
    $kiemTraQuery = "SELECT id_name FROM test1 WHERE id_name = '$loggedInUserId'";
    $kiemTraResult = $conn->query($kiemTraQuery);

    if ($kiemTraResult->num_rows > 0) {
        // Nếu user_id đã tồn tại trong bảng test1, chuyển hướng đến trang test1_ls.php
        header("Location: test1_ls.php");
        exit();
    } else {
        // Nếu user_id chưa tồn tại trong bảng test1, hiển thị form làm bài
?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Your Survey Page</title>
            <!-- <script src="../JS/testform.js"></script> -->
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f0f0f0;
                    margin: 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                }

                .form-container {
                    background-color: #fff;
                    padding: 50px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    width: 600px;
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
            <!-- <a href="hienthi.php"> lịch sử</a> -->
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
                    <a href="xyly.php">ls t1</a>
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

            <div class="form-container">

                <form id="moodForm" method="post" action="test1_xuly.php">

                    <div class="question question1">
                        <label>1. Bạn có thấy khó khăn trong việc thể hiện cảm xúc của mình không?</label> <br>
                        <input type="radio" name="mood1" value="0" onclick="answerQuestion(this.value)"> Tôi có thể thể hiện cảm xúc của mình một cách tự nhiên.<br>
                        <input type="radio" name="mood1" value="1" onclick="answerQuestion(this.value)"> Đôi khi khó khăn, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood1" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên gặp khó khăn khi thể hiện cảm xúc.<br>
                        <input type="radio" name="mood1" value="3" onclick="answerQuestion(this.value)"> Rất khó khăn và thường xuyên giữ cảm xúc cho riêng mình.<br>
                    </div>

                    <div class="question question2" style="display: none;">
                        <label>2. Bạn có thấy mất lòng tin vào bản thân và tương lai không?</label> <br>
                        <input type="radio" name="mood2" value="0" onclick="answerQuestion(this.value)"> Tôi vẫn tin tưởng vào bản thân và tương lai của mình.<br>
                        <input type="radio" name="mood2" value="1" onclick="answerQuestion(this.value)"> Đôi khi mất lòng tin, nhưng chưa là một vấn đề lớn <br>
                        <input type="radio" name="mood2" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên mất lòng tin vào bản thân và tương lai.<br>
                        <input type="radio" name="mood2" value="3" onclick="answerQuestion(this.value)"> Hoàn toàn mất lòng tin và không thể tưởng tượng được tương lai tích cực.<br>
                    </div>

                    <div class="question question3" style="display: none;">
                        <label>3. Bạn có thường xuyên cảm thấy căng thẳng và lo lắng không?</label> <br>
                        <input type="radio" name="mood3" value="0" onclick="answerQuestion(this.value)"> Tôi không thường xuyên cảm thấy căng thẳng và lo lắng.<br>
                        <input type="radio" name="mood3" value="1" onclick="answerQuestion(this.value)"> Đôi khi, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood3" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên cảm thấy căng thẳng và lo lắng.<br>
                        <input type="radio" name="mood3" value="3" onclick="answerQuestion(this.value)"> Luôn luôn cảm thấy căng thẳng và lo lắng.<br>
                    </div>

                    <div class="question question4" style="display: none;">
                        <label>4. Bạn có thường xuyên cảm thấy giận dữ hoặc không hài lòng với bản thân và người khác không?</label> <br>
                        <input type="radio" name="mood4" value="0" onclick="answerQuestion(this.value)"> Tôi ít khi cảm thấy giận dữ hoặc không hài lòng.<br>
                        <input type="radio" name="mood4" value="1" onclick="answerQuestion(this.value)"> Có đôi khi, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood4" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên cảm thấy giận dữ và không hài lòng.<br>
                        <input type="radio" name="mood4" value="3" onclick="answerQuestion(this.value)"> Luôn luôn cảm thấy giận dữ và không hài lòng với bản thân và người khác.<br>
                    </div>

                    <div class="question question5" style="display: none;">
                        <label>5.Bạn có mất khả năng cảm nhận niềm vui từ những điều mà trước đây bạn thấy vui vẻ không?</label> <br>
                        <input type="radio" name="mood5" value="0" onclick="answerQuestion(this.value)"> Tôi vẫn có khả năng cảm nhận niềm vui như trước.<br>
                        <input type="radio" name="mood5" value="1" onclick="answerQuestion(this.value)"> Có đôi khi, nhưng chưa là vấn đề lớn<br>
                        <input type="radio" name="mood5" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên mất khả năng cảm nhận niềm vui.<br>
                        <input type="radio" name="mood5" value="3" onclick="answerQuestion(this.value)"> Hoàn toàn mất khả năng cảm nhận niềm vui.<br>
                    </div>
                    <div class="question question6" style="display: none;">
                        <label>6. Bạn có thấy bản thân mình không đủ thông minh hoặc giỏi như người khác không?</label> <br>
                        <input type="radio" name="mood6" value="0" onclick="answerQuestion(this.value)"> Tôi cảm thấy đủ thông minh và giỏi như mọi người.<br>
                        <input type="radio" name="mood6" value="1" onclick="answerQuestion(this.value)"> Đôi khi cảm thấy không đủ, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood6" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên cảm thấy không đủ thông minh hoặc giỏi.<br>
                        <input type="radio" name="mood6" value="3" onclick="answerQuestion(this.value)"> Hoàn toàn cảm thấy không đủ thông minh và giỏi.<br>
                    </div>

                    <div class="question question7" style="display: none;">
                        <label>7. Bạn có mất khả năng tận hưởng thức ăn và các hoạt động vui chơi không?</label> <br>
                        <input type="radio" name="mood7" value="0" onclick="answerQuestion(this.value)"> Tôi vẫn có khả năng tận hưởng thức ăn và vui chơi như bình thường.<br>
                        <input type="radio" name="mood7" value="1" onclick="answerQuestion(this.value)"> Có đôi khi, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood7" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên mất khả năng tận hưởng thức ăn và vui chơi.<br>
                        <input type="radio" name="mood7" value="3" onclick="answerQuestion(this.value)"> Hoàn toàn mất khả năng tận hưởng thức ăn và vui chơi.<br>
                    </div>

                    <div class="question question8" style="display: none;">
                        <label>8.Bạn có thấy mình là người gây phiền hà và không hợp nhất với mọi người xung quanh không?</label> <br>
                        <input type="radio" name="mood8" value="0" onclick="answerQuestion(this.value)"> Tôi không thường xuyên làm phiền và hợp nhất với mọi người.<br>
                        <input type="radio" name="mood8" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên cảm thấy mình gây phiền hà và không hợp nhất.<br>
                        <input type="radio" name="mood8" value="3" onclick="answerQuestion(this.value)"> Luôn luôn cảm thấy mình không hợp nhất và gây phiền hà.<br>
                    </div>

                    <div class="question question9" style="display: none;">
                        <label>9.Bạn có thường xuyên tránh gặp gỡ và giao tiếp với người khác không?</label> <br>
                        <input type="radio" name="mood9" value="0" onclick="answerQuestion(this.value)"> Tôi không tránh gặp gỡ và giao tiếp với người khác.<br>
                        <input type="radio" name="mood9" value="1" onclick="answerQuestion(this.value)"> Có đôi khi, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood9" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên tránh gặp gỡ và giao tiếp.<br>
                        <input type="radio" name="mood9" value="3" onclick="answerQuestion(this.value)"> Luôn luôn tránh gặp gỡ và giao tiếp với người khác.<br>
                    </div>

                    <div class="question question10" style="display: none;">
                        <label>10.Bạn có thường xuyên cảm thấy lo lắng và sợ hãi về tương lai không? </label> <br>
                        <input type="radio" name="mood10" value="0" onclick="answerQuestion(this.value)"> Tôi không thường xuyên cảm thấy lo lắng và sợ hãi về tương lai.<br>
                        <input type="radio" name="mood10" value="1" onclick="answerQuestion(this.value)"> Tôi thấy bình thường<br>
                        <input type="radio" name="mood10" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên cảm thấy lo lắng và sợ hãi về tương lai.<br>
                        <input type="radio" name="mood10" value="3" onclick="answerQuestion(this.value)"> Luôn luôn cảm thấy lo lắng và sợ hãi về tương lai.<br>
                    </div>

                    <div class="completion" style="display: none;">
                        <p>Chúc mừng! Bạn đã hoàn thành phần câu hỏi.</p>
                        <p>Điểm của bạn là: <span id="userScoreDisplay"></span></p>
                    </div>

                    <!-- Nút "Quay lại", "Tiếp tục" và "Hoàn thành" -->
                    <button id="completeButton" type="submit" style="display: none;">Hoàn thành</button>
                </form>
                <button id="nextButton" onclick="continueToNextQuestion()">Tiếp tục</button>
                <button id="backButton" onclick="goBackToPreviousQuestion()" style="display: none;">Quay lại</button>

            </div>

        </body>

        </html>


        <script>
            let currentQuestionIndex = 1;
            const totalQuestions = 10; // Cập nhật tổng số câu hỏi

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
                    21
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

            // function sendScoreToServer(score) {
            //     var form = document.createElement('form');
            //     form.method = 'post';
            //     form.action = 'process_survey.php'; // Cập nhật với đường dẫn chính xác đến tệp PHP của bạn
            //     var input = document.createElement('input');
            //     input.type = 'hidden';
            //     input.name = 'user_score';
            //     input.value = score;
            //     form.appendChild(input);
            //     document.body.appendChild(form);
            //     form.submit();
            // }

            // function completeForm() {
            //     // Tạo một đối tượng chứa các câu hỏi được chọn
            //     var selectedQuestions = [];

            //     // Lặp qua các câu hỏi từ 1 đến 10
            //     for (var i = 1; i <= 10; i++) {
            //         // Lấy giá trị được chọn
            //         var selectedValue = document.querySelector('input[name="mood' + i + '"]:checked');

            //         // Nếu có giá trị được chọn, thêm vào mảng
            //         if (selectedValue) {
            //             selectedQuestions.push({
            //                 name: selectedValue.name,
            //                 value: selectedValue.value
            //             });
            //         }
            //     }

            //     // Gửi dữ liệu lên server bằng Ajax
            //     var xhr = new XMLHttpRequest();
            //     xhr.open("POST", "10cauxuly.php", true);
            //     xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            //     xhr.onreadystatechange = function() {
            //         if (xhr.readyState === 4 && xhr.status === 200) {
            //             // Xử lý phản hồi từ server nếu cần
            //             console.log(xhr.responseText);
            //         }
            //     };
            //     xhr.send(JSON.stringify(selectedQuestions));
            // }
        </script>
<?php
    }
} else {
    // Nếu người dùng chưa đăng nhập, có thể thêm xử lý tương ứng ở đây
    echo "Xin chào khách!";
}
?>