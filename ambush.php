<?php
// movie.php
session_start();

// Check if the movie parameter is set
if (!isset($_GET['movie'])) {
    die("Movie not found!");
}

// Get the movie name from the URL
$movie = htmlspecialchars($_GET['movie']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($movie); ?> - Leitlangpui Pictures</title>
    <style>
        body {
            background-image: url('back.jpg');
            background-size: contain; 
            background-position: center;
            background-repeat: no-repeat; 
            background-color: #1c1c1c; 
            background-blend-mode: overlay; 
            color: #ffffff; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        .container {
            text-align: center;
            width: 90%; 
            max-width: 800px;
        }

        .title {
            font-size: 40px; 
            margin-top: 0;
            color: #ffcc00; 
            font-family: 'Cinzel', serif;
        }

        .video-player {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
            width: 100%;
        }

        video {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .back-link {
            margin-top: 20px;
            color: #ffcc00;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title"><?php echo ucfirst($movie); ?></h1>
        
        <div class="video-player">
            <!-- Replace 'movie.mp4' with your video file name or path -->
            <video controls>
                <source src="path/to/<?php echo $movie; ?>.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <a href="index.html" class="back-link">Back to Homepage</a>
    </div>
</body>
</html>
