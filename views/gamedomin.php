<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trò chơi Dò Mìn</title>
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

        #minesweeper {
            display: grid;
            grid-template-columns: repeat(10, 30px);
            gap: 2px;
        }

        .cell {
            width: 30px;
            height: 30px;
            background-color: #ddd;
            border: 1px solid #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            cursor: pointer;
            user-select: none;
        }

        .mine {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>
    <div id="minesweeper"></div>

    <script>
        const minesweeper = document.getElementById('minesweeper');
        const gridSize = 10;
        const mineCount = 20;
        const minePositions = generateMinePositions();
        let revealedCells = 0;

        function generateMinePositions() {
            const positions = [];

            while (positions.length < mineCount) {
                const position = Math.floor(Math.random() * gridSize * gridSize);

                if (!positions.includes(position)) {
                    positions.push(position);
                }
            }

            return positions;
        }

        function createMinesweeper() {
            for (let i = 0; i < gridSize * gridSize; i++) {
                const cell = document.createElement('div');
                cell.classList.add('cell');
                cell.dataset.index = i;

                cell.addEventListener('click', () => revealCell(cell));

                if (minePositions.includes(i)) {
                    cell.classList.add('mine');
                }

                minesweeper.appendChild(cell);
            }
        }

        function revealCell(cell) {
            const index = parseInt(cell.dataset.index);

            if (minePositions.includes(index)) {
                gameOver();
            } else {
                revealEmptyCells(index);
                revealedCells++;

                if (revealedCells === gridSize * gridSize - mineCount) {
                    gameWon();
                }
            }
        }

        function revealEmptyCells(index) {
            const cell = minesweeper.querySelector(`[data-index="${index}"]`);

            if (!cell || cell.classList.contains('mine') || cell.classList.contains('revealed')) {
                return;
            }

            cell.classList.add('revealed');
            const mineCount = countAdjacentMines(index);

            if (mineCount > 0) {
                cell.textContent = mineCount;
            } else {
                const neighbors = getNeighbors(index);

                for (const neighbor of neighbors) {
                    revealEmptyCells(neighbor);
                }
            }
        }

        function countAdjacentMines(index) {
            const neighbors = getNeighbors(index);
            let mineCount = 0;

            for (const neighbor of neighbors) {
                if (minePositions.includes(neighbor)) {
                    mineCount++;
                }
            }

            return mineCount;
        }

        function getNeighbors(index) {
            const neighbors = [];
            const row = Math.floor(index / gridSize);
            const col = index % gridSize;

            for (let i = row - 1; i <= row + 1; i++) {
                for (let j = col - 1; j <= col + 1; j++) {
                    if (i >= 0 && i < gridSize && j >= 0 && j < gridSize) {
                        neighbors.push(i * gridSize + j);
                    }
                }
            }

            return neighbors;
        }

        function gameOver() {
            alert('Game Over! Bạn đã trúng mìn.');
            location.reload();
        }

        function gameWon() {
            alert('Chúc mừng! Bạn đã chiến thắng.');
            location.reload();
        }

        createMinesweeper();
    </script>
</body>
</html>
