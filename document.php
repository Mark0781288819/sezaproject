<?php
session_start();

$host = 'localhost';
$dbname = 'auth_system';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$uploadDir = 'documents/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['upload'])) {
        $fileName = $_FILES['document']['name'];
        $filePath = $uploadDir . basename($fileName);
        
        if (move_uploaded_file($_FILES['document']['tmp_name'], $filePath)) {
            $stmt = $pdo->prepare("INSERT INTO documents (file_name, file_path) VALUES (?, ?)");
            $stmt->execute([$fileName, $filePath]);
        } else {
            echo "<script>alert('Failed to upload document.');</script>";
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['document_id'];
        $stmt = $pdo->prepare("SELECT file_path FROM documents WHERE id = ?");
        $stmt->execute([$id]);
        $file = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($file && file_exists($file['file_path'])) {
            unlink($file['file_path']);
        }
        
        $stmt = $pdo->prepare("DELETE FROM documents WHERE id = ?");
        $stmt->execute([$id]);
    }
}

$documentList = $pdo->query("SELECT * FROM documents")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Storage</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .container { width: 60%; margin: auto; background: #f4f4f4; padding: 20px; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; }
        .delete-btn { background: red; color: white; padding: 5px 10px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Document Storage</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="document" required>
            <button type="submit" name="upload">Upload</button>
        </form>
        
        <h3>Stored Documents</h3>
        <table>
            <tr>
                <th>File Name</th>
                <th>Action</th>
            </tr>
            <?php foreach ($documentList as $doc): ?>
                <tr>
                    <td><a href="<?php echo $doc['file_path']; ?>" target="_blank"> <?php echo $doc['file_name']; ?> </a></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="document_id" value="<?php echo $doc['id']; ?>">
                            <button type="submit" name="delete" class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
