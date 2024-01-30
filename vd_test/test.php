<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Survey Page</title>
    <script src="next.js"></script>
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

        <div class="question" id="question1">
            <label>1. Bạn cảm thấy thế nào về tâm trạng buồn của mình gần đây?</label> <br>
            <input type="radio" data-id="mood1_0" name="mood1" value="0" onclick="answerQuestion(this.value)"> Không cảm thấy buồn<br>
            <input type="radio" data-id="mood1_1" name="mood1" value="1" onclick="answerQuestion(this.value)"> Có lúc cảm thấy chán hoặc buồn<br>
            <input type="radio" data-id="mood1_2" name="mood1" value="2" onclick="answerQuestion(this.value)"> Luôn cảm thấy chán hoặc buồn và khó dừng lại<br>
            <input type="radio" data-id="mood1_3" name="mood1" value="3" onclick="answerQuestion(this.value)"> Luôn cảm thấy buồn và bất hạnh đến mức hoàn toàn đau khổ<br>
            <input type="radio" data-id="mood1_4" name="mood1" value="4" onclick="answerQuestion(this.value)"> Rất buồn hoặc rất bất hạnh và khổ sở đến mức không thể chịu được<br>
        </div>

        <!-- Câu hỏi 2 -->
        <div class="question" id="question2" style="display: none;">
            <label>2. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
            <input type="radio" data-id="mood2_0" name="mood2" value="0" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không bi quan và nản lòng về tương lai.<br>
            <input type="radio" data-id="mood2_1" name="mood2" value="1" onclick="answerQuestion(this.value)"> Tôi cảm thấy nản lòng về tương lai hơn trước đây.<br>
            <input type="radio" data-id="mood2_2" name="mood2" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình chẳng có gì mong đợi ở tương lai cả.<br>
            <input type="radio" data-id="mood2_3" name="mood2" value="3" onclick="answerQuestion(this.value)"> Tôi cảm thấy sẽ không bao giờ khắc phục được những điều phiền muộn của tôi.<br>
            <input type="radio" data-id="mood2_4" name="mood2" value="4" onclick="answerQuestion(this.value)"> Tôi cảm thấy tương lai tuyệt vọng và tình hình chỉ có thể tiếp tục xấu đi hoặc không thể cải thiện được.<br>
        </div>

        <!-- Câu hỏi 3 -->
        <div class="question" id="question3" style="display: none;">
            <label>3. Bạn cảm thấy thế nào về bản thân và sự thất bại?</label> <br>
            <input type="radio" data-id="mood3_0" name="mood3" value="0" onclick="answerQuestion(this.value)"> Không cảm thấy như bị thất bại<br>
            <input type="radio" data-id="mood3_1" name="mood3" value="1" onclick="answerQuestion(this.value)"> Thấy mình thất bại nhiều hơn những người khác<br>
            <input type="radio" data-id="mood3_2" name="mood3" value="2" onclick="answerQuestion(this.value)"> Cảm thấy đã hoàn thành rất ít điều đáng giá hoặc có ý nghĩa<br>
            <input type="radio" data-id="mood3_3" name="mood3" value="3" onclick="answerQuestion(this.value)"> Nhìn lại cuộc đời, thấy mình đã có quá nhiều thất bại<br>
            <input type="radio" data-id="mood3_4" name="mood3" value="4" onclick="answerQuestion(this.value)"> Cảm thấy mình là một người hoàn toàn thất bại<br>
            <input type="radio" data-id="mood3_5" name="mood3" value="5" onclick="answerQuestion(this.value)"> Tự cảm thấy hoàn toàn thất bại trong vai trò của mình (bố, mẹ, chồng, vợ…)<br>
        </div>


        <!-- Câu hỏi 4 -->
        <div class="question" id="question4" style="display: none;">
            <label>4. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
            <input type="radio" data-id="mood4_0" name="mood4" value="0" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không bất mãn<br>
            <input type="radio" data-id="mood4_1" name="mood4" value="1" onclick="answerQuestion(this.value)"> Tôi còn thích thú với những điều mà trước đây tôi vẫn thường ưa thích<br>
            <input type="radio" data-id="mood4_2" name="mood4" value="2" onclick="answerQuestion(this.value)"> Tôi luôn luôn cảm thấy buồn<br>
            <input type="radio" data-id="mood4_3" name="mood4" value="3" onclick="answerQuestion(this.value)"> Tôi ít thấy thích những điều mà tôi vẫn thường ưa thích trước đây<br>
            <input type="radio" data-id="mood4_4" name="mood4" value="4" onclick="answerQuestion(this.value)"> Tôi không thõa mãn về bất kỳ cái gì nữa<br>
            <input type="radio" data-id="mood4_5" name="mood4" value="5" onclick="answerQuestion(this.value)"> Tôi rất ít thích thú về những điều trước đây tôi vẫn thường ưa thích<br>
            <input type="radio" data-id="mood4_6" name="mood4" value="6" onclick="answerQuestion(this.value)"> Tôi không còn chút thích thú nào nữa<br>
            <input type="radio" data-id="mood4_7" name="mood4" value="7" onclick="answerQuestion(this.value)"> Tôi không hài lòng với mọi cái<br>
        </div>

        <!-- Câu hỏi 5 -->
        <div class="question" id="question5" style="display: none;">
            <label>5. Bạn cảm thấy thế nào về tội lỗi của mình?</label> <br>
            <input type="radio" data-id="mood5_0" name="mood5" value="0" onclick="answerQuestion(this.value)"> Tôi hoàn toàn không cảm thấy có tội lỗi gì ghê gớm cả.<br>
            <input type="radio" data-id="mood5_1" name="mood5" value="1" onclick="answerQuestion(this.value)"> Phần nhiều những việc tôi đã làm tôi đều cảm thấy có tội.<br>
            <input type="radio" data-id="mood5_2" name="mood5" value="2" onclick="answerQuestion(this.value)"> Phần lớn thời gian tôi cảm thấy mình tồi hoặc không xứng đáng.<br>
            <input type="radio" data-id="mood5_3" name="mood5" value="3" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình hoàn toàn có tội.<br>
            <input type="radio" data-id="mood5_4" name="mood5" value="4" onclick="answerQuestion(this.value)"> Giờ đây tôi luôn cảm thấy trên thực tế mình tồi hoặc không xứng đáng.<br>
            <input type="radio" data-id="mood5_5" name="mood5" value="5" onclick="answerQuestion(this.value)"> Lúc nào tôi cũng cảm thấy mình có tội.<br>
            <input type="radio" data-id="mood5_6" name="mood5" value="6" onclick="answerQuestion(this.value)"> Tôi cảm thấy như là tôi rất tồi hoặc vô dụng.<br>
        </div>

        <!-- Câu hỏi 6 -->
        <div class="question" id="question6" style="display: none;">
            <label>6. Hãy chọn 1 ý đúng nhất với bản thân</label> <br>
            <input type="radio" data-id="mood6_0" name="mood6" value="0" onclick="answerQuestion(this.value)"> Tôi không cảm thấy đang bị trừng phạt.<br>
            <input type="radio" data-id="mood6_1" name="mood6" value="1" onclick="answerQuestion(this.value)"> Tôi cảm thấy có thể mình sẽ bị trừng phạt.<br>
            <input type="radio" data-id="mood6_2" name="mood6" value="2" onclick="answerQuestion(this.value)"> Tôi cảm thấy một cái gì xấu có thể đến với tôi.<br>
            <input type="radio" data-id="mood6_3" name="mood6" value="3" onclick="answerQuestion(this.value)"> Tôi mong chờ bị trừng phạt.<br>
            <input type="radio" data-id="mood6_4" name="mood6" value="4" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình sẽ bị trừng phạt.<br>
            <input type="radio" data-id="mood6_5" name="mood6" value="5" onclick="answerQuestion(this.value)"> Tôi cảm thấy mình đang bị trừng phạt.<br>
            <input type="radio" data-id="mood6_6" name="mood6" value="6" onclick="answerQuestion(this.value)"> Tôi muốn bị trừng phạt.<br>
        </div>

        <!-- Câu hỏi 7 -->
        <div class="question" id="question7" style="display: none;">
            <label id="label7">7. Tôi thấy bản thân mình vẫn như trước kia hoặc tôi không cảm thấy thất vọng với bản thân.</label> <br>
            <input type="radio" data-id="mood7_0" name="mood7" value="0" onclick="answerQuestion(this.value)"> Không thay đổi<br>
            <input type="radio" data-id="mood7_1" name="mood7" value="1" onclick="answerQuestion(this.value)"> Thất vọng và không tin tưởng vào bản thân<br>
            <input type="radio" data-id="mood7_2" name="mood7" value="2" onclick="answerQuestion(this.value)"> Thất vọng và ghê tởm bản thân<br>
            <input type="radio" data-id="mood7_3" name="mood7" value="3" onclick="answerQuestion(this.value)"> Ghét và căm thù bản thân<br>
        </div>

        <!-- Câu hỏi 8 -->
        <div class="question" id="question8" style="display: none;">
            <label id="label8">8. Tôi không phê phán hoặc đổ lỗi cho bản thân hơn trước kia.</label> <br>
            <input type="radio" data-id="mood8_0" name="mood8" value="0" onclick="answerQuestion(this.value)"> Không phê phán<br>
            <input type="radio" data-id="mood8_1" name="mood8" value="1" onclick="answerQuestion(this.value)"> Phê phán nhiều hơn<br>
            <input type="radio" data-id="mood8_2" name="mood8" value="2" onclick="answerQuestion(this.value)"> Phê phán và khiển trách bản thân<br>
            <input type="radio" data-id="mood8_3" name="mood8" value="3" onclick="answerQuestion(this.value)"> Đổ lỗi cho mọi điều tồi tệ<br>
        </div>

        <!-- Câu hỏi 9 -->
        <div class="question" id="question9" style="display: none;">
            <label id="label9">9. Tôi không có ý nghĩ tự sát.</label> <br>
            <input type="radio" data-id="mood9_0" name="mood9" value="0" onclick="answerQuestion(this.value)"> Không có ý nghĩ tự sát<br>
            <input type="radio" data-id="mood9_1" name="mood9" value="1" onclick="answerQuestion(this.value)"> Có ý nghĩ nhưng không thực hiện<br>
            <input type="radio" data-id="mood9_2" name="mood9" value="2" onclick="answerQuestion(this.value)"> Muốn tự sát<br>
            <input type="radio" data-id="mood9_3" name="mood9" value="3" onclick="answerQuestion(this.value)"> Có dự định rõ ràng tự sát<br>
        </div>

        <!-- Câu hỏi 10 -->
        <div class="question question10" id="question10" style="display: none;">
            <label id="label10">10. Bạn cảm thấy thế nào về việc thể hiện cảm xúc qua việc khóc?</label> <br>
            <input type="radio" data-id="mood10_0" name="mood10" value="0" onclick="answerQuestion(this.value)"> Không thay đổi, tôi khóc ít như trước<br>
            <input type="radio" data-id="mood10_1" name="mood10" value="1" onclick="answerQuestion(this.value)"> Tăng lên, tôi khóc nhiều hơn<br>
            <input type="radio" data-id="mood10_2" name="mood10" value="2" onclick="answerQuestion(this.value)"> Luôn luôn khóc và không thể dừng lại<br>
            <input type="radio" data-id="mood10_3" name="mood10" value="3" onclick="answerQuestion(this.value)"> Muốn khóc nhưng không thể<br>
        </div>

        <div class="completion" style="display: none;">
            <p>Chúc mừng! Bạn đã hoàn thành phần câu hỏi.</p>
            <p>Điểm của bạn là: <span id="userScoreDisplay"></span></p>
        </div>

        <!-- Nút "Tiếp tục" và "Hoàn thành" -->
        <button id="nextButton" onclick="continueToNextQuestion()">Tiếp tục</button>
        <button id="completeButton" onclick="completeSurvey()" style="display: none;">Hoàn thành</button>
        <button id="backButton" onclick="goBackToPreviousQuestion()" style="display: none;">Quay lại</button>

    </div>

</body>

</html>