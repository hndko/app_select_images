<?php
require_once '../config/config.php';

$result = mysqli_query($koneksi, "SELECT * FROM `tb_gambar`");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select Image With Javascript</title>
    <link href="<?= $base_url ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php require_once '../partikel/navbar.php' ?>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header h3 d-flex justify-content-between">
                Data Gambar Product
                <a href="<?= $base_url ?>gambar-product/add.php" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $row['kodegambar'] ?></td>
                                <td><?= $row['namagambar'] ?></td>
                                <td>
                                    <a href="<?= $base_url ?>gambar-product/edit.php?id=<?= $row['kodegambar'] ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="<?= $base_url ?>gambar-product/delete.php?id=<?= $row['kodegambar'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="<?= $base_url ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>