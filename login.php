<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leitlangpui Pictures - Login</title>
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
            height: 100vh; /* Full height of the viewport */
        }

        .container {
            text-align: center;
            width: 90%; 
            max-width: 500px;
        }

        .title {
            font-size: 50px; 
            margin-top: 0;
            color: #ffcc00; 
            font-family: 'Cinzel', serif;
            white-space: nowrap;   /* Ensure the text doesn't wrap */
            overflow: hidden;      /* Hide overflowed text */
            text-overflow: ellipsis; /* Show ellipsis (...) if text is too long */
        }

        .login-holder {
            background-color: rgba(255, 255, 255, 0.1); 
            padding: 30px; 
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
            width: 100%;
        }

        .login-holder input {
            width: 100%; 
            padding: 10px; 
            margin: 10px 0;
            font-size: 16px; 
            border-radius: 5px;
            border: none;
        }

        .login-holder button {
            width: 100%; 
            padding: 10px; 
            font-size: 16px;
            background-color: #ffcc00; 
            color: #000; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-holder button:hover {
            background-color: #ffaa00;
        }

        .user-auth {
            position: absolute;
            top: 20px;
            left: 20px; 
            font-size: 16px;
        }

        .user-auth a {
            color: #ffcc00;
            text-decoration: none;
        }

        .user-auth a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Leitlangpui Pictures - Login</h1>

        <div class="login-holder">
            <!-- Login form -->
            <form action="login.php" method="POST">
                <input type="text" name="username" id="username" placeholder="Enter your username" required>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
                <button type="submit" name="login">Login</button>
            </form>
        </div>

        <div class="user-auth">
            <a href="signup.php">Signup</a> | <a href="forgotpassword.php">Forgot Password?</a>
        </div>
    </div>

    <?php
    session_start();

// Database connection
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "your_database";
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check the user's credentials
    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];  // Store user ID in session

            // Redirect to the originally requested movie or homepage
            if (isset($_SESSION['redirect_to'])) {
                $redirect_to = $_SESSION['redirect_to'];
                unset($_SESSION['redirect_to']);
                header("Location: movie.php?movie=" . $redirect_to);
            } else {
                header("Location: index.php");
            }
            exit;
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}
?>
</body>
</html>
