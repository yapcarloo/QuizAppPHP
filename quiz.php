<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <?php
    include 'db.php';

    $username = $_GET['username'] ?? '';
    if (!$username) {
        header("Location: index.php");
        exit;
    }

    // Fetch all questions
    $query = "SELECT * FROM questions";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $questions = $result->fetch_all(MYSQLI_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $score = 0;

        foreach ($questions as $question) {
            $qid = $question['id'];
            $correct = $question['correct_option'];
            $answer = $_POST['question_' . $qid] ?? 'X'; // Default to 'X' if unanswered
            if ($answer === $correct) {
                $score++;
            }
        }

        $time_taken = date('Y-m-d H:i:s');
        $insert_query = "INSERT INTO users (username, score, time_taken, has_taken) 
                         VALUES (?, ?, ?, TRUE)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("sis", $username, $score, $time_taken);
        $stmt->execute();

        header("Location: leaderboard.php");
        exit;
    }
    ?>

    <form method="post">
        <h1>Quiz</h1>
        <?php foreach ($questions as $index => $question): ?>
            <fieldset>
                <legend><?php echo ($index + 1) . ". " . htmlspecialchars($question['question']); ?></legend>
                <?php foreach (['A', 'B', 'C', 'D'] as $option): ?>
                    <label>
                        <input type="radio" name="question_<?php echo $question['id']; ?>" value="<?php echo $option; ?>">
                        <?php echo htmlspecialchars($question['option_' . strtolower($option)]); ?>
                    </label>
                <?php endforeach; ?>
            </fieldset>
        <?php endforeach; ?>
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
