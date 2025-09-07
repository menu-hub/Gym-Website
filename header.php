<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FitZone Blog</title>
    <link rel="stylesheet" href="styles.css"> <!-- Your CSS file -->
</head>
<style>
/* styles.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: #f2f2f2;
}

.container {
    width: 90%;
    max-width: 1100px;
    margin: auto;
    padding: 10px 0;
}

.site-header {
   background: url('../images/gym6.jpg') no-repeat center center;

    background-size: cover;
    color: white;
    padding: 60px 0;
    text-align: center;
    position: relative;
}

.site-header::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
}

.site-header h1,
.site-header nav {
    position: relative;
    z-index: 2;
}


.nav-links {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: flex-end;
    gap: 20px;
    margin-right: 20px;
}

.nav-links li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.nav-links li a.active,
.nav-links li a:hover {
    color: #00c896;
}

.site-footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 15px 0;
    margin-top: 30px;
}

.content-area {
    padding: 20px;
    min-height: 500px;
    background-color: white;
}
</style>
<body>
    <header class="site-header">
        <div class="container">
            <h1>FitZone Fitness Center</h1>
            <nav>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">Services</a></li>
                    <li><a href="index.php">Membership</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                    <li><a href="blog.php" class="active">Blog</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="content-area">
