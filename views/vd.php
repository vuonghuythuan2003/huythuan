<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đánh Giá Tâm Trạng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            max-width: 500px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .question {
            display: block;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
<center>
    <h1>Đánh Giá Tâm Trạng Của Bạn</h1>
    </center>
    <form id="moodForm">
        <div class="question question1">
            <label>1. Bạn cảm thấy thế nào về tâm trạng buồn của mình gần đây?</label>
            <input type="radio" name="mood" value="0"> Không cảm thấy buồn<br>
            <input type="radio" name="mood" value="1"> Có lúc cảm thấy chán hoặc buồn<br>
            <input type="radio" name="mood" value="2"> Luôn cảm thấy chán hoặc buồn và khó dừng lại<br>
            <input type="radio" name="mood" value="2"> Luôn cảm thấy buồn và bất hạnh đến mức hoàn toàn đau khổ<br>
            <input type="radio" name="mood" value="3"> Rất buồn hoặc rất bất hạnh và khổ sở đến mức không thể chịu được<br>

        </div>

        <div class="question question2 hidden">
            <label>2. Hãy chọn 1 ý đúng nhất với bản thân</label>
            <input type="radio" name="mood2" value="0"> Tôi hoàn toàn không bi quan và nản lòng về tương lai.<br>
            <input type="radio" name="mood2" value="1"> Tôi cảm thấy nản lòng về tương lai hơn trước đây. <br>
            <input type="radio" name="mood2" value="2"> Tôi cảm thấy mình chẳng có gì mong đợi ở tương lai cả.<br>
            <input type="radio" name="mood2" value="2"> Tôi cảm thấy sẽ không bao giờ khắc phục được những điều phiền muộn của tôi.<br>
            <input type="radio" name="mood2" value="3"> Tôi cảm thấy tương lai tuyệt vọng và tình hình chỉ có thể tiếp tục xấu đi hoặc không thể cải thiện được.<br>
        </div>
        <div class="question question3 hidden">
            <label>3. Bạn cảm thấy thế nào về bản thân và sự thất bại?</label>
            <input type="radio" name="mood3" value="0"> Không cảm thấy như bị thất bại<br>
            <input type="radio" name="mood3" value="1"> Thấy mình thất bại nhiều hơn những người khác<br>
            <input type="radio" name="mood3" value="2"> Cảm thấy đã hoàn thành rất ít điều đáng giá hoặc có ý nghĩa<br>
            <input type="radio" name="mood3" value="2"> Nhìn lại cuộc đời, thấy mình đã có quá nhiều thất bại<br>
            <input type="radio" name="mood3" value="3"> Cảm thấy mình là một người hoàn toàn thất bại<br>
            <input type="radio" name="mood3" value="3"> Tự cảm thấy hoàn toàn thất bại trong vai trò của mình (bố, mẹ, chồng, vợ…)<br>
        </div>
        <div class="completion" style="display: none;">
    <p>Chúc mừng! Bạn đã hoàn thành phần câu hỏi.</p>
    <!-- Nội dung hoàn thành hoặc các hành động khác có thể được thêm vào đây -->
</div>
        <!-- <div class="question question4 hidden">
            <label>4. Hãy chọn 1 ý đúng nhất với bản thân</label>
            <input type="radio" name="mood4" value="0"> Tôi hoàn toàn không bất mãn<br>
            <input type="radio" name="mood4" value="0"> Tôi còn thích thú với những điều mà trước đây tôi vẫn thường ưa thích<br>
            <input type="radio" name="mood4" value="1"> Tôi luôn luôn cảm thấy buồn<br>
            <input type="radio" name="mood4" value="1"> Tôi ít thấy thích những điều mà tôi vẫn thường ưa thích trước đây<br>
            <input type="radio" name="mood4" value="2"> Tôi không thõa mãn về bất kỳ cái gì nữa<br>
            <input type="radio" name="mood4" value="2"> Tôi rất ít thích thú về những điều trước đây tôi vẫn thường ưa thích<br>
            <input type="radio" name="mood4" value="3"> Tôi không còn chút thích thú nào nữa<br>
            <input type="radio" name="mood4" value="3"> Tôi không hài lòng với mọi cái<br>
        </div>

        <div class="question question5 hidden">
            <label>5. Bạn cảm thấy thế nào về tội lỗi của mình?</label>
            <input type="radio" name="mood5" value="0"> Tôi hoàn toàn không cảm thấy có tội lỗi gì ghê gớm cả.<br>
            <input type="radio" name="mood5" value="1"> Phần nhiều những việc tôi đã làm tôi đều cảm thấy có tội.<br>
            <input type="radio" name="mood5" value="1"> Phần lớn thời gian tôi cảm thấy mình tồi hoặc không xứng đáng.<br>
            <input type="radio" name="mood5" value="2"> Tôi cảm thấy mình hoàn toàn có tội.<br>
            <input type="radio" name="mood5" value="2"> Giờ đây tôi luôn cảm thấy trên thực tế mình tồi hoặc không xứng đáng.<br>
            <input type="radio" name="mood5" value="3"> Lúc nào tôi cũng cảm thấy mình có tội.<br>
            <input type="radio" name="mood5" value="3"> Tôi cảm thấy như là tôi rất tồi hoặc vô dụng.<br>
        </div>

        <div class="question question6 hidden">
            <label>6. Bạn cảm thấy thế nào về việc bị trừng phạt?</label>
            <input type="radio" name="mood6" value="0"> Tôi không cảm thấy đang bị trừng phạt.<br>
            <input type="radio" name="mood6" value="1"> Tôi cảm thấy có thể mình sẽ bị trừng phạt.<br>
            <input type="radio" name="mood6" value="1"> Tôi cảm thấy một cái gì xấu có thể đến với tôi.<br>
            <input type="radio" name="mood6" value="2"> Tôi mong chờ bị trừng phạt.<br>
            <input type="radio" name="mood6" value="2"> Tôi cảm thấy mình sẽ bị trừng phạt.<br>
            <input type="radio" name="mood6" value="3"> Tôi cảm thấy mình đang bị trừng phạt.<br>
            <input type="radio" name="mood6" value="3"> Tôi muốn bị trừng phạt.<br>
        </div>

        <div class="question question7 hidden">
            <label>7. Bạn cảm thấy thế nào về việc bị trừng phạt?</label>
            <input type="radio" name="mood7" value="0"> Tôi thấy bản thân mình vẫn như trước kia hoặc tôi không cảm thấy thất vọng với bản thân.<br>
            <input type="radio" name="mood7" value="1"> Tôi thất vọng với bản thân, tôi không còn tin tưởng vào bản thân hoặc tôi không thích bản thân.<br>
            <input type="radio" name="mood7" value="2"> Tôi thất vọng với bản thân hoặc Tôi ghê tởm bản thân.<br>
            <input type="radio" name="mood7" value="3"> Tôi ghét bản thân mình hoặc Tôi căm thù bản thân.<br>
        </div>   -->
        <button type="button" id="continueButton" onclick="nextQuestion()">Tiếp tục</button>
        <button type="button" id="completeButtons" class="hidden" onclick="completeEvaluation()">Hoàn thành</button>
    </form>

    
    

</body>
</html>
