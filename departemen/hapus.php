<?php echo 'Hapus Departemen'; ?>
<?php
require '../config/auth.php';
require '../config/koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM departemen WHERE id = $id");

header("Location: index.php?hapus=1");
exit;
