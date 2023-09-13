<?php
require_once '../config/config.php';

if (isset($_POST['submit'])) {
    $kode_gambar = htmlspecialchars($_POST['kode_gambar']);

    $file = $_FILES['nama_gambar']['name'];
    $tmp_file = $_FILES['nama_gambar']['tmp_name'];

    // mengambil ekstensi file
    $file_ext = pathinfo($file, PATHINFO_EXTENSION);

    // memeriksa apakah file yang diupload adalah nama_gambar
    if ($file_ext != "jpg" && $file_ext != "jpeg" && $file_ext != "png" && $file_ext != "gif") {
        echo "
            <script>
                alert('File yang diupload bukan gambar.');
                window.location.href = '';
            </script>
        ";
        exit;
    }

    // mengupload file ke folder "uploads"
    $uploads_dir = "../assets/uploads/";
    $new_file_name = uniqid() . "." . $file_ext;
    move_uploaded_file($tmp_file, $uploads_dir . $new_file_name);

    // menyimpan data ke database
    $query = "INSERT INTO `tb_gambar` VALUES ('$kode_gambar','$new_file_name')";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "
            <script>
                alert('Data Anda Berhasil Disimpan!');
                window.location.href = './';
            </script>
        ";
    } else {
        echo "Error: " . $result . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
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
                <a href="<?= $base_url ?>gambar-product" class="btn btn-warning btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="kode_gambar" class="col-sm-2 col-form-label">Kode Gambar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kode_gambar" id="kode_gambar" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_gambar" class="col-sm-2 col-form-label">Pilih Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="nama_gambar" id="nama_gambar" required>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= $base_url ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>