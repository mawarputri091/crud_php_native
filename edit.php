<?php
$id =filter_var($_GET['id'], FILTER_VALIDATE_INT);
$stmt =$conn->prepare("SELECT * FROM tb_absensi WHERE id = ?");$stmt->bind_param("i",$id);
$stmt =$conn->prepare("UPDATE tb_absensi
                        SET nama_siswa=?, kelas=?, tanggal=?, status=?
                        WHERE id=?");