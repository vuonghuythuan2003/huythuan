<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rắn săn mồi</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/nav.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="../JS/jquery-3.4.1.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        canvas {
            display: block;
            margin: auto;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
<ul class="hmenu">
        <li><a href="#">Trang chủ</a></li>
        <li><a href="#">Tổng quan</a>
            <ul class="sub-menu">
                <li><a href="#">Nguyên nhân</a></li>
                <li><a href="#">Đặc điểm</a></li>
                <li><a href="#">Triệu chứng</a></li>
                <li><a href="#">Đối tượng</a></li>
            </ul>
        </li>
        <li><a href="lienhe.php">Liên hệ</a></li>

        <li><a href="#">Giải pháp</a>
        <ul class="sub-menu">
                <li><a href="baiviet.php">Bài viết</a></li>
                <li><a href="video.php">Video</a></li>
                <li><a href="game.php">Game</a></li>
            </ul>
        </li>
        <li><a href="#">Bài Test</a></li>

        <li style="float: right; margin-right: 0px;">
        <button id="submit" style="padding: 10px 20px; color: white; background-color: orange; border: solid white;">
            <a href="#" style="text-decoration: none; color: #ffffff;">Đăng xuất</a>
        </button>
    </li> 
</ul>
<center>
    <h1>Rắn săn mồi</h1>
    <a>Di chuyển bằng nút Lên Xuống Trái Phải</a>
    <canvas id="snakeCanvas"></canvas>

    <script>
        const canvas = document.getElementById("snakeCanvas");
        const ctx = canvas.getContext("2d");

        const gridSize = 20;
        const snake = [{ x: 10, y: 10 }];
        const food = { x: 0, y: 0 };

        let direction = "right";
        let initialSpeed = 200;
        let speed = initialSpeed;
        let increasingSpeed = 0.9; // Speed multiplier

        function drawSnake() {
            ctx.fillStyle = "#3498db";
            snake.forEach(segment => {
                ctx.fillRect(segment.x * gridSize, segment.y * gridSize, gridSize, gridSize);
            });
        }

        function drawFood() {
            ctx.fillStyle = "#e74c3c";
            ctx.fillRect(food.x * gridSize, food.y * gridSize, gridSize, gridSize);
        }

        function update() {
            const head = { ...snake[0] };

            switch (direction) {
                case "up":
                    head.y--;
                    break;
                case "down":
                    head.y++;
                    break;
                case "left":
                    head.x--;
                    break;
                case "right":
                    head.x++;
                    break;
            }

            snake.unshift(head);

            // Check if snake eats food
            if (head.x === food.x && head.y === food.y) {
                generateFood();
                speed *= increasingSpeed;
            } else {
                snake.pop();
            }

            // Check if snake hits the wall or itself
            if (
                head.x < 0 ||
                head.y < 0 ||
                head.x >= canvas.width / gridSize ||
                head.y >= canvas.height / gridSize ||
                isSnakeColliding()
            ) {
                alert("Game Over!");
                resetGame();
            }

            drawSnake();
            drawFood();
        }

        function isSnakeColliding() {
            const head = snake[0];
            return snake.slice(1).some(segment => segment.x === head.x && segment.y === head.y);
        }

        function generateFood() {
            food.x = Math.floor(Math.random() * (canvas.width / gridSize));
            food.y = Math.floor(Math.random() * (canvas.height / gridSize));
        }

        function resetGame() {
            snake.length = 1;
            snake[0] = { x: 10, y: 10 };
            direction = "right";
            speed = initialSpeed;
            generateFood();
        }

        function resizeCanvas() {
            const minSize = Math.min(window.innerWidth, window.innerHeight);
            canvas.width = minSize - (minSize % gridSize);
            canvas.height = 400; // Giữ chiều cao cố định là 400px
        }

        document.addEventListener("keydown", event => {
            switch (event.key) {
                case "ArrowUp":
                    direction = "up";
                    break;
                case "ArrowDown":
                    direction = "down";
                    break;
                case "ArrowLeft":
                    direction = "left";
                    break;
                case "ArrowRight":
                    direction = "right";
                    break;
            }
        });

        window.addEventListener("resize", resizeCanvas);

        function gameLoop() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            update();
            setTimeout(gameLoop, speed);
        }

        generateFood();
        resizeCanvas();
        gameLoop();
    </script>

</body>
</html>
