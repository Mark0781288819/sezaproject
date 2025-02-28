<?php
$title = "About - Seza Image";
$home_link = "Seza.php";
$contact_link = "contact.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
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
        .about {
            padding: 50px;
            text-align: center;
        }
        .about h2, .about p {
            color: white;
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
                <li><a href="<?php echo $home_link; ?>">Home</a></li>
                <li><a href="<?php echo $contact_link; ?>">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="about">
        <h2>About Us - Seza Image Studio</h2>
        <p>Welcome to Seza Image Studio, where creativity and passion meet to capture life's most precious moments. We are a professional photography studio dedicated to providing high-quality, timeless images that tell a story. Whether it's a wedding, family portrait, corporate event, or personal session, we specialize in capturing the essence of each moment, creating memories that last a lifetime.</p>
    </section>

    <footer>
        <p>&copy; 2025 Seza Image. All Rights Reserved.</p>
    </footer>
</body>
</html>
