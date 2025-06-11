<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Hubungkan ke koneksi database
include '../config/koneksi.php';

// Ambil data dari database
$departemen = mysqli_query($conn, "SELECT * FROM departemen");
$petugas = mysqli_query($conn, "SELECT * FROM petugas");
$keperluan = mysqli_query($conn, "SELECT * FROM keperluan");
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GuestBook - Form Input</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .header-scrolled {
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }
    </style>
  </head>
  <body class="font-sans text-gray-900 bg-gray-100">
    <!-- Header -->
    <header id="header" class="w-full fixed top-0 left-0 z-50 transition-all duration-300">
      <div class="flex justify-between items-center px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-700 text-white">
        <div class="text-2xl font-bold">GuestBook</div>
        <nav class="space-x-6 text-lg font-semibold">
          <a href="index.html#home" class="hover:underline">Home</a>
          <a href="index.html#about" class="hover:underline">About</a>
          <a href="index.html#contact" class="hover:underline">Contact</a>
        </nav>
      </div>
    </header>

    <!-- Form Section -->
    <main class="pt-28 pb-16 flex justify-center items-center min-h-screen bg-gray-100">
      <form action="tambah.php" method="POST" class="w-full max-w-xl bg-white p-10 rounded shadow">
        <h2 class="text-2xl font-bold text-center mb-6">Form Input Perwakilan Penghubung Instansi</h2>

        <label class="block mb-2 font-semibold">Nama Perwakilan Penghubung Instansi</label>
        <input name="nama" type="text" class="w-full mb-4 px-4 py-2 border rounded" placeholder="Nama Lengkap" required />

        <label class="block mb-2 font-semibold">No Telepon</label>
        <input name="telepon" type="text" class="w-full mb-4 px-4 py-2 border rounded" placeholder="Nomor Telepon" required />

        <label class="block mb-2 font-semibold">Waktu Kehadiran</label>
        <input name="tanggal" type="date" class="w-full mb-4 px-4 py-2 border rounded" placeholder="Waktu Kehadiran" required />

        <label class="block mb-2 font-semibold">Asal Instansi</label>
        <input name="instansi" type="text" class="w-full mb-4 px-4 py-2 border rounded" placeholder="Kantor / Instansi" required />

        <label class="block mb-2 font-semibold">Departemen</label>
        <select name="departemen" class="w-full mb-4 px-4 py-2 border rounded" required>
          <option value="">Pilih Departemen</option>
          <?php while ($row = mysqli_fetch_assoc($departemen)) : ?>
            <option value="<?= htmlspecialchars($row['nama_departemen']) ?>"><?= htmlspecialchars($row['nama_departemen']) ?></option>
          <?php endwhile; ?>
        </select>

        <label class="block mb-2 font-semibold">Petugas Penerima</label>
        <select name="petugas" class="w-full mb-4 px-4 py-2 border rounded" required>
          <option value="">Pilih Petugas Penerima</option>
          <?php while ($row = mysqli_fetch_assoc($petugas)) : ?>
            <option value="<?= htmlspecialchars($row['nama_petugas']) ?>"><?= htmlspecialchars($row['nama_petugas']) ?></option>
          <?php endwhile; ?>
        </select>

        <label class="block mb-2 font-semibold">Keperluan</label>
        <select name="keperluan" class="w-full mb-6 px-4 py-2 border rounded" required>
          <option value="">Pilih Keperluan</option>
          <?php while ($row = mysqli_fetch_assoc($keperluan)) : ?>
            <option value="<?= htmlspecialchars($row['nama_keperluan']) ?>"><?= htmlspecialchars($row['nama_keperluan']) ?></option>
          <?php endwhile; ?>
        </select>

        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded font-semibold hover:bg-blue-700 transition">Simpan</button>
      </form>
    </main>

    <!-- Modal Success -->
    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
      <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-sm text-center shadow-lg">
          <h3 class="text-lg font-semibold mb-4">Berhasil disimpan!</h3>
          <button
            id="okButton" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Oke
          </button>
        </div>
      </div>
  
      <script>
        const modal = document.getElementById('successModal');
        const okButton = document.getElementById('okButton');

        okButton.addEventListener('click', () => {
          window.location.href = 'list_tamu.php';
        });
      </script> 
    <?php endif; ?>

    <!-- Scroll header behavior -->
    <script>
      const header = document.getElementById("header");
      window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
          header.classList.add("header-scrolled");
        } else {
          header.classList.remove("header-scrolled");
        }
      });
    </script>
  </body>
</html>
