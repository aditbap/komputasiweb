<?php
require_once 'config/db.php';

// Fetch contact data
$stmt = $pdo->query("SELECT * FROM contact LIMIT 1");
$contact = $stmt->fetch();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Prepare the SQL statement
    $stmt = $pdo->prepare("INSERT INTO user_contacts (name, email, gender, message) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $gender, $message]);

    // Redirect or display a success message
    header("Location: contact.php?success=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mediaqueries.css">
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <main class="container py-5">
        <h2 class="text-center mb-5">Contact Me</h2>

        <!-- Row to display Get in Touch and Map side by side -->
        <div class="form-map-container">
            <!-- Left: Get in Touch Form -->
            <div class="contact-form">
                <h3 class="text-center">Get in Touch</h3>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="name" class="form-label"><i class="bi bi-person-fill me-2"></i>Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label"><i class="bi bi-envelope-fill me-2"></i>Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><i class="bi bi-gender-ambiguous me-2"></i>Gender</label>
                        <div>
                            <input type="radio" id="male" name="gender" value="Male" required>
                            <label for="male">Male</label>
                        </div>
                        <div>
                            <input type="radio" id="female" name="gender" value="Female" required>
                            <label for="female">Female</label>
                        </div>
                        <div>
                            <input type="radio" id="other" name="gender" value="Other" required>
                            <label for="other">Other</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="form-label"><i class="bi bi-chat-text-fill me-2"></i>Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Send Message</button>
                </form>

                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success mt-3">Your message has been sent successfully!</div>
                <?php endif; ?>
            </div>

            <!-- Right: Google Maps -->
            <div class="contact-map">
                <h3 class="text-center mt-4">My Location</h3>
                <div class="map-responsive">
                    <iframe 
                        src="<?php echo htmlspecialchars($contact['location']); ?>" 
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Email and LinkedIn Contact Info -->
                <div class="contact-info mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <h5><i class="bi bi-envelope me-2"></i>Email</h5>
                                <p><a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>"><?php echo htmlspecialchars($contact['email']); ?></a></p>
                            </div>
                            <div>
                                <h5><i class="bi bi-linkedin me-2"></i>LinkedIn</h5>
                                <p><a href="<?php echo htmlspecialchars($contact['linkedin']); ?>">My LinkedIn Profile</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
