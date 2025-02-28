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

$uploadDir = 'uploads/';

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['upload_images'])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $imageName = $_FILES['images']['name'][$key];
            $imagePath = $uploadDir . basename($imageName);
            
            if (move_uploaded_file($tmp_name, $imagePath)) {
                $stmt = $pdo->prepare("INSERT INTO images (image) VALUES (?)");
                $stmt->execute([$imagePath]);
            } else {
                echo "<script>alert('Failed to upload $imageName');</script>";
            }
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['image_id'];
        $stmt = $pdo->prepare("DELETE FROM images WHERE id = ?");
        $stmt->execute([$id]);
    }
}

$images = $pdo->query("SELECT * FROM images")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #f4f4f4; margin: 0; padding: 0; }
        .gallery { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; padding: 20px; }
        .gallery img { width: 150px; height: 150px; border-radius: 5px; cursor: pointer; transition: transform 0.2s; }
        .gallery img:hover { transform: scale(1.1); }
        .image-container { position: relative; display: inline-block; }

        /* Full-Screen Image Viewer */
        .image-viewer { 
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
            background: rgba(0,0,0,0.9); display: flex; align-items: center; justify-content: center; flex-direction: column;
        }
        .image-viewer img { 
            max-width: 100vw; max-height: 80vh; 
            object-fit: contain;
        }

        /* Buttons */
        .nav-button, .close-button, .delete-button { 
            position: absolute; font-size: 20px; padding: 10px; cursor: pointer; border: none;
        }
        .prev { left: 20px; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.7); }
        .next { right: 20px; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.7); }
        .close-button { 
            top: 20px; right: 20px; background: red; color: white; border-radius: 50%; font-size: 24px;
        }
        .delete-button { 
            bottom: 20px; background: red; color: white; font-size: 18px; padding: 10px 20px; 
            border-radius: 5px; cursor: pointer;
        }

        /* Button for external link */
        .link-button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 8px;
        }
        .link-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Image Gallery</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="images[]" multiple required>
        <button type="submit" name="upload_images">Upload Images</button>
    </form>

    <!-- Button to link to document.php -->
    <a href="document.php" target="_blank">
        <button class="link-button">Go to Document Storage</button>
    </a>

    <div class="gallery">
        <?php foreach ($images as $img): ?>
            <div class="image-container">
                <img src="<?php echo $img['image']; ?>" alt="Image" onclick="viewImage('<?php echo $img['image']; ?>', <?php echo $img['id']; ?>)">
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Full-Screen Image Viewer -->
    <div class="image-viewer" id="imageViewer">
        <button class="close-button" onclick="closeImageViewer()">❌</button>
        <button class="nav-button prev" onclick="navigate(-1)">&#10094;</button>
        <img id="viewedImage" src="" alt="Viewing Image">
        <button class="nav-button next" onclick="navigate(1)">&#10095;</button>
        
        <!-- Delete Form (Only for Selected Image) -->
        <form method="POST" id="deleteForm">
            <input type="hidden" name="image_id" id="deleteImageId">
            <button type="submit" name="delete" class="delete-button">🗑 Delete Image</button>
        </form>
    </div>

    <script>
        let currentIndex = 0;
        let images = <?php echo json_encode($images); ?>;

        function viewImage(imagePath, imageId) {
            document.getElementById('viewedImage').src = imagePath;
            document.getElementById('imageViewer').style.display = 'flex';
            document.getElementById('deleteImageId').value = imageId;
            currentIndex = images.findIndex(img => img.image === imagePath);
        }

        function navigate(direction) {
            currentIndex += direction;
            if (currentIndex < 0) currentIndex = images.length - 1;
            if (currentIndex >= images.length) currentIndex = 0;
            document.getElementById('viewedImage').src = images[currentIndex].image;
            document.getElementById('deleteImageId').value = images[currentIndex].id;
        }

        function closeImageViewer() {
            document.getElementById('imageViewer').style.display = 'none';
        }

        document.getElementById('imageViewer').addEventListener('click', function(event) {
            const viewerWidth = document.getElementById('imageViewer').offsetWidth;
            const clickPosition = event.clientX - document.getElementById('imageViewer').offsetLeft;

            if (event.target.tagName !== 'IMG' && event.target.className !== 'close-button') {
                if (clickPosition < viewerWidth / 2) {
                    navigate(-1);
                } else {
                    navigate(1);
                }
            }
        });
    </script>
</body>
</html>
