<?php
include '../koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM cities ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Kota</h2>
    <a href="cities_create.php">Tambah Kota</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Kota</th>
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
