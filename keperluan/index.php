<?php echo 'Keperluan Index'; ?>
<?php
require '../config/auth.php';
require '../config/koneksi.php';
include '../layouts/header.php';

$data = mysqli_query($conn, "SELECT * FROM keperluan ORDER BY id DESC");
?>

<div class="px-6 py-8 min-h-screen bg-blue-50">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-blue-700">Data Keperluan Kunjungan</h2>
        <a href="../dashboard.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kembali</a>
        <a href="tambah.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah</a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full text-sm">
            <thead class="bg-blue-100 text-left">
                <tr>
                    <th class="px-4 py-2">Keperluan</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($data)): ?>
                    <tr class="border-b">
                        <td class="px-4 py-2"><?= $row['nama_keperluan'] ?></td>
                        <td class="px-4 py-2">
                            <a href="edit.php?id=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a> |
                            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')" class="text-red-600 hover:underline">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layouts/footer.php'; ?>
