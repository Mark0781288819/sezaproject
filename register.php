<!DOCTYPE html>
<html lang="en">
    <style>
        /* Reset default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    width: 100%;
    max-width: 400px;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.form-container {
    text-align: center;
}

.image-container img {
    width: 100px;
    height: auto;
    margin-bottom: 15px;
}

h2 {
    font-size: 24px;
    margin-bottom: 15px;
    color: #333;
}

.form-groupe {
    text-align: left;
    margin-bottom: 15px;
}

.form-groupe label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

.form-groupe input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    transition: 0.3s;
}

.form-groupe input:focus {
    border-color: #007bff;
    outline: none;
}

button {
    width: 100%;
    padding: 10px;
    background: #007bff;
    border: none;
    color: white;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #0056b3;
}

.register-link {
    margin-top: 10px;
    font-size: 14px;
}

.register-link a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

.register-link a:hover {
    text-decoration: underline;
}

    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="image-container">
                <img src="IMG_0381.PNG" alt="IMG_0381.PNG">
            </div>
            <div class="form-content">
                <form action="register.php" method="POST">
                <h2>Create Account</h2>
                <div class="form-groupe">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="form-groupe">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-groupe">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" required>
                </div>
                <div class="form-groupe">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit" name="Login">Sign Up</button>
                <p class="register-link">Alerady have an account? <a href="index.php">Log In</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn = new mysqli('localhost','root','','auth_system');

    if ($conn->connect_error) {
        die("connection failed:" . $conn->connect_error);
    }
    $sql = "INSERT INTO users (name, email, password, mobile)VALUES ('$name','$email','$password','$mobile')";

    if ($conn->query($sql) == TRUE) {
        echo "<script>
        alert('Registration successfull');
        window.location.href ='index.php';
        </script>";
    } else{
        echo 'Error:' .$sql ."<br>" . $conn->error;
    }

    $conn->close();
}    
?>