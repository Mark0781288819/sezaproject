<?php 
session_start();

// Website Configuration
$title = "SEZA_Image Groupe - Dashboard";
$name = "SEZA_Image Groupe"; 

// Ensure upload directory exists
$upload_dir = "uploads/";
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// Default Clients (Load from session if available)
if (!isset($_SESSION['clients'])) {
    $_SESSION['clients'] = [];
}

// Handle Form Submission (Add Client with Document)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_client'])) {
    $new_client = [
        "name" => $_POST["name"],
        "email" => $_POST["email"],
        "phone" => $_POST["phone"],
        "document" => "" // Default empty document
    ];

    // Handle file upload
    if (isset($_FILES["document"]) && $_FILES["document"]["error"] == 0) {
        $file_name = basename($_FILES["document"]["name"]);
        $file_path = $upload_dir . time() . "_" . $file_name; // Unique name

        if (move_uploaded_file($_FILES["document"]["tmp_name"], $file_path)) {
            $new_client["document"] = $file_path;
        }
    }

    $_SESSION['clients'][] = $new_client;
}

// Handle Client Removal
if (isset($_GET['remove'])) {
    $index = $_GET['remove'];
    if (isset($_SESSION['clients'][$index])) {
        // Delete document file if exists
        if (!empty($_SESSION['clients'][$index]['document']) && file_exists($_SESSION['clients'][$index]['document'])) {
            unlink($_SESSION['clients'][$index]['document']);
        }
        array_splice($_SESSION['clients'], $index, 1);
    }
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body { font-family: "Poppins", sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #1da1f2; color: white; }
        tr:hover { background: #f1f1f1; }
        .form-container { margin-bottom: 20px; }
        .form-container input, .form-container button { padding: 10px; margin: 5px; width: 30%; }
        .form-container button { background: #1da1f2; color: white; border: none; cursor: pointer; }
        .remove-btn { color: red; cursor: pointer; text-decoration: none; }
        .download-link { color: green; text-decoration: none; }
    </style>
</head>
<body>

    <h2>Clients Management</h2>

    <!-- Add Client Form -->
    <div class="form-container">
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Client Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="file" name="document" accept=".pdf,.doc,.docx,.jpg,.png">
            <button type="submit" name="add_client">Add Client</button>
        </form>
    </div>

    <!-- Clients List -->
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Document</th>
            <th>Action</th>
        </tr>
        <?php foreach ($_SESSION['clients'] as $index => $client): ?>
            <tr>
                <td><?php echo $client["name"]; ?></td>
                <td><?php echo $client["email"]; ?></td>
                <td><?php echo $client["phone"]; ?></td>
                <td>
                    <?php if (!empty($client["document"])): ?>
                        <a class="download-link" href="<?php echo $client["document"]; ?>" download>Download</a>
                    <?php else: ?>
                        No document
                    <?php endif; ?>
                </td>
                <td><a class="remove-btn" href="?remove=<?php echo $index; ?>">Remove</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
