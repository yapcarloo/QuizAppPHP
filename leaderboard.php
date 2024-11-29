<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <?php
    include 'db.php';

    $query = "SELECT username, score, time_taken FROM users ORDER BY score DESC, time_taken ASC LIMIT 10";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $leaderboard = $result->fetch_all(MYSQLI_ASSOC);
    ?>

    <h1>Leaderboard</h1>
    <table border="1">
        <tr>
            <th>Rank</th>
            <th>Username</th>
            <th>Score</th>
            <th>Time Taken</th>
        </tr>
        <?php foreach ($leaderboard as $index => $entry): ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo htmlspecialchars($entry['username']); ?></td>
                <td><?php echo $entry['score']; ?></td>
                <td><?php echo $entry['time_taken']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php">Back to Home</a>
</div>
</body>
</html>
