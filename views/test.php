<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Survey Page</title>
    <script>
        let currentQuestionIndex = 1;

        function answerQuestion(value) {
            // Your existing logic for handling question answers
        }

        function continueToNextQuestion() {
            // Check if it's the last question
            if (currentQuestionIndex === 3) {
                // Show the "Complete" button
                document.getElementById('completeButton').style.display = 'block';

                // Hide the "Next" button
                document.getElementById('nextButton').style.display = 'none';
            } else {
                // Your existing logic for showing/hiding questions
                document.querySelector(`.question${currentQuestionIndex}`).style.display = 'none';
                currentQuestionIndex++;
                document.querySelector(`.question${currentQuestionIndex}`).style.display = 'block';
            }
        }

        function completeSurvey() {
            // Calculate total score based on answers
            var totalScore = calculateTotalScore();

            // Display the score
            document.getElementById('userScoreDisplay').innerText = totalScore;

            // Hide the questions and show the completion message
            document.querySelector('.question').style.display = 'none';
            document.querySelector('.completion').style.display = 'block';

            // Send the total score to the server (you may want to use AJAX for this)
            sendScoreToServer(totalScore);
        }

        function calculateTotalScore() {
            // Your logic to calculate the total score based on user answers
            // For simplicity, let's assume you sum up the values of all selected radio buttons
            var totalScore = 0;

            var radioButtons = document.querySelectorAll('input[type=radio]:checked');
            radioButtons.forEach(function (radioButton) {
                totalScore += parseInt(radioButton.value);
            });

            return totalScore;
        }

        function sendScoreToServer(score) {
            // Your logic to send the score to the server (you may want to use AJAX for this)
            // For simplicity, I'm using a basic form submission
            var form = document.createElement('form');
            form.method = 'post';
            form.action = '../ADMIN/connect.php'; // Create a PHP file to handle score saving

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'user_score';
            input.value = score;

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</head>
<body>

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
    <input type="radio" name="mood3" value="2" onclick="answerQuestion(this.value)"> Nhìn lại cuộc đời, thấy mình đã có quá nhiều thất bại<br>
    <input type="radio" name="mood3" value="3" onclick="answerQuestion(this.value)"> Cảm thấy mình là một người hoàn toàn thất bại<br>
    <input type="radio" name="mood3" value="3" onclick="answerQuestion(this.value)"> Tự cảm thấy hoàn toàn thất bại trong vai trò của mình (bố, mẹ, chồng, vợ…)<br>
</div>
<div class="completion" style="display: none;">
  <p>Chúc mừng! Bạn đã hoàn thành phần câu hỏi.</p>
  <p>Điểm của bạn là: <span id="userScoreDisplay"></span></p>
</div>

<!-- Nút "Tiếp tục" và "Hoàn thành" -->
<button id="nextButton" onclick="continueToNextQuestion()">Tiếp tục</button>
<button id="completeButton" onclick="completeSurvey()" style="display: none;">Hoàn thành</button>

</body>
</html>
