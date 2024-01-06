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
            <label>2. Bạn cảm thấy thế nào về tương lai của mình?</label>
            <input type="radio" name="mood3" value="0"> Tôi hoàn toàn không bi quan và nản lòng về tương lai.<br>
            <input type="radio" name="mood3" value="1"> Tôi cảm thấy nản lòng về tương lai hơn trước đây. <br>
            <input type="radio" name="mood3" value="2"> Tôi cảm thấy mình chẳng có gì mong đợi ở tương lai cả.<br>
            <input type="radio" name="mood3" value="2"> Tôi cảm thấy sẽ không bao giờ khắc phục được những điều phiền muộn của tôi.<br>
            <input type="radio" name="mood3" value="3"> Tôi cảm thấy tương lai tuyệt vọng và tình hình chỉ có thể tiếp tục xấu đi hoặc không thể cải thiện được.<br>
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


        <button type="button" onclick="nextQuestion()">Tiếp tục</button>
    </form>

    <script>
        function nextQuestion() {
            var currentQuestion = document.querySelector('.question:not(.hidden)');
            var nextQuestion = currentQuestion.nextElementSibling;

            if (nextQuestion) {
                currentQuestion.classList.add('hidden');
                nextQuestion.classList.remove('hidden');
            } else {
                // Nếu không còn câu hỏi tiếp theo, có thể thực hiện hành động khác
                alert("Cảm ơn bạn đã hoàn thành đánh giá!");
            }
        }
    </script>

</body>
</html>
