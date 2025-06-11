<?php
include '../config/koneksi.php';

$query = "SELECT * FROM tamu ORDER BY tanggal DESC";
$result = mysqli_query($conn, $query);


?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Tamu</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <style>
    .header-scrolled {
      background-color: white !important;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      color: #1e3a8a;
    }

    .header-scrolled .text-2xl {
      font-size: 1.25rem;
    }

    .header-scrolled nav a {
      color: #1e3a8a;
    }
  </style>
</head>
<body class="font-sans text-gray-900 bg-gray-100">

<!-- Header -->
<header
  id="header"
  class="w-full fixed top-0 left-0 z-50 transition-all duration-300"
>
  <div class="flex justify-between items-center px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-700 text-white">
    <div class="text-2xl font-bold">GuestBook</div>
    <nav class="space-x-6 text-lg font-semibold">
      <a href="../index.php#home" class="hover:underline">Home</a>
      <a href="../index.php#about" class="hover:underline">About</a>
      <a href="../index.php#contact" class="hover:underline">Contact</a>
    </nav>
  </div>
</header>
<div class="pt-24">



<!-- Isi konten -->
<div class="pt-32 max-w-7xl mx-auto p-6">
  <h1 class="text-3xl font-bold mb-6 text-blue-700">Daftar Tamu</h1>

  <div class="bg-white shadow-md rounded-lg p-4">
    <div class="overflow-x-auto">
      <table id="tabelTamu" class="stripe hover w-full text-sm text-left text-gray-800 mt-6">
        <thead class="bg-blue-600 text-white">
          <tr>
            <th>No</th>
            <th>Nama Perwakilan</th>
            <th>No Telepon</th>
            <th>Instansi</th>
            <th>Departemen</th>
            <th>Keperluan</th>
            <th>Petugas Penerima</th>
            <th>Tanggal Datang</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= htmlspecialchars($row['nama']); ?></td>
              <td><?= htmlspecialchars($row['telepon']); ?></td>
              <td><?= htmlspecialchars($row['instansi']); ?></td>
              <td><?= htmlspecialchars($row['departemen']); ?></td>
              <td><?= htmlspecialchars($row['keperluan']); ?></td>
              <td><?= htmlspecialchars($row['petugas']); ?></td>
              <td><?= htmlspecialchars($row['tanggal']); ?></td>
              <td>
                <div class="relative inline-block text-left">
                  <button onclick="toggleDropdown(this)" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-xs">Action ▼</button>
                  <div class="hidden absolute right-0 mt-1 w-24 bg-white border border-gray-200 rounded shadow z-10">
                    <a href="edit.php?id=<?= $row['id']; ?>" class="block px-3 py-1 text-sm hover:bg-gray-100">Edit</a>
                    <a href="#" onclick="confirmDelete(<?= $row['id']; ?>)" class="block px-3 py-1 text-sm hover:bg-gray-100 text-red-600">Hapus</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="modalConfirm" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
  <div class="bg-white p-6 rounded shadow text-center">
    <h2 class="text-lg font-semibold mb-4">Yakin ingin menghapus data ini?</h2>
    <div class="flex justify-center gap-4">
      <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
      <a id="btnDelete" href="#" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Ya, Hapus</a>
    </div>
  </div>
</div>

<script>
  // DataTables init
  $(document).ready(function () {
    $('#tabelTamu').DataTable({
      responsive: true,
      language: {
        search: "Cari:",
        lengthMenu: "Tampilkan _MENU_ data",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        paginate: {
          previous: "Sebelumnya",
          next: "Berikutnya"
        }
      }
    });
  });

  // Dropdown action
  function toggleDropdown(button) {
    const dropdown = button.nextElementSibling;
    dropdown.classList.toggle('hidden');
    window.addEventListener('click', function (e) {
      if (!button.contains(e.target)) {
        dropdown.classList.add('hidden');
      }
    });
  }

  // Modal konfirmasi hapus
  function confirmDelete(id) {
    document.getElementById('btnDelete').href = 'hapus.php?id=' + id;
    document.getElementById('modalConfirm').classList.remove('hidden');
  }

  function closeModal() {
    document.getElementById('modalConfirm').classList.add('hidden');
  }

  // Efek scroll pada header
  window.addEventListener('scroll', function () {
    const header = document.getElementById('header');
    if (window.scrollY > 10) {
      header.classList.add('header-scrolled');
    } else {
      header.classList.remove('header-scrolled');
    }
  });

  <?php if (isset($_GET['status']) && $_GET['status'] == 'deleted'): ?>
    alert("Berhasil dihapus!");
  <?php elseif (isset($_GET['status']) && $_GET['status'] == 'updated'): ?>
    alert("Berhasil diperbarui!");
  <?php endif; ?>
</script>

</body>
</html>
