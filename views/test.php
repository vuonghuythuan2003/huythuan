<!DOCTYPE html>
<html>
<head>
  <script>
    var currentQuestionIndex = 1;
    var totalQuestions = 3;
    var userScore = 0;

    function showQuestion(index) {
      var questionDiv = document.querySelector('.question' + index);
      questionDiv.style.display = 'block';
    }

    function hideQuestion(index) {
      var questionDiv = document.querySelector('.question' + index);
      questionDiv.style.display = 'none';
    }

    function nextQuestion() {
      hideQuestion(currentQuestionIndex);
      currentQuestionIndex++;

      if (currentQuestionIndex <= totalQuestions) {
        showQuestion(currentQuestionIndex);
      } else {
        showCompletion();
      }
    }

    function showCompletion() {
      hideQuestion(totalQuestions);

      var completionDiv = document.querySelector('.completion');
      completionDiv.style.display = 'block';
      completionDiv.innerHTML = '<p>Chúc mừng! Bạn đã hoàn thành phần câu hỏi.</p><p>Điểm của bạn là: ' + userScore + '</p>';

      // Ẩn nút "Tiếp tục" và hiển thị nút "Hoàn thành"
      document.getElementById('nextButton').style.display = 'none';
      document.getElementById('completeButton').style.display = 'block';
    }

    function answerQuestion(value) {
      userScore += parseInt(value);
    }

    function continueToNextQuestion() {
      if (currentQuestionIndex <= totalQuestions) {
        nextQuestion();
      }
    }
    function completeSurvey() {
      // Xử lý khi người dùng nhấn nút "Hoàn thành"
      // Chuyển hướng đến trang test.php
      window.location.href = 'test.php';
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
