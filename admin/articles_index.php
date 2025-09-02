<?php
include '../koneksi.php';

$query = "
    SELECT a.id, a.title, a.content, a.image, c.name as city, ct.name as culture_type
    FROM articles a
    LEFT JOIN cities c ON a.city_id = c.id
    LEFT JOIN culture_types ct ON a.culture_type_id = ct.id
    ORDER BY a.created_at DESC
";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Artikel</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>Daftar Artikel</h2>
    <a href="articles_create.php">Tambah Artikel</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Kota</th>
            <th>Tipe Budaya</th>
            <th>Judul</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['city']; ?></td>
            <td><?= $row['culture_type']; ?></td>
            <td><?= $row['title']; ?></td>
            <td>
                <?php if ($row['image']) { ?>
                    <img src="uploads/<?= $row['image']; ?>" width="100">
                <?php } ?>
            </td>
            <td>
                <a href="articles_edit.php?id=<?= $row['id']; ?>">Edit</a> | 
                <a href="articles_delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
