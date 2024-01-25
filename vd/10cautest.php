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
    <div class="form-container">

        <form id="moodForm" method="post" action="10cauxuly.php">
            <div class="question question1">
                <label>1. Bạn cảm thấy thế nào về tâm trạng buồn của mình gần đây?</label> <br>
                <input id="1.1" type="radio" name="mood1" value="0" onclick="answerQuestion(this.id, this.name)"> Không cảm thấy buồn<br>
                <input id="1.2" type="radio" name="mood1" value="1" onclick="answerQuestion(this.id, this.name)"> Có lúc cảm thấy chán hoặc buồn<br>
                <input id="1.3" type="radio" name="mood1" value="2" onclick="answerQuestion(this.id, this.name)"> Luôn cảm thấy chán hoặc buồn và khó dừng lại<br>
                <input id="1.4" type="radio" name="mood1" value="2" onclick="answerQuestion(this.id, this.name)"> Luôn cảm thấy buồn và bất hạnh đến mức hoàn toàn đau khổ<br>
                <input id="1.5" type="radio" name="mood1" value="3" onclick="answerQuestion(this.id, this.name)"> Rất buồn hoặc rất bất hạnh và khổ sở đến mức không thể chịu được<br>
            </div>

            <div class="question question2" style="display: none;">
                <label>2. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
                <input id="2.1" type="radio" name="mood2" value="0" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không bi quan và nản lòng về tương lai.<br>
                <input id="2.2" type="radio" name="mood2" value="1" onclick="answerQuestion(this.value)"> Tôi cảm thấy nản lòng về tương lai hơn trước đây. <br>
                <input id="2.3" type="radio" name="mood2" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình chẳng có gì mong đợi ở tương lai cả.<br>
                <input id="2.4" type="radio" name="mood2" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy sẽ không bao giờ khắc phục được những điều phiền muộn của tôi.<br>
                <input id="2.5" type="radio" name="mood2" value="3" onclick="answerQuestion(this.value)"> Tôi cảm thấy tương lai tuyệt vọng và tình hình chỉ có thể tiếp tục xấu đi hoặc không thể cải thiện được.<br>
            </div>

            <div class="question question3" style="display: none;">
                <label>3. Bạn cảm thấy thế nào về bản thân và sự thất bại?</label> <br>
                <input id="3.1" type="radio" name="mood3" value="0" onclick="answerQuestion(this.value)"> Không cảm thấy như bị thất bại<br>
                <input id="3.2" type="radio" name="mood3" value="1" onclick="answerQuestion(this.value)"> Thấy mình thất bại nhiều hơn những người khác<br>
                <input id="3.3" type="radio" name="mood3" value="2" onclick="answerQuestion(this.value)"> Cảm thấy đã hoàn thành rất ít điều đáng giá hoặc có ý nghĩa<br>
                <input id="3.4" type="radio" name="mood3" value="2" onclick="answerQuestion(this.value)"> Nhìn lại cuộc đời, thấy mình đã có quá nhiều thất bại<br><input type="radio" name="mood3" value="3" onclick="answerQuestion(this.value)"> Cảm thấy mình là một người hoàn toàn thất bại<br>
                <input id="3.5" type="radio" name="mood3" value="3" onclick="answerQuestion(this.value)"> Tự cảm thấy hoàn toàn thất bại trong vai trò của mình (bố, mẹ, chồng, vợ…)<br>
            </div>

            <div class="question question4" style="display: none;">
                <label>4. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
                <input id="4.1" type="radio" name="mood4" value="0" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không bất mãn<br>
                <input id="4.2" type="radio" name="mood4" value="0" onclick="answerQuestion(this.value)"> Tôi còn thích thú với những điều mà trước đây tôi vẫn thường ưa thích<br>
                <input id="4.3" type="radio" name="mood4" value="1" onclick="answerQuestion(this.value)"> Tôi luôn luôn cảm thấy buồn<br>
                <input id="4.4" type="radio" name="mood4" value="1" onclick="answerQuestion(this.value)"> Tôi ít thấy thích những điều mà tôi vẫn thường ưa thích trước đây<br>
                <input id="4.5" type="radio" name="mood4" value="2" onclick="answerQuestion(this.value)"> Tôi không thõa mãn về bất kỳ cái gì nữa<br>
                <input id="4.6" type="radio" name="mood4" value="2" onclick="answerQuestion(this.value)"> Tôi rất ít thích thú về những điều trước đây tôi vẫn thường ưa thích<br>
                <input id="4.7" type="radio" name="mood4" value="3" onclick="answerQuestion(this.value)"> Tôi không còn chút thích thú nào nữa<br>
                <input id="4.8" type="radio" name="mood4" value="3" onclick="answerQuestion(this.value)"> Tôi không hài lòng với mọi cái<br>
            </div>

            <div class="question question5" style="display: none;">
                <label>5. Bạn cảm thấy thế nào về tội lỗi của mình?</label> <br>
                <input id="5.1" type="radio" name="mood5" value="0" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không cảm thấy có tội lỗi gì ghê gớm cả.<br>
                <input id="5.2" type="radio" name="mood5" value="1" onclick="answerQuestion(this.value)"> Phần nhiều những việc tôi đã làm tôi đều cảm thấy có tội.<br>
                <input id="5.4" type="radio" name="mood5" value="1" onclick="answerQuestion(this.value)"> Phần lớn thời gian tôi cảm thấy mình tồi hoặc không xứng đáng.<br>
                <input id="5.5" type="radio" name="mood5" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình hoàn toàn có tội.<br>
                <input id="5.6" type="radio" name="mood5" value="2" onclick="answerQuestion(this.value)"> Giờ đây tôi luôn cảm thấy trên thực tế mình tồi hoặc không xứng đáng.<br>
                <input id="5.7" type="radio" name="mood5" value="3" onclick="answerQuestion(this.value)"> Lúc nào tôi cũng cảm thấy mình có tội.<br>
                <input id="5.8" type="radio" name="mood5" value="3" onclick="answerQuestion(this.value)"> Tôi cảm thấy như là tôi rất tồi hoặc vô dụng.<br>
            </div>

            <div class="question question6" style="display: none;">
                <label>6. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
                <input id="6.1" type="radio" name="mood6" value="0" onclick="answerQuestion(this.value)"> Tôi không cảm thấy đang bị trừng phạt.<br>
                <input id="6.2" type="radio" name="mood6" value="1" onclick="answerQuestion(this.value)"> Tôi cảm thấy có thể mình sẽ bị trừng phạt.<br>
                <input id="6.3" type="radio" name="mood6" value="1" onclick="answerQuestion(this.value)"> Tôi cảm thấy một cái gì xấu có thể đến với tôi.<br>
                <input id="6.4" type="radio" name="mood6" value="2" onclick="answerQuestion(this.value)"> Tôi mong chờ bị trừng phạt.<br>
                <input id="6.5" type="radio" name="mood6" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình sẽ bị trừng phạt.<br>
                <input id="6.6" type="radio" name="mood6" value="3" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình đang bị trừng phạt.<br>
                <input id="6.7" type="radio" name="mood6" value="3" onclick="answerQuestion(this.value)"> Tôi muốn bị trừng phạt.<br>
            </div>

            <div class="question question7" style="display: none;">
                <label>7. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
                <input id="7.1" type="radio" name="mood7" value="0" onclick="answerQuestion(this.value)"> Tôi thấy bản thân mình vẫn như trước kia hoặc tôi không cảm thấy thất vọng với bản thân.<br>
                <input id="7.2" type="radio" name="mood7" value="1" onclick="answerQuestion(this.value)"> Tôi thất vọng với bản thân, tôi không còn tin tưởng vào bản thân hoặc tôi không thích bản thân.<br>
                <input id="7.3" type="radio" name="mood7" value="2" onclick="answerQuestion(this.value)"> Tôi thất vọng với bản thân hoặc Tôi ghê tởm bản thân.<br>
                <input id="7.4" type="radio" name="mood7" value="3" onclick="answerQuestion(this.value)"> Tôi ghét bản thân mình hoặc Tôi căm thù bản thân.<br>
            </div>

            <div class="question question8" style="display: none;">
                <label>8. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
                <input id="8.1" type="radio" name="mood8" value="0" onclick="answerQuestion(this.value)"> Tôi không phê phán hoặc đổ lỗi cho bản thân hơn trước kia.<br>
                <input id="8.2" type="radio" name="mood8" value="0" onclick="answerQuestion(this.value)"> Tôi không tự cảm thấy một chút nào xấu hơn bất kể ai.<br>
                <input id="8.3" type="radio" name="mood8" value="1" onclick="answerQuestion(this.value)"> Tôi phê phán bản thân mình nhiều hơn trước kia.<br>
                <input id="8.4" type="radio" name="mood8" value="1" onclick="answerQuestion(this.value)"> Tôi tự chê mình về sự yếu đuối và lỗi lầm của bản thân.<br>
                <input id="8.5" type="radio" name="mood8" value="2" onclick="answerQuestion(this.value)"> Tôi phê phán bản thân về tất cả những lỗi lầm của mình.<br><input type="radio" name="mood8" value="2" onclick="answerQuestion(this.value)"> Tôi khiển trách mình vì những lỗi lầm của bản thân.<br>
                <input id="8.6" type="radio" name="mood8" value="3" onclick="answerQuestion(this.value)"> Tôi đổ lỗi cho bản thân về tất cả mọi điều tồi tệ xảy ra.<br>
                <input id="8.7" type="radio" name="mood8" value="3" onclick="answerQuestion(this.value)"> Tôi khiển trách mình về mọi điều xấu xảy đến.<br>
            </div>

            <div class="question question9" style="display: none;">
                <label>9. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
                <input id="9.1" type="radio" name="mood9" value="0" onclick="answerQuestion(this.value)"> Tôi không có ý nghĩ tự sát.<br>
                <input id="9.2" type="radio" name="mood9" value="0" onclick="answerQuestion(this.value)"> Tôi không có bất kỳ ý nghĩ gì làm tổn hại bản thân.<br>
                <input id="9.3" type="radio" name="mood9" value="1" onclick="answerQuestion(this.value)"> Tôi có ý nghĩ tự sát nhưng không thực hiện.<br>
                <input id="9.4" type="radio" name="mood9" value="1" onclick="answerQuestion(this.value)"> Tôi có những ý nghĩ làm tổn hại bản thân nhưng tôi thường không thực hiện chúng.<br>
                <input id="9.5" type="radio" name="mood9" value="2" onclick="answerQuestion(this.value)"> Tôi muốn tự sát.<br>
                <input id="9.6" type="radio" name="mood9" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy giá mà tôi chết thì tốt hơn.<br>
                <input id="9.7" type="radio" name="mood9" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy gia đình tôi sẽ tốt hơn nếu tôi chết.<br>
                <input id="9.8" type="radio" name="mood9" value="3" onclick="answerQuestion(this.value)"> Tôi có dự định rõ ràng để tự sát.<br>
                <input id="9.9" type="radio" name="mood9" value="3" onclick="answerQuestion(this.value)"> Nếu có cơ hội tôi sẽ tự sát.<br>
            </div>

            <div class="question question10" style="display: none;">
                <label>10. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
                <input id="10.1" type="radio" name="mood10" value="0" onclick="answerQuestion(this.value)"> Tôi không khóc nhiều hơn trước kia.<br>
                <input id="10.2" type="radio" name="mood10" value="1" onclick="answerQuestion(this.value)"> Hiện nay tôi hay khóc nhiều hơn trước.<br>
                <input id="10.3" type="radio" name="mood10" value="2" onclick="answerQuestion(this.value)"> Tôi thường khóc vì những điều nhỏ nhặt.<br>
                <input id="10.4" type="radio" name="mood10" value="2" onclick="answerQuestion(this.value)"> Hiện tại tôi luôn luôn khóc, tôi không thể dừng được.<br>
                <input id="10.5" type="radio" name="mood10" value="3" onclick="answerQuestion(this.value)"> Tôi thấy muốn khóc nhưng không thể khóc được.<br>
                <input id="10.6" type="radio" name="mood10" value="3" onclick="answerQuestion(this.value)"> Trước đây thỉnh thoảng tôi vẫn khóc, nhưng hiện tại tôi không thể khóc được chút nào mặc dù tôi muốn khóc.<br>
            </div>

            <div class="completion" style="display: none;">
                <p>Chúc mừng! Bạn đã hoàn thành phần câu hỏi.</p>
                <p>Điểm của bạn là: <span id="userScoreDisplay"></span></p>
            </div>

            <!-- Nút "Quay lại", "Tiếp tục" và "Hoàn thành" -->
            <button id="completeButton" type="submit" style="display: none;">Hoàn thành</button>
        </form>
        <button id="backButton" onclick="goBackToPreviousQuestion()" style="display: none;">Quay lại</button>
        <button id="nextButton" onclick="continueToNextQuestion()">Tiếp tục</button>

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

    function completeForm() {
        // Tạo một đối tượng chứa các câu hỏi được chọn
        var selectedQuestions = [];

        // Lặp qua các câu hỏi từ 1 đến 10
        for (var i = 1; i <= 10; i++) {
            // Lấy giá trị được chọn
            var selectedValue = document.querySelector('input[name="test' + i + '"]:checked');

            // Nếu có giá trị được chọn, thêm vào mảng
            if (selectedValue) {
                selectedQuestions.push({
                    id: 'test' + i,
                    name: selectedValue.value
                });
            }
        }

        // Gửi dữ liệu lên server bằng Ajax
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "10cauxuly.php", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Xử lý phản hồi từ server nếu cần
                console.log(xhr.responseText);
            }
        };
        xhr.send(JSON.stringify(selectedQuestions));
    }
</script>