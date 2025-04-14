<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Student Projects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f9;
            overflow-x: hidden;
            transition: margin-left 0.3s;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(45deg, #1e3c72, #2a5298) !important;
            padding: 15px;
        }
        .navbar-brand {
            font-weight: bold;
            color: #ffcc00 !important;
        }
        .navbar-nav .nav-link {
            color: white !important;
            transition: color 0.3s ease-in-out;
        }
        .navbar-nav .nav-link:hover {
            color: #ffcc00 !important;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: -250px;
            background: linear-gradient(45deg, #2a5298, #1e3c72);
            color: white;
            padding: 20px;
            transition: 0.3s;
            z-index: 1000;
        }
        .sidebar.active {
            left: 0;
        }
        .sidebar ul {
            padding: 0;
            list-style: none;
        }
        .sidebar ul li {
            margin: 20px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: 0.3s;
        }
        .sidebar ul li a:hover {
            color: #ffcc00;
        }
        .toggle-btn {
            position: fixed;
            top: 15px;
            left: 15px;
            background: #ffcc00;
            color: black;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1100;
            transition: 0.3s;
        }
        .toggle-btn:hover {
            background: #ffdb4d;
        }

        /* Main Content */
        .container-content {
            transition: margin-left 0.3s;
            padding-top: 40px;
            margin-left: 0;
        }

        /* Footer */
        .footer {
            background: linear-gradient(45deg, #1e3c72, #2a5298);
            color: white;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .footer a {
            color: #ffcc00;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- Toggle Sidebar Button -->
<div class="toggle-btn" onclick="toggleSidebar()">☰ Menu</div>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <h3> Menu</h3>
    <ul>
        <li><a href="#"> Home</a></li>
        <li><a href="#"> Explore Projects</a></li>
        <li><a href="#"> Team</a></li>
        <li><a href="#"> FAQs</a></li>
        <li><a href="#"> Contact</a></li>
    </ul>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">ProjectCollab</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                <li class="nav-item"><a class="nav-link btn btn-warning text-dark px-3" href="#">Sign Up</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container-content" id="content">
    <div class="container text-center">
        <h2 class="mb-4"> Explore Student Projects</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $projects = [
                ["title" => "AI Chatbot ", "desc" => "An AI-based chatbot for student support.", "tech" => "Python, NLP"],
                ["title" => "Smart Health Monitoring ", "desc" => "Predicting diseases based on symptoms.", "tech" => "ML, Django"],
                ["title" => "E-Learning Platform ", "desc" => "Web-based learning system.", "tech" => "React, Node.js"],
                ["title" => "Smart Attendance ", "desc" => "Facial recognition for attendance.", "tech" => "OpenCV, Python"],
                ["title" => "Online Exam Portal ", "desc" => "Conduct online exams securely.", "tech" => "PHP, MySQL"],
                ["title" => "Tourist Guide App ", "desc" => "AI-powered travel assistant.", "tech" => "Android, Firebase"],
                ["title" => "Stock Prediction ", "desc" => "Predict stocks using AI.", "tech" => "TensorFlow, Python"],
                ["title" => "E-Commerce Platform ", "desc" => "A marketplace for online sales.", "tech" => "MERN Stack"],
                ["title" => "IoT Smart Home ", "desc" => "Automated home control.", "tech" => "Arduino, IoT"],
                ["title" => "Food Delivery App ", "desc" => "Online food ordering system.", "tech" => "Flutter, Firebase"],
                ["title" => "Cybersecurity Analyzer ", "desc" => "Detect security vulnerabilities.", "tech" => "Kali Linux, Python"],
                ["title" => "Chat Application ", "desc" => "Real-time messaging app.", "tech" => "Node.js, WebSocket"],
            ];

            foreach ($projects as $project) {
                echo "
                <div class='col'>
                    <div class='card project-card shadow-sm p-3'>
                        <h5 class='fw-bold'>{$project['title']}</h5>
                        <p>{$project['desc']}</p>
                        <span class='badge bg-primary'>{$project['tech']}</span>
                        <a href='#' class='btn btn-success mt-2'> View Project</a>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <p>© 2025 ProjectCollab | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
</div>

<!-- JavaScript for Sidebar -->
<script>
    function toggleSidebar() {
        let sidebar = document.getElementById("sidebar");
        let content = document.getElementById("content");

        sidebar.classList.toggle("active");
        content.style.marginLeft = sidebar.classList.contains("active") ? "250px" : "0";
    }
</script>

</body>
</html>
 