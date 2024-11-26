<?php
include 'services/db.php';

// Proses pengiriman form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $topik = htmlspecialchars($_POST['topik']);
    $komentar = htmlspecialchars($_POST['komentar']);

    $sql = "INSERT INTO diskusi (nama, topik, komentar) VALUES ('$nama', '$topik', '$komentar')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Komentar berhasil dikirim!');</script>";
        // Redirect untuk menghindari pengiriman ulang data
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Ambil data diskusi
$result = $conn->query("SELECT * FROM diskusi ORDER BY tanggal DESC");
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AyoBelajar.id</title>
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>


<style>
    body {
      font-family: 'Poppins', sans-serif;
    }
</style>


<body class="font-Poppins ">
    <!-- Navbar -->
    <nav class="flex justify-between items-center bg-blue-600 text-white p-4"> <!-- Navbar hijau -->
    <div class="flex items-center">
        <img clas src="img/logo.png" alt="AyoBelajar Logo" class="h-10 mr-3 rounded-full"> <!-- Ubah nama logo -->
        <span class="text-xl font-Poppins text-yellow-300 font-bold">Ayo</span>
        <span class="text-xl font-Poppins text-blue-300 font-bold">Belajar.id</span>
    </div>
    <div class="flex items-center space-x-6">

        <!-- Dropdown 1 -->
        <div class="relative">
            <button id="dropdownButton2" onclick="toggleDropdown('dropdown2')" class="flex items-center bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 focus:outline-none">
               Menulis
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="dropdown2" class="hidden absolute mt-2 w-44 bg-white rounded-lg shadow-lg">
                <ul class="py-2 text-sm text-gray-800">
                    <li><a href="https://gurudikdas.kemdikbud.go.id/storage/users/3/Berita/file%20pdf/BUKU%20MODUL%20PEMBELAJARAN/FINAL%20Modul%201_Gemar%20Membaca%20Terampil%20Menulis.pdf"  class="block px-4 py-2 hover:bg-gray-100">Materi</a></li>
                    <li><a href="https://www.youtube.com/watch?v=JiAavHAksgw" class="block px-4 py-2 hover:bg-gray-100">Video</a></li>
                </ul>
            </div>
        </div>

        <!-- Dropdown 2 -->
        <div class="relative">
            <button id="dropdownButton3" onclick="toggleDropdown('dropdown3')" class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 focus:outline-none">
                Berhitung
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="dropdown3" class="hidden absolute mt-2 w-44 bg-white rounded-lg shadow-lg">
                <ul class="py-2 text-sm text-gray-800">
                    <li><a href="https://paudpedia.kemdikbud.go.id/uploads/anggun/images/2020/12_buku_BDR/Bermain_Matematika_yang_menyenangkan_dengan_anak_dirumah.pdf"  class="block px-4 py-2 hover:bg-gray-100">Materi</a></li>
                    <li><a href="https://www.youtube.com/watch?app=desktop&v=NAT89oYinxE&t=0s " class="block px-4 py-2 hover:bg-gray-100">Video</a></li>
                </ul>
            </div>
        </div>

        <!-- Dropdown 3 -->
        <div class="relative">
            <button id="dropdownButton4" onclick="toggleDropdown('dropdown4')" class="flex items-center bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 focus:outline-none">
                Menu
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="dropdown4" class="hidden absolute mt-2 w-44 bg-white rounded-lg shadow-lg">
                <ul class="py-2 text-sm text-gray-800">
                    <li><a href="profil.html" target="_blank" class="block px-4 py-2 hover:bg-gray-100">Profil</a></li>
                    <li><a href="#kontak" class="block px-4 py-2 hover:bg-gray-100">Tentang</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <div class="flex">
        <!-- Sidebar Left -->
        <aside class="bg-blue-400 flex flex-col p-5 w-1/6"> <!-- Sidebar biru -->
            <h2 class="font-bold text-lg text-center text-gray-800 mb-4">Menu</h2>
            <a href="https://paudpedia.kemdikbud.go.id/uploads/anggun/images/2020/12_buku_BDR/Bermain_Sains-2.pdf" class="text-gray-700 hover:text-white hover:bg-yellow-400 rounded px-3 py-2 mt-2">
                Belajar Sains Dasar
            </a>
            <a href="https://repository.penerbiteureka.com/media/publications/559723-kumpulan-dongeng-dan-cerita-anak-4292c903.pdf" class="text-gray-700 hover:text-white hover:bg-yellow-400 rounded px-3 py-2 mt-2">
                Dongeng Anak-anak
            </a>
        </aside>


        <!-- Main Section -->
        <div class="bg-yellow-300 p-6 flex-1"> <!-- Warna latar utama -->
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">Selamat Datang di AyoBelajar.id</h1>
            <div class="flex flex-col items-center justify-center mb-6">
        <!-- Logo -->
        <img class="h-auto max-w-xs rounded-xl mb-4" src="img/logo.png" alt="Logo AyoBelajar">
        
        <!-- Deskripsi -->
        <h2 class="text-gray-700 text-center mb-6">
            AyoBelajar.id adalah platform belajar interaktif untuk anak-anak. Kami menyediakan materi, soal latihan, dan video menarik untuk mendukung pembelajaran. Belajar menjadi lebih menyenangkan dan penuh semangat!
        </h2>
    </div>


            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg text-center font-semibold text-gray-800">Belajar Membaca Dasar</h3>
                    <img class="rounded-lg" src="img/membaca.png" alt="Belajar Membaca">
                    <p class="text-sm text-gray-600 mt-2">Pelajari cara membaca huruf dan suku kata dengan metode menyenangkan.</p>
                    <a href="belajar membaca.php" class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Pelajari</a>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg text-center font-semibold text-gray-800">Latihan Soal Umum</h3>
                    <img class="rounded-lg" src="img/LATIHAN.png" alt="Latihan Soal">
                    <p class="text-sm text-gray-600 mt-2">Coba berbagai soal latihan untuk meningkatkan kemampuanmu.</p>
                    <a href='soal.php' class="inline-block mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Latihan</a>
                </div>
                <!-- Card 3 -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg text-center font-semibold text-gray-800">Video Materi</h3>
                    <iframe class="rounded-lg h-auto w-60" src="https://www.youtube.com/embed/sLRnGFVQVFY"></iframe>
                    <p class="text-sm text-gray-600 mt-2">Belajar lebih seru dengan video animasi yang menarik sambul bernyanyi.</p>
                    <a href="https://www.youtube.com/watch?v=73ePx-6gfug&list=PL2PAgVsFqpcA5AXDO1fKFeIke19wDURMA" class=" inline-block mt-4 bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Tonton</a>
                </div>
            </div>
        <!-- Form Diskusi -->
        <section class="mb-8 mt-8" id="diskusi" >
            <h2 class="text-xl text-center font-semibold mb-4">Form Diskusi</h2>
            <form action="" method="POST" class="bg-white p-4 rounded shadow">
                <div class="mb-4">
                    <label for="nama" class="block font-bold mb-2">Nama:</label>
                    <input type="text" id="nama" name="nama" required class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="topik" class="block font-bold mb-2">Topik Diskusi:</label>
                    <input type="text" id="topik" name="topik" required class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="komentar" class="block font-bold mb-2">Pesan:</label>
                    <textarea id="komentar" name="komentar" required class="w-full p-2 border rounded"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Kirim</button>
            </form>
        </section>

        <!-- Hasil Diskusi -->
        <section>
            <h2 class="text-xl text-center font-semibold mb-4">Hasil Diskusi</h2>
            <div class="space-y-4">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="bg-white p-4 rounded shadow">
                        <h3 class="font-bold"><?= $row['topik'] ?></h3>
                        <p class="mt-2 text-gray-700"><?= $row['komentar'] ?></p>
                        <p class="mt-2 text-sm text-gray-500">Oleh: <?= $row['nama'] ?> pada <?= $row['tanggal'] ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
        </div>
        

        <!-- Sidebar Right -->
        <aside class="bg-blue-400 flex flex-col p-5 w-1/6">
            <h2 class="font-bold text-lg text-center text-gray-800 mb-4">Link </h2>
            <a href="https://www.youtube.com/@ayobelajartv5117" class="text-gray-700 hover:text-white hover:bg-yellow-400 rounded px-3 py-2">Youtube AyoBelajar</a>
            <a href="#diskusi" class="text-gray-700 hover:text-white hover:bg-yellow-400 rounded px-3 py-2 mt-2">Diskusi</a>
            <a href="whatsapp://send?text=Hallo saya ingin belajar👋&phone=+6285942882221" class="text-gray-700 hover:text-white hover:bg-yellow-400 rounded px-3 py-2 mt-2">Kontak Tutor</a>
        </aside>
    </div>

    <!-- footer -->
