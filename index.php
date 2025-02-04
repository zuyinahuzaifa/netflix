<?php
include 'config.php';  // Database connection
// Fetch all movies from the database
$result = $conn->query("SELECT * FROM uploads");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .movie-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .movie-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .movie-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .movie-card h2 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .movie-card p {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .movie-card .category {
            color: #3498db;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .watch-button {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .watch-button:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .movie-container {
                grid-template-columns: 1fr;
            }
            
            body {
                padding: 10px;
            }
            
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <h1>Movie List</h1>
    <div class="movie-container">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="movie-card">
                <h2><?= htmlspecialchars($row['title']) ?></h2>
                <p><?= htmlspecialchars($row['description']) ?></p>
                <p class="category">Category: <?= htmlspecialchars($row['category']) ?></p>
                <a href="watch.php?id=<?= $row['id'] ?>" class="watch-button">Watch Now</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
