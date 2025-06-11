<?php
session_start();
include 'config/koneksi.php';

if (isset($_SESSION['admin'])) {
    // Kalau udah login, langsung diarahkan ke dashboard
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Cari user di database
    $query = "SELECT * FROM admin WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        // Login sukses, buat session
        $_SESSION['admin'] = $user['username'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl font-bold mb-6 text-center">Login Admin</h1>
        <?php if ($error): ?>
            <p class="mb-4 text-red-600 font-semibold"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label class="block mb-2 font-semibold">Username</label>
            <input type="text" name="username" required class="w-full mb-4 px-3 py-2 border rounded" />
            
            <label class="block mb-2 font-semibold">Password</label>
            <input type="password" name="password" required class="w-full mb-6 px-3 py-2 border rounded" />
            
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Login</button>
        </form>
    </div>
</body>
</html>
