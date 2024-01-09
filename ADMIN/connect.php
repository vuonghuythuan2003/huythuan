<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    sadsadsdasdsdsda
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's score from the form submission
    $userScore = $_POST["user_score"];

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
        echo '</div>';

        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
