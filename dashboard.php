<?php echo 'Dashboard'; ?>
<?php 
require 'config\koneksi.php'; 
include 'layouts\headeradmin.php'; 
include 'config\auth.php';
?>

<section class="bg-blue-50 min-h-screen px-6 py-10">
    <h1 class="text-2xl font-bold text-blue-700 mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        
        <!-- Total Kunjungan (contoh dummy sama dgn total tamu) -->
        <div class="bg-white p-6 rounded-lg shadow text-center">
            <h2 class="text-lg text-gray-500">Total Kunjungan</h2>
            <p class="text-3xl font-bold text-blue-600">
                <?php 
                $qk = mysqli_query($conn, "SELECT COUNT(*) FROM tamu");
                echo mysqli_fetch_row($qk)[0];
                ?>
            </p>
        </div>

        <!-- Total Keperluan -->
        <div class="bg-white p-6 rounded-lg shadow text-center">
            <h2 class="text-lg text-gray-500">Jenis Keperluan</h2>
            <p class="text-3xl font-bold text-blue-600">
                <?php 
                $q1 = mysqli_query($conn, "SELECT COUNT(*) FROM keperluan");
                echo mysqli_fetch_row($q1)[0];
                ?>
            </p>
        </div>

        <!-- Total Petugas -->
        <div class="bg-white p-6 rounded-lg shadow text-center">
            <h2 class="text-lg text-gray-500">Jumlah Petugas</h2>
            <p class="text-3xl font-bold text-blue-600">
                <?php 
                $q2 = mysqli_query($conn, "SELECT COUNT(*) FROM petugas");
                echo mysqli_fetch_row($q2)[0];
                ?>
            </p>
        </div>
    </div>

    <!-- Navigasi ke Modul -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-2 gap-4">
        <a href="tamu/index.php" class="block bg-blue-100 p-4 rounded-lg text-blue-700 font-semibold hover:bg-blue-200">📋 Kelola Tamu</a>
        <a href="keperluan/index.php" class="block bg-blue-100 p-4 rounded-lg text-blue-700 font-semibold hover:bg-blue-200">📁 Jenis Keperluan</a>
        <a href="petugas/index.php" class="block bg-blue-100 p-4 rounded-lg text-blue-700 font-semibold hover:bg-blue-200">👨‍💼 Data Petugas</a>
        <a href="departemen/index.php" class="block bg-blue-100 p-4 rounded-lg text-blue-700 font-semibold hover:bg-blue-200">🏢 Departemen</a>
    </div>
</section>

<?php include 'layouts/footer.php'; ?>