<footer class="bg-blue-600 text-white py-6" id="kontak">
  <div class="container mx-auto px-6 md:flex md:justify-between">
    <!-- Logo and About -->
    <div class="mb-4 md:mb-0">
      <img src="img/logo.png" alt="AyoBelajar Logo" class="rounded-full h-12 mb-3">
      <p class="text-sm leading-relaxed">
        AyoBelajar.id adalah platform pembelajaran interaktif yang dirancang khusus untuk membantu anak-anak memahami konsep-konsep dasar dengan cara yang mudah dan menyenangkan.
      </p>
    </div>

    <!-- Social Media -->
    <div>
      <h3 class="text-lg font-semibold mb-3">Ikuti Kami</h3>
      <div class="flex space-x-4">
        <a href="https://www.instagram.com/hatmia.aa/" class="transition-transform transform hover:scale-110">
          <img src="img/icons8-instagram-48.png" alt="Instagram" class="h-6">
        </a>
        <a href="whatsapp://send?text=Hallo Mia👋&phone=+6285942882221" class="transition-transform transform hover:scale-110">
          <img src="img/icons8-whatsapp-40.png" alt="WhatsApp" class="h-6">
        </a>
      </div>
    </div>
  </div>

  <div class="mt-4 border-t border-gray-600 pt-2 text-center text-sm">
    <p class="leading-relaxed">© 2024 AyoBelajar.id All rights reserved.</p>
  </div>
</footer>

</body>

<script>
      const links = document.querySelectorAll('a[href^="#"]');
      links.forEach(link => {
        link.addEventListener('click', e => {
          e.preventDefault();
          const href = link.getAttribute('href');
          const offsetTop = document.querySelector(href).offsetTop;
          scroll({
            top: offsetTop,
            behavior: 'smooth'
          });
        });
      });
    </script>
    
<script>
    function toggleDropdown(dropdownId) {
        const dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle('hidden');
    }
</script>

</body>
</html>