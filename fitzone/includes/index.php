<?php
// Start session (for login functionality we'll add later)
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone Fitness Center - Your Path to Wellness</title>
    
</head>
<style>
/* Background image for the entire body (homepage) */
body {
    background: url('images/jim1.jpg') no-repeat center center fixed;
    background-size: cover;
    color: ;
    font-family: Arial, sans-serif;
    margin: 0;
}

/* Alternatively, background image for a specific section (e.g., a hero section) */
.hero-section {
    background: url('images/jim1.jpg') no-repeat center center;
    background-size: cover;
    height: 100vh; /* Full viewport height */
    color: ;
    text-align: center;
    padding: 60px 0;
}

/* You can also add a dark overlay to the section to enhance readability */
.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(20, 18, 18, 0.5); /* Dark overlay */
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;
    color: white;
}

/* Global Styles */
:root {
    --primary-color: #ff6b6b;
    --secondary-color: #4ecdc4;
    --dark-color: #292f36;
    --light-color: #f7fff7;
    --accent-color: #ff9f1c;
    --gray-color: #6c757d;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}



body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: red;
    background-color:rgb(23, 22, 22);
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

.btn {
    display: inline-block;
    background: var(--primary-color);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn:hover {
    background: #ff5252;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
}

.btn-outline {
    background: transparent;
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
}

.btn-outline:hover {
    background: var(--primary-color);
    color: white;
}

.section-title {
    text-align: center;
    margin-bottom: 50px;
    font-size: 2.5rem;
    color: var(--light-color);
    position: relative;
}

.section-title::after {
    content: '';
    display: block;
    width: 80px;
    height: 4px;
    background: var(--primary-color);
    margin: 15px auto;
}

/* Header Styles */
.header {
    background-color: black;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
    padding: 15px 0;
}

.header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo h1 {
    font-size: 2rem;
    color: var(--light-color);
    margin-bottom: 0;
}

.logo h1 .highlight {
    color: var(--primary-color);
}

.logo p {
    font-size: 0.8rem;
    color: var(--gray-color);
    margin-top: -5px;
}

.navbar ul {
    display: flex;
    list-style: none;
}

.navbar ul li {
    margin-left: 20px;
}

.navbar ul li a {
    text-decoration: none;
    color: var(--light-color);
    font-weight: 600;
    transition: color 0.3s ease;
    padding: 5px 0;
    position: relative;
}

.navbar ul li a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    background: var(--primary-color);
    bottom: 0;
    left: 0;
    transition: width 0.3s ease;
}

.navbar ul li a:hover::after {
    width: 100%;
}

.navbar ul li.active a {
    color: var(--primary-color);
}

.navbar ul li.active a::after {
    width: 100%;
}

.mobile-menu {
    display: none;
    font-size: 1.5rem;
    cursor: pointer;
}

/* Hero Section */
.hero {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../images/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    color: white;
    text-align: center;
    padding: 180px 0 100px;
    margin-top: 70px;
}

.hero h2 {
    font-size: 3rem;
    margin-bottom: 20px;
}

.hero h2 span {
    color: var(--primary-color);
}

.hero p {
    font-size: 1.2rem;
    margin-bottom: 30px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

/* Services Section */
.services {
     background: url('images/gym1') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
    font-family: Arial, sans-serif;
    margin: 0;
}
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5); /* Darken */
    z-index: 0;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.service-card {
    background: black;
    border-radius: 10px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.service-card:hover {
    transform: translateY(-10px);
}

.service-card i {
    font-size: 3rem;
    color: red;
    margin-bottom: 20px;
}

.service-card h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
}

/* Memberships Section */
.memberships {
    background: url('images/gym1') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
    font-family: Arial, sans-serif;
    margin: 0;
}

.membership-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.membership-card {
    background: black;
    border-radius: 10px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    position: relative;
    transition: transform 0.3s ease;
}

.membership-card:hover {
    transform: translateY(-10px);
}

.membership-card.featured {
    border: 2px solid var(--primary-color);
}

.popular-tag {
    position: absolute;
    top: -15px;
    right: 20px;
    background: var(--primary-color);
    color: black;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: bold;
}

.membership-card h3 {
    font-size: 1.8rem;
    margin-bottom: 20px;
}

.membership-card .price {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 20px;
}

.membership-card .price span {
    font-size: 1rem;
    color: var(--white-color);
}

.membership-card ul {
    list-style: none;
    margin-bottom: 30px;
}

.membership-card ul li {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

/* Call to Action */
.cta {
    background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
    color: white;
    text-align: center;
    padding: 80px 0;
}

.cta h2 {
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.cta p {
    font-size: 1.2rem;
    margin-bottom: 30px;
}

.cta-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.cta .btn-outline {
    border-color: white;
    color: white;
}

.cta .btn-outline:hover {
    background: white;
    color: var(--primary-color);
}

/* Footer */
.footer {
    background: var(--dark-color);
    color: white;
    padding: 60px 0 20px;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.footer-col h3 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: var(--primary-color);
}

.footer-col p {
    margin-bottom: 20px;
}

.footer-col ul {
    list-style: none;
}

.footer-col ul li {
    margin-bottom: 10px;
}

.footer-col ul li a {
    color: #ddd;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-col ul li a:hover {
    color: var(--primary-color);
}

.contact-info li {
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}

.contact-info i {
    margin-right: 10px;
    color: var(--primary-color);
    width: 20px;
    text-align: center;
}

.social-links {
    display: flex;
    gap: 15px;
    margin-top: 20px;
}

.social-links a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    color: white;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background: var(--primary-color);
    transform: translateY(-3px);
}

.copyright {
    text-align: center;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    font-size: 0.9rem;
    color: #aaa;
}

/* Responsive Design */
@media (max-width: 992px) {
    .navbar {
        display: none;
    }
    
    .mobile-menu {
        display: block;
    }
    
    .hero h2 {
        font-size: 2.5rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .hero {
        padding: 150px 0 80px;
    }
    
    .hero h2 {
        font-size: 2rem;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .cta .btn {
        width: 80%;
        margin-bottom: 10px;
    }
}

@media (max-width: 576px) {
    .logo h1 {
        font-size: 1.5rem;
    }
    
    .hero {
        padding: 120px 0 60px;
    }
    
    .hero h2 {
        font-size: 1.8rem;
    }
    
    .hero p {
        font-size: 1rem;
    }
}</style>
<body>
    <!-- Navigation Bar -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <h1><span class="highlight">Fit</span>Zone</h1>
                <p>Fitness Center</p>
            </div>
            <nav class="navbar">
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="about_us.php">About Us</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#memberships">Memberships</a></li>
                    <li><a href="register.php">Registration & Login</a></li>
                    <li><a href="admin_login.php">Admin</a></li>
                    <li><a href="staff_login.php">Staff</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                </ul>
            </nav>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h2>Transform Your Body, <span>Elevate Your Life</span></h2>
            <p>Join FitZone today and start your journey to a healthier, stronger you!</p>
            <a href="register.php" class="btn">Join Now</a>
        </div>
    </section>

    <!-- Services Section -->
   

    <section class="services" id="services">
    

        <div class="container">

            <h2 class="section-title">Our Services</h2>

            <div class="services-grid">

                <div class="service-card">

                    <i class="fas fa-dumbbell"></i>

                    <h3>Personal Training</h3>
                    <p>Customized workout plans with certified personal trainers.</p>
                    <a href="register.php" class="btn btn-outline">Learn More</a>
                </div>
                <div class="service-card">
                    <i class="fas fa-users"></i>
                    <h3>Group Classes</h3>
                    <p>Fun, energetic group workouts for all fitness levels.</p>
                    <a href="register.php" class="btn btn-outline">Learn More</a>
                
            </div>
        </div>
        </div>
    </section>

    <!-- Memberships Section -->
   

    <section class="memberships" id="memberships">
        <div class="container">
            <h2 class="section-title">Membership Plans</h2>
            <div class="membership-grid">
                <div class="membership-card">
                    <h3>Basic</h3>
                    <div class="price">$29<span>/month</span></div>
                    <ul>
                        <li>Access to gym facilities</li>
                        <li>Free Wi-Fi</li>
                        <li>Locker room access</li>
                        <li>Basic equipment</li>
                    </ul>
                    <a href="register.php" class="btn">Choose Plan</a>
                </div>
                <div class="membership-card featured">
                    <div class="popular-tag">Most Popular</div>
                    <h3>Premium</h3>
                    <div class="price">$49<span>/month</span></div>
                    <ul>
                        <li>All Basic benefits</li>
                        <li>Group classes included</li>
                        <li>Sauna access</li>
                        <li>1 free personal training session</li>
                    </ul>
                    <a href="register.php" class="btn">Choose Plan</a>
                </div>
                <div class="membership-card">
                    <h3>VIP</h3>
                    <div class="price">$99<span>/month</span></div>
                    <ul>
                        <li>All Premium benefits</li>
                        <li>Unlimited personal training</li>
                        <li>24/7 access</li>
                        <li>Nutrition consultation</li>
                    </ul>
                    <a href="register.php" class="btn">Choose Plan</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Start Your Fitness Journey?</h2>
            <p>Sign up today and get your first week free!</p>
            <div class="cta-buttons">
                <a href="register.php" class="btn">Join Now</a>
                <a href="contact_us.php" class="btn btn-outline">Contact Us</a>
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
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="memberships.php">Memberships</a></li>
                        <li><a href="blog.php">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Contact Us</h3>
                    <ul class="contact-info">
                        <li><i class="fas fa-map-marker-alt"></i> 12 Mavathagama RD,Kurunegala</li>
                        <li><i class="fas fa-phone"></i> +94 70-8988056</li>
                        <li><i class="fas fa-envelope"></i> admin@fitzone.com</li>
                    </ul>
                    <div class="social-links">
                        <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/en/"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; <?php echo date("Y"); ?> FitZone Fitness Center. All rights reserved.</p>
            </div>
        </div>
    </footer>

    
</body>
</html>