<?php echo 'Edit Petugas'; ?>
<?php
require '../config/auth.php';
require '../config/koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM petugas WHERE id = $id");
$row = mysqli_fetch_assoc($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_petugas'];
    mysqli_query($conn, "UPDATE keperluan SET nama_petugas='$nama' WHERE id=$id");
    header("Location: index.php?update=1");
    exit;
}

include '../layouts/header.php';
?>

<div class="px-6 py-8 min-h-screen bg-blue-50">
    <h2 class="text-xl font-bold text-blue-700 mb-4">Edit Petugas</h2>

    <form method="POST" class="bg-white p-6 rounded shadow max-w-xl">
        <label class="block mb-3">
            <span class="text-gray-700">Nama Petugas</span>
            <input type="text" name="nama_keperluan" value="<?= $row['nama_petugas'] ?>" required class="w-full border px-3 py-2 rounded">
        </label>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
        <a href="index.php" class="ml-3 text-blue-600 hover:underline">Kembali</a>
    </form>
</div>

<?php include '../layouts/footer.php'; ?>