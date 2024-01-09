        let currentQuestionIndex = 1;

        function answerQuestion(value) {
            // Your existing logic for handling question answers
        }

        function continueToNextQuestion() {
            // Check if it's the last question
            if (currentQuestionIndex === 3) {
                // Show the "Complete" button
                document.getElementById('completeButton').style.display = 'block';

                // Hide the "Next" button
                document.getElementById('nextButton').style.display = 'none';
            } else {
                // Your existing logic for showing/hiding questions
                document.querySelector(`.question${currentQuestionIndex}`).style.display = 'none';
                currentQuestionIndex++;
                document.querySelector(`.question${currentQuestionIndex}`).style.display = 'block';
            }
        }

        function completeSurvey() {
            // Calculate total score based on answers
            var totalScore = calculateTotalScore();

            // Display the score
            document.getElementById('userScoreDisplay').innerText = totalScore;

            // Hide the questions and show the completion message
            document.querySelector('.question').style.display = 'none';
            document.querySelector('.completion').style.display = 'block';

            // Send the total score to the server (you may want to use AJAX for this)
            sendScoreToServer(totalScore);
        }

        function calculateTotalScore() {
            // Your logic to calculate the total score based on user answers
            // For simplicity, let's assume you sum up the values of all selected radio buttons
            var totalScore = 0;

            var radioButtons = document.querySelectorAll('input[type=radio]:checked');
            radioButtons.forEach(function (radioButton) {
                totalScore += parseInt(radioButton.value);
            });

            return totalScore;
        }

        function sendScoreToServer(score) {
            // Your logic to send the score to the server (you may want to use AJAX for this)
            // For simplicity, I'm using a basic form submission
            var form = document.createElement('form');
            form.method = 'post';
            form.action = '../ADMIN/connect.php'; // Create a PHP file to handle score saving

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'user_score';
            input.value = score;

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
