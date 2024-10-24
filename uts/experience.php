<?php
require_once 'config/db.php';

// Fetch skills data
$stmt = $pdo->query("SELECT * FROM skills");
$skills = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mediaqueries.css">
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <main class="container py-5">
        <h2 class="text-center mb-5">Explore My <strong>Experience</strong></h2>

        <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
                <div class="experience-box">
                    <h3 class="section-title text-center">Frontend Development</h3>
                    <ul class="skills-list">
                        <?php
                        foreach ($skills as $skill) {
                            if ($skill['category'] === 'Frontend Development') {
                                echo '<li class="skill-item">';
                                echo '<h5>' . htmlspecialchars($skill['skill_name']) . '</h5>';
                                echo '<p>' . htmlspecialchars($skill['level']) . '</p>';
                                echo '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="experience-box">
                    <h3 class="section-title text-center">Backend Development</h3>
                    <ul class="skills-list">
                        <?php
                        foreach ($skills as $skill) {
                            if ($skill['category'] === 'Backend Development') {
                                echo '<li class="skill-item">';
                                echo '<h5>' . htmlspecialchars($skill['skill_name']) . '</h5>';
                                echo '<p>' . htmlspecialchars($skill['level']) . '</p>';
                                echo '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
