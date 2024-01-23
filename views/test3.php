<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test form tuan 3</title>
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
    <input type="radio" name="mood5" value="3" onclick="answerQuestion(this.value)">  Hoàn toàn thiếu tự tin và không muốn đối mặt với thách thức nào.<br>
</div><div class="question question6" style="display: none;">
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

<!-- Nút "Tiếp tục" và "Hoàn thành" -->
<button id="nextButton" onclick="continueToNextQuestion()">Tiếp tục</button>
<button id="completeButton" onclick="completeSurvey()" style="display: none;">Hoàn thành</button>
</body>
</html>