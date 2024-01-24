<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Survey Page</title>
    <!-- <script src="../JS/testform.js"></script> -->
    <!-- <link rel="stylesheet" href="../CSS/index.css">
        <link rel="stylesheet" href="../CSS/nav.css"> -->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="../JS/jquery-3.4.1.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
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

        .hmenu {
            margin: 0px;
            padding: 0px 16px;
            border-radius: 5px;
            box-shadow: 0 0 5px #3D5DAB;
            list-style: none;
            background-color: #3D5DAB;
            height: 10%;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }

        .sub-menu {
            margin: 0px;
            padding: 0px;
            border-radius: 5px;
            box-shadow: 0 0 5px #3D5DAB;
            list-style: none;
            width: 150px;
            position: absolute;
            display: none;
        }

        .sub-menu>li>a {
            display: block;
            line-height: 30px;
            border-bottom: 1px dotted #3D5DAB;
            text-decoration: none;
            font-variant: small-caps;
            color: rgb(60, 60, 166);
            padding-left: 25px;
            background: url('b1.gif') no-repeat left center;
        }

        .sub-menu>li>a:hover {
            background: url('b2.gif') no-repeat left center;
            font-weight: bolder;
            color: red;
        }

        ul.hmenu>li>a {
            display: block;
            line-height: 40px;
            text-decoration: none;
            font-size: 20px;
            padding-left: 25px;
            color: white;
        }

        ul.hmenu>li>a:hover {
            color: rgb(60, 60, 166);
            font-weight: bolder;
        }

        ul.hmenu>li {
            float: left;
            margin: 0 5px;
            position: relative;
        }

        ul.hmenu>li:hover>.sub-menu {
            display: block;
        }

        .form-container {
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            margin-top: 60px;
            margin-left: 20px;
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
        <!-- Thêm một form để bao quanh câu hỏi và nút hoàn thành -->
        <form id="moodForm" method="post" action="xyly.php">
            <div class="question question1">
                <label>1. Bạn cảm thấy thế nào về tâm trạng buồn của mình gần đây?</label> <br>
                <input id="1.1" type="radio" name="mood1" value="0" onclick="answerQuestion(this.id, this.name)"> Không cảm thấy buồn<br>
                <input id="1.2" type="radio" name="mood1" value="1" onclick="answerQuestion(this.id, this.name)"> Có lúc cảm thấy chán hoặc buồn<br>
                <input id="1.3" type="radio" name="mood1" value="2" onclick="answerQuestion(this.id, this.name)"> Luôn cảm thấy chán hoặc buồn và khó dừng lại<br>
                <input id="1.4" type="radio" name="mood1" value="2" onclick="answerQuestion(this.id, this.name)"> Luôn cảm thấy buồn và bất hạnh đến mức hoàn toàn đau khổ<br>
                <input id="1.5" type="radio" name="mood1" value="3" onclick="answerQuestion(this.id, this.name)"> Rất buồn hoặc rất bất hạnh và khổ sở đến mức không thể chịu được<br>
            </div>

            <div class="completion" style="display: none;">
                <p>Chúc mừng! Bạn đã hoàn thành phần câu hỏi.</p>
                <p>Điểm của bạn là: <span id="userScoreDisplay"></span></p>
            </div>

            <!-- Nút "Quay lại", "Tiếp tục" và "Hoàn thành" -->
            <button id="backButton" onclick="goBackToPreviousQuestion()" style="display: none;">Quay lại</button>
            <button id="nextButton" onclick="continueToNextQuestion()">Tiếp tục</button>
            <button id="completeButton" type="submit" style="display: none;">Hoàn thành</button>
        </form>

    </div>

</body>

</html>


<script>
    let currentQuestionIndex = 1;
    const totalQuestions = 1; // Cập nhật tổng số câu hỏi

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
        form.action = 'xyly.php'; // Cập nhật với đường dẫn chính xác đến tệp PHP của bạn
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'user_score';
        input.value = score;
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }

    document.addEventListener("DOMContentLoaded", function() {
        var radioInputs = document.querySelectorAll('input[type="radio"]');

        radioInputs.forEach(function(input) {
            input.addEventListener("click", function() {
                var questionNumber = input.name.replace("mood", "");
                var answerValue = input.value;

                document.getElementById("questionNumber").value = questionNumber;
                document.getElementById("answerValue").value = answerValue;
            });
        });
    });

    function answerQuestion(selectedId, selectedName) {
        // Lấy giá trị id của câu trả lời và gửi lên server bằng AJAX
        var selectedElement = document.getElementById(selectedId);
        var selectedIdValue = selectedElement.id;

        var xhr = new XMLHttpRequest();
        var url = "xyly.php"; // Tên file xử lý PHP của bạn
        var params = "selectedId=" + selectedIdValue + "&selectedName=" + selectedName;
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Xử lý kết quả nếu cần
                console.log(xhr.responseText);
            }
        }
        xhr.send(params);
    }
</script>