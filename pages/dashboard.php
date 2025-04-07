<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>

<div class="container mt-5">
    <h2>Dashboard</h2>
    <a href="create_project.php" class="btn btn-success">Create New Project</a>
    
    <div class="mt-4">
        <h4>Available Projects</h4>
        <div class="list-group">
            <a href="project_detail.php?id=1" class="list-group-item list-group-item-action">AI Chatbot for Education</a>
            <a href="project_detail.php?id=2" class="list-group-item list-group-item-action">Machine Learning-based Health Predictor</a>
        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
