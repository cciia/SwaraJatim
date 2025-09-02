<?php
include '../koneksi.php';

$id = $_GET['id'];

$result = mysqli_query($koneksi, "SELECT * FROM articles WHERE id = $id");
$article = mysqli_fetch_assoc($result);

if ($article) {
    if ($article['image'] && file_exists("uploads/" . $article['image'])) {
        unlink("uploads/" . $article['image']);
    }

    mysqli_query($koneksi, "DELETE FROM articles WHERE id = $id");
}

header("Location: articles_index.php");
?>