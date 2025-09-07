<?php
include 'dbconnect.php'; // Database connection

// Delete trainer
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM trainers WHERE trainer_id =$id";
    mysqli_query($conn, $query);
    header("Location: meettrainer.php");
    exit();
}

// Fetch all trainers
$query = "SELECT * FROM trainers";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet Our Trainers | FitZone Fitness Center</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Global Styles */
        :root {
            --primary: #ff6b6b;
            --secondary: #4ecdc4;
            --dark: #2d3436;
            --light: #f5f5f5;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: var(--dark);
            line-height: 1.6;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Header Section */
        .page-header {
            text-align: center;
            margin: 40px 0;
        }
        
        .page-title {
            color: var(--primary);
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        .page-subtitle {
            color: #666;
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* Trainers Grid */
        .trainers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin: 50px 0;
        }
        
        .trainer-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .trainer-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .trainer-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        
        .trainer-info {
            padding: 25px;
        }
        
        .trainer-name {
            color: var(--dark);
            font-size: 1.5rem;
            margin-bottom: 5px;
        }
        
        .trainer-specialty {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
            display: block;
        }
        
        .trainer-bio {
            color: #666;
            margin-bottom: 20px;
        }
        
        .trainer-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            color: #666;
        }
        
        .trainer-experience {
            display: flex;
            align-items: center;
        }
        
        .trainer-experience i {
            margin-right: 5px;
            color: var(--primary);
        }
        
        .trainer-certifications {
            font-size: 0.9rem;
            color: #888;
            margin-bottom: 20px;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
        }
        
        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            color: white;
            background: var(--dark);
            transition: background 0.3s ease;
        }
        
        .social-link:hover {
            background: var(--primary);
        }
        
        /* Specialty Badges */
        .specialty-badge {
            display: inline-block;
            padding: 5px 10px;
            background: rgba(78, 205, 196, 0.1);
            color: var(--secondary);
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-right: 5px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .trainers-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .page-title {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            .trainers-grid {
                grid-template-columns: 1fr;
            }
            
            .trainer-image {
                height: 250px;
            }
        }
        
        /* Call to Action */
        .cta-section {
            text-align: center;
            margin: 60px 0;
            padding: 40px;
            background: linear-gradient(135deg, var(--primary), #ff8e8e);
            border-radius: 10px;
            color: white;
        }
        
        .cta-title {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        
        .cta-button {
            display: inline-block;
            padding: 15px 30px;
            background: white;
            color: var(--primary);
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            margin-top: 20px;
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Meet Our Expert Trainers</h1>
            <p class="page-subtitle">Our certified fitness professionals are dedicated to helping you achieve your health and wellness goals with personalized training programs.</p>
        </div>
        
        <div class="trainers-grid">
            <?php foreach ($trainers as $trainer): ?>
                <div class="trainer-card">
                    <img src="<?php echo !empty($trainer['image']) ? $trainer['image'] : 'images/default-trainer.jpg'; ?>" alt="<?php echo htmlspecialchars($trainer['name']); ?>" class="trainer-image">
                    
                    <div class="trainer-info">
                        <h3 class="trainer-name"><?php echo htmlspecialchars($trainer['name']); ?></h3>
                        <span class="trainer-specialty">
                            <span class="specialty-badge"><?php echo htmlspecialchars($trainer['specialty']); ?></span>
                        </span>
                        
                        <p class="trainer-bio"><?php echo htmlspecialchars(substr($trainer['bio'], 0, 120)); ?>...</p>
                        
                        <div class="trainer-meta">
                            <?php if ($trainer['years_experience']): ?>
                                <span class="trainer-experience">
                                    <i class="fas fa-award"></i> <?php echo $trainer['years_experience']; ?>+ years
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <?php if ($trainer['certifications']): ?>
                            <p class="trainer-certifications">
                                <strong>Certifications:</strong> <?php echo htmlspecialchars($trainer['certifications']); ?>
                            </p>
                        <?php endif; ?>
                        
                        <div class="social-links">
                            <?php if ($trainer['social_facebook']): ?>
                                <a href="<?php echo htmlspecialchars($trainer['social_facebook']); ?>" class="social-link" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ($trainer['social_instagram']): ?>
                                <a href="<?php echo htmlspecialchars($trainer['social_instagram']); ?>" class="social-link" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ($trainer['social_twitter']): ?>
                                <a href="<?php echo htmlspecialchars($trainer['social_twitter']); ?>" class="social-link" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="cta-section">
            <h2 class="cta-title">Ready to Start Your Fitness Journey?</h2>
            <p>Book a session with one of our expert trainers today!</p>
            <a href="contact.php" class="cta-button">Get Started Now</a>
        </div>
    </div>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>