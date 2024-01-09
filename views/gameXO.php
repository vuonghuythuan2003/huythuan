<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe Game</title>
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

        #tic-tac-toe {
            display: grid;
            grid-template-columns: repeat(10, 30px);
            grid-template-rows: repeat(10, 30px);
            gap: 1px;
            border: 2px solid #333;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cell {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <div id="tic-tac-toe"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ticTacToe = document.getElementById("tic-tac-toe");
            const cells = [];

            let currentPlayer = "X";
            let gameBoard = Array(100).fill("");

            function createCell(index) {
                const cell = document.createElement("div");
                cell.classList.add("cell");
                cell.setAttribute("data-index", index);
                cell.addEventListener("click", () => handleCellClick(index));
                ticTacToe.appendChild(cell);
                cells.push(cell);
            }

            for (let i = 0; i < 100; i++) {
                createCell(i);
            }

            function handleCellClick(index) {
                if (gameBoard[index] === "" && !isGameOver()) {
                    gameBoard[index] = currentPlayer;
                    cells[index].textContent = currentPlayer;
                    switchPlayer();
                    checkWinner();
                }
            }

            function switchPlayer() {
                currentPlayer = currentPlayer === "X" ? "O" : "X";
            }

            function checkWinner() {
                const winningCombinations = [];

                // Kiểm tra hàng và cột
                for (let i = 0; i < 10; i++) {
                    for (let j = 0; j < 7; j++) {
                        winningCombinations.push(Array.from({ length: 4 }, (_, k) => i * 10 + j + k));
                        winningCombinations.push(Array.from({ length: 4 }, (_, k) => i + 10 * (j + k)));
                    }
                }

                // Kiểm tra đường chéo chính và đường chéo phụ
                for (let i = 0; i < 7; i++) {
                    for (let j = 0; j < 7; j++) {
                        winningCombinations.push(Array.from({ length: 4 }, (_, k) => (i + k) * 11 + j + k));
                        winningCombinations.push(Array.from({ length: 4 }, (_, k) => (i + k) * 9 + j + 3 - k));
                    }
                }

                for (const combination of winningCombinations) {
                    if (
                        combination.every(index => gameBoard[index] !== "" && gameBoard[index] === gameBoard[combination[0]])
                    ) {
                        alert(`Player ${gameBoard[combination[0]]} wins!`);
                        resetGame();
                        return;
                    }
                }

                if (!gameBoard.includes("")) {
                    alert("It's a tie!");
                    resetGame();
                }
            }

            function resetGame() {
                gameBoard = Array(100).fill("");
                currentPlayer = "X";
                cells.forEach(cell => cell.textContent = "");
            }

            function isGameOver() {
                return gameBoard.every(cell => cell !== "");
            }
        });
    </script>
</body>

</html>
