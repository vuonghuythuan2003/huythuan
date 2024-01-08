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
        echo "Score saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
