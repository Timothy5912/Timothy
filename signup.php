<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leitlangpui Pictures - Signup</title>
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
            max-width: 500px;
        }

        .title {
            font-size: 41px; 
            margin-top: 0;
            color: #ffcc00; 
            font-family: 'Cinzel', serif;
        }

        .signup-holder {
            background-color: rgba(255, 255, 255, 0.1); 
            padding: 30px; 
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
            width: 100%;
        }

        .signup-holder input {
            width: 100%; 
            padding: 10px; 
            margin: 10px 0;
            font-size: 16px; 
            border-radius: 5px;
            border: none;
        }

        .signup-holder button {
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

        .signup-holder button:hover {
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
        <h1 class="title">Leitlangpui Pictures - Signup</h1>

        <div class="signup-holder">
            <form action="signup.php" method="POST">
                <input type="text" name="username" id="username" placeholder="I hming" required>
                <input type="phone" name="phone" id="phone" placeholder="I phone number" required>
                <input type="password" name="password" id="password" placeholder="I password tur" required>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="I password tur comfirm na" required>
                <button type="submit" name="signup">Signup</button>
            </form>
        </div>

        <div class="user-auth">
            <a href="login.php">Login</a> | <a href="forgotpassword.php">Forgot Password?</a>
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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into the database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['user_id'] = $conn->insert_id;  // Store user ID in session

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
            echo "Error: " . $conn->error;
        }
    }
}
?>
</body>
</html>
