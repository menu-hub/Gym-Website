<?php
// Start session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - FitZone Fitness Center</title>
    
</head>
<style>
/* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', sans-serif;
    line-height: 1.6;
    background-color: #f7f7f7;
    color: #333;
}

/* Container */
.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

/* Header */
.header {
    background: #222;
    color: #fff;
    padding: 20px 0;
}

.header .logo h1 {
    font-size: 32px;
    color: #00c18b;
}

.header .logo p {
    font-size: 14px;
    color: #ccc;
}

.navbar ul {
    list-style: none;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 10px;
}

.navbar ul li {
    margin: 10px 15px;
}

.navbar ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: 500;
    transition: color 0.3s;
}

.navbar ul li a:hover,
.navbar ul li.active a {
    color: #00c18b;
}

/* Section Titles */
.section-title {
    text-align: center;
    font-size: 36px;
    color: white;
    margin-bottom: 20px;
}

/* About Section */
.about {

    background: url('images/jim1.jpg') no-repeat center center fixed;
    background-size: cover;
    color: white;
    font-family: Arial, sans-serif;
    margin: 0;
}

.about h3 {
    font-size: 22px;
    margin-bottom: 15px;
    color: #00b381;
}

.about p,
.about ul {
    font-size: 16px;
    color: black;
}

/* Footer */
.footer {
    background: #111;
    color: #ccc;
    padding: 40px 0;
}

.footer-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: space-between;
    margin-bottom: 20px;
}

.footer-col {
    flex: 1 1 250px;
}

.footer-col h3 {
    margin-bottom: 15px;
    color: #00c18b;
}

.footer-col ul {
    list-style: none;
}

.footer-col ul li {
    margin-bottom: 10px;
}

.footer-col ul li a {
    color: #ccc;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-col ul li a:hover {
    color: #00c18b;
}

.contact-info i {
    margin-right: 8px;
}

.social-links {
    text-align: center;
    margin-top: 20px;
}

.social-links a {
    color: #00c18b;
    margin: 0 10px;
    font-size: 20px;
    text-decoration: none;
}

.social-links a:hover {
    color: #fff;
}

footer .copyright {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: #aaa;
}
</style
<body>

<!-- Header -->
<header class="header">
    <div class="container">
        <div class="logo">
            <h1><span class="highlight">Fit</span>Zone</h1>
            <p>Fitness Center</p>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="aboutus.php">About Us</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="index.php">Services</a></li>
                <li><a href="index.php">Memberships</a></li>
                <li><a href="register.php">Registration & Login</a></li>
                <li><a href="admin_login.php">Admin</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- About Section -->
<section class="about" style="padding: 120px 0 60px;">
    <div class="container">
        <h2 class="section-title">About Us</h2>
        <p style="text-align: center; max-width: 800px; margin: 0 auto 40px;">
            Welcome to <strong>FitZone Fitness Center</strong>, your ultimate destination for fitness and wellness in Kurunegala. Since our inception, we have been committed to helping individuals of all fitness levels reach their goals through a combination of expert training, modern equipment, and personalized care.
        </p>

        <div style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;">
            <div style="flex: 1 1 300px; background: #fff; padding: 30px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); border-radius: 10px;">
                <h3>Our Mission</h3>
                <p>To empower our members by promoting a healthy lifestyle and providing a supportive environment where fitness becomes a way of life.</p>
            </div>
            <div style="flex: 1 1 300px; background: #fff; padding: 30px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); border-radius: 10px;">
                <h3>What We Offer</h3>
                <ul style="padding-left: 20px;">
                    <li>State-of-the-art gym equipment</li>
                    <li>Certified personal trainers</li>
                    <li>Group fitness classes</li>
                    <li>Flexible membership plans</li>
                    <li>Health and nutrition guidance</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <h3>FitZone</h3>
                <p>Your premier fitness destination offering top-notch equipment, expert trainers, and a supportive community.</p>
            </div>
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="index.php">Services</a></li>
                    <li><a href="memberships.php">Memberships</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Contact Info</h3>
                <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt"></i> 12 Mavathagama RD,Kurunegala</li>
                    <li><i class="fas fa-phone-alt"></i> +94 70-8988056</li>
                    <li><i class="fas fa-envelope"></i> admin@fitzone.lk</li>
                </ul>
            </div>
        </div>
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
        <div class="copyright">
            &copy; <?php echo date("Y"); ?> FitZone Fitness Center. All rights reserved.
        </div>
    </div>
</footer>

</body>
</html>
