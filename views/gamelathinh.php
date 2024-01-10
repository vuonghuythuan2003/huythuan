<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trò chơi Lật Hình</title>
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

        #game-container {
            display: grid;
            grid-template-columns: repeat(4, 100px);
            grid-gap: 5px;
        }

        .tile {
            width: 100px;
            height: 100px;
            background-color: #3498db; /* Tile color */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #fff;
            cursor: pointer;
            user-select: none;
        }
    </style>
</head>
<body>
    <div id="game-container"></div>

    <script>
        const gameContainer = document.getElementById('game-container');
        const tiles = [];
        const numbers = [...Array(8).keys()].map(i => i + 1);

        // Duplicate numbers to create pairs
        const tileNumbers = [...numbers, ...numbers];

        // Shuffle the numbers
        const shuffledNumbers = tileNumbers.sort(() => Math.random() - 0.5);

        shuffledNumbers.forEach((number, index) => {
            const tile = document.createElement('div');
            tile.classList.add('tile');
            tile.setAttribute('data-number', number);
            tile.innerText = '?';
            tile.addEventListener('click', flipTile);
            gameContainer.appendChild(tile);
            tiles.push(tile);
        });

        let flippedTiles = [];
        let locked = false;

        function flipTile() {
            if (locked) return;

            const tile = this;

            // Prevent flipping the same tile or more than 2 tiles
            if (flippedTiles.length === 2 || flippedTiles.includes(tile)) {
                return;
            }

            tile.innerText = tile.getAttribute('data-number');
            flippedTiles.push(tile);

            if (flippedTiles.length === 2) {
                locked = true;
                setTimeout(checkMatch, 500);
            }
        }

        function checkMatch() {
            const [firstTile, secondTile] = flippedTiles;

            if (firstTile.getAttribute('data-number') === secondTile.getAttribute('data-number')) {
                // Match found
                flippedTiles.forEach(tile => tile.classList.add('matched'));
            } else {
                // No match, flip back
                flippedTiles.forEach(tile => tile.innerText = '?');
            }

            flippedTiles = [];
            locked = false;

            if (isGameComplete()) {
                alert('Chúc mừng! Bạn đã hoàn thành trò chơi.');
                location.reload();
            }
        }

        function isGameComplete() {
            return tiles.every(tile => tile.classList.contains('matched'));
        }
    </script>
</body>
</html>
