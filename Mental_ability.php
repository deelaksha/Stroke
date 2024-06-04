<?php
include 'connection.php';

function getTriviaQuestions($conn) {
    $sql = "SELECT id, question, option1, option2, option3, option4, answer FROM trivia ORDER BY RAND() LIMIT 5";
    $result = $conn->query($sql);

    $trivia = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $trivia[] = $row;
        }
    }
    return $trivia;
}

function getColorQuestion($conn) {
    $sql = "SELECT image_location, option1, option2, option3, option4, answer FROM colors ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

$triviaQuestions = getTriviaQuestions($conn);
$colorQuestion = getColorQuestion($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            background-color: #f2f2f2; /* Light gray background */
        }
        .card {
            background-color: #d4edda; /* Light green */
            border: none;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .grid-container {
            padding: 20px;
        }
        h2 {
            color: #2c3e50; /* Dark blue for headings */
        }
        label {
            color: #34495e; /* Dark blue for labels */
        }
        .nav-button {
            background-color: #28a745; /* Green button */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%; /* Make button full width */
            margin-bottom: 10px;
        }
        .nav-button:hover {
            background-color: #218838; /* Darker green on hover */
        }
        .option-content {
            display: none;
        }
        .color-image {
            width: 100px;
            height: 100px;
            border: 1px solid #000;
            display: block;
            margin-bottom: 10px;
        }
        .game-image {
            width: 100%;
            max-width: 300px;
            height: auto;
            display: block;
            margin: 10px auto;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center grid-container">
        <div class="col-md-6">
            <div class="card">
                <h2>Options</h2>
                <button class="nav-button" onclick="showContent('games')">Games</button>
                <button class="nav-button" onclick="showContent('trivia')">Trivia</button>
                <button class="nav-button" onclick="showContent('memory')">Memory</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h2>Details</h2>
                <div id="games" class="option-content">
                    <h3>Games</h3>
                    <ul>
                        <li>
                            <h4>NONOGRAM</h4>
                            <p>Nonograms, also known as Griddlers or Picross, are logic puzzles where you have to color in cells on a grid to reveal a hidden picture. Each row and column has a set of numbers that indicate how many consecutive cells should be filled in.</p>
                            <a href="https://www.puzzle-nonograms.com/" target="_blank">Play NONOGRAM</a>
                            <img src="colours/nonogram.png" alt="Nonogram" class="game-image">
                        </li>
                        <li>
                            <h4>SUDOKU</h4>
                            <p>Sudoku is a popular logic-based number puzzle where the objective is to fill a 9x9 grid with digits so that each column, row, and 3x3 sub-grid contains all the digits from 1 to 9 without repeating any.</p>
                            <a href="https://sudoku.com/" target="_blank">Play SUDOKU</a>
                            <img src="colours/sudoku.png" alt="Sudoku" class="game-image">
                        </li>
                        <li>
                            <h4>CROSSWORD</h4>
                            <p>Crossword puzzles are word games where the player needs to fill in the white squares with words that fit the clues provided. Clues are divided into two categories: across (horizontal) and down (vertical).</p>
                            <a href="https://www.boatloadpuzzles.com/playcrossword" target="_blank">Play CROSSWORD</a>
                            <img src="colours/crossword.png" alt="Crossword" class="game-image">
                        </li>
                        <li>
                            <h4>CHESS</h4>
                            <p>Chess is a classic strategy board game played between two opponents who move their pieces on a checkered board according to specific rules. The objective is to checkmate the opponent's king by placing it under an inescapable threat.</p>
                            <a href="https://papergames.io/en/chess" target="_blank">Play CHESS</a>
                            <img src="colours/chess.png" alt="Chess" class="game-image">
                        </li>
                        <li>
                            <h4>SCRABBLE</h4>
                            <p>Scrabble is a word game where players score points by forming words from letter tiles on a game board. It combines elements of luck and strategy, as players need to maximize their scoring potential based on the randomly drawn tiles.</p>
                            <a href="https://playscrabble.com/" target="_blank">Play SCRABBLE</a>
                            <img src="colours/scrabble.png" alt="Scrabble" class="game-image">
                        </li>
                    </ul>
                </div>
                <div id="trivia" class="option-content">
                    <h3>Trivia</h3>
                    <div id="trivia-questions">
                        <?php foreach($triviaQuestions as $index => $question): ?>
                            <p>Question <?php echo $index + 1; ?>: <?php echo $question['question']; ?></p>
                            <ul>
                                <li><input type="radio" name="q<?php echo $index + 1; ?>" value="1"> <?php echo $question['option1']; ?></li>
                                <li><input type="radio" name="q<?php echo $index + 1; ?>" value="2"> <?php echo $question['option2']; ?></li>
                                <li><input type="radio" name="q<?php echo $index + 1; ?>" value="3"> <?php echo $question['option3']; ?></li>
                                <li><input type="radio" name="q<?php echo $index + 1; ?>" value="4"> <?php echo $question['option4']; ?></li>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                    <button class="nav-button" onclick="evaluateTrivia()">Evaluate Answers</button>
                    <button class="nav-button" onclick="newTrivia()">New Trivia Section</button>
                </div>
                <div id="memory" class="option-content">
                    <h3>Memory</h3>
                    <p>Remember this color:</p>
                    <img id="color-display" class="color-image" src="<?php echo $colorQuestion['image_location']; ?>" alt="Color to recognize">
                    <p>Choose the correct color:</p>
                    <ul>
                        <li><input type="radio" name="color" value="1"> <?php echo $colorQuestion['option1']; ?></li>
                        <li><input type="radio" name="color" value="2"> <?php echo $colorQuestion['option2']; ?></li>
                        <li><input type="radio" name="color" value="3"> <?php echo $colorQuestion['option3']; ?></li>
                        <li><input type="radio" name="color" value="4"> <?php echo $colorQuestion['option4']; ?></li>
                    </ul>
                    <button class="nav-button" onclick="evaluateColor()">Check Color</button>
                    <button class="nav-button" onclick="newColor()">New Color</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function showContent(option) {
        var contents = document.getElementsByClassName('option-content');
        for (var i = 0; i < contents.length; i++) {
            contents[i].style.display = 'none';
        }
        document.getElementById(option).style.display = 'block';
        if (option === 'trivia') {
            fetchTrivia();
        }
    }

    function evaluateTrivia() {
        var score = 0;
        var totalQuestions = 5;
        var answers = <?php echo json_encode(array_column($triviaQuestions, 'answer')); ?>;

        for (var i = 1; i <= totalQuestions; i++) {
            var radios = document.getElementsByName('q' + i);
            for (var j = 0; j < radios.length; j++) {
                if (radios[j].checked && radios[j].value == answers[i - 1]) {
                    score++;
                }
            }
        }
        alert('Your score is: ' + score + '/' + totalQuestions);
    }

    function newTrivia() {
        location.reload(); // Reload the page to get a new trivia section
    }

    function evaluateColor() {
        var correctAnswer = <?php echo $colorQuestion['answer']; ?>;
        var radios = document.getElementsByName('color');
        var selectedAnswer = "";
        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                selectedAnswer = radios[i].value;
            }
        }
        var resultText = (selectedAnswer == correctAnswer) ? "Correct!" : "Incorrect!";
        alert(resultText);
    }

    function newColor() {
        location.reload(); // Reload the page to get a new color question
    }
</script>
</body>
</html>
