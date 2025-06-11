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
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
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
</script>

</body>
</html>
