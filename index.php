<?php
require_once 'config/koneksi.php';
$result = $conn->query("SELECT * FROM tb_absensi ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Absensi Pinky</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #ffe4e1; padding: 40px; }
        .container { max-width: 900px; margin: auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        h2 { color: #d81b60; text-align: center; }
        .btn-tambah { display: inline-block; background: #ff69b4; color: white; padding: 10px 20px; text-decoration: none; border-radius: 10px; font-weight: bold; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #ff69b4; color: white; padding: 12px; }
        td { padding: 12px; border-bottom: 1px solid #ffccdf; text-align: center; }
        .btn-edit { color: #da70d6; text-decoration: none; font-weight: bold; }
        .btn-hapus { color: #e91e63; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Absensi Siswa</h2>
        <a href="tambah.php" class="btn-tambah">+ Tambah Data</a>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php $no=1; while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_siswa'] ?></td>
                <td><?= $row['kelas'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a> | 
                    <a href="hapus.php?id=<?= $row['id'] ?>" class="btn-hapus" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>