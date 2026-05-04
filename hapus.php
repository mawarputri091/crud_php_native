<?php
$id =filter_var($_GET['id'], FILTER_VALIDATE_INT);
$stmt =$conn->prepare("DELETE FROM tb_absensi WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();
header("Location: index.php");exit;