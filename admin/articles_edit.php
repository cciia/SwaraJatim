<?php
include '../koneksi.php';

$cities = mysqli_query($koneksi, "SELECT * FROM cities");
$culture_types = mysqli_query($koneksi, "SELECT * FROM culture_types");

$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM articles WHERE id = $id");
$article = mysqli_fetch_assoc($result);

if (!$article) {
    die("Artikel tidak ditemukan!");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $city_id = $_POST['city_id'];
    $culture_type_id = $_POST['culture_type_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $image = $article['image'];
    if ($_FILES['image']['name']) {
        $newImage = time() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $newImage);

        if ($image && file_exists("uploads/" . $image)) {
            unlink("uploads/" . $image);
        }

        $image = $newImage;
    }

    $query = "UPDATE articles 
              SET city_id='$city_id', culture_type_id='$culture_type_id', 
                  title='$title', content='$content', image='$image'
              WHERE id=$id";

    mysqli_query($koneksi, $query);

    header("Location: articles_index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Artikel</title>
</head>
<body>
    <h2>Edit Artikel</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Kota:</label>
        <select name="city_id" required>
            <?php while ($c = mysqli_fetch_assoc($cities)) { ?>
                <option value="<?= $c['id']; ?>" <?= $c['id'] == $article['city_id'] ? 'selected' : '' ?>>
                    <?= $c['name']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <label>Tipe Budaya:</label>
        <select name="culture_type_id" required>
            <?php while ($ct = mysqli_fetch_assoc($culture_types)) { ?>
                <option value="<?= $ct['id']; ?>" <?= $ct['id'] == $article['culture_type_id'] ? 'selected' : '' ?>>
                    <?= $ct['name']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <label>Judul:</label>
        <input type="text" name="title" value="<?= $article['title']; ?>" required><br><br>

        <label>Konten:</label>
        <textarea name="content" rows="5" required><?= $article['content']; ?></textarea><br><br>

        <label>Gambar:</label>
        <?php if ($article['image']) { ?>
            <img src="uploads/<?= $article['image']; ?>" width="100"><br>
        <?php } ?>
        <input type="file" name="image"><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
