<?php
session_start(); // Start session for user authentication
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus IdeaForge</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Custom Navbar Styling */
        .navbar-custom {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            padding: 15px 0;
        }
        .nav-link {
            color: #ffffff !important;
            font-weight: 500;
            margin-right: 15px;
            transition: 0.3s ease-in-out;
        }
        .nav-link:hover {
            color: #ffffff !important;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 5px 10px;
            border-radius: 5px;
        }

        /* Hero Section with Carousel */
        .hero {
            position: relative;
            height: 80vh;
        }
        .carousel-item {
            height: 80vh;
            background-size: cover;
            background-position: center;
        }
        .carousel-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 20px;
        }
        .carousel-text {
            z-index: 1;
            max-width: 700px;
        }
        .carousel-text h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        /* Footer Styling */
        footer {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            text-align: center;
            padding: 15px 0;
        }
    </style>
</head>
<body>

<!-- Unique Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand text-white" href="index.php">Campus IdeaForge</a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="pages/projects.php">Projects</a></li>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-danger text-white px-3" href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="auth.php?type=login">Login</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-warning text-dark px-3" href="auth.php?type=signup">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section with Auto Image Carousel -->
<section class="hero">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image:url('image1.png');">
                <div class="carousel-overlay">
                    <div class="carousel-text">
                        <h1> Empowering Students & Innovators</h1>
                        <p class="lead">Collaborate with experts, build amazing projects, and shape the future. </p>
                        <a href="pages/projects.php" class="btn btn-primary btn-lg">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image:url('img2.png');">
                <div class="carousel-overlay">
                    <div class="carousel-text">
                        <h1> Innovate & Learn</h1>
                        <p class="lead">Join forces with tech enthusiasts and create impactful solutions. </p>
                        <a href="pages/projects.php" class="btn btn-success btn-lg">Explore Projects</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('img3.png');">
                <div class="carousel-overlay">
                    <div class="carousel-text">
                        <h1> Share Knowledge</h1>
                        <p class="lead">Find mentors, grow your skills, and contribute to the community. </p>
                        <a href="auth.php?type=signup" class="btn btn-warning btn-lg text-dark">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<!-- Footer -->
<footer>
    <p>© 2025 ProjectCollab. All Rights Reserved.</p>
</footer>

</body>
</html>