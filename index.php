<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f4f6f9;
            padding: 30px;
        }

        h2 {
            text-align: center;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            width: 60%;
            background: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background-color: #faa9e0;
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0f7e9;
        }
    </style>
</head>
<body>

<h2>Data Siswa</h2>

<?php
require_once 'config/koneksi.php';

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query data
$query = "SELECT * FROM tb_absensi ORDER BY id DESC";
$result = $conn->query($query);

// Cek apakah query berhasil
if (!$result) {
    die("Query error: " . $conn->error);
}

// Tampilkan data dalam tabel
echo "<table>";
echo "<tr>
        <th>ID</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Tanggal</th>
        <th>Status</th>
      </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['nama_siswa']) . "</td>";
    echo "<td>" . htmlspecialchars($row['kelas']) . "</td>";
    echo "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
    echo "</tr>";
}

echo "</table>";

// Tutup koneksi
$conn->close();
?>

</body>
</html>