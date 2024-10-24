<?php
require_once 'config/db.php';

// Fetch projects data
$stmt = $pdo->query("SELECT * FROM projects");
$projects = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/mediaqueries.css">
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <main class="container py-5">
        <h2 class="text-center mb-5">Projects</h2>
        <div class="row">
            <?php foreach ($projects as $project) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="project-box">
                        <img src="<?php echo htmlspecialchars($project['image_path']); ?>" alt="Project" class="project-img">
                        <h5 class="project-title text-center"><?php echo htmlspecialchars($project['title']); ?></h5>
                        <div class="btn-container text-center mt-3">
                            <a href="<?php echo htmlspecialchars($project['github_link']); ?>" class="btn btn-dark">Github</a>
                            <a href="<?php echo htmlspecialchars($project['demo_link']); ?>" class="btn btn-secondary">Live Demo</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
