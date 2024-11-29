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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];

        // Check if the user has already taken the quiz
        $query = "SELECT has_taken FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && $user['has_taken']) {
            echo "<h1>You have already taken the quiz.</h1>";
            echo '<a href="leaderboard.php">View Leaderboard</a>';
        } else {
            header("Location: quiz.php?username=" . urlencode($username));
            exit;
        }
    }
    ?>
    <form method="post">
        <h1>Welcome to the Quiz App</h1>
        <label for="username">Enter your username:</label>
        <input type="text" name="username" id="username" required>
        <button type="submit">Start Quiz</button>
    </form>
</div>
</body>
</html>
