<?php
include 'services/db.php';

// Handle login request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query menggunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Mulai sesi
            session_start();
            $_SESSION['username'] = $user['username'];

            // Redirect ke homepage.php dengan query string
            header("Location: homepage.php?welcome=1");
            exit();
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('User not found.');</script>";
    }
}
?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <title>Login - AyoBelajar.id</title>
</head>
<body class="h-screen flex justify-center items-center bg-gradient-to-r from-pink-300 via-purple-300 to-blue-300">
  <div class="relative py-3 sm:max-w-xs sm:mx-auto">
    <div class="min-h-96 px-8 py-6 mt-4 text-left bg-white rounded-xl shadow-lg border-4 border-yellow-400">
      <div class="flex flex-col justify-center items-center h-full select-none">
        <div class="flex flex-col items-center justify-center gap-3 mb-8">
          <div class="w-12 h-12 bg-yellow-400 rounded-full flex justify-center items-center text-white text-xl font-bold">
            🌟
          </div>
          <p class="text-xl font-bold text-purple-800">Selamat Datang!</p>
          <span class="text-sm max-w-[90%] text-center text-purple-600">Ayo masukkan akunmu dan jelajahi dunia belajar bersama kami!</span>
        </div>
        <form method="POST" class="w-full flex flex-col gap-4">
          <div class="w-full flex flex-col gap-2">
            <label class="font-semibold text-sm text-purple-800">Username</label>
            <input
              name="username"
              type="text"
              placeholder="Nama Pengguna"
              required
              class="border rounded-lg px-3 py-2 text-purple-800 text-sm w-full outline-none border-yellow-400 focus:ring-2 focus:ring-yellow-300"
            />
          </div>
          <div class="w-full flex flex-col gap-2">
            <label class="font-semibold text-sm text-purple-800">Password</label>
            <input
              name="password"
              type="password"
              placeholder="••••••••"
              required
              class="border rounded-lg px-3 py-2 text-purple-800 text-sm w-full outline-none border-yellow-400 focus:ring-2 focus:ring-yellow-300"
            />
          </div>
          <div>
            <button
              type="submit"
              class="py-2 px-8 bg-gradient-to-r from-yellow-400 via-orange-400 to-pink-400 hover:from-yellow-500 hover:via-orange-500 hover:to-pink-500 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md rounded-lg cursor-pointer select-none"
            >
              Login
            </button>
            <div class="text-purple-800 mt-4 flex justify-between text-sm">
              <p>Belum punya akun?</p>
              <a class="underline font-bold text-orange-600 hover:text-orange-800" href="registrasi.php">Daftar Akun</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

