<?php
// includes/nav.php
$stmt = $pdo->query("SELECT * FROM profile LIMIT 1");
$profile = $stmt->fetch();
?>
<nav id="desktop-nav">
    <div class="logo"><?php echo htmlspecialchars($profile['name']); ?></div>
    <div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="experience.php">Experience</a></li>
            <li><a href="projects.php">Projects</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>
</nav>

<nav id="hamburger-nav">
    <div class="logo"><?php echo htmlspecialchars($profile['name']); ?></div>
    <div class="hamburger-menu">
        <div class="hamburger-icon" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="menu-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php" onclick="toggleMenu()">About</a></li>
            <li><a href="experience.php" onclick="toggleMenu()">Experience</a></li>
            <li><a href="projects   .php" onclick="toggleMenu()">Projects</a></li>
            <li><a href="contact.php" onclick="toggleMenu()">Contact</a></li>
        </div>
    </div>
</nav>