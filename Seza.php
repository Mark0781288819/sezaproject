<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seza Image</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #5fa8d3;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #2a3d66;
            color: white;
        }
        .logo img {
            width: 100px;
            height: auto;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
        }
        .banner {
            width: 100%;
            height: 500px; /* Ensure this section has a specific height */
            overflow: hidden;
        }
        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image covers the container */
        }
        .small-images-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .small-image {
            width: 20%; /* Decreased size to 20% */
            text-align: center;
            padding: 10px;
        }
        .small-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .customers {
            padding: 50px;
            text-align: center;
        }
        .customers img {
            width: 50%;
            height: auto;
            border-radius: 10px;
        }
        .login-signup {
            text-align: center;
            padding: 50px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .login-signup button {
            background-color: #aab5cc;
            color: white;
            font-size: 1.2em;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .login-signup button:hover {
            background-color: #1e2a45;
        }
        footer {
            background-color: #2a3d66;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="SEZA LOGO-01-04.png" alt="SEZA Logo">
        </div>
        <nav>
            <ul>
                <li><a href="aboutUs.html">About</a></li> <!-- Link to the About page -->
                <li><a href="contact.html">Contact</a></li> <!-- Link to the Contact page -->
            </ul>
        </nav>
    </header>
    
    <section class="banner">
        <img src="seza.webp" alt="Camera">
    </section>

    <section class="small-images-container">
        <div class="small-image">
            <img src="IMG_1613.PNG" alt="Small Image">
        </div>
        <div class="small-image">
            <img src="IMG_1613.PNG" alt="Small Image">
        </div>
        <div class="small-image">
            <img src="IMG_1613.PNG" alt="Small Image">
        </div>
        <div class="small-image">
            <img src="IMG_1613.PNG" alt="Small Image">
        </div>
    </section>

    <section class="login-signup" id="login">
        <button onclick="window.location.href='index.php'">Login</button>
        <button onclick="window.location.href='register.php'">Sign Up</button>
    </section>
    
    <footer>
        <p>&copy; 2025 Seza Image. All Rights Reserved.</p>
    </footer>
</body>
</html>
