<?php
include 'services/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi input
    if ($password !== $confirm_password) {
        echo "<script>alert('Password dan konfirmasi password tidak cocok!');</script>";
    } else {
        // Hashing password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan data ke database
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            echo "<script>alert('Registrasi berhasil! Silakan login.');</script>";
                        // Redirect ke homepage.php dengan query string
                        header("Location: index.php");
                        exit();

        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
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
  <title>Register - AyoBelajar.id</title>
</head>
<body class="h-screen flex justify-center items-center bg-gradient-to-r from-yellow-200 via-pink-300 to-purple-400">
  <div class="relative py-3 sm:max-w-xs sm:mx-auto">
    <div class="min-h-96 px-8 py-6 mt-4 text-left bg-white rounded-xl shadow-lg border-4 border-blue-400">
      <div class="flex flex-col justify-center items-center h-full select-none">
        <div class="flex flex-col items-center justify-center gap-3 mb-8">
          <div class="w-12 h-12 bg-blue-400 rounded-full flex justify-center items-center text-white text-xl font-bold">
            🌈
          </div>
          <p class="text-xl font-bold text-purple-800">Buat Akunmu!</p>
          <span class="text-sm max-w-[90%] text-center text-purple-600">
            Bergabung dan mulailah petualangan belajar bersama kami!
          </span>
        </div>
        <form method="POST" class="w-full flex flex-col gap-4">
          <div class="w-full flex flex-col gap-2">
            <label class="font-semibold text-sm text-purple-800">Username</label>
            <input
              name="username"
              type="text"
              placeholder="Nama Pengguna"
              required
              class="border rounded-lg px-3 py-2 text-purple-800 text-sm w-full outline-none border-blue-400 focus:ring-2 focus:ring-blue-300"
            />
          </div>
          <div class="w-full flex flex-col gap-2">
            <label class="font-semibold text-sm text-purple-800">Password</label>
            <input
              name="password"
              type="password"
              placeholder="••••••••"
              required
              class="border rounded-lg px-3 py-2 text-purple-800 text-sm w-full outline-none border-blue-400 focus:ring-2 focus:ring-blue-300"
            />
          </div>
          <div class="w-full flex flex-col gap-2">
            <label class="font-semibold text-sm text-purple-800">Konfirmasi Password</label>
            <input
              name="confirm_password"
              type="password"
              placeholder="••••••••"
              required
              class="border rounded-lg px-3 py-2 text-purple-800 text-sm w-full outline-none border-blue-400 focus:ring-2 focus:ring-blue-300"
            />
          </div>
          <div>
            <button
              type="submit"
              class="py-2 px-8 bg-gradient-to-r from-blue-400 via-green-400 to-yellow-400 hover:from-blue-500 hover:via-green-500 hover:to-yellow-500 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md rounded-lg cursor-pointer select-none"
            >
              Register
            </button>
            <div class="text-purple-800 mt-4 flex justify-between text-sm">
              <p>Sudah punya akun?</p>
              <a class="underline font-bold text-blue-600 hover:text-blue-800" href="index.php">Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
