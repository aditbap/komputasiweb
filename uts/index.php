<?php
// index.php
require_once 'config/db.php';
$stmt = $pdo->query("SELECT * FROM profile LIMIT 1");
$profile = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($profile['name']); ?> - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/mediaqueries.css">
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <!-- Profile Section -->
    <main class="container">
        <section id="profile" class="section-container d-flex">
            <div class="section__pic-container">
                <img src ="./assets/profile-pic.png" alt="<?php echo htmlspecialchars($profile['name']); ?>" class="profile-image img-fluid rounded-circle">
            </div>
            <div class="section__text">
                <p class="section__text__p1">Hello, I'm</p>
                <p class="section__text__p2"><?php echo htmlspecialchars($profile['name']); ?></p>
                <p><?php echo htmlspecialchars($profile['title']); ?></p>
                <div class="btn-container">
                    <a href="<?php echo htmlspecialchars($profile['cv_path']); ?>" class="btn btn-color-2">Download CV</a>
                    <a href="contact.php" class="btn btn-color-1">Contact Info</a>
                </div>
                <div id="socials-container">
                    <a href="<?php echo htmlspecialchars($profile['linkedin_link']); ?>" class="icon"><i class="bi bi-linkedin"></i></a>
                    <a href="<?php echo htmlspecialchars($profile['github_link']); ?>" class="icon"><i class="bi bi-github"></i></a>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>