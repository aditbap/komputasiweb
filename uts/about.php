<?php
require_once 'config/db.php';

// Fetch about data
$stmt = $pdo->query("SELECT * FROM about LIMIT 1");
$about = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mediaqueries.css">
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <main class="container py-5">
        <h2 class="text-center mb-5">About Me</h2>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 text-center">
                <img src="assets/about-pic.png" alt="Profile Picture" class="img-fluid rounded-circle" style="max-width: 100%;">
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="about-card h-100 text-center border-0 shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-award-fill display-6 mb-3"></i>
                                <h3 class="card-title">Experience</h3>
                                <p class="card-text"><?php echo htmlspecialchars($about['experience_years']); ?>+ years<br><?php echo htmlspecialchars($about['experience_desc']); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="about-card h-100 text-center border-0 shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-person-fill display-6 mb-3"></i>
                                <h3 class="card-title">Education</h3>
                                <p class="card-text"><?php echo htmlspecialchars($about['education_deg1']); ?><br><?php echo htmlspecialchars($about['education_deg2']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="about-description"><?php echo htmlspecialchars($about['description']); ?></p>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
