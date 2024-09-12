<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leitlangpui Pictures</title>
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
}

.container {
    text-align: center;
    width: 90%; 
    max-width: 1200px;
    margin-top: 20px; 
}

.title {
    font-size: 50px; 
    margin-top: 0;
    color: #ffcc00; 
    font-family: 'Cinzel', serif;
}

.search-bar {
    margin: 10px 0;
}

.search-bar input {
    width: 60%; 
    padding: 8px; 
    font-size: 16px; 
}

.search-bar button {
    padding: 8px 16px;
    font-size: 16px;
}

.user-auth {
    position: absolute;
    top: 20px;
    left: 20px; 
    font-size: 16px;
}

.movie-grid {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px; 
}

.category {
    width: 100%; 
    margin: 10px 0; 
}

.category h2 {
    font-size: 20px; 
    color: #ffcc00; 
    margin-bottom: 10px; 
}

.category a {
    color: #ffcc00;
    text-decoration: none;
    display: block;
}

.category a:hover {
    text-decoration: underline;
}

.movies-row {
    display: flex;
    flex-wrap: wrap; 
    justify-content: center; 
}

.movie-item {
    width: 30%;
    background-color: rgba(255, 255, 255, 0.1); 
    padding: 10px; 
    margin: 10px; 
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.3s, background-color 0.3s;
    color: #fff; 
    text-align: center;
}

.movie-item img {
    width: 100%; 
    height: 200px; 
    object-fit: cover; 
    border-radius: 10px;
}

.movie-item:hover {
    transform: scale(1.03); 
    background-color: rgba(255, 204, 0, 0.3); 
}

@media (max-width: 768px) {
    .movie-item {
        width: 100%; 
    }
}


    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Leitlangpui Pictures</h1>

        <div class="search-bar">
            <input type="text" id="search" placeholder="Search for a movie...">
            <button onclick="searchMovies()">Search</button>
        </div>

        <div class="user-auth">
            <a href="login.html">Login</a> | <a href="signup.php">Signup</a>
        </div>

        <div class="movie-grid">
            <div class="category">
                <a href="action.html"><h2>Action</h2></a>
                <div class="movies-row">
                    <div class="movie-item">
                        <img src="D:\website\image\action\1.jpg" alt="Movie 1">
                        Ambush
                    </div>
                    <div class="movie-item">
                        <img src="D:\website\image\action\2.jpeg" alt="Movie 2">
                        Call 112
                    </div>
                   
                </div>
            </div>

            <div class="category">
                <a href="drama.html"><h2>Drama</h2></a>
                <div class="movies-row">
                    <div class="movie-item">
                        <img src="D:\website\image\drama\1.jpeg" alt="Movie 7">
                        Thingtlang Tlangval
                    </div>
                    <div class="movie-item">
                        <img src="D:\website\image\drama\2.jpeg" alt="Movie 8">
                        Hremhmun Shortcut
                    </div>
                    
                </div>
            </div>

            <div class="category">
                <a href="comedy.html"><h2>Comedy</h2></a>
                <div class="movies-row">
                    <div class="movie-item">
                        <img src="movie13.jpg" alt="Movie 13">
                        Movie 13
                    </div>
                    <div class="movie-item">
                        <img src="movie14.jpg" alt="Movie 14">
                        Movie 14
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function searchMovies() {
            const query = document.getElementById('search').value;
            if (query) {
                alert("Searching for: " + query);
            } else {
                alert("Please enter a movie name to search.");
            }
        }
    </script>
	<?php
session_start();

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// If the user is not logged in, redirect to login/signup page when they try to access a movie
if (isset($_GET['movie'])) {
    $selected_movie = $_GET['movie'];

    // If the user is not logged in, redirect to login/signup
    if (!isLoggedIn()) {
        $_SESSION['redirect_to'] = $selected_movie;
        header('Location: login.php'); // Redirect to login page
        exit;
    }
    // If logged in, redirect to the selected movie page
    else {
        header('Location: movie.php?movie=' . $selected_movie);
        exit;
    }
}
?>
</body>
</html>
