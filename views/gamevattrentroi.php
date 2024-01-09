<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catch the Fruit</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #87CEEB;
            overflow: hidden;
        }

        canvas {
            border: 2px solid #333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <canvas id="catchTheFruitCanvas" width="800" height="600"></canvas>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const canvas = document.getElementById("catchTheFruitCanvas");
            const ctx = canvas.getContext("2d");

            const basket = {
                x: canvas.width / 2 - 50,
                y: canvas.height - 50,
                width: 100,
                height: 20,
                color: "#FFD700",
                speed: 8, // Đã chỉnh tốc độ rơi chậm hơn
            };

            const fruits = [];
            const fruitRadius = 15;
            let score = 0;

            document.addEventListener("mousemove", moveBasket);

            function moveBasket(e) {
                const canvasRect = canvas.getBoundingClientRect();
                basket.x = e.clientX - canvasRect.left - basket.width / 2;
                // Đảm bảo cái rổ không rơi ra khỏi khung canvas
                if (basket.x < 0) {
                    basket.x = 0;
                } else if (basket.x > canvas.width - basket.width) {
                    basket.x = canvas.width - basket.width;
                }
            }

            function drawBasket() {
                ctx.beginPath();
                ctx.rect(basket.x, basket.y, basket.width, basket.height);
                ctx.fillStyle = basket.color;
                ctx.fill();
                ctx.closePath();
            }

            function drawFruit(fruit) {
                ctx.beginPath();
                ctx.arc(fruit.x, fruit.y, fruitRadius, 0, Math.PI * 2);
                ctx.fillStyle = fruit.color;
                ctx.fill();
                ctx.closePath();
            }

            function spawnFruit() {
                const randomX = Math.random() * (canvas.width - 2 * fruitRadius) + fruitRadius;
                fruits.push({ x: randomX, y: 0, color: getRandomColor() });
            }

            function getRandomColor() {
                const letters = "0123456789ABCDEF";
                let color = "#";
                for (let i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            function drawScore() {
                ctx.font = "24px Arial";
                ctx.fillStyle = "#000";
                ctx.fillText("Score: " + score, 20, 30);

                if (score >= 50) {
                    ctx.font = "40px Arial";
                    ctx.fillStyle = "#00FF00";
                    ctx.fillText("You Win!", canvas.width / 2 - 120, canvas.height / 2);
                }
            }

            function gameLoop() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                for (let i = fruits.length - 1; i >= 0; i--) {
                    const fruit = fruits[i];
                    fruit.y += 2; // Đã chỉnh tốc độ rơi chậm hơn

                    if (
                        fruit.y + fruitRadius > basket.y &&
                        fruit.x + fruitRadius > basket.x &&
                        fruit.x - fruitRadius < basket.x + basket.width
                    ) {
                        score++;
                        fruits.splice(i, 1);
                    } else if (fruit.y - fruitRadius > canvas.height) {
                        // Mất trái cây, reset điểm
                        score = 0;
                        fruits.splice(i, 1);
                    } else {
                        drawFruit(fruit);
                    }
                }

                drawBasket();
                drawScore();

                if (Math.random() < 0.02) {
                    spawnFruit();
                }

                requestAnimationFrame(gameLoop);
            }

            gameLoop();
        });
    </script>
</body>

</html>
