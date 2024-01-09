<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breakout Game</title>
  
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }

        canvas {
            border: 2px solid #333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    <canvas id="breakoutCanvas" width="800" height="600"></canvas>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const canvas = document.getElementById("breakoutCanvas");
            const ctx = canvas.getContext("2d");

            const paddleHeight = 10;
            const paddleWidth = 100;
            let paddleX = (canvas.width - paddleWidth) / 2;

            const ballRadius = 10;
            let x = canvas.width / 2;
            let y = canvas.height - 30;
            let dx = 3; // Tốc độ di chuyển của bóng
            let dy = -3; // Tốc độ di chuyển của bóng

            let level = 1;
            let score = 0;
            const maxLevels = 3;

            const brickRowCount = 5; // Số hàng gạch
            const brickColumnCount = 7; // Số cột gạch
            const brickWidth = 80;
            const brickHeight = 20;
            const brickPadding = 10;
            const brickOffsetTop = 50;
            const brickOffsetLeft = (canvas.width - (brickColumnCount * (brickWidth + brickPadding))) / 2;

            let bricks = [];
            function initBricks() {
                for (let c = 0; c < brickColumnCount; c++) {
                    bricks[c] = [];
                    for (let r = 0; r < brickRowCount; r++) {
                        bricks[c][r] = { x: 0, y: 0, status: 1 };
                    }
                }
            }
            initBricks();

            let rightPressed = false;
            let leftPressed = false;

            document.addEventListener("keydown", keyDownHandler);
            document.addEventListener("keyup", keyUpHandler);

            function keyDownHandler(e) {
                if (e.key == "Right" || e.key == "ArrowRight") {
                    rightPressed = true;
                } else if (e.key == "Left" || e.key == "ArrowLeft") {
                    leftPressed = true;
                }
            }

            function keyUpHandler(e) {
                if (e.key == "Right" || e.key == "ArrowRight") {
                    rightPressed = false;
                } else if (e.key == "Left" || e.key == "ArrowLeft") {
                    leftPressed = false;
                }
            }

            function drawBall() {
                ctx.beginPath();
                ctx.arc(x, y, ballRadius, 0, Math.PI * 2);
                ctx.fillStyle = "#0095DD";
                ctx.fill();
                ctx.closePath();
            }

            function drawPaddle() {
                ctx.beginPath();
                ctx.rect(paddleX, canvas.height - paddleHeight, paddleWidth, paddleHeight);
                ctx.fillStyle = "#0095DD";
                ctx.fill();
                ctx.closePath();
            }

            function drawBricks() {
                for (let c = 0; c < brickColumnCount; c++) {
                    for (let r = 0; r < brickRowCount; r++) {
                        if (bricks[c][r].status == 1) {
                            const brickX = c * (brickWidth + brickPadding) + brickOffsetLeft;
                            const brickY = r * (brickHeight + brickPadding) + brickOffsetTop;
                            bricks[c][r].x = brickX;
                            bricks[c][r].y = brickY;
                            ctx.beginPath();
                            ctx.rect(brickX, brickY, brickWidth, brickHeight);
                            ctx.fillStyle = "#0095DD";
                            ctx.fill();
                            ctx.closePath();
                        }
                    }
                }
            }

            function collisionDetection() {
                for (let c = 0; c < brickColumnCount; c++) {
                    for (let r = 0; r < brickRowCount; r++) {
                        const b = bricks[c][r];
                        if (b.status == 1) {
                            if (x > b.x && x < b.x + brickWidth && y > b.y && y < b.y + brickHeight) {
                                dy = -dy;
                                b.status = 0;
                                score++;
                                if (isLevelComplete()) {
                                    if (level < maxLevels) {
                                        level++;
                                        dx *= 1.2; // Tăng tốc độ di chuyển của bóng khi chuyển level
                                        dy *= 1.2;
                                        initBricks();
                                    } else {
                                        // Nếu đã hoàn thành 3 level, hiển thị thông báo "Bạn thắng"
                                        displayWinMessage();
                                    }
                                }
                            }
                        }
                    }
                }
            }

            function isLevelComplete() {
                for (let c = 0; c < brickColumnCount; c++) {
                    for (let r = 0; r < brickRowCount; r++) {
                        if (bricks[c][r].status == 1) {
                            return false;
                        }
                    }
                }
                return true;
            }

            function displayWinMessage() {
                ctx.font = "40px Arial";
                ctx.fillStyle = "#0095DD";
                ctx.fillText("Bạn thắng!", canvas.width / 2 - 120, canvas.height / 2);
            }

            function draw() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                drawBricks();
                drawBall();
                drawPaddle();
                collisionDetection();

                if (x + dx > canvas.width - ballRadius || x + dx < ballRadius) {
                    dx = -dx;
                }

                if (y + dy < ballRadius) {
                    dy = -dy;
                } else if (y + dy > canvas.height - ballRadius - paddleHeight) {
                    if (x > paddleX && x < paddleX + paddleWidth) {
                        dy = -dy;
                    } else {
                        // Game over if the ball hits the bottom without hitting the paddle
                        document.location.reload();
                    }
                }

                if (rightPressed && paddleX < canvas.width - paddleWidth) {
                    paddleX += 7;
                } else if (leftPressed && paddleX > 0) {
                    paddleX -= 7;
                }

                x += dx;
                y += dy;

                // Hiển thị số level và điểm
                ctx.font = "20px Arial";
                ctx.fillStyle = "#0095DD";
                ctx.fillText("Level: " + level, canvas.width - 100, 30);
                ctx.fillText("Điểm: " + score, canvas.width - 100, 60);

                if (level <= maxLevels) {
                    requestAnimationFrame(draw);
                }
            }

            draw();
        });
    </script>
</body>

</html>
