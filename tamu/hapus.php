<?php
include '../config/koneksi.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM tamu WHERE id = $id";
  mysqli_query($conn, $query);
}

// Kembali ke halaman utama dengan notifikasi
header("Location: tamu\index.php?status=deleted");
exit;
?>
