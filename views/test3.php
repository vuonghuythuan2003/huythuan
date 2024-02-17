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
    $kiemTraQuery = "SELECT id_name FROM test3 WHERE id_name = '$loggedInUserId'";
    $kiemTraResult = $conn->query($kiemTraQuery);

    if ($kiemTraResult->num_rows > 0) {
        // Nếu user_id đã tồn tại trong bảng test1, chuyển hướng đến trang test1_ls.php
        header("Location: test3_ls.php");
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

                .time-taken {
                    margin-top: 20px;
                    font-weight: bold;
                }
            </style>
        </head>

        <body>
            <a href="test3_ls.php"> lịch sử</a>
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

                <form id="moodForm" method="post" action="test3_xuly.php">

                    <div class="question question1">
                        <label>1. Bạn có thường xuyên cảm thấy mất ngủ và khó khăn khi duy trì giấc ngủ không?</label> <br>
                        <input type="radio" name="mood1" value="0" onclick="answerQuestion(this.value)"> Tôi có một giấc ngủ tốt và không gặp vấn đề đặc biệt.<br>
                        <input type="radio" name="mood1" value="1" onclick="answerQuestion(this.value)"> Có đôi khi, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood1" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên gặp vấn đề về giấc ngủ.<br>
                        <input type="radio" name="mood1" value="3" onclick="answerQuestion(this.value)"> Gặp vấn đề nghiêm trọng về giấc ngủ và thường xuyên thức dậy sớm.<br>
                    </div>

                    <div class="question question2" style="display: none;">
                        <label>2. Bạn có thấy mình dễ cáu kỉnh và phản ứng mạnh với những tình huống nhỏ không?</label> <br>
                        <input type="radio" name="mood2" value="0" onclick="answerQuestion(this.value)"> Tôi không dễ cáu kỉnh và giữ được sự bình tĩnh.<br>
                        <input type="radio" name="mood2" value="1" onclick="answerQuestion(this.value)"> Đôi khi, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood2" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên phản ứng mạnh với những tình huống nhỏ.<br>
                        <input type="radio" name="mood2" value="3" onclick="answerQuestion(this.value)"> Luôn luôn dễ cáu kỉnh và phản ứng mạnh với mọi tình huống.<br>
                    </div>

                    <div class="question question3" style="display: none;">
                        <label>3. Bạn có thường xuyên cảm thấy quấy rối và không thể tập trung vào công việc hoặc học tập không?</label> <br>
                        <input type="radio" name="mood3" value="0" onclick="answerQuestion(this.value)"> Tôi có khả năng tập trung tốt và không bị quấy rối.<br>
                        <input type="radio" name="mood3" value="1" onclick="answerQuestion(this.value)"> Đôi khi, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood3" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên cảm thấy quấy rối và khó tập trung<br>
                        <input type="radio" name="mood3" value="3" onclick="answerQuestion(this.value)"> Rất khó khăn khi tập trung và luôn bị quấy rối.<br>
                    </div>

                    <div class="question question4" style="display: none;">
                        <label>4.Bạn có cảm thấy mất khả năng kiểm soát đời sống và tương lai của mình không?</label> <br>
                        <input type="radio" name="mood4" value="0" onclick="answerQuestion(this.value)"> Tôi cảm thấy có khả năng kiểm soát đời sống và tương lai của mình.<br>
                        <input type="radio" name="mood4" value="1" onclick="answerQuestion(this.value)"> Đôi khi cảm thấy mất kiểm soát, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood4" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên cảm thấy mất khả năng kiểm soát.<br>
                        <input type="radio" name="mood4" value="3" onclick="answerQuestion(this.value)"> Hoàn toàn mất khả năng kiểm soát và không thể dự đoán tương lai.<br>
                    </div>

                    <div class="question question5" style="display: none;">
                        <label>5. Bạn có thường xuyên cảm thấy không đủ tự tin để thực hiện công việc hoặc đối mặt với thách thức không?</label> <br>
                        <input type="radio" name="mood5" value="0" onclick="answerQuestion(this.value)"> Tôi luôn tự tin và sẵn sàng đối mặt với mọi thách thức.<br>
                        <input type="radio" name="mood5" value="1" onclick="answerQuestion(this.value)"> Đôi khi cảm thấy thiếu tự tin, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood5" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên cảm thấy không đủ tự tin.<br>
                        <input type="radio" name="mood5" value="3" onclick="answerQuestion(this.value)"> Hoàn toàn thiếu tự tin và không muốn đối mặt với thách thức nào.<br>
                    </div>
                    <div class="question question6" style="display: none;">
                        <label>6. Bạn có thường xuyên cảm thấy mất hứng thú trong các mối quan hệ xã hội không? </label> <br>
                        <input type="radio" name="mood6" value="0" onclick="answerQuestion(this.value)"> Mối quan hệ xã hội của tôi thường xuyên mang lại niềm vui.<br>
                        <input type="radio" name="mood6" value="1" onclick="answerQuestion(this.value)"> Có đôi khi, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood6" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên cảm thấy mất hứng thú trong mối quan hệ.<br>
                        <input type="radio" name="mood6" value="3" onclick="answerQuestion(this.value)"> Hoàn toàn mất hứng thú và không muốn tham gia vào các mối quan hệ.<br>
                    </div>

                    <div class="question question7" style="display: none;">
                        <label>7. Bạn có thường xuyên tự trách mình về những điều không thành công trong cuộc sống không?</label> <br>
                        <input type="radio" name="mood7" value="0" onclick="answerQuestion(this.value)"> Tôi không thường tự trách mình và chấp nhận thất bại.<br>
                        <input type="radio" name="mood7" value="1" onclick="answerQuestion(this.value)"> Đôi khi tự trách mình, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood7" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên tự trách mình về mọi thất bại.<br>
                        <input type="radio" name="mood7" value="3" onclick="answerQuestion(this.value)"> Luôn luôn tự trách mình và không thể chấp nhận sự thất bại.<br>
                    </div>

                    <div class="question question8" style="display: none;">
                        <label>8. Bạn có thường xuyên cảm thấy không thoải mái với bản thân và hình thể không?</label> <br>
                        <input type="radio" name="mood8" value="0" onclick="answerQuestion(this.value)"> Tôi cảm thấy thoải mái với bản thân và hình thể của mình.<br>
                        <input type="radio" name="mood8" value="1" onclick="answerQuestion(this.value)"> Đôi khi cảm thấy không thoải mái, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood8" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên cảm thấy không thoải mái với bản thân và hình thể.<br>
                        <input type="radio" name="mood8" value="3" onclick="answerQuestion(this.value)"> Luôn luôn cảm thấy không thoải mái và không hài lòng với bản thân.<br>
                    </div>

                    <div class="question question9" style="display: none;">
                        <label>9. Bạn có cảm thấy cô đơn và cách biệt với mọi người không?Bạn có thường xuyên cảm thấy không đủ yêu thương và chăm sóc từ người khác không?</label> <br>
                        <input type="radio" name="mood9" value="0" onclick="answerQuestion(this.value)"> Tôi thường nhận được đủ yêu thương và chăm sóc từ người xung quanh.<br>
                        <input type="radio" name="mood9" value="1" onclick="answerQuestion(this.value)"> Đôi khi cảm thấy thiếu yêu thương, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood9" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên cảm thấy không đủ yêu thương và chăm sóc.<br>
                        <input type="radio" name="mood9" value="3" onclick="answerQuestion(this.value)"> Luôn luôn cảm thấy thiếu yêu thương và chăm sóc từ người khác.<br>
                    </div>

                    <div class="question question10" style="display: none;">
                        <label>10. Bạn có thường xuyên cảm thấy đau đớn hoặc không thoải mái về mặt vật lý không?</label> <br>
                        <input type="radio" name="mood10" value="0" onclick="answerQuestion(this.value)"> Tôi không thường xuyên cảm thấy đau đớn hoặc không thoải mái về mặt vật lý.<br>
                        <input type="radio" name="mood10" value="1" onclick="answerQuestion(this.value)"> Đôi khi cảm thấy đau đớn, nhưng chưa là vấn đề lớn.<br>
                        <input type="radio" name="mood10" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên cảm thấy đau đớn hoặc không thoải mái.<br>
                        <input type="radio" name="mood10" value="3" onclick="answerQuestion(this.value)"> Luôn luôn cảm thấy đau đớn và không thoải mái về mặt vật lý.<br>
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
        </script>
<?php
    }
} else {
    // Nếu người dùng chưa đăng nhập, có thể thêm xử lý tương ứng ở đây
    echo "Xin chào khách!";
}
?>