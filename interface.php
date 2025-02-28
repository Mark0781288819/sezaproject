<?php 
    // Website Configuration
    $title = "Personal Portfolio";
    $name = "SEZA_Image Groupe"; // Updated name
    $social_links = [
        'fab fa-x' => '#',
        'fab fa-facebook' => '#',
        'fab fa-instagram' => '#',
        'fab fa-linkedin' => '#'
    ];
    $menu_items = [
        'Home' => 'seza.html',
        'About' => 'about.php',
        'Resume' => '#resume',
        'Dashboard' => 'dashboard.php',
        'Services' => '#services',
        'document' => 'document.php',
        'Gallery' => 'gallery.php',
        'contact' => 'contact.php'
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            background-color: #f4f4f4;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: #0c0c0c;
            color: white;
            height: 100vh;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: fixed;
        }

        .profile img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid white;
        }

        .profile h2 {
            margin: 15px 0;
            font-size: 22px;
            text-align: center;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .social-links a {
            color: white;
            font-size: 18px;
            transition: 0.3s;
        }

        .social-links a:hover {
            color: #1da1f2;
        }

        /* Navigation Menu */
        .sidebar nav ul {
            list-style: none;
            width: 100%;
            padding: 0;
        }

        .sidebar nav ul li {
            width: 100%;
            padding: 15px 20px;
            transition: 0.3s;
        }

        .sidebar nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar nav ul li:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left: 3px solid #1da1f2;
        }

        /* Main Content */
        .content {
            margin-left: 280px;
            padding: 50px;
            flex: 1;
            background: url('seza.webp') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .hero {
            text-align: left;
            color: white;
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 10px;
        }

        .hero h1 {
            font-size: 50px;
            font-weight: bold;
        }

        .hero p {
            font-size: 20px;
            margin-top: 10px;
            border-left: 3px solid #1da1f2;
            padding-left: 10px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="profile">
            <img src="IMG_0381.PNG" alt="Profile Picture">
            <h2><?php echo $name; ?></h2> 
            <div class="social-links">
                <?php foreach ($social_links as $icon => $link): ?>
                    <a href="<?php echo $link; ?>"><i class="<?php echo $icon; ?>"></i></a>
                <?php endforeach; ?>
            </div>
        </div>
        <nav>
            <ul>
                <?php foreach ($menu_items as $item => $link): ?>
                    <li><a href="<?php echo $link; ?>"><?php echo $item; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="content">
        <section id="home">
            <div class="hero">
                <h1><?php echo $name; ?></h1>
                <p>Profetionel Image |</p>
            </div>
        </section>
    </main>

</body>
</html>
