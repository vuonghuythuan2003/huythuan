<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's score from the form submission
    $userScore = $_POST["user_score"];

    // Interpret the BDI score
    $evaluation = interpretBDIScore($userScore);

    // Connect to the database
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "nckh";

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the user's score into the database
    $sql = "INSERT INTO scores (user_score) VALUES ($userScore)";

    if ($conn->query($sql) === TRUE) {
        // Display the completion message with CSS styling
        echo '<div class="completion" style="background-color: #e6f7ff; padding: 10px; border: 1px solid #66b2ff; border-radius: 5px; margin-top: 20px;">';
        echo '<p style="font-weight: bold; color: #0077cc;">Chúc mừng! Bạn đã hoàn thành phần câu hỏi.</p>';
        echo '<p style="font-weight: bold; color: #0077cc;">Điểm của bạn là: <span id="userScoreDisplay" style="font-weight: bold; color: #0077cc;">' . $userScore . '</span></p>';
        echo '<p style="font-weight: bold; color: #0077cc;">Đánh giá mức độ theo thang điểm Beck: ' . $evaluation . '</p>';
        echo '</div>';

        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function interpretBDIScore($score) {
    if ($score < 14) {
        return "Không biểu hiện trầm cảm";
    } elseif ($score >= 14 && $score <= 19) {
        return "Trầm cảm nhẹ";
    } elseif ($score >= 20 && $score <= 29) {
        return "Trầm cảm vừa";
    } else {
        return "Trầm cảm nặng";
    }
}
?>
