<?php
include '../koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM culture_types ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tipe Budaya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Tipe Budaya</h2>
    <a href="culture_create.php">Tambah Tipe Budaya</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Tipe</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
