<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Memory Game</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        #game-board {
            display: grid;
            grid-template-columns: repeat(6, 80px);
            grid-gap: 10px;
        }

        .card {
            width: 80px;
            height: 80px;
            background-color: #3498db;
            color: #fff;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            user-select: none;
        }

        .card.flipped {
            background-color: #2ecc71;
        }

        .card.matched {
            background-color: #e74c3c;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div id="game-board"></div>

    <script>
        const cards = ['A', 'A', 'B', 'B', 'C', 'C', 'D', 'D', 'E', 'E', 'F', 'F', 'G', 'G', 'H', 'H', 'I', 'I', 'J', 'J', 'K', 'K', 'L', 'L'];
        let flippedCards = [];
        let matchedCards = [];

        function shuffle(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }

        function createCard(letter, index) {
            const card = document.createElement('div');
            card.classList.add('card');
            card.dataset.index = index;
            card.textContent = letter;

            card.addEventListener('click', () => {
                if (flippedCards.length < 2 && !card.classList.contains('flipped') && !card.classList.contains('matched')) {
                    card.classList.add('flipped');
                    flippedCards.push(card);

                    if (flippedCards.length === 2) {
                        setTimeout(checkMatch, 500);
                    }
                }
            });

            return card;
        }

        function checkMatch() {
            const [card1, card2] = flippedCards;
            
            if (card1.textContent === card2.textContent) {
                card1.classList.add('matched');
                card2.classList.add('matched');
                matchedCards.push(card1, card2);

                if (matchedCards.length === cards.length) {
                    alert('Congratulations! You won!');
                    resetGame();
                }
            } else {
                card1.classList.remove('flipped');
                card2.classList.remove('flipped');
            }

            flippedCards = [];
        }

        function resetGame() {
            matchedCards.forEach(card => card.classList.remove('matched'));
            matchedCards = [];

            cards.forEach((letter, index) => {
                const card = document.querySelector(`.card[data-index="${index}"]`);
                card.classList.remove('flipped');
            });

            shuffle(cards);
        }

        function initializeGame() {
            shuffle(cards);

            const gameBoard = document.getElementById('game-board');
            cards.forEach((letter, index) => {
                const card = createCard(letter, index);
                gameBoard.appendChild(card);
            });
        }

        initializeGame();
    </script>
</body>
</html>
