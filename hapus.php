<?php
require_once 'config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tb_absensi WHERE id = $id";

    if ($conn->query($query)) {
        header("Location: index.php");
    } else {
        echo "Gagal Hapus: " . $conn->error;
    }
}
?>