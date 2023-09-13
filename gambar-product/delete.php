<?php
require_once '../config/config.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM `tb_gambar` WHERE `kodegambar` = '$id'"));

$uploads_dir = "../assets/uploads/";
unlink($uploads_dir . $data['namagambar']);

$query = "DELETE FROM `tb_gambar` WHERE `kodegambar` = '$id'";
$result = mysqli_query($koneksi, $query);
if ($result) {
    echo "
        <script>
            alert('Data Anda Berhasil Dihapuskan!');
            window.location.href = './';
        </script>
    ";
} else {
    echo "Error: " . $result . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
