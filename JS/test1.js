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
    form.action = 'process_test1.php'; // Cập nhật với đường dẫn chính xác đến tệp PHP của bạn
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
    xhr.open("POST", "process_test1.php", true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Xử lý phản hồi từ server nếu cần
            console.log(xhr.responseText);
        }
    };
    xhr.send(JSON.stringify(selectedQuestions));
}
