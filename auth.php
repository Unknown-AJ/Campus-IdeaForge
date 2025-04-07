<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$dbname = "projectcollab";

// Connect to MySQL
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Sign Up
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Signup Successful! Please log in.');</script>";
    } else {
        echo "<script>alert('Error: Email already exists!');</script>";
    }
}

// Handle Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['name'];
            header("Location: dashboard.php"); // Redirect to Dashboard
            exit();
        } else {
            echo "<script>alert('Incorrect password!');</script>";
        }
    } else {
        echo "<script>alert('User not found!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up - ProjectCollab</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* White & Light Blue Theme */
        body {
            background: linear-gradient(to right, #E3F2FD, #BBDEFB);
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container-box {
            width: 400px;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.5s ease-in-out;
        }
        .form-toggle {
            display: none;
        }
        .form-toggle.active {
            display: block;
        }
        .toggle-btn {
            color: #1976D2;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
        }
        .toggle-btn:hover {
            color: #0D47A1;
        }
        .form-control {
            border-radius: 20px;
            padding: 12px;
            border: 1px solid #90CAF9;
        }
        .btn-primary {
            background: #1976D2;
            border: none;
            border-radius: 20px;
            padding: 12px;
        }
        .btn-primary:hover {
            background: #0D47A1;
        }
        .btn-success {
            background: #43A047;
            border: none;
            border-radius: 20px;
            padding: 12px;
        }
        .btn-success:hover {
            background: #2E7D32;
        }
    </style>
</head>
<body>

<div class="container-box">
    <!-- Login Form -->
    <div id="loginForm" class="form-toggle active">
        <h3 class="mb-4">Login</h3>
        <form method="POST">
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="mt-3">Don't have an account? <span class="toggle-btn" onclick="toggleForms()">Sign Up</span></p>
    </div>

    <!-- Signup Form -->
    <div id="signupForm" class="form-toggle">
        <h3 class="mb-4">Sign Up</h3>
        <form method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="signup" class="btn btn-success w-100">Sign Up</button>
        </form>
        <p class="mt-3">Already have an account? <span class="toggle-btn" onclick="toggleForms()">Login</span></p>
    </div>
</div>

<script>
    function toggleForms() {
        document.getElementById('loginForm').classList.toggle('active');
        document.getElementById('signupForm').classList.toggle('active');
    }
</script>

</body>
</html>
