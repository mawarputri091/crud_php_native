<?php
require_once 'config/koneksi.php';

if (isset($_POST['simpan'])) {
    // Menangkap data dari form
    $nama   = $_POST['nama_siswa'];
    $kelas  = $_POST['kelas'];
    $status = $_POST['status']; 
    $tgl    = $_POST['tanggal'];

    // Query untuk memasukkan data
    $query = "INSERT INTO tb_absensi (nama_siswa, kelas, status, tanggal) 
              VALUES ('$nama', '$kelas', '$status', '$tgl')";

    // Eksekusi query dan cek berhasil/gagal pakai alert Javascript
    if ($conn->query($query)) {
        echo "<script>
                alert('Yey! Data berhasil ditambahkan.');
                window.location.href = 'index.php';
              </script>";
        exit;
    } else {
        echo "<script>
                alert('Yah, Gagal menyimpan data: " . $conn->error . "');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Absensi</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #ffe4e1; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: #ffffff; width: 100%; max-width: 400px; padding: 30px; border-radius: 20px; box-shadow: 0 10px 25px rgba(255, 105, 180, 0.2); }
        h2 { color: #d81b60; text-align: center; margin-bottom: 25px; font-size: 24px; }
        label { display: block; font-weight: 600; color: #555; margin-bottom: 8px; font-size: 14px; }
        input[type="text"], input[type="date"], select { width: 100%; padding: 12px; margin-bottom: 20px; border: 2px solid #ffc0cb; border-radius: 10px; box-sizing: border-box; outline: none; transition: 0.3s; font-size: 15px; }
        input:focus, select:focus { border-color: #ff69b4; box-shadow: 0 0 8px rgba(255, 105, 180, 0.2); }
        button[type="submit"] { width: 100%; background-color: #ff69b4; color: white; padding: 12px; border: none; border-radius: 10px; font-size: 16px; font-weight: bold; cursor: pointer; transition: 0.3s; box-shadow: 0 4px 10px rgba(255, 105, 180, 0.3); }
        button[type="submit"]:hover { background-color: #ff1493; transform: translateY(-2px); }
        .btn-back { display: block; text-align: center; margin-top: 15px; text-decoration: none; color: #db7093; font-size: 14px; font-weight: 500; }
        .btn-back:hover { color: #c71585; text-decoration: underline; }
    </style>
</head>
<body>

    <div class="card">
        <h2>Tambah Data</h2>

        <form method="POST" action="">
            <label>Nama Siswa:</label>
            <input type="text" name="nama_siswa" placeholder="Masukkan nama lengkap" required>

            <label>Kelas:</label>
            <input type="text" name="kelas" placeholder="Contoh: XII RPL 1" required>

            <label>Status:</label>
            <select name="status" required>
                <option value="" disabled selected>-- Pilih Status --</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
            </select>

            <label>Tanggal:</label>
            <input type="date" name="tanggal" required>

            <button type="submit" name="simpan">Simpan Data</button>
            
            <a href="index.php" class="btn-back">Kembali ke Data Absensi</a>
        </form>
    </div>

</body>
</html>