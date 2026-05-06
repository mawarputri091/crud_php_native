<?php
require_once 'config/koneksi.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tb_absensi WHERE id = $id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $nama  = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $status = $_POST['status'];
    $tgl   = $_POST['tanggal'];

    $query = "UPDATE tb_absensi SET nama_siswa='$nama', kelas='$kelas', status='$status', tanggal='$tgl' WHERE id=$id";

    if ($conn->query($query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal Update: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <style>
        /* CSS Sama dengan tambah.php */
        body { font-family: 'Segoe UI', sans-serif; background-color: #ffe4e1; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: #fff; width: 350px; padding: 30px; border-radius: 20px; box-shadow: 0 10px 25px rgba(255, 105, 180, 0.2); }
        h2 { color: #d81b60; text-align: center; }
        label { display: block; font-weight: bold; margin: 10px 0 5px; font-size: 14px; }
        input, select { width: 100%; padding: 10px; border: 2px solid #ffc0cb; border-radius: 10px; box-sizing: border-box; }
        button { width: 100%; background: #da70d6; color: white; padding: 12px; border: none; border-radius: 10px; font-weight: bold; margin-top: 20px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Edit Data</h2>
        <form method="POST">
            <label>Nama Siswa:</label>
            <input type="text" name="nama_siswa" value="<?= $row['nama_siswa'] ?>" required>
            
            <label>Kelas:</label>
            <input type="text" name="kelas" value="<?= $row['kelas'] ?>" required>

            <label>Keterangan:</label>
            <select name="status">
                <option value="Hadir" <?= $row['status'] == 'Hadir' ? 'selected' : '' ?>>Hadir</option>
                <option value="Izin" <?= $row['status'] == 'Izin' ? 'selected' : '' ?>>Izin</option>
                <option value="Sakit" <?= $row['status'] == 'Sakit' ? 'selected' : '' ?>>Sakit</option>
            </select>

            <label>Tanggal:</label>
            <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>" required>

            <button type="submit" name="update">Update Data</button>
            <a href="index.php" style="display:block; text-align:center; margin-top:10px; color:#555; text-decoration:none;">Batal</a>
        </form>
    </div>
</body>
</html>