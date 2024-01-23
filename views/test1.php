<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test form tuan 1</title>
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
            width: 600px; /* Đặt kích thước của form */
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
            margin-top: 20px; /* Khoảng cách giữa câu hỏi và nút tiếp tục */
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
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
    line-height: 1.5; /* Adjust this value as needed */
}

    </style>
</head>
<body>
<div class="form-container">

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
    <input type="radio" name="mood4" value="3" onclick="answerQuestion(this.value)">  Luôn luôn cảm thấy giận dữ và không hài lòng với bản thân và người khác.<br>
</div>

<div class="question question5" style="display: none;">
    <label>5.Bạn có mất khả năng cảm nhận niềm vui từ những điều mà trước đây bạn thấy vui vẻ không?</label> <br>
    <input type="radio" name="mood5" value="0" onclick="answerQuestion(this.value)"> Tôi vẫn có khả năng cảm nhận niềm vui như trước.<br>
    <input type="radio" name="mood5" value="1" onclick="answerQuestion(this.value)"> Có đôi khi, nhưng chưa là vấn đề lớn<br>
    <input type="radio" name="mood5" value="2" onclick="answerQuestion(this.value)"> Có, và thường xuyên mất khả năng cảm nhận niềm vui.<br>
    <input type="radio" name="mood5" value="3" onclick="answerQuestion(this.value)"> Hoàn toàn mất khả năng cảm nhận niềm vui.<br>
</div><div class="question question6" style="display: none;">
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
    <input type="radio" name="mood8" value="3" onclick="answerQuestion(this.value)">  Luôn luôn cảm thấy mình không hợp nhất và gây phiền hà.<br>
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

<!-- Nút "Tiếp tục" và "Hoàn thành" -->
<button id="nextButton" onclick="continueToNextQuestion()">Tiếp tục</button>
<button id="completeButton" onclick="completeSurvey()" style="display: none;">Hoàn thành</button>
</body>
</html>