<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    if (!empty($name) && !empty($email) && !empty($message)) {
        $to = "sergeusa2@gmail.com";
        $subject = "New Contact Message from $name";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "<script>alert('Message sent successfully!');</script>";
        } else {
            echo "<script>alert('Failed to send message. Please try again later.');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Seza Image</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #5fa8d3;
            color: #fff;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #2a3d66;
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
            transition: color 0.3s;
        }
        nav ul li a:hover {
            color: #ffd700;
        }
        .contact {
            padding: 50px;
            max-width: 800px;
            margin: 0 auto;
            background-color: #2a3d66;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .contact h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            background-color: #fff;
            color: #333;
        }
        .contact-form button {
            background-color: #ffd700;
            color: #2a3d66;
            font-size: 1.2em;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .contact-form button:hover {
            background-color: #ffcc00;
        }
        .contact-info {
            text-align: center;
            margin-top: 40px;
        }
        .contact-info h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .contact-info p {
            font-size: 1.1em;
            margin: 5px 0;
        }
        .contact-info a {
            color: #ffd700;
            text-decoration: none;
            cursor: pointer;
        }
        .contact-info a:hover {
            text-decoration: underline;
        }
        footer {
            background-color: #2a3d66;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const emailLink = document.querySelector("a[href^='mailto']");
            const contactForm = document.querySelector(".contact");

            if (emailLink && contactForm) {
                emailLink.addEventListener("click", function(event) {
                    event.preventDefault(); // Prevent default email client opening
                    contactForm.scrollIntoView({ behavior: "smooth" });
                });
            }
        });
    </script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="SEZA LOGO-01-04.png" alt="SEZA Logo">
        </div>
        <nav>
            <ul>
                <li><a href="Seza.html">Home</a></li>
            </ul>
        </nav>
    </header>
    
    <section class="contact">
        <h2>Contact Us</h2>
        <p>If you have any questions or would like to book a session, please feel free to reach out!</p>
        <form class="contact-form" method="POST" action="">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </section>

    <section class="contact-info">
        <h3>Get In Touch</h3>
        <p><strong>Phone:</strong> <a href="tel:+250788917775">+250-788-917-775</a></p>
        <p><strong>Email:</strong> <a href="mailto:sergeusa2@gmail.com">sergeusa2@gmail.com</a></p>
        <p><strong>Instagram:</strong> <a href="https://www.instagram.com/seza_image" target="_blank">seza_image</a></p>
        <p><strong>Facebook:</strong> <a href="https://www.facebook.com/share/12G6YEWxVq6/" target="_blank">Usabyimbabazi Serge</a></p>
    </section>

    <footer>
        <p>&copy; 2025 Seza Image. All Rights Reserved.</p>
    </footer>
</body>
</html>
