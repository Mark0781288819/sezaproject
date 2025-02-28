<?php 

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .interface-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .interface-container header h1 {
            color: #333;
        }
        .content {
            margin-top: 20px;
        }
        .interface-button, .logout-button {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background: #007BFF;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .logout-button {
            background: #dc3545;
        }
        .interface-button:hover {
            background: #0056b3;
        }
        .logout-button:hover {
            background: #c82333;
        }
    </style>
</head>

<body>
    <div class="interface-container">
        <div class="welcome-content">
            <header>
                <h1>Welcome, <?php echo $_SESSION['name']; ?>!</h1>
            </header>
            <div class="content">
                <p>Thank you for logging in. You can now access your interface and manage your account.</p>
                <a href="interface.php" class="interface-button">Interface</a>
                <a href="logout.php" class="logout-button">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
